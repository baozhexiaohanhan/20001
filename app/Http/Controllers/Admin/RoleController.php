<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;
class RoleController extends Controller
{
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
    }
}
