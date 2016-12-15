<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/7/31
 * Time: 23:36
 */
namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public static $userid = '';

    public function _initialize()
    {
        if (!session('username')) {
            $this->error('Please Login !', U('Login/index'), 2);
        } else {
            if (!empty($this->userid)) {
                $this->userid = session('uid');
            }
        }
    }
}