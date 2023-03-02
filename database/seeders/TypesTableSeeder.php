<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = config('helpers.types');
        
        foreach($types as $type){
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::slug($newType->name);
            $newType->vanilla = $faker->boolean();
            $newType->save();
        }
    }
}