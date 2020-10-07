<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PosterModel;
use App\Model\PostersModel;
class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $menu = new PosterModel();
        $menu = PosterModel::all();
       return view('poster.list',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('poster.create');
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
        $res = PosterModel::insert($post);
        if($res){
            return redirect('/poster/list');
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
         $res = PosterModel::where('position_id',$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(['error_no'=>'1','error_msg'=>'删除成功']);
            }
            return redirect('/list');
        }
    }
    public function createad($position_id){
        $data = PosterModel::find($position_id);
        if($data->template==1){
            $ad =  PostersModel::where('position_id',$position_id)->value('ad_imgs');
            $template = 'onepic';
        }
        $content = view('admin.ad.lib.'.$template,['ads'=>$ad,'width'=>$data->ad_width,'height'=>$data->ad_height])->render();
        $filename = '/wwwroot/laravel/resources/views/index/ads/'.$position_id.'.blade.php';
        // dd($filename);
        $res = file_put_contents($filename,$content);
        if($res){
            echo "<script>alert('生成成功...');history.go(-1)</script>";
        }
    }
}
