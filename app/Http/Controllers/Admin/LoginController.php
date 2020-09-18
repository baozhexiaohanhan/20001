<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
class LoginController extends Controller
{
    public function logindo(Request $request){
      
                $post = $request->except('_token');
               
               $admin = Admin::where('admin_name',$post['admin_name'])->first();
               if(!$admin){
                        return redirect('/login')->with('msg','没有此用户请填写信息');
               }

               //解密
               if(decrypt($admin->pwd)!==$post['pwd']){
                // dd(decrypt($admin->pwd));
                return redirect('/login')->with('msg','密码错误');
               }

               session(['admin'=>$admin]);

               return redirect('/brand/index');
        }
<<<<<<< HEAD
=======


>>>>>>> b9ed352f2172e06b16cff34c4bca601debc8c6bd
}
