<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GeneralSkill;
use App\Models\Language;
use App\Models\Programm;
use App\Models\Technology;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index(){
        $technologies = Technology::select('name')->get();
        $programms = Programm::select('name')->get();
        $languages = Language::select('name')->get();
        $generalSkills = GeneralSkill::select('name')->get();

        $skills = [];
        array_push($skills , ['name' => 'Linguaggi di programmazione', 'content' => $technologies] , ['name' => 'Programmi', 'content' => $programms] , ['name' => 'Lingue', 'content' => $languages] , ['name' => 'Soft Skills', 'content' => $generalSkills]);
        
        return response()->json([
            'success' => true,
            'results' => $skills,
        ]);
    }
}