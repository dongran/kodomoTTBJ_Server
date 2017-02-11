<?php
/**
 * Created by IntelliJ IDEA.
 * User: SunChen
 * Date: 2016/12/16
 * Time: 02:59
 */
namespace Home\Model;

use Think\Model;

class PaperlinkModel extends Model
{

    protected $_validate = array(
        array('test_name', 'require', 'name　Can not be empty!'),
        array('linknum', 'require', 'user answers　Can not be empty!')
    );

    protected $_auto = array(
    );
}