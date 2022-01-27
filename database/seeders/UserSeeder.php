<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan make:seeder UserSeeder
        //
        DB::table('users')->insert([
        'name'=>'sakshi',
        'email' => 'sakshijaiswal@gmail.com',
        'password'=>Hash::make('sakshi123')
        ]);
    }
}

