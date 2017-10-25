<?php 
//数据库基本操作
class Db
{
    /*
     * 实现功能：1、创建当前类的单一实例；2、创建数据库的基本操作
     */
    
    /*
     * 数据库默认链接参数
     */
    private $dbConfig = [
        'db'      =>'mysql',
        'host'    => 'localhost',
        'port'    => '3306',
        'user'    => 'root',
        'pass'    => '',
        'charset' => 'utf8',
        'dbname'  => 'company',
    ];
    
    //新增主键id
    public $insertId = null;
    //受影响的记录数量
    public $num = 0;
    
    /*
     * 单例模式，本类实例
     */
    private static $instance = null;
    
    /*
     * 数据库链接
     */
    private $conn = null;
    
    /*
     * 构造方法私有化，防止外部实例化
     */
    private function __construct($params)
    {
        array_merge($this->dbConfig, $params);
        $this->connect();
    }
    
    /*
     * 禁止外部克隆
     */
    private function __clone()
    {
    }
    
    /*
     * 获取当前类的单一实例
     */
    public static function getInstance($params = [])
    {
        if (!self::$instance instanceof self){
            self::$instance = new self($params);
        }
        return self::$instance;
    }
    
    
    /*
     * 数据库的链接
     */
    private function connect()
    {
        try {
            //配置数据源DSN
            $dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};port={$this->dbConfig['port']};dbname={$this->dbConfig['dbname']};charset={$this->dbConfig['charset']}";
            
            //创建PDO对象
            $this->conn = new PDO($dsn, $this->dbConfig['user'], $this->dbConfig['pass']);
            
            //设置客户端默认字符集
            $this->conn->query("SET NAMES {$this->dbConfig['charset']}");
            
        }catch (PDOException $e){
            die('数据库链接失败'.$e->getMessage());
        }
    }
    
    /*
     * 完成数据表的写操作:增删改
     * 返回受影响记录，若新增，还返回新增主键id
     */
    
    public function exec($sql)
    {
        $num = $this->conn->exec($sql);
        //如果有影响的操作
        if ($num > 0){
            //新增操作,初始化新增主键id属性
            if (null !== $this->conn->lastInsertId()){
                $this->insertId = $this->conn->lastInsertId();
            }
            $this->num = $num;  //返回受影响的记录数量
        }else {
            $error = $this->conn->errorInfo();  //获取最后操作的错误信息数组
            //0错误标识符，1错误代码，2,错误信息
            print '操作失败'.$error[0].':'.$error[1].':'.$error[2];
        }
    }
    
    //获取单条查询结果
    public function fetch($sql)
    {
        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    //获取多条查询结果
    public function fetchAll($sql)
    {
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
}




?>