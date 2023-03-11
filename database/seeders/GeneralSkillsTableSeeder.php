<?php

namespace Database\Seeders;

use App\Models\GeneralSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GeneralSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generalSkills = config('db.generalSkills');

        foreach($generalSkills as $generalSkill){
            $newGeneralSkill = new  GeneralSkill();
            $newGeneralSkill->name = $generalSkill;
            $newGeneralSkill->slug = Str::slug($newGeneralSkill->name);
            $newGeneralSkill->save();
        }
    }
}