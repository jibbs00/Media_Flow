<?php defined('SYSPATH') OR die('No direct access allowed.');

class Home_Controller extends Website_Controller
{

  public function index()
  {
    $this->template->title = 'Michaels L33t Acc3ssori3s';
    $this->template->content = new View('pages/home');

    $this->template->message = 'Well.... Hello there buddy! its ';
    $this->template->now = date(DATE_RFC822);
  }

}