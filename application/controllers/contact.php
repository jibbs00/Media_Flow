<?php defined('SYSPATH') OR die('No direct access allowed.');

class Contact_Controller extends Website_Controller
{

  public function index()
  {
    $this->template->title = 'Contact::Michaels L33t Accessories';
    $this->template->content = new View('pages/contact');

    $this->template->message = 'Well.... Hello there buddy! its ';
    $this->template->now = date(DATE_RFC822);
  }

}