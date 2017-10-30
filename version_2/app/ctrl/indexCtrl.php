<?php 
namespace app\ctrl;

use core\lib\model;
class indexCtrl extends \core\smvc
{
    public function face()
    {
        echo 'face';
    }
    
    public function index()
    {
        $model = new model();
        
        //medoo数据库框架测试
//         $data = $model->select('student', '*');
//         dump($data);
//         $model->insert('student', ['name' => 'SMVC', 'password' => 'nu', 'email' => 'a.com']);
        
        
//         $temp = \core\lib\conf::get('CTRL', 'route');
//         $temp = \core\lib\conf::get('ACTION', 'route');
//         $temp = new \core\lib\model();
//         print_r($temp);
        
//         $data = 'hello world';
//         $this->assign('data', $data);
//         $this->display('index.html');
        
//         echo 'sa leng jia lei yo';
//         $model = new \core\lib\model();
//         $sql = "select *from student";
//         $ret = $model->query($sql);
//         var_dump($ret->fetchAll());
    //测试medoo
//         $model = new \app\model\studentModel();
//         $ret = $model->delOne(4);
//         dump($ret);
    
        $data = 'ferre';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}




?>