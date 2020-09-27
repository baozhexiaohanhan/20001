<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function item(){
    	
    	return view('index.item');
    }

    public function index(){
    	return view('index.index');
    }
    
}
