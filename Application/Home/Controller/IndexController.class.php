<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/7/31
 * Time: 21:40
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index(){
        //echo session('auth');
        //$this->assign('actionName', 'index');
        $this->display();
    }

    public function stuserlist(){
        $stusers = M("stusers");
        $count = $stusers->count();
        $Page = PageCreater($count);
        $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        if(session('auth') == 1) {
            //$stulist = $stusers->getField('uid, stuname, birthday, school_type, school_name, grade, team, num, school_location, lastdate');
            $stulist = $stusers->order('uid')->limit($Page->firstRow.','.$Page->listRows)->getField('uid, stuname, birthday, school_type, school_name, grade, team, num, school_location, lastdate');

        }else{
            $Condition['usergroup'] = session("uid");
            $stulist = $stusers->where($Condition)->order('uid')->limit($Page->firstRow.','.$Page->listRows)->select();
        }

        $this->assign('page',$show);// 赋值分页输出
        $this->assign('stuList', $stulist);
        $this->display();
    }

    public function teachuserlist(){
        //$this->assign('actionName', 'index');
        $manager = M("manager");
        $count = $manager->count();
        $Page = PageCreater($count);
        $show = $Page->show();

        $tealist = $manager->order('id')->limit($Page->firstRow.','.$Page->listRows)->getField('id, username, auth');
        $this->assign('page', $show);
        $this->assign('teaList', $tealist);
        $this->display();
    }

    public function scoreslist(){
        $scores = M("scores");
        $count = $scores->count();
        $Page = PageCreater($count);
        $show = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        $scoreslist = $scores->order('id')->limit($Page->firstRow.','.$Page->listRows)->getField('test_name, end_time, user_answers, answer_times');
        // echo var_dump($scoreslist);
        foreach ($scoreslist as $value){
            echo $value;
        }
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('scoreList', $scoreslist);
        $this->display();
    }

    public function createteach(){
        if(IS_POST){
            $teacher = D('manager');

            if(!$data = $teacher->create()){
                header("Content-type: text/html; charset=utf-8");
                exit($teacher->getError());
            }

            $teacher->data($data)->add();

            $this->success('New teacher/Manager Create successfully ...', U('Index/teachuserlist'), 0);

        }else{
            $this->display();
        }
    }
    public function createstu(){
        if(IS_POST){
            $stUser = D('stusers');

            if(!$data = $stUser->create()){
                header("Content-type: text/html; charset=utf-8");
                exit($stUser->getError());
            }
            $stUser->data($data)->add();

            $lastInsID = $stUser->getLastInsID();
            $where = array();
            $where['id'] = $lastInsID;
            $res = $stUser->where($where)->field("stuname")->find();

            $new['uid'] = $res['stuname'].$lastInsID;
            $stUser->where($where)->save($new);
            
            
            $this->success('New Student Create successfully ...', U('Index/stuserlist'), 0);

        }else{
            $this->display();
        }
    }

    

    public function uploadexam(){
        //$this->assign('actionName', 'index');
        if(IS_POST){
            $this->upload();
        }else{
            $this->display();
        }

    }

    public function exportuserid(){
        //$this->assign('actionName', 'index');
        $this->display();

    }
    public function exportscore(){
        //$this->display();
        $this->error('sorry, NO DATA ...', U('Index/index'), 1);
    }
    public function exportdata(){
        //$this->display();
        $this->error('sorry, NO DATA ...', U('Index/index'), 1);
    }

    public  function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('xml');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->replace =   true;
        $upload->autoSub =   false;
        $upload->saveName =  ''  ;
        // 上传文件

        $info   =   $upload->upload();
        //dump($info);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $this->success('Successfully！', U('Index/uploadexam'),2);
        }
    }

    public function testSQL(){

        $Data     = M('testsql');// 实例化Data数据模型
        $result     = $Data->find(1);
        $this->assign('result',$result);

        $name = 'testSQL';
        $this->assign('name',$name);


        $this->display();
    }
}