<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredient::orderBy('intitule')->get();    
        return view('ingredients.index',compact('ingredients'));
    }

    public function show($id){
        $ingredient = Ingredient::find($id)->toArray();
        return view('ingredients.show',compact('ingredient'));

    }

    public function destroy($id){
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return redirect('/');
    }

    public function create(){
        return view('ingredients.create');
    }

    public function store(){

        $ingredient = new Ingredient();
        $ingredient->intitule = ucfirst(request('intitule'));
        $ingredient->energie = request('energie');
        $ingredient->proteines = request('proteines');
        $ingredient->glucides = request('glucides');
        $ingredient->lipides = request('lipides');
        $ingredient->fibres = request('fibres');
        $ingredient->prix = request('prix');


        request()->validate(
            [
                'intitule' => 'required|alpha|min:2|max:100|unique:ingredients,intitule',
                'energie' => 'required|numeric|gte:0',
                'proteines' => 'required|numeric|gte:0',
                'glucides' => 'required|numeric|gte:0',
                'lipides' => 'required|numeric|gte:0',
                'fibres' => 'required|numeric|gte:0',
                'prix' => 'required|numeric|gt:0'
            ]
        );


        $ingredient->save();

        return redirect('/');
    }

    public function edit($id){
        $ingredient = Ingredient::find($id);
        return view('ingredients.edit',compact('ingredient'));
    }

    public function update($id){
        $ingredient = Ingredient::find($id);
        $data = request()->validate(
            [
                'intitule' => 'required|alpha|min:2|max:100|unique:ingredients,intitule',
                'energie' => 'required|numeric|gte:0',
                'proteines' => 'required|numeric|gte:0',
                'glucides' => 'required|numeric|gte:0',
                'lipides' => 'required|numeric|gte:0',
                'fibres' => 'required|numeric|gte:0',
                'prix' => 'required|numeric|gt:0'
            ]
        );

        $ingredient->update($data);
        return redirect()->route('ingredients.show',$id);

    }

}
