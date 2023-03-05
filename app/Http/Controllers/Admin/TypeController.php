<?php

/*
|--------------------------------------------------------------------------
| Type Controller in Admin
|--------------------------------------------------------------------------
|
| A controller for the istance Type
|
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{
    protected $rules = [
        'color'=> 'required,unique:types',
        'bg_color'=> 'required,unique:types',
    ];

    protected $messages = [
        'color.required' => 'Devi specificare il colore per il testo',
        'bg_color.required' => 'Devi specificare il colore per lo sfondo',
    ];
    
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = Type::all();
        return view('admin.pages.types.index' , compact('types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.pages.types.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.pages.types.edit' , compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $newRules = $this->rules;
        $newRules['color'] = ['required' , Rule::unique('types')->ignore($type->id)];
        $newRules['bg_color'] = ['required' , Rule::unique('types')->ignore($type->id)];

        $formData = $request->validate($newRules , $this->messages);

        $type->update($formData);
        
        $successMessage = "
            <div class='my_alert-popup my_success'>
                <h1 class='fw-bold'>Congratulazioni!</h3>
                <h5 class='my_alert-message'>$type->name è stato modificato</h5>
            </div>";


        return redirect()->route('admin.pages.types.index',compact('type'))->with('success',"$successMessage");
    }
}