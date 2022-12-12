<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($count=0; $count<10; $count++){
            DB::table('users')->insert([
                'first_name' => Str::random(15),
                'last_name' => Str::random(15),
                'email' => Str::random(25).'@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
