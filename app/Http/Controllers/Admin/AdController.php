<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ad;
class AdController extends Controller
{
    

	public function ad(){
		$res = Ad::all();
			return view('ad.ad',['res'=>$res]);
	}

	public function creates(){
		

		return view('ad.create');
	}

	public function store(Request $request){

		$post = $request->except('_token');
        dd($post);
        $res = Ad::insert($post);
        if($res){
            return redirect('/list');
        }

	}

}
