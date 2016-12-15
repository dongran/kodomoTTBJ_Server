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
