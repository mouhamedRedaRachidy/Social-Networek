<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $users=[
            ['id'=>1,'nom'=>'rachidy','metier'=>'Dev'],
            ['id'=>2,'nom'=>'bidah','metier'=>'DevOps'],
            ['id'=>3,'nom'=>'zahir','metier'=>'colud'],
        ];

        return view('home',compact('users'));
    }
}
