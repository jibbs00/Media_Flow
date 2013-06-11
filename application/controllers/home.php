<?php defined('SYSPATH') OR die('No direct access allowed.');

class Home_Controller extends Website_Controller
{
	
  public function index()
  {
    $this->template->title = 'MediaFlow - Centre for Social Media';
    /*$this->template->content = View::factory('pages/home')
    			     ->set('links', array(
      			     		    'home' => 'home',
      					    'about' => 'about',
      					    'contact' => 'contact',
       					    ));
					    */
    $this->template->content = new View('pages/home');
    $this->template->main_heading = 'Home';
    $this->template->bg = "";

    /* Set-Up Database Connection for user */
    /*database::setup_connection("root","root");*/

    /*** test using DomDocument - rewrites the content of the page ***/
    $this->template->content = sites::add_url($this->template->content);

    

    /* close Database Connection */
    
  }

}