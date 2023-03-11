<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = config('db.technologies');

        foreach($technologies as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->slug = Str::slug($newTechnology->name);
            $newTechnology->color = $faker->unique()->hexColor();
            $newTechnology->bg_color = $faker->unique()->hexColor();
            $newTechnology->save();
        }
    }
}