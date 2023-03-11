<?php

namespace Database\Seeders;

use App\Models\GeneralSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypesTableSeeder::class,
            TechnologiesTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserSeeder::class,
            ProjectsTableSeeder::class,
            ProjectTechnologySeeder::class,
            GeneralSkillsTableSeeder::class,
            LanguagesTableSeeder::class,
            ProgrammsTableSeeder::class,
        ]);
    }
}