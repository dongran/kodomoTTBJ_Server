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

    // 由updateExamData API替代, 已过时此API
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

    public function checkLevel(){
        $uid = I('get.username');
        //$uid = "kaca1";
        $exStatus = D('exstatus');
        $where = array();
        $where['uid'] = $uid;
        $statusList = $exStatus->where($where)->select();
        if ($statusList){
            $result['status'] = "ok";
            foreach ($statusList as $status){
                $result['PaperName'][$status['paper_name']] = $status['level'];
            }
            /*$test = array('status'=> 'ok',
                'data' => array(
                    array('spot'=> '0','spoty'=> '0','moji'=> '0'),
                    array('spot'=> '1','spoty'=> '1','moji'=> '1'),
                    array('spot'=> '2','spoty'=> '2','moji'=> '2'),
                    array('spot'=> '3','spoty'=> '3','moji'=> '3'),
                )
            );*/
            echo json_encode($result);
        }else {
            $result['status'] = "fail";
            echo json_encode($result);
        }
    }

    public function updateExamData(){
        $json_string = file_get_contents('php://input'); ##今回のキモ
        $obj = json_decode($json_string);

        /*echo $obj->{"username"};
        echo sizeof($obj->{"data"});
        echo "  ";
        echo $obj->{"data"}[1]->{"time"};*/
        //JSON example "{"username":"sc","data":[{"field":"dfs","answers":"ABCDEABCED","time":"2&2&3&4&7"}]}";

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

        $exStatus = D('exstatus');
        $exStatus->level = intval($obj->{"exstatus"}->{"spoty"});
        $exStatus->where('uid="'.$obj->{"username"}.'" and paper_name="spoty"')->save();

        $exStatus->level = intval($obj->{"exstatus"}->{"spot"});
        $exStatus->where('uid="'.$obj->{"username"}.'" and paper_name="spot"')->save();

        $exStatus->level = intval($obj->{"exstatus"}->{"moji"});
        $exStatus->where('uid="'.$obj->{"username"}.'" and paper_name="moji"')->save();

        echo "successfully!";

    }
    
}