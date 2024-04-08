<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function index(){
        $user = auth()->user();
        $followers = Follower::where('main_user_id',$user->twitter_id)->paginate(10);
        return view('home', compact('followers', 'user'));
    }
    public function show(Request $request){
        // dd($request->id);
        $followerDetails = Follower::where('uid', $request->id)->get();
        // dd($followerDetails->uid);
        return view('follower.details', compact('followerDetails'));
    }
}
