<?php 
namespace core\lib;

class conf
{
    static public $conf = [];
    
    static public function get($name, $file)
    {
        /*
         * 1、判断配置文件存在否；2、判断配置存在否；3、配置已经加在过了，即做缓存配置
         */
        
        if (isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else {
            $path = SMVC.'/core/config/'.$file.'.php';
            if (is_file($path)){
                $conf = include $path;
                if (isset($conf[$name])){
                    //缓存配置
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else {
                    throw new \Exception('没有这个配置项'.$name);
                }
            }else {
                throw new \Exception('找不到配置文件'.$file);
            }
        }
        
    }
    
    /*
     * 加载整个配置文件
     */
    static public function all($file)
    {
        if (isset(self::$conf[$file])){
            return self::$conf[$file];
        }else {
            $path = SMVC.'/core/config/'.$file.'.php';
            if (is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            }else {
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }
    
}



?>