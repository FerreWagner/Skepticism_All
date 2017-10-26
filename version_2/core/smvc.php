<?php 
namespace core;

class smvc
{
    public static $classMap = [];
    static public function run()
    {
        
        $route = new \core\lib\route();
//         p($route);
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
                require $file;
                self::$classMap[$class] = $class;
            }else {
                return false;
            }
        }
        
    }
    
}



?>