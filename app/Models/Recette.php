<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilisation;

class Recette extends Model
{   
    use HasFactory;

    public $timestamps = null;
    protected $guarded = [];

    //TOTAL
    public function energie(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $energie = 0;
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']);
            $energie += $ingredient->energie * ($utilisation['quantite']/100);
        }

        return $energie;
    }

    public function proteines(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $proteines = 0;
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']);
            $proteines += $ingredient->proteines * ($utilisation['quantite']/100);
        }

        return $proteines;
    }

    public function glucides(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $glucides = 0;
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']);
            $glucides += $ingredient->glucides * ($utilisation['quantite']/100);
        }

        return $glucides;
    }

    public function lipides(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $lipides = 0;
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']);
            $lipides += $ingredient->lipides * ($utilisation['quantite']/100);
        }

        return $lipides;
    }

    public function fibres(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $fibres = 0;
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']);
            $fibres += $ingredient->fibres * ($utilisation['quantite']/100);
        }

        return $fibres;
    }

    public function prix(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $prix = 0;
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']);
            $prix += $ingredient->prix * ($utilisation['quantite']/100);
        }

        return $prix;
    }            

    public function poids(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $poids = 0;
        foreach($utilisations as $utilisation){
            $poids += $utilisation['quantite'];
        }

        return $poids;
    }            


 //100g
    public function energie100g(){

        return ($this->energie()/$this->poids()) * 100;
    }

    public function proteines100g(){

        return ($this->proteines()/$this->poids()) * 100;
    }    

    public function glucides100g(){

        return ($this->glucides()/$this->poids()) * 100;
    }

    public function lipides100g(){

        return ($this->lipides()/$this->poids()) * 100;
    }

    public function fibres100g(){

        return ($this->fibres()/$this->poids()) * 100;
    }

    public function prix100g(){

        return ($this->prix()/$this->poids()) * 100;
    }            

    //ingredients

    public function items(){
        $utilisations = Utilisation::where('id_recette',$this->id)->get()->toArray();
        $items = [];
        foreach($utilisations as $utilisation){
            $ingredient = Ingredient::find($utilisation['id_ingredient']); 
            $items[] =  [
                            'ingredient' => $ingredient ,'qte' => $utilisation['quantite'] 
                        ];      
        }
        return $items;        
    }

    //ingredients non utilises
    public function nonUtilises(){
        $id_utilises = Utilisation::where('id_recette',$this->id)->pluck('id_ingredient')->toArray();
        $ingredients = Ingredient::whereNotIn('id',$id_utilises)->get();
        return $ingredients;        
    }    

}
