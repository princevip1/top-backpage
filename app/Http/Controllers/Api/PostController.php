<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\City;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\PostImage;
use Storage;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title = "";
        if($request->title){
            //split the titile by : and get the first part
            $title = explode(":", $request->title)[0];
            //split by space and remove the list item
            $title = explode(" ", $title);
            array_shift($title);
            $title = implode(" ", $title);
        }

        //find the city by city
        $city = City::where('name', $request->city)->first();

        if(!$city){
            
            //take a random city from the database where state countyr_id country is united state
            $city = City::whereHas('state', function($query){
                $query->whereHas('country', function($query){
                    $query->where('short_name', 'US');
                });
            })->inRandomOrder()->first();
        }

        //find the category where name is Femlae Escorts
        $category = Category::where('slug', 'female-escorts')->first();

        //find the user whetre username is admin
        $user = User::where('username', 'admin')->first();


        function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
         
            return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
         }
         
         $slug = clean($title);

         $unique_id = rand(10,1000000000);


         $withoutTags = strip_tags($request->description);
         $description = preg_replace("/\r\n|\r|\n/", '<newline/>', $withoutTags);


        $femaleNames = ["Emily","Hannah","Madison","Ashley","Sarah","Alexis","Samantha","Jessica","Elizabeth","Taylor","Lauren","Alyssa","Kayla","Abigail","Brianna"
        ,"Olivia","Emma","Megan","Grace","Victoria","Rachel","Anna","Sydney","Destiny","Morgan","Jennifer","Jasmine","Haley","Julia","Kaitlyn","Nicole","Amanda","Katherine",
        "Natalie","Hailey","Alexandra","Savannah","Chloe","Rebecca","Stephanie","Maria","Sophia","Mackenzie","Allison","Isabella","Amber","Mary","Danielle","Gabrielle","Jordan","Brooke",
        "Michelle","Sierra","Katelyn","Andrea","Madeline","Sara","Kimberly","Courtney","Erin","Brittany","Vanessa","Jenna","Jacqueline","Caroline","Faith","Makayla","Bailey","Paige","Shelby","Melissa","Kaylee",];

        $name = "";
        if($request->name){
            //split by : and get the first part
            $name = explode(":", $request->name);

            if($name[0] == "Name"){
                //split by space and remove the list item
                $name = explode(" ", $name[1]);
                array_shift($name);
                $name = implode(" ", $name);
            }
           $name = $name;
        }

        $age = "";
        if($request->age){
            //split by : and get the first part
            $age = explode(":", $request->age);

            if($age[0] == "Age"){
                //split by space and remove the list item
                $age = explode(" ", $age[1]);
                array_shift($age);
                $age = implode(" ", $age);
            }
           $age = $age;
        }


        $newPost  = new Post();
        $newPost->user_id = $user->id;
        $newPost->title = $title;
        $newPost->slug = strtolower($slug).'-'.$unique_id;
        $newPost->random_post_id = $unique_id;
        $newPost->description = $description;
        $newPost->city_id = $city->id;
        $newPost->category_id = $category->id;
        $newPost->email = $request->email;
        $newPost->phone = $request->phone;
        $newPost->service_for = "male";
        $newPost->gender = "female";
        $newPost->location =  $city->name;
        $newPost->ethnicity = $request->ethnicity;
        $newPost->incall = $request->incall;
        $newPost->outcall = $request->outcall;
        $newPost->height = $request->height;
        $newPost->weight = $request->weight;
        $newPost->breast = $request->breast;
        $newPost->name = $request->name ? $name : $femaleNames[rand(0, count($femaleNames) - 1)];
        $newPost->age = $request->age ? $age : rand(18, 32);
        $newPost->status = "approved";
        $newPost->package_id = 1;
        $newPost->image_source = 'aws_s3';
        $newPost->save();

        if($request->hasFile('images')){


            $allowedfileExtension=['jpg','png', 'jpeg'];
            $files = $request->file('images');
            $foldername = date("d-m-y");

            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                   $path = Storage::disk('s3')->put('images', $file);
                        $path = Storage::disk('s3')->url($path);
                        $newImage = new PostImage();
                        $newImage->post_id = $newPost->id;
                        $newImage->image = $path;
                        $newImage->save();
                }
            }

            
        }

        if( $newPost){
            return response()->json([
                'status' => 'success',
                'message' => 'Post created successfully',
                'data' => $newPost
            ]);
        }

        return response()->json([
            'error' => 'Something went wrong',
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
