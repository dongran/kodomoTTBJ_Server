<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 2016/12/15
 * Time: 18:42
 */
namespace Home\Controller;
use Think\Controller;
class RestAPIController extends Controller {
    public function checkUser(){
        $uuid = I('get.username');
        $stUser = D('stusers');
        $res = $stUser->where('uid="'.$uuid.'"')->select();
        if ($res){
            echo "ok";
        }else {
            echo dump($res);
        }

    }

    public function insertAnswer(){
        $json_string = file_get_contents('php://input'); ##今回のキモ
        //echo $json_string;
        $obj = json_decode($json_string);

        /*echo sizeof($obj->{"data"});
        echo "\n";
        echo $obj->{"data"}[0]->{"time"};*/
        //String json = "{\"username\":\"sc\",\"data\":[{\"field\":\"dfs\",\"answers\":\"ABCDEABCED\",\"time\":\"2&2&3&4&7\"}]}";
        $userName = $obj->{"username"};
        //$data_size = sizeof($obj->{"data"});
        $ScoreModel = D("scores");
        foreach ($obj->{"data"} as $value){
            $res = $ScoreModel->where('test_name="'.$value->{'field'}.'" and uuid="'.$userName.'"')->select();
            if ($res){
                // update
                $ScoreModel->test_name = $value->{"field"};
                $ScoreModel->user_answers = $value->{"answers"};
                $ScoreModel->answer_times = $value->{"time"};
                $mysqltime = date('Y-m-d H:i:s',time());
                $ScoreModel->end_time = $mysqltime;
                $ScoreModel->where('test_name="'.$value->{'field'}.'" and uuid="'.$userName.'"')->save();
            }else{
                // create
                $data['test_name'] = $value->{"field"};
                $mysqltime = date('Y-m-d H:i:s',time());
                $data['create_time'] = $mysqltime;
                $data['end_time'] = $mysqltime;
                $data['user_answers'] = $value->{"answers"};
                $data['answer_times'] = $value->{"time"};
                $data['uuid'] = $userName;
                $ScoreModel->add($data);
            }
        }
        echo "successfully!";

    }
}