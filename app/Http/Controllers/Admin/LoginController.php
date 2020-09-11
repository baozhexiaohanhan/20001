<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
class LoginController extends Controller
{
    public function logindo(Request $request){
        $post=$request->all();
      //  dd($post);
        //根据用户名查询有无记录
        $admin=Admin::where('admin_name',$post['admin_name'])->first();
        //var_dump($admin);
        if(!$admin){
            return redirect('/login')->with('msg','没有此用户');
        }


        if($admin->admin_pwd!=$post['admin_pwd']){
            return redirect('/login')->with('msg','密码有误');
        }
        session(['user'=>$admin]);
        return redirect('/brand/index');
    }
}
