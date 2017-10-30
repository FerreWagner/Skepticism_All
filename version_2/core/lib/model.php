<?php 
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=company;';
        $username = 'root';
        $passwd = '';
        try {
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            var_dump($e->getMessage());
        }
        
    }
}




?>