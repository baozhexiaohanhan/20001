<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cate;
use App\Model\Brand;
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
      //$student = student::orderby('id','desc')->paginate(3);
    $data = student::leftjoin('brand','brand.brand_id','=','student.brand_id')
    ->leftjoin  ('category','category.cate_id','=','student.cate_id')
    ->get();
    //dd($data);
      if(request()->ajax()){
            return view('student.ajax',['data'=>$data]);
        }
        return view('student.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data=Cate::get();
        $cate = $this->level($data);
        $brand=Brand::get();
        return view('student.create',['cate'=>$cate,'brand'=>$brand]);
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public  function level($data,$parent_id=0,$level=1){
        static $array=[];
        foreach($data as $k=>$v){
            if($v['parent_id']==$parent_id){
                $v['level']=$level;
                $array[]=$v;
             $this->level($data,$v['cate_id'],$v['level']+1);
            }
        }
        return $array;
    }
    public function store(Request $request)
    {
        // dd(1);
        $validatedData = $request->validate([
            's_name' => 'required|unique:student|max:20',
            's_xinghao' => 'required',
            's_price'=> 'required',
            's_kucun'=> 'required',
        ],[
            's_name.required'=>'商品名称必填！',
            's_name.unique'=>'商品名称已经存在！',
            's_name.max'=>'商品名称最多不能大于10位！',
            's_xinghao.required'=>'商品货号不能为空！',
            's_xinghao.unique'=>'定单号不能重复！',
            's_price.required'=>'价格不能为空！',
            's_kucun.required'=>'库存不能为空！',
        ]);

         $post = $request->except('_token');

        if ($request->hasFile('s_img')) { //

            $post['s_img'] = $this->upload('s_img');
        }
         if($request->hasFile('s_imgs')){
            $s_imgs = $this->Moreupload('s_imgs');
            $post['s_imgs'] = implode('|' ,$s_imgs);
        }


      $res = student::create($post);
      if($res){
        return redirect('student/index');
      }
}
// public function upload($img)
//      {
//         //判断上传中是否有错误
//         if (request()->file($img)->isValid()){
//         //接受文件
//         $file = request()->$img;
//         $store_result = $file->store('/upload');
//         return $store_result;
//         }
//         exit('未获取到上传文件或上传过程出错');
//     }

public function upload(Request $request){
    $data = $request->file;
     if ($request->hasFile('file') && $request->file('file')->isValid()) {
      $photo = request()->file;
      $store_result = $photo->store('/upload');
      $data='/'.$store_result;
   
       //dd($data);
       return json_encode(['code'=>0,'msg'=>'上传成功','data'=>['src'=>$data,'title'=>'']]);
 }
       return json_encode(['code'=>1,'msg'=>'上传失败']);
}

    // public function Moreupload($img){
    //     //接受文件
    //     $file = request()->$img;
    //     foreach($file as $k=>$v){
    //         //判断上传是否有错
    //         if($v->isValid()){
    //             $store_result[$k] = $v->store('/upload');

    //         }else{
    //             $store_result[$v] = '为获取上传文件';
    //         }
    //     }
    //     return $store_result;
    // }
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
        $brand=Brand::get();
        $cate=Cate::get();
         $student = student::where('id',$id)->first();
        return view('student.edit',['student'=>$student,'brand'=>$brand,'cate'=>$cate]);
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
            if(request()->ajax()){
                return json_encode(['error_no'=>'1','error_msg'=>'删除成功']);
            }
            return redirect('brand/index');
        }

    }
}
