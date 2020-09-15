<?php

<<<<<<< HEAD
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
=======
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
>>>>>>> 37a9f1401cf85e0534f470e7a153e5b02e20f47c
use Illuminate\Http\Request;
use App\Model\Role;
class RoleController extends Controller
{
<<<<<<< HEAD
    //角色管理
    public function index(){
        $role_name = request()->role_name;
        $where = [];
        if($role_name){
            $where[] =['role_name','like',"%$role_name%"]; 
        }
        $query = request()->all();
        $role = Role::where($where)->orderBy('role_id','desc')->paginate(2);
        if(request()->ajax()){
            return view('admin/role/ajaxpage',['role'=>$role,'role_name'=>$role_name,'query'=>$query]);
        }

        return view('admin/role/index',['role'=>$role,'role_name'=>$role_name,'query'=>$query]);
    }

    //角色添加
    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $post = $request->except('_token');
        
        $validatedData = $request->validate([
            'role_name'=>'required|unique:role',
            'role_desc'=>'required'            
        ],[
            'role_name.required'=>'姓名不能为空',
            'role_name.unique'=>'角色已存在',
            'role_desc.required'=>'描述不能为空'
        ]);
        // dd($post);


        $res = Role::create($post);
        
        if($res){
            return redirect('/role/index');
        }
    }
    public function destroy($role_id)
    {
        $res = Role::destroy($role_id);
        if($res){
            return redirect('/role/index');
        }
=======
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request()->all();
        $role = new Role();
        $role = Role::orderby('role_id','desc')->paginate(3);
        if(request()->ajax()){
            return view('admin.role.ajax',compact('role','query'));
        }
        return view('admin.role.index',compact('role','query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        echo 111;
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = $request->except('_token');
        $res = Role::create($post);
        if($res){
            return redirect('/role');
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
>>>>>>> 37a9f1401cf85e0534f470e7a153e5b02e20f47c
    }
}
