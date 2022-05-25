<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Movie, Genre, Group};

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileView()
    {
        $user = User::find(Auth::id());
        
        return view('main.profile', ['user' => $user]);
    }

    public function updateProfileData(Request $request)
    {
        if($request->file('avatar') != null)
        {
            $path = $request->file('avatar')->store('profile');
            session(['avatar' => $path]);

            User::where('id', $request->user()->id)->update([
                'name' => $request->name,
                'avatar' => $path,
                'email' => $request->email,
            ]);
        }
        else
        {
            User::where('id', $request->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        
        return redirect()->back();
    }

    public function updatePassword(Request $request)
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
