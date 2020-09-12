<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
class RegController extends Controller
{
    public function Doreg(Request $request){
        $data=request()->except('_token');

        $validatedData = $request->validate([
            'admin_name'=>'required|unique:login|max:20',
            'admin_pwd'=>'required',
            ],[
            'admin_name.required'=>'用户名必填',
            'admin_name.unique'=>'用户名已存在',
            'admin_name.max'=>'用户名最大长度不超20',
            'admin_pwd.required'=>'密码必填',
        ]);

         if($data['admin_pwd']!==$data['admin_pwd1']){
            return redirect('/reg')->with('msg','确认密码必须和密码一致');
        }

        $Admin = new Admin();
        $Admin ->admin_name=$data['admin_name'];
        $Admin ->admin_pwd=$data['admin_pwd'];
        $Admin ->create_time=time();
        $result=$Admin->save();
        if($result) {
            return redirect('/brand/index');
        }

    }
}
