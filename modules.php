<?php
class module extends db{


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
  public $last_edited;


  function __construct(){
    parent::__construct();
  }

  public function get_all_modules(){
    return $this->find_query("SELECT * from modules");
  }

}

?>
