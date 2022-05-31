<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Group};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "konto testowe";
        $user->email = "test@test";
        $user->password = Hash::make("test");
        $user->save();

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
    }
}
