<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request)
    {
        /*$lastCount=$request->session()->get('compteur',0);
        session()->put('compteur',$lastCount+1);
        $compteur=$request->session()->get('compteur',0);*/
        $compteur=session()->increment('compteur',5);
        return view('home',compact('compteur'));
    }
}
