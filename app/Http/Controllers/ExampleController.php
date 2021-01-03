<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //
    public function exampleFun()
    {
        return view('ejemplo', ['name' => 'Pablo']);
    }
}
