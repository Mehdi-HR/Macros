<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


//Ingredient
Route::get('/ingredients', 'IngredientController@index')->name('ingredients.index');
Route::get('/ingredients/create', 'IngredientController@create')->name('ingredients.create');
Route::post('/ingredients', 'IngredientController@store')->name('ingredients.store');

Route::get('/ingredients/{id}', 'IngredientController@show')->name('ingredients.show');
Route::delete('/ingredients/{id}', 'IngredientController@destroy')->name('ingredients.destroy');

Route::get('/ingredients/{id}/edit', 'IngredientController@edit')->name('ingredients.edit');
Route::patch('/ingredients/{id}', 'IngredientController@update')->name('ingredients.update');


//recettes

Route::post('/recettes', 'RecetteController@store')->name('recettes.store');

Route::get('/recettes', 'RecetteController@index')->name('recettes.index');
Route::get('/recettes/{id}', 'RecetteController@show')->name('recettes.show');
Route::delete('/recettes/{id}', 'RecetteController@destroy')->name('recettes.destroy');


Route::patch('/recettes/{id}', 'RecetteController@update')->name('recettes.update');

Route::post('recettes/{id}/add_as_ingredient','RecetteController@addAsIngredient')->name('recettes.add_as_ingredient');

Route::post('recettes/{id}/add_ingredient','RecetteController@addIngredient')->name('recettes.add_ingredient');

Route::patch('recettes/{id}/edit_ingredient/$id_ingredient','RecetteController@editIngredient')->name('recettes.edit_ingredient');

Route::get('/recettes/{id_recette}/delete/{id_ingredient}', 'RecetteController@deleteIngredient')->name('recettes.delete_ingredient');
