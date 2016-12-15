<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/7/31
 * Time: 21:40
 */
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){

        if(IS_POST){
            $login = D('login');

            if(!$data = $login->create()){
                header("Content-type: text/html; charset=utf-8");
                exit($login->getError());
            }

            $where = array();
            $where['username'] = $data['username'];
            $result = $login->where($where)->field("id, username, password, auth")->find();

            if($result && $result['password'] == $data['password']){
                session('uid', $result['id']);
                session('username', $result['username']);
                session('auth', $result['auth']);
                
                $this->success('login successfully ...', U('Index/index'), 2);
            }else{
                $this->error(" username or password Invalid");
            }
        }else{
            $this->display();
        }
    }

    public function logout()
    {
        session(null);
        redirect(U('Login/index'), 2, 'Please waiting...');
    }

}