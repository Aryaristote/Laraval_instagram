<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller{
    public function index(User $user){
        return view('profile/index', compact('user')); //Passing user data to the view to be acceessible.
    }

    public function edit(User $user){

        // $this->authorize('update', $user->profile); //Make the view uncessible when user is not logged in

        return view('profile.edit', compact('user'));
    }

    public function update(User $user){
        // $this->authorize('update', $user->profile);


        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $data['image'] = $imagePath;
        }

        Profile::updateOrCreate(
            ['user_id' => auth()->user()->id], // Attributes to match against
            $data,
        );

        return redirect("/profile/{$user->id}");
    }
}
