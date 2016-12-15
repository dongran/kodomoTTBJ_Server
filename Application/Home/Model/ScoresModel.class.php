<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 2016/12/16
 * Time: 02:59
 */
namespace Home\Model;

use Think\Model;

class ScoresModel extends Model
{

    protected $_validate = array(
        array('test_name', 'require', 'name　Can not be empty!'),
        array('user_answers', 'require', 'user answers　Can not be empty!'),
        array('uuid', 'require', 'uuid　Can not be empty!')
    );

    protected $_auto = array(
        array('end_time', 'time', self::MODEL_BOTH, 'function')
    );
}