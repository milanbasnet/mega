<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $userData=User::all();

        return view('welcome', compact('userData'));
    }

    
}
