<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    private $post;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_posts       = $this->post->latest()->get();
        $suggested_users = $this->getSuggestedUsers();

        return view('users.home')
                ->with('all_posts', $all_posts)
                ->with('suggested_users', $suggested_users);
    }

    private function getSuggestedUsers()
    {
        $all_users = $this->user->all()->except(Auth::user()->id);
        $suggested_users = [];

        foreach ($all_users as $user){
            // if the Auth user is not following the $user, save the user inside $suggested_users
            if (!$user->isFollowed()){
                $suggested_users[] = $user;
            }
        }
        return $suggested_users;
    }

    public function suggested()
    {
        $suggested_users = $this->getSuggestedUsers();
        return view('users.suggested')->with('suggested_users', $suggested_users);
    }
}