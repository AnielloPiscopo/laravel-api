<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personalAccount = new User();
        $personalAccount->name= 'sd';
        $personalAccount->email = 'aniello.piscopo0707@gmail.com';
        $personalAccount->password = Hash::make('sdsdsdsd');
        $personalAccount->save();
    }
}