<?php

namespace App\Http\Controllers\Seckil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Seckil;
use App\Model\Goods;
class SeckilController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $menu = Seckil::get();
        return view('seckil.list',['menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Goods::select('goods_id','goods_name')->get();
         return view('seckil.create',compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $post = $request->except('_token');
       // dd($post);
        $post['start_time'] = strtotime($post['start_time'])??'';
        $post['end_time'] = strtotime($post['end_time'])??'';

         $res = Seckil::insert($post);
         if($res){
             return redirect('seckil/list');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
