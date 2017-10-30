<?php 
namespace app\model;

use core\lib\model;
class studentModel extends model
{
    public $table = 'student';
    //查询多条数据
    public function lists()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }
    
    //查询单条数据
    public function getOne($id)
    {
        $ret = $this->get($this->table, '*', ['id' => $id]);
        return $ret;
    }
    
    public function setOne($id, $data)
    {
        return $this->update($this->table, $data, ['id' => $id]);
    }
    
    public function delOne($id)
    {
        return $this->delete($this->table, ['id' => $id]);
    }
    
}




?>