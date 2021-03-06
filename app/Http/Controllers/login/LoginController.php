<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\reg;

class LoginController extends Controller
{
    //注册
	public function reg()
	{
		return view('login/reg');
	}
	//执行注册
	public function reg_do()
	{
		$post=Request()->all();
		//dd($post);
		if($post['u_pass'] != $post['u_pwd']){
            return redirect('/reg');
        }else{
        	$post=request()->except($post['u_pwd']);
        $res=reg::create($post);
        //dd($res);
        if($res){
			echo"<script>location.href='/login',alert('注册成功，请登录')</script>";
        }
        }
	}

	//登录
	public function login()
	{
		return view('login/login');
	}
	//执行登录
	public function login_do(Request $request)
	{
		$post=Request()->all();
		$get=reg::where('u_mobile',$post['u_mobile'])->get()->toArray();
		//dd($get);
		if($get==[]){
			echo"<script>location.href='/login',alert('登录失败，请重新登录')</script>";
		}else{
			echo"<script>location.href='/index',alert('登录成功，欢迎来到商城')</script>";
		}
	}
	//登录成功后跳转页面
	public function index()
	{
		return view('login/index');
	}

}