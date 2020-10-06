<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Poster;

class PosterController extends Controller
{
    public function create(){
    	

    	return view('poster.create');
    }

  public function store(Request $request)
    {
        
        $post = $request->except('_token');
        // dd($post);
        $res = Poster::insert($post);
        if($res){
            return redirect('/list');
        }
    }

    public function list(){
        $menu = new Poster();
        $menu = Poster::all();
       return view('poster.list',compact('menu'));
    }

    public function destroy($id)
    {

        $res = Poster::where('position_id',$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(['error_no'=>'1','error_msg'=>'删除成功']);
            }
            return redirect('/list');
        }

    }
}
