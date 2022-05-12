<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\{User, Group};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:40'],
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1000',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        

        if(isset($data['avatar']))
        {
            $user =  User::create([
                'name' => $data['name'],
                'avatar' => $data['avatar']->store('photos'),
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            session(['avatar' => $data['avatar']->store('photos')]);
        }
        else
        {
            $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }

        Group::create([
            'name' => 'Wszystkie filmy',
            'type' => 'default',
            'status' => false,
            'user_id' => $user->id,
        ]);

        Group::create([
            'name' => 'Do obejrzenia',
            'type' => 'default',
            'status' => false,
            'user_id' => $user->id,
        ]);
        
        return $user;
    }
}
