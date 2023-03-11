<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = config('db.languages');

        foreach($languages as $language){
            $newLanguage = new Language();
            $newLanguage->name = $language['name'];
            $newLanguage->slug = Str::slug($newLanguage->name);
            $newLanguage->save();
        }
    }
}