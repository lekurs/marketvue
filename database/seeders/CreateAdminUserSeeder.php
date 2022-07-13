<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $users = [
            [
                'name' => 'Maxime',
                'lastname' => 'Gindre',
                'email' => 'gindre.maxime@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('mg261181'), // password
                'slug' => 'maxime-gindre',
                'remember_token' => Str::random(10),
                'api_token_private_key' => Str::random(150),
            ]
        ];

        foreach ($users as $user) {
            $newuser = User::create($user);
            $newuser->roles()->attach(1);
            $newuser->roles()->attach(2);
        }

    }
}
