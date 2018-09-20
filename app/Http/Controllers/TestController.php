<?php

namespace App\Http\Controllers;
use Overtrue\Socialite\SocialiteManager;
use Illuminate\Http\Request;

class TestController extends Controller
{
	protected $config = [
			    'github' => [
			        'client_id'     => 'd0b5be2cbdd5f79105a1',
			        'client_secret' => '0f5f98fbf8a3dbe474003004146f4f4c3940a1c7',
			        'redirect'      => 'http://localhost/ruanjian_02/oauth/public/github/login',
			    ],
			];	
    public function login(){

    	//客户已经点击要使用github去登录本网站

    	//定向到 git hub 的url地址中 等待用户授权

    	$socialite = new SocialiteManager($this->config);

		return $socialite->driver('github')->redirect();


    }

    public function githublogin(){
    	//用户在github的授权页面 点击授权操作，github 就会携带用户的（github 中的用户信息）信息
    	//定向到 之前设置的回调地址

    	$socialite = new SocialiteManager($this->config);

		$user = $socialite->driver('github')->user();
		$data = [
			'email'=>$user->getEmail(),
			'name'=>$user->getName(),
			'password'=>'123',
		];
		//用户数据是否在数据库中存在
		
		$user = \App\User::firstOrCreate($data);
		

		//让这个用户登录进来
		\Auth::login($user);
		return redirect('/');

    }
}
