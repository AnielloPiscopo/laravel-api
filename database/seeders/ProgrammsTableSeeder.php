<?php

namespace Database\Seeders;

use App\Models\Programm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProgrammsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $programms = config('db.programms');

        foreach($programms as $programm){
            $newProgramm = new Programm();
            $newProgramm->name = $programm;
            $newProgramm->slug = Str::slug($newProgramm->name);
            $newProgramm->color = $faker->unique()->hexColor();
            $newProgramm->bg_color = $faker->unique()->hexColor();
            $newProgramm->save();
        }
    }
}