<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        echo "admin";
    }
    
    public function checkVersion(){
    
    	$arr = array(
		'name'=> "kodomoTTBJ.apk",
		'Version'=> 1.1,
		'url'=> "http://kaken.sakura.ne.jp/kodomoTTBJ/Uploads/kodomoTTBJ.apk"
		);
		$this->ajaxReturn ($arr,'JSON');
	}
}