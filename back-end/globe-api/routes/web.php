<?php

use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\BudgetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CountryController::class)->group(function(){

    Route::get('/getCountries', 'getCountries');
    Route::get('/getCitiesByCountry', 'getCitiesByCountry');

})->prefix('/country');

Route::controller(BudgetController::class)->group(function(){
       
    Route::get('/getBudgetByCountry', 'getBudgetByCountry');
    Route::get('/getTotalBudget', 'getTotalBudget');
    Route::get('/createNewBudget', 'createNewBudget');
    Route::get('/updateBudget', 'updateBudget');
    Route::get('/deleteBudget/{id}', 'deleteBudget');

})->prefix('/budget');

Route::controller(CountryController::class)->group(function(){

    Route::get('/getAvailableLangs', 'getAvailableLangs');

})->prefix('/language');