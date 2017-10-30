<?php 
namespace core\lib;

use core\lib\conf;
use Medoo\Medoo;
class model extends Medoo
{
    public function __construct()
    {
        //原生配置
//         $database = conf::all('database');
//         try {
//             parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
//         }catch (\PDOException $e){
//             var_dump($e->getMessage());
//         }
        
        //medoo配置
        $option = conf::all('database');
        parent::__construct($option);
        
        
    }
}




?>