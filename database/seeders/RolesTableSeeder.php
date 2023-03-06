<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('db.roles');

        foreach($roles as $role){
            $newRole = new Role();
            $newRole->level = $role['level'];
            $newRole->name = $role['name'];
            $newRole->save();
        }
    }
}