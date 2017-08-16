<?php
/****
*入口文件
*1.定义常量
*2.加载函数库
*3.启动框架
* 
****/
header('Content-Type:text/html;charset=utf-8');//网页编码避免输出乱码

define('ROOT',str_replace(strtolower(trim(substr(strrchr($_SERVER["PHP_SELF"], '/'),1))),"",$_SERVER["PHP_SELF"]));
define('ACTION',realpath(' /'));
define('CORE',ACTION.'/core');
define('APP',ACTION.'/app');
define('MODULE', 'app');
define('MO', 'core');


define('DEBUG',true);

if(DEBUG){
    ini_set('display_error', 'On');
}else{
    ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';

include CORE.'/action.php';

include CORE.'/lib/medoo.php';

spl_autoload_register('\core\action::load');
\core\action::run();