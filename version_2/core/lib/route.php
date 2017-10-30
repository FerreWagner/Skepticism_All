<?php 
namespace core\lib;

use core\lib\conf;
class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        //xxx.com/index/index路由
        /*
         * 1、隐藏index.php；2、获取URL参数；3、返回控制器和方法
         */
        
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path    = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path, '/'));
            if (isset($patharr[0])){
                $this->ctrl   = $patharr[0];
            }
            unset($patharr[0]);
            if (isset($patharr[1])){
                $this->action = $patharr[1];
                unset($patharr[1]);
            }else {
                $this->action = conf::get('ACTION', 'route');
            }
            
            //将URL多余参数转化为GET参数:user/login/id/1
            $count = count($patharr) + 2;
            $i = 2; //从2开始，去除开始的控制器名和方法
            while ($i < $count){
                if (isset($patharr[$i + 1])){   //当参数为奇数有异常，因此做逻辑处理
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                
                $i = $i + 2;
            }
//             p($_GET);
            
        }else {
            $this->ctrl   = conf::get('CTRL', 'route');
            $this->action = conf::get('ACTION', 'route');
            
        }
        
    }
}

?>