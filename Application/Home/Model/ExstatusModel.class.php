<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 16/8/1
 * Time: 00:09
 */
namespace Home\Model;

use Think\Model;

class ExstatusModel extends Model
{

    protected $_validate = array(
        array('uid', 'require', 'username　Can not be empty!'),
        array('paper_name', 'require', 'paper name　Can not be empty!')
    );

    protected $_auto = array(
        array('level', 0)
    );
}