<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Movie, Genre, Group};
use App\Http\Requests\{UpdateProfileRequest, UpdatePasswordRequest};

use Illuminate\Support\Facades\{Auth,Hash};


class ProfileController extends Controller
{
    public function profileView()
    {
        $user = User::find(Auth::id());
        
        return view('main.profile', ['user' => $user]);
    }

    public function updateProfileData(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        $oldEmail = User::where('id', $request->user()->id)->get('email');
        if($oldEmail[0]->email != $data['email'])
        {
            if(User::where('email', $data['email'])->exists())
            {
                return redirect()->back()->with('email', 'Taki email już istnieje!');
            }
        }
        
        if($request->file('avatar') != null)
        {
            $path = $request->file('avatar')->store('profile');
            session(['avatar' => $path]);

            User::where('id', $request->user()->id)->update([
                'name' => $data['name'],
                'avatar' => $path,
                'email' => $data['email'],
            ]);
        }
        else
        {
            User::where('id', $request->user()->id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        
        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = User::find($request->user()->id);

        if (Hash::check($request->currentPassword, $user->password)) {

            User::where('id', $request->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->back();
    }
}
