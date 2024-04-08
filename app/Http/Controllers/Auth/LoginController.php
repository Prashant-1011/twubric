<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Follower;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function handleTwitterCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();
        // dd($twitterUser);
        $user = User::where('twitter_id', $twitterUser->id)->first();
        if (!$user) {
            // User doesn't exist, create a new one
            $user = User::create([
                'name' => $twitterUser->name,
                'twitter_id' => $twitterUser->id,
                'twitter_token' => $twitterUser->token,
                'email' => $twitterUser->nickname
            ]);
        }else{
            $user->update(['twitter_token' => $twitterUser->token]);   
        }

        // Fetch user's followers list from Twitter API
        // $response = Http::withToken($user->twitter_token)->get('https://api.X.com/1.1/followers/list.json');
        $response = Http::get('https://gist.githubusercontent.com/pandemonia/21703a6a303e0487a73b2610c8db41ab/raw/9667fc19a0f89193e894da7aaadf6a4b7758b45e/twubric.json');

        $followersData = $response->json();
        foreach ($followersData as $follower) {
            
            Follower::updateOrCreate(
                ['uid' => $follower['uid']],
                [
                    'username' => $follower['username'],
                    'fullname' => $follower['fullname'],
                    'twubric' => serialize($follower['twubric']),
                    'main_user_id' =>$twitterUser->id
                ]
            );
        }
        $followers = Follower::where('main_user_id',$twitterUser->id)->paginate(10);
        Auth::login($user);

        return view('home', compact('followers', 'user'));
    }
}
