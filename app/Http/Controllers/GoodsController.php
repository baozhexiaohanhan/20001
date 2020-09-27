<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cate;
use App\Model\Brand;
use App\Model\Type;
use DB;
use App\Goods;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pageSize');
      //$goods = Goods::orderby('goods_id','desc')->paginate(3);
    $data = Goods::leftjoin('brand','brand.brand_id','=','goods.brand_id')
    ->leftjoin  ('category','category.cate_id','=','goods.cate_id')
    ->get();
    //dd($data);
      if(request()->ajax()){
            return view('goods.ajax',['data'=>$data]);
        }
        return view('goods.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $data = Cate::get();
        $cate = $this->level($data);
        $brand = Brand::get();
        $type = Type::get();
        return view('goods.create',['cate'=>$cate,'brand'=>$brand,'type'=>$type]);
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
            'goods_name' => 'required|unique:goods|max:20',
            'goods_xinghao' => 'required',
            'goods_price'=> 'required',
            'goods_kucun'=> 'required',
        ],[
            'goods_name.required'=>'商品名称必填！',
            'goods_name.unique'=>'商品名称已经存在！',
            'goods_name.max'=>'商品名称最多不能大于10位！',
            'goods_xinghao.required'=>'商品货号不能为空！',
            'goods_xinghao.unique'=>'定单号不能重复！',
            'goods_price.required'=>'价格不能为空！',
            'goods_kucun.required'=>'库存不能为空！',
        ]);
         $post = $request->except('_token');

        if ($request->hasFile('goods_img')) { //

            $post['goods_img'] = $this->upload('goods_img');
        }
         if($request->hasFile('goods_imgs')){
            $goods_imgs = $this->Moreupload('goods_imgs');
            $post['goods_imgs'] = implode('|' ,$goods_imgs);
        }


      $res = Goods::create($post);
      // dd($res);

      if($res){
        return redirect('goods/index');
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

// public function upload(Request $request){
//     $data = $request->file;
//      if ($request->hasFile('file') && $request->file('file')->isValid()) {
//       $photo = request()->file;
//       $store_result = $photo->store('/upload');
//       $data='/'.$store_result;
   
//        //dd($data);
//        return json_encode(['code'=>0,'msg'=>'上传成功','data'=>['src'=>$data,'title'=>'']]);
//  }
//        return json_encode(['code'=>1,'msg'=>'上传失败']);
// }

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
     * @param  int  $goods_id
     * @return \Illuminate\Http\Response
     */
    public function show($goods_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $goods_id
     * @return \Illuminate\Http\Response
     */
    public function edit($goods_id)
    {
        $brand=Brand::get();
        $cate=Cate::get();
         $goods = Goods::where('goods_id',$goods_id)->first();
        return view('goods.edit',['goods'=>$goods,'brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $goods_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $goods_id)
    {
         $post = $request->except(['_token']);
        $res = DB::table('goods')->where('goods_id',$goods_id)->update($post);
        if($res!==false){
        return redirect('goods/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $goods_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($goods_id)
    {
        $res = DB::table('goods')->where('goods_id',$goods_id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(['error_no'=>'1','error_msg'=>'删除成功']);
            }
            return redirect('brand/index');
        }

    }

}
