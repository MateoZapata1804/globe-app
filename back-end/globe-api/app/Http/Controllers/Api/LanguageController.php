<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Obtiene los lenguajes disponibles para traducir en la página
     * 
     */
    public function getAvailableLangs(){
        return response(Language::all())->json();
    }
}
