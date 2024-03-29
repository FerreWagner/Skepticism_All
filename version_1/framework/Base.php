<?php 
/*
 * 框架基础类,引导类,前端控制器,完成配置的加载及自动类加载，及用户请求的分发
 * 
 * 功能：1、加载用户自定义配置信息；2、自动加载类；3、获取用户的请求(请求分发,将用户的请求传递给对应的方法来执行)
 */

class Base
{
    /*
     * run方法，完成框架的所有功能
     */
    
    public function run()
    {
        //加载配置
        $this->loadConfig();
        //注册自动加载
        $this->registerAutoload();
        //获取请求参数
        $this->getRequestParams();
        //请求分发
        $this->dispatch();
    }
    
    //加载配置
    private function loadConfig()
    {
        //全局变量保存用户的配置
        $GLOBALS['config'] = require './application/config/config.php';
    }
    
    //创建用户自定义类的加载方法
    public function userAutoLoad($className)
    {
        //定义基本类的列表
        $baseClass = [
            'Model' => './framework/Model.php',
            'Db' => './framework/Db.php',
        ];
        
        //依次判断：基础类？模型类？控制器类？
        if (isset($baseClass[$className])){
            require $baseClass[$className]; //加载模型基类
        }elseif (substr($className, -5) == 'Model'){
            require 'application/home/model/'.$className.'.php';
        }elseif (substr($className, -10) == 'Controller'){
//             require 'application/home/controller/StudentController.php';
            require 'application/home/controller/'.$className.'.php';
        }
        
    }
    
    //注册自动加载方法
    private function registerAutoLoad()
    {
        spl_autoload_register([$this, 'userAutoLoad']);
    }
    
    //获取请求参数
    private function getRequestParams()
    {
        //当前模块
        $defPlate = $GLOBALS['config']['app']['default_platform'];
        //a.com?p=home&c=student&a=info
        $p = isset($_GET['p']) ? $_GET['p'] : $defPlate;
        define('PLATFORM', $p);
        
        //当前控制器
        $defcontroller = $GLOBALS['config'][PLATFORM]['default_controller'];
        //a.com?p=home&c=student&a=info
        $c = isset($_GET['c']) ? $_GET['c'] : $defcontroller;
        define('CONTROLLER', $c);
        
        //当前方法
        $defaction = $GLOBALS['config'][PLATFORM]['default_action'];
        //a.com?p=home&c=student&a=info
        $a = isset($_GET['a']) ? $_GET['a'] : $defaction;
        define('ACTION', $a);
    }
    
    private function dispatch()
    {
        //实例化控制器类
        $controllerName = CONTROLLER.'Controller';
        $controller     = new $controllerName;
        
        //调用当前方法
        $actionName = ACTION.'Action';
        $controller->$actionName();
    }
    
}





?>