<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Package;
use App\Models\Category;
use File;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('id','DESC')->paginate(50);

        $title = 'My Ads ¦ '.config()->get("services.application.slugName") ;

        return view('post.index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectCity(Request $request)
    {
        $countires = Country::all();
        $title = 'Select Location ¦ '.config()->get("services.application.slugName") ;
        return view('post.selectCity', compact('countires', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectcategory(Request $request)
    {
        $categories = Category::all();

        $cityId = $request->city;

        //find the city by slug
        $city = City::where('slug', $cityId)->first();

        if(!$city){
            return redirect()->route('select-city');
        }

        $title = 'Select Category ¦ '.config()->get("services.application.slugName") ;


        return view('post.selectcategory', compact('categories', 'city', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



        $cityId = $request->city;
        $categoryId = $request->category;

        //find the city by slug
        $city = City::where('slug', $cityId)->first();

        if(!$city){
            return redirect()->route('select-city');
        }

        //find the city by slug
        $category = category::where('slug', $categoryId)->first();


        if(!$category){
            return redirect()->route('select-city');
        }


        $packages = Package::get();

        $title = 'Ad Details ¦ '.config()->get("services.application.slugName") ;

        return view('post.details', compact('city', 'packages', 'category', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $city_from_url = \request()->city;
        $category_from_url = \request()->category;

        //find city
        $city = City::where('slug', $city_from_url)->first();

        if(!$city) return redirect()->back();

        //find city
        $category = Category::where('slug', $category_from_url)->first();
        if(!$category) return redirect()->back();


        $data = \request()->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min:100'],
            'name' => ['required', 'string', 'max:30', 'min:3'],
            'age' => ['required', 'string', 'max:3'],
            'email' => '',
            'phone' => '',
            'service_for' => 'required',
            'gender' => 'required',
            'ethnicity' => '',
            'incall' => '',
            'outcall' => '',
            'height' => '',
            'weight' => '',
            'breast' => '',
            'package' => 'required',
        ]);


        //find the package
        $package = Package::where('id', $data['package'])->first();

        if(!$package) {
            $request->validate([
                'file' => ['required']
            ], [
                'file.required' => 'Package is required and you must have balance more than the package cost to post',
            ]);

        }

        $withoutTags = strip_tags($data['description']);
        $description = preg_replace("/\r\n|\r|\n/", '<newline/>', $withoutTags);

        $unique_id = rand(10,1000000000);

        function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

            return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
         }

         $slug = clean($data['title']);

        //create the post
        $newPost  = new Post();
        $newPost->user_id = auth()->user()->id;
        $newPost->title = $data['title'];
        $newPost->slug = strtolower($slug).'-'.$unique_id;
        $newPost->random_post_id = $unique_id;
        $newPost->description = $description;
        $newPost->city_id = $city->id;
        $newPost->category_id = $category->id;
        $newPost->email = $request->email;
        $newPost->phone = $request->phone;
        $newPost->service_for = $request->service_for;
        $newPost->gender = $request->gender;
        $newPost->location =  $request->location;
        $newPost->ethnicity = $request->ethnicity;
        $newPost->incall = $request->incall;
        $newPost->outcall = $request->outcall;
        $newPost->height = $request->height;
        $newPost->weight = $request->weight;
        $newPost->breast = $request->breast;
        $newPost->name = $request->name;
        $newPost->age = $request->age;
        $newPost->status = "approved";
        $newPost->package_id = 1;
        $newPost->save();

        if($request->hasFile('file'))
        {
        if(count($request->file('file')) <= 4 ){

                $allowedfileExtension=['jpg','png', 'jpeg'];
                $files = $request->file('file');
                $foldername = date("d-m-y");

                foreach ($files as $file) {
                    // Get the file extension
                    $extension = $file->getClientOriginalExtension();

                    // Check if the file extension is allowed
                    $check = in_array($extension, $allowedfileExtension);

                    if ($check) {
                        // Store the file in the 'public/images' directory locally
                        $path = $file->store('post_images', 'public');

                        // Generate the URL for the stored file
                        $path = Storage::url($path);

                        // Save the image data to the PostImage model
                        $newImage = new PostImage();
                        $newImage->post_id = $newPost->id;
                        $newImage->image = $path; // Save the URL path
                        $newImage->save();
                    }
                }


        }else{
            $request->validate([
                'file' => ['required']
            ], [
                'file.required' => 'You can not upload more than 3 photos',
            ]);

        }
    }

        return redirect()->route('single', ['state' => $city->state->slug,  'city' => $city->slug, 'category' => $category->slug,  'post' => $newPost->slug])->with('success', 'Post created and published successfully.');


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the post by id and auth user
        $post = Post::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if(!$post) return redirect()->back();
        $post->delete();

        //find all the images of the post and delete them from the folder and database
        $images = PostImage::where('post_id', $post->id)->get();
        foreach($images as $image){
            $image_path = public_path('post_images/'.$image->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $image->delete();
        }

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
