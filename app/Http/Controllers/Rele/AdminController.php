<?php

namespace App\Http\Controllers\Rele;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


    public function index(){
        return view('admin.rele.index');
    }

    public function create(){
        return view('admin.rele.create');
    }
}
