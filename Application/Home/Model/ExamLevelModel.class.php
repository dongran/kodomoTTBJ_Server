<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/8/1
 * Time: 00:09
 */
namespace Home\Model;

use Think\Model;

class ExamLevelModel extends Model
{

    protected $_validate = array(
        array('stuname', 'require', '氏名　Can not be empty!'),
        array('birthday', 'require', '生年月日　Can not be empty!'),
        array('school_type', 'require', '学校の種類　Can not be empty!'),
        array('grade', 'require', '学年　Can not be empty!'),
        array('school_location', 'require', '学校の場所　Can not be empty!')
    );

    protected $_auto = array(
        //array('uid', 'createUid', self::MODEL_INSERT, 'function'),
        array('usergroup', 'getStuTeacher', self::MODEL_INSERT, 'function'),
        array('lastdate', 'time', self::MODEL_BOTH, 'function'),
       // array('lastip', 'get_client_ip', self::MODEL_BOTH, 'function'),
        array('loginnum', 0)
    );
}