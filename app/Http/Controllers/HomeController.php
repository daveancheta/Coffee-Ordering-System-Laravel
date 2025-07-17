<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () 
    {
        return view('session-table');
    }
    public function display () 
    {
        return view('display-coffee');
    }
   
}
