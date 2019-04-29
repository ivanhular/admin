<?php
class User extends db{

  public $id;
  public $username;
  public $password;
  public $table_name;

  function __construct(){
    parent::__construct();
    $this->$table_name = "users";
  }

  public function get_all_users(){
    return $this->find_query("SELECT * from users");
  }

  public function log_in($username,$password){
    return $this->find_query("SELECT * from users where Username ='{$username}' && Password = '{$password}'");
  }


}

?>
