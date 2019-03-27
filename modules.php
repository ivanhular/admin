<?php
class module extends db{

  public $id;
  public $module_name;
  public $status;
  public $canvas_link;
  public $preview_image;
  public $css_code;
  public $javascript_code;
  public $php_code;
  public $sass_code;
  public $html_code;
  public $description;
  public $tags;
  public $template_origin;
  public $develop_by;
  public $date_created;
  // public $last_edited;
  public $table_name = "modules";


  function __construct(){
    parent::__construct();
  }

  // public function get_all_modules(){
  //   return $this->find_query("SELECT * from modules");
  // }

  public function get_all_modules(){
    return $this->find_query("SELECT * from {$this->table_name}");
  }

  public function module_exits($name){
      $result = $this->find_in($this->table_name , "module_name" , $name);

      if($result >= 1){
        return true;
      }

  }

  public function add_module($data){

      unset($data['action']);

      foreach ($data as $key => $value) {
        var_dump($key);
        if($key == "application/x-httpd-php"){
            unset($data[$key]);
            $data["php"] = $value;
        }
        if($key == "text/html"){
            unset($data[$key]);
            $data["html_code"] = $value;
        }
      }

      $this->insert($data,$this->table_name);
  }





  // public function loadModules(){
  //   $data = [];
  //
  //   $load_request =  $this->find_query("select * from `{$this->table_name}`");
  //
  //   foreach ($load_request as $key => $value) {
  //     array_push($data, $value);
  //   }
  //
  //   echo json_encode($load_request);
  //
  // }

}

?>
