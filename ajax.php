<?php
  require_once('init.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";


class httpRequest extends module {

  public $action;
  public $tableName;
  public $response;

  function __construct(){
      // $this->db = $db;
      // $this->data = $data;
      parent::__construct();
      $this->data = isset($_REQUEST) ? $_REQUEST : "";
      $this->tableName = isset($_REQUEST['table_name']) ? $_REQUEST['table_name'] : "";

  }

  public function insert_module(){
    // var_dump($this->data);
    // if( ! $this->module_exits($this->data['module_name'])){
    //
    //     $this->response['message'] = $this->add_module($this->data);
    //
    //     $this->response['new_module_name'] = $this->set_new_module_count();
    //
    // }else{
    //
    //     $this->response['message'] = 'Module Name Exist!';
    //
    //     $this->response['new_module_name'] = $this->set_new_module_count();
    // }
    //
    // echo json_encode($this->response);

    $this->add_module($this->data);

  }

  public function edit_module(){

    if($this->module_exits($this->data['module_name'])){

        $this->response['message'] = $this->update_module($this->data);

        // $this->response['new_module_name'] = $this->set_new_module_count();

    }

    // var_dump($this->module_exits($this->data['module_name']));
    echo json_encode($this->response);
  }

  public function load_modules(){
      echo json_encode($this->get_all_modules());
  }

}

$http = new httpRequest();

$http->$action()




 ?>
