<?php defined ('SYSPATH') or die('No direct script access.');

class Website_Controller extends Template_Controller {

  public function __construct()
  {
    parent::__construct();

    //add relevent link array in Website_Controller
    $this->template->links = array
      (
      'home' => 'home',
      'about' => 'about',
      'products' => 'products',
      'contact' => 'contact',
       );

  }

}