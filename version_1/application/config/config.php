<?php 
/*
 * 应用配置文件
 * 数组方式
 */

return [
    'user'    => 'root',
    'pass'    => '',
    'dbname'  => 'company',


/*
 * 应用整体配置
 */
    'app' => [
        'default_platform'   => 'home',   //默认模块
    ],
    
/*
 * 前台配置
 */
    'home' => [
        'default_controller' => 'Student',  //默认控制器
        'default_action'     => 'listAll',  //默认方法
    ],
    
/*
 * 后台配置
 */
    'admin' => [
        'default_controller' => '',
        'default_action'     => '',
    ]
    
];

?>