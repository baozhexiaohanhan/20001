<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_name = request()->role_name;
        $where = [];
        if($role_name){
            $where[] = ['role_name','like',"%$role_name%"];
        }
       
        $query = request()->all();
       //dd($query);
        $role = role::where($where)->orderby('role_id','desc')->paginate(3);
        if(request()->ajax()){
            return view('admin.role.ajax',['role'=>$role,'query'=>$query]);
        }
        return view('admin.role.index',['role'=>$role,'query'=>$query]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.role.role');
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
        $res = Role::insert($post);
        if($res){
            return redirect('/role/index');
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
        $role = Role::where('role_id',$id)->first();
        return view('admin.role.edit',['role'=>$role]);
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
          //接受所有值
        $post = $request->except('_token');
        // dd($post);
        $res = Role::where('role_id',$id)->update($post);
        if($res!==false){
            return redirect('/role/index');
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
       
        $res = Role::where('role_id',$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(['error_no'=>'1','error_msg'=>'删除成功']);
            }
            return redirect('role/index');
        }
    }
}
