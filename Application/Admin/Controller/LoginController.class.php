<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
	public function index() {
		if (session('adminUser')) {
			$this->redirect('/admin.php?m=admin&c=index&a=index');
		}
		$this->display();

	}

	public function check(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!trim($username)){
			if(trim($password)){
				return show(0, '用户名不能为空格');
			}else{
				return show(0, '用户名与密码不能为空格');
			}
		}else{
			if(!trim($password)){
				return show(0, '密码不能为空格');
			}
		}
		$ret = D('Admin')->getAdminByUsername($username);
		if(!$ret || $ret['status']!=1){
			return show(0, '用户不存在');
		}
		if($ret['password']!=getMd5Password($password)){
			// $n=$ret['password'];
			return show(0, '密码错误');
		}
		D('Admin')->updateByAdminId($ret['admin_id'], array('lastlogintime'=>time()));
		session('adminUser', $ret);
		return show(1, '登录成功');
	}
}