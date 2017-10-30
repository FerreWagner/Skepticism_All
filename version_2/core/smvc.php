<?php 
namespace core;

use Twig\TwigFunction;
class smvc
{
    public static $classMap = [];
    public $assign;
    static public function run()
    {
        //写日志测试
        \core\lib\log::init();
        \core\lib\log::log($_SERVER);
        
        $route      = new \core\lib\route();
//         p($route);
        $ctrlClass  = $route->ctrl;
        $action     = $route->action;
        $ctrlfile   = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if (is_file($ctrlfile)){
            include $ctrlfile;
            $ctrl   = new $cltrlClass();
            $ctrl->$action();
            //关键位置打上日志
            \core\lib\log::log('ctrl:'.$ctrlClass.PHP_EOL.'      '.$action);
        }else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }
    
    //自动加载类库
    static public function load($class)
    {
        //引入类前判断是否已经引入该类
        if (isset($classMap[$class])){
            return true;
        }else {
            $class = str_replace('\\', '/', $class);
            $file  = SMVC.'/'.$class.'.php';
            if (is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else {
                return false;
            }
        }
        
    }
    
    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }
    
    public function display($file)
    {
        //原生引入方法
//         $file = APP.'/views/'.$file;
//         if (is_file($file)){
//             extract($this->assign);
//             include $file;
//         }

        //三方twig模板引擎的使用
        $file = APP.'/views/'.$file;
        if (is_file($file)){
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, [
                'cache' => SMVC.'/log/twig',
                'debug' => DEBUG
            ]);
            $template = $twig->loadTemplate('index.html');
            $template->display($this->assign?$this->assign:'');
        }
    }
    
}



?>