<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;
use App\Models\Ingredient;
use App\Models\Utilisation;


class RecetteController extends Controller
{
    public function index(){
        $recettes = Recette::orderBy('intitule')->get();
        return view('recettes.index',compact('recettes'));
    }

    public function show($id){
        $recette = Recette::find($id);
        return view('recettes.show',compact('recette'));
    }    


    public function store(){
        
        $recette = new Recette();
        request()->validate(
            [
                'intitule' => 'required|alpha|min:2|max:100|unique:recettes,intitule'
            ]
        );

        $recette->intitule = request('intitule');
        $recette->save();


        return redirect()->route('recettes.index');

    }



    public function update($id){
        $recette = Recette::find($id);
        $data = request()->validate(
            [
                'intitule' => 'required|alpha|min:2|max:100|unique:recettes,intitule'
            ]
        );

        $recette->update($data);

        return redirect()->route('recettes.show',$id);

    }

    public function addAsIngredient($id){
        $recette = Recette::find($id);
        $ingredient = new Ingredient();
        $ingredient->intitule = $recette->intitule;
        $ingredient->energie = $recette->energie100g();
        $ingredient->proteines = $recette->proteines100g();
        $ingredient->glucides = $recette->glucides100g();
        $ingredient->lipides = $recette->lipides100g();
        $ingredient->fibres = $recette->fibres100g();
        $ingredient->prix = $recette->prix100g();

        $ingredient->save();

        return redirect()->route('recettes.index');
    }

    public function destroy($id){
        Recette::destroy($id);
        return redirect()->route('recettes.index');

    }

    public function addIngredient($id){
        $utilisation = new Utilisation();

        request()->validate(
            [
                'id_ingredient' => 'required | numeric | gt:0' ,
                'quantite' => 'required | numeric | gt:0'
            ]
        );

        $utilisation->id_ingredient = request('id_ingredient');
        $utilisation->quantite = request('quantite');
        $utilisation->id_recette = $id;

        $utilisation->save();
        return redirect()->route('recettes.show',$id);

    }    

    public function editIngredient($id_recette,$id_ingredient){
        $utilisations = Utilisation::where('id_recette',$id_recette)->where('id_ingredient',$id_ingredient)->get();
        $utilisation = $utilisations[0];

        $utilisation->update(
            request()->validate(
                [
                    'quantite' => 'required | numeric | gt:0'
                ]
            )
        );
    }

    public function deleteIngredient($id_recette,$id_ingredient){
        $utilisations = Utilisation::where('id_recette',$id_recette)->where('id_ingredient',$id_ingredient)->get();
        $utilisation = $utilisations[0];
        $utilisation->delete();

        return redirect()->route('recettes.show',$id_recette);        
    }
}
