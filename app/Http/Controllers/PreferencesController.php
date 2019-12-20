<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;

class PreferencesController extends Controller
{

    public function getPreferencesAjax( Request $request){
        return "hello world";
    }

}
