<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function coffee () 
    {

        $coffee = Coffee::all();

        return view('admin.create-coffee', compact('coffee'));
    }
}
