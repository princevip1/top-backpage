<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Package;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //today live ads
        $todayLiveAds = Post::where('user_id', auth()->user()->id)->whereDate('created_at', today())->count();
        $totalLiveAds = Post::where('user_id', auth()->user()->id)->count();

        //get packages where the price is 0
        $freePackages = Package::where('type', 'free')->get();

        //get posts where the package is free
        $totalFreeAds = Post::where('user_id', auth()->user()->id)
    ->whereIn('package_id', $freePackages->pluck('id'))
    ->count();

        //get posts where the package is not free
        $totalPaidAds = Post::where('user_id', auth()->user()->id)
    ->whereIn('package_id', $freePackages->pluck('id'))
    ->count();

        $title = 'Dashboard ¦ '.config()->get("services.application.slugName") ;

        return view('home', compact('todayLiveAds', 'totalLiveAds', 'totalFreeAds', 'totalPaidAds', 'title'));
    }
    public function myaccount()
    {

        $title = 'My Account ¦ '.config()->get("services.application.slugName") ;

        return view('my-account', compact( 'title'));
    }
    public function myaccountUpdate(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
        ]);

        //update user
        auth()->user()->name = $data['name'];
        auth()->user()->date_of_birth = $data['date_of_birth'];
        auth()->user()->save();

        return redirect()->back()->with('success', 'Your account has been updated successfully');

    }
}
