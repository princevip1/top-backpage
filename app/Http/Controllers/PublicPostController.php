<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\City;
use App\Models\Post;
use App\Models\State;
use App\Models\Category;

class PublicPostController extends Controller
{

    public function categoriesState(Request $request, $state){
        $categories = Category::all();

        $state = State::where('slug', $state)->first();

        if(!$state) return redirect()->route('home');

        $title = 'Backpage '. $state->name.' Escorts ¦ '.config()->get("services.application.slugName"). ' '. $state->name.', Alabama Classifieds';

        $metaDescription = config()->get("services.application.slugName"). ' '. $state->name. ' classifieds website is a site similar to backpage '. $state->name. ' classifieds. Post ads in this new '. $state->name. ' backpage classifieds for free!';

        return view('state-categories', compact('categories', 'state', 'title', 'metaDescription'));
    }

    public function categoriesCity (Request $request, $city){
      
        $categories = Category::all();

        $city = City::where('slug', $city)->first();

        if (!$city) return redirect()->route('home');

        $state = State::where('id', $city->state_id)->first();

        if(!$state) return redirect()->route('home');

        $title = 'Backpage '. $city->name.' Escorts ¦ '.config()->get("services.application.slugName"). ' '. $city->name.', Alabama Classifieds';

        $metaDescription = 'Find backpage '. $city->name.' escorts, body rubs in '. $city->name.', strippers, '. $city->name.' adult jobs, '. $city->name.' dating in the '.config()->get("services.application.slugName").' ' . $city->name.', ' . $state->name.' classified website.';

        return view('city-categories', compact('categories', 'state', 'city', 'title', 'metaDescription'));
    }

    public function cityPosts(Request $request, $state, $city, $category){

        //page number 
        $page = 1;

        if($request->has('page')){
            $page = $request->page;
        }
        $state = State::where('slug', $state)->first();

        if(!$state) return redirect()->route('home');

        //find the category
        $category = Category::where('slug', $category)->first();
        if(!$category) return redirect()->route('home');

        $city = City::where('slug', $city)->first();

        if(!$city) return redirect()->route('home');

        //get all cities of this state
        $cities = City::where('state_id', $city->state_id)->get();

        $posts = Post::where('city_id', $city->id)->where('status', 1)->orderBy('id','DESC')->where('category_id',  $category->id)->paginate(50)->groupBy(function($item){ return $item->created_at->format('D d M y'); })->toArray();


        $postCount = Post::where('status', 1)->where('city_id', $city->id)->orderBy('id','DESC')->where('category_id',  $category->id)->limit(500)->count();
        
        if($postCount > 500){
           $postCount = 500;
        }

        //get page numbers
        $pageNumbers = [];
       
        //devide the post count by 50 and round it up
        $pageCount = $postCount / 50;
        $pageCount = ceil($pageCount);

        for($i = 1; $i <= $pageCount; $i++){
            $pageNumbers[] = $i;
        }


        $title = 'Female Escorts in '.$city->name.' ¦ '.$city->name. ' '. $category->name.' ¦ '.config()->get("services.application.slugName") ;

        $metaDescription = 'Find backpage '. $category->name.' in '.$city->name. ' '. config()->get("services.application.slugName") .' Adult classifieds. The best place to locate '.$city->name.' '.$category->name.' advertisements is '.config()->get("services.application.slugName").' Adult '.$category->name.' classified section.';

        return view('ads', compact( 'city', 'cities', 'posts', 'category', 'state', 'title', 'metaDescription', 'pageNumbers', 'page'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $state, $city, $category, $post)
    {

        $state = State::where('slug', $state)->first();

        if(!$state) return redirect()->route('home');

        //find the category
        $category = Category::where('slug', $category)->first();
        if(!$category) return redirect()->route('home');

        $city = City::where('slug', $city)->first();

        if(!$city) return redirect()->route('home');

        $post = Post::where('slug', $post)->first();
        if(!$post) return redirect()->route('home');


        $inCodedDescription =   str_replace("<newline/>", '</br>', $post->description);

        $title =  $post->title.' ¦ '.config()->get("services.application.slugName") ;

        $metaDescription =  $post->title.' - advertisement is posted in the '.config()->get("services.application.slugName").' '.$city->name.', '.$state->name.' Adult, '.$category->name.' classifieds.';

        return view('single', compact('post', 'city', 'inCodedDescription', 'state', 'category', 'title', 'metaDescription'));

    }

    public function statePosts(Request $request, $state, $category){

        //page number 
        $page = 1;

        if($request->has('page')){
            $page = $request->page;
        }


        $state = State::where('slug', $state)->first();

        if(!$state) return redirect()->route('home');

        $cities = City::where('state_id', $state->id)->get();

        //find the category
        $category = Category::where('slug', $category)->first();
        if(!$category) return redirect()->route('home');

        //find posts of this state
        $posts = Post::where('status', 1)->whereIn('city_id', $cities->pluck('id'))->orderBy('id','DESC')->where('category_id',  $category->id)->paginate(50)->groupBy(function($item){ return $item->created_at->format('D d M y'); })->toArray();


        $postCount = Post::where('status', 1)->whereIn('city_id', $cities->pluck('id'))->orderBy('id','DESC')->where('category_id',  $category->id)->count();
        
        if($postCount > 500){
           $postCount = 500;
        }

        //get page numbers
        $pageNumbers = [];
       
        //devide the post count by 50 and round it up
        $pageCount = $postCount / 50;
        $pageCount = ceil($pageCount);

        for($i = 1; $i <= $pageCount; $i++){
            $pageNumbers[] = $i;
        }

        $title = 'Female Escorts in '.$state->name.' ¦ '.$state->name. ' '. $category->name.' ¦ '.config()->get("services.application.slugName") ;

        $metaDescription = 'Find backpage '. $category->name.' in '.$state->name. ' '. config()->get("services.application.slugName") .' Adult classifieds. The best place to locate '.$state->name.' '.$category->name.' advertisements is '.config()->get("services.application.slugName").' Adult '.$category->name.' classified section.';


        return view('states', compact( 'state', 'cities', 'posts', 'category', 'title', 'metaDescription', 'pageNumbers', 'page'));
    }

    public function privacy(){
        $title = 'Privacy Policy ¦ '.config()->get("services.application.slugName") ;
        return view('privacy', compact('title'));
    }
    public function terms(){
        $title = 'Terms of Use ¦ '.config()->get("services.application.slugName") ;
        return view('terms', compact('title'));
    }

    public function contactus(){
        $title = 'Contact Us ¦ '.config()->get("services.application.slugName") ;
        return view('contact', compact('title'));
    }
}
