<?php
include('config.php');

class db{

  private $conn;

   function __construct(){
    $this->dbConnect();
  }

  public function dbConnect(){
    $this->conn =  new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if($this->conn->connect_errno){
      die($this->conn->connect_error);
    }
  }

  public function find_query($sql){
    $results =  $this->conn->query($sql) ;
    $this->confirm_query($results);
  //  var_dump($results);
    return $this->fetch_query($results);
  }

  public function confirm_query($result){
    if(!$result){
      die('invalid Query'. $this->conn->error);
    }
  }
  public function fetch_query($result){
    $obj_list = [];
    while ($row = mysqli_fetch_array($result)) {
      array_push($obj_list , self::obj_prop($row));
    }

    return $obj_list;

  }

  public function obj_prop($row){
      // var_dump($row);
      $obj_new = new self;
      foreach ($row as $obj_key => $obj_value){
          $obj_key = strtolower($obj_key);
          if(self::has_key_exist($obj_key)){
            $obj_new->$obj_key = $obj_value;
          }
      }
      unset($obj_new->conn);
      // var_dump($obj_new);
      return $obj_new;
  }
  public function has_key_exist($obj_key){
    $obj_prop = get_object_vars($this);
    // var_dump(array_keys($obj_prop));
    // var_dump("key:". $obj_key ." status:".array_key_exists(strtolower($obj_key) , $obj_prop) . "<br>" );
    return array_key_exists($obj_key , $obj_prop);
    // var_dump($obj_prop);
  }

}



//$db = new db();



?>
