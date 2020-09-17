<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\student;
class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pageSize = config('app.pageSize');
      // $brand = DB::table('brand')->get();
      $student = student::orderby('id','desc')->paginate(3);

      if(request()->ajax()){
            return view('student.ajax',['student'=>$student]);
        }
        return view('student.index',['student'=>$student]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validatedData = $request->validate([
            's_pp' => 'required|unique:student|max:20',
            's_cc' => 'required',
            's_bb'=> 'required',
            's_oo'=> 'required',
            's_hh'=> 'required',
        ],[
            's_pp.required'=>'商品名称必填！',
            's_pp.unique'=>'商品名称已经存在！',
            's_pp.max'=>'商品名称最多不能大于10位！',
            's_cc.required'=>'商品货号不能为空！',
            's_cc.unique'=>'定单号不能重复！',
            's_bb.required'=>'商品品牌不能为空！',
            's_oo.required'=>'价格不能为空！',
            's_hh.required'=>'库存不能为空！',

        ]);

         $post = $request->except('_token');
       
        if ($request->hasFile('s_ss')) { // 
           
            $post['s_ss'] = $this->upload('s_ss');
        }
         if($request->hasFile('s_ii')){
            $s_ii = $this->Moreupload('s_ii');
            $post['s_ii'] = implode('|' ,$s_ii);
        }
    

      $res = student::create($post);
      if($res){
        return redirect('student/index');
      }
}
public function upload($img)
     {
        //判断上传中是否有错误
        if (request()->file($img)->isValid()){
        //接受文件
        $file = request()->$img;
        $store_result = $file->store('/upload');
        return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
    public function Moreupload($img){
        //接受文件
        $file = request()->$img;
        foreach($file as $k=>$v){
            //判断上传是否有错
            if($v->isValid()){
                $store_result[$k] = $v->store('/upload');

            }else{
                $store_result[$v] = '为获取上传文件';
            }
        }
        return $store_result;
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
      
         $student = student::where('id',$id)->first();
        return view('student.edit',['student'=>$student]);
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
         $post = $request->except(['_token']);
        $res = DB::table('student')->where('id',$id)->update($post);
        if($res!==false){
        return redirect('student/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $res = DB::table('student')->where('id',$id)->delete();
        if($res){
        return redirect('student/index');
    }
}
}
