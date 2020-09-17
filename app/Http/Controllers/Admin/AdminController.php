<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *管理员展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_name = request()->admin_name;
        $where = [];
        if($admin_name){
            $where[] =['admin_name','like',"%$admin_name%"]; 
        }
        $query = request()->all();
        $admin = Admin::where($where)->orderBy('admin_id','desc')->paginate(2);
        if(request()->ajax()){
            return view('admin/admin/ajaxpage',['admin'=>$admin,'admin_name'=>$admin_name,'query'=>$query]);
        }

        return view('admin/admin/index',['admin'=>$admin,'admin_name'=>$admin_name,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except(['_token','pwd1']);
        
        $validatedData = $request->validate([
            'admin_name'=>'required|unique:admin',
            'pwd'=>'required',
            'pwd1'=>'required',
            'mobile'=>'required',
        ],[
            'admin_name.required'=>'姓名不能为空',
            'admin_name.unique'=>'管理员已存在',
            'pwd.required'=>'密码不能为空',
            'pwd1.required'=>'确认密码不能为空',
            'mobile.required'=>'手机号不能为空',
        ]);
       $post['pwd'] = encrypt($post['pwd']);
        // dd($post);
        $res = Admin::create($post);
        
        if($res){
            return redirect('/admin/index');
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
     *删除
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_id)
    {
        $res = Admin::destroy($admin_id);
        if($res){
            return redirect('/admin/index');
        }
    }
}
