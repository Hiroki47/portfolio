<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    private $user;
    const LOCAL_STORAGE_FOLDER = 'public/avatars/';

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.profile.show')->with('user', $user);
    }

    public function edit()
    {
        $user = $this->user->findOrFail(Auth::user()->id);
        return view('users.profile.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'          => 'required|min:1|max:50',
            'email'         => 'required|email|max:50|unique:users,email,' . Auth::user()->id,
            'avatar'        => 'mimes:jeg,png,jpeg,gif|max:1048',
            'introduction'  => 'max:100'
        ]);
        // unique:table_name,column_name,PK_value

        // 1. Add the error directives on the Edit Profile view
        // 2. update(). Update the name, email, and introduction.
        // 3. Check if the user uploded an avatar from local storage.
        // 4. Delete the old avatar in the local storage. deleteAvatar()
        // 5. Save the new avatar in the local storage. saveAvatar()
        // 6. Save.
        // 7. Redirect to profile.show

        $user = $this->user->findOrFail(Auth::user()->id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->introduction = $request->introduction;

        // If the user uploads an avatar...
        if($request->avatar){
            // If the user has an avatar currently, delete from the local storage
            if ($user->avatar){
                $this->deleteAvatar($user->avatar);
            }

            // Save the new avatar in the local storage.
            $user->avatar = $this->saveAvatar($request);
        }

        $user->save();
        return redirect()->route('profile.show', Auth::user()->id);
    }

    private function saveAvatar($request)
    {
        $avatar_name = time() . "." . $request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $avatar_name);

        return $avatar_name;
    }

    private function deleteAvatar($avatar_name)
    {
        $avatar_path = self::LOCAL_STORAGE_FOLDER . $avatar_name;
        if (Storage::disk('local')->exists($avatar_path)){
            Storage::disk('local')->delete($avatar_path);
        }
    }
    
    public function followers($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.profile.followers')->with('user', $user);
    }

    public function following($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.profile.following')->with('user', $user);
    }
}