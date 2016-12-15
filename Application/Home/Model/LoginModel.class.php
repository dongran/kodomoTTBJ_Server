<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/8/1
 * Time: 20:51
 */
namespace Home\Model;
use Think\Model;

class LoginModel extends Model {
    protected $tableName = 'manager';

    protected $_validate = array(
        array('username', 'require', 'username can not be empty!'),
        array('password', 'require', 'Password can not be empty!'),
    );

    protected $_auto = array(
        array('password', 'md5', self::MODEL_BOTH, 'function')
    );

}