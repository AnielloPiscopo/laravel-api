<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $personalAccount = User::all()->first();
        $users = User::all()->except(1);
        $roles = Role::all()->pluck('id');

        $personalAccount->roles()->attach(1);
        foreach($users as $user){
            $user->roles()->attach($faker->randomElements($roles,2));
        }
    }
}