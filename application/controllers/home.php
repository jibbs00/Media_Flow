<?php defined('SYSPATH') OR die('No direct access allowed.');

class Home_Controller extends Website_Controller
{

  public function index()
  {
    $this->template->title = 'MediaFlow - Centre for Social Media';
    $this->template->content = new View('pages/home');
    $this->template->main_heading = 'Home';
    $this->template->bg = "";

  }

}