<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class localizationController extends Controller
{
    public function index(Request $request, $locale){
      //set aplication locale 
      app()->setLocale($locale);
      
      //get the translated message and displays it 
      echo trans("lang.mensaje");
    }
}
