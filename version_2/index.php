<?php 
/*
 * 入口文件
 * 1、定义系统常量；2、加载函数库；3、启动框架
 */

define('SMVC', realpath('./'));
define('CORE', SMVC.'/core');
define('APP', SMVC.'/app');
define('MODULE', 'app');
define('DEBUG', true);

//引入composer类
include 'vendor/autoload.php';

if (DEBUG){
    //当开启调试模式,引入错误处理类
    $whoops = new \Whoops\Run();
    $errorTitle = 'Skepticism error';   //自定义错误标题
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    
    $whoops->pushHandler($option);
    $whoops->register();
    
    ini_set('display_error', 'On');
}else {
    ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';

include CORE.'/smvc.php';

spl_autoload_register('\core\smvc::load');  //当引入的类不存在时寻找load方法处理

\core\smvc::run();
// dump($_SERVER);  //composer symfony/var-dumper测试
?>