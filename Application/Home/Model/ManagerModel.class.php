<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/8/1
 * Time: 01:06
 */
namespace Home\Model;
use Think\Model;

class ManagerModel extends Model {

    protected $_validate = array(
        array('username', 'require', 'username can not be empty!'),
        array('password', 'require', 'Password can not be empty!'),
        array('username', '', 'This username is already existed', self::MUST_VALIDATE, 'unique', self::MODEL_INSERT),
        array('repassword', 'password', 'repassword is different from password', self::MUST_VALIDATE, 'confirm', self::MODEL_INSERT),

    );

    protected $_auto = array(
        array('password', 'md5', self::MODEL_BOTH, 'function'),
        //array('auth', 'int', self::MODEL_INSERT, 'function')
    );

}