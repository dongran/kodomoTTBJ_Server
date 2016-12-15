<?php
// +----------------------------------------------------------------------
// | Base On ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2020 SunChen All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: SunChen <SunChen1221@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件
//操作方法如何定义为protect,private将不能通过url访问

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 绑定默认模块,绑定之后将不能访问其它模块,为了开发多模块去除此设置
// URL格式:http://serverName/index.php/模块/控制器/操作
//define('BIND_MODULE', 'Home');

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 后辈们亲^_^ 后面不需要任何代码了 就是如此简单