<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/8/1
 * Time: 01:29
 */

function getStuTeacher(){

    return session('uid');
}

function PageCreater($count){
    $Page = new \Think\Page($count,8);
    $Page->setConfig('prev',  '<span aria-hidden="true">Prev</span>');//上一页
    $Page->setConfig('next',  '<span aria-hidden="true">Next</span>');//下一页
    $Page->setConfig('first', '<span aria-hidden="true"><<</span>');//第一页
    $Page->setConfig('last',  '<span aria-hidden="true">>>/span>');//最后一页
    $Page->setConfig ( 'theme', '<li><a>Current%NOW_PAGE%/%TOTAL_PAGE%</a></li>  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%' );

    return $Page;
}

/**
 * @param bool $field
 * @return null
 */

function getAllExamHistory($field = false){
    // id test_name create_time user_answers answer_times uuid
    $scores = D("scores");
    $scoresList = null;
    if (!$field) {
        $scoresList = $scores->order('id')->getField('id, test_name, uuid, user_answers, answer_times, create_time');
    }else{
        $scoresList = $scores->order('id')->getField($field);
    }
    $paperlink = D("paperlink");
    $links = $paperlink->order('id')->getField('id, test_name, linknum');
    $dict = array();
    foreach ($links as $p){
        $dict[$p['linknum']] = $p['test_name'];
    }
    foreach ($scoresList as &$p){
        try {
            $p['test_name'] = $dict[$p['test_name']];
        } catch (Exception $e) {
            $this->error(" No Paper name data, please check the database paperlink".$e->getMessage());
        }
    }
    return $scoresList;
}

function getAllStuInfo(){
    $stusers = D("stusers");
    $stuList = $stusers->getField('uid, stuname, birthday, school_type, school_name, grade, 
    team, num, school_location');
    return $stuList;
}
function outCSV ($res){

}

/**
 * 数组转xls格式的excel文件
 * @param  array  $data      需要生成excel文件的数组
 * @param  string $filename  生成的excel文件名
 *      示例数据：
$data = array(
array(NULL, 2010, 2011, 2012),
array('Q1',   12,   15,   21),
array('Q2',   56,   73,   86),
array('Q3',   52,   61,   69),
array('Q4',   30,   32,    0),
);
 */
function outXls($data,$filename='simple.xls'){
    ini_set('max_execution_time', '0');
    Vendor('PHPExcel.PHPExcel');
    $filename=str_replace('.xls', '', $filename).'.xls';
    $phpexcel = new PHPExcel();
    $phpexcel->getProperties()
        ->setCreator("KodomoTTBj")
        ->setLastModifiedBy("KodomoTTBj")
        ->setTitle("Office 2007 XLSX Test Data")
        ->setSubject("Office 2007 XLSX Test Data")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");
    $phpexcel->getActiveSheet()->fromArray($data);
    $phpexcel->getActiveSheet()->setTitle('Sheet1');
    $phpexcel->setActiveSheetIndex(0);
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment;filename=$filename");
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    $objwriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel5');
    $objwriter->save('php://output');
    exit;
}