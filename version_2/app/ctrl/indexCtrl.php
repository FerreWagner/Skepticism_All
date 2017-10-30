<?php 
namespace app\ctrl;

class indexCtrl extends \core\smvc
{
    
    public function index()
    {
        $data = 'hello world';
        $this->assign('data', $data);
        $this->display('index.html');
//         echo 'sa leng jia lei yo';
//         $model = new \core\lib\model();
//         $sql = "select *from student";
//         $ret = $model->query($sql);
//         var_dump($ret->fetchAll());
    }
}




?>