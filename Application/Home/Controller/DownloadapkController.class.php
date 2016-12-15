<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/8/3
 * Time: 01:47
 */

namespace Home\Controller;
use Think\Controller;
class DownloadapkController extends Controller {

    public function index(){

        $this->display();
    }


    public function download(){
        
        $file_name="kodomoTTBJ.apk";
        $file_sub_path = $_SERVER['DOCUMENT_ROOT']."/kodomoTTBJ/Uploads/";
        $file_path = $file_sub_path.$file_name;


        $showname="kodomoTTBJ.apk";//文件保存名//文件原名
        $filename=$file_path;//完整文件名（路径加名字）
        //import(‘ORG.Net.Http’);
        $download = new \Org\Net\Http();
        $download->download($filename,$showname);


    }
}