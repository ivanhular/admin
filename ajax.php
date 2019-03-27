<?php
  require_once('init.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";


class httpRequest extends module {

  public $action;
  public $tableName;

  function __construct(){
      // $this->db = $db;
      // $this->data = $data;
      parent::__construct();
      $this->data = isset($_POST) ? $_POST : "";
      $this->tableName = isset($_REQUEST['table_name']) ? $_REQUEST['table_name'] : "";

  }

  public function insert_module(){

    var_dump($this->data);

    if( ! $this->module_exits($this->data['module_name'])){
        $this->add_module($this->data);
    }else{
      echo  'Module Name Exist!';
    }

  }


  public function load_modules(){

      echo json_encode($this->get_all_modules());

  }

}

$http = new httpRequest();

$http->$action()




 ?>
