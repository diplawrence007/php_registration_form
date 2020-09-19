<?php
class Db {
    public $con=null;
    private $statement= null;
    private $host="localhost";
    private $password="";
    private $database="sara_bangla_88";
    private $user="root";
    private static $instance=null;
    private function __construct(){
       $this->con = new Mysqli($this->host,$this->user,$this->password,$this->database);
       if ($this->con->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
    }
    public function close(){
        $this->con->close();
    }
  public static function getDb(){

        self::$instance=new Db();
        return self::$instance;
  } 
    
}
?>