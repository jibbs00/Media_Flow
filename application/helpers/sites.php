<?php

/*
    Site Helper Class

*/

class sites_core
{
    /*
    function takes in $_POST data from an html form, and inputs it
    as a website entry into the 'websites' table in the database

    @param $url - string based url entered by user
    @return boolean

    */
    public static function add_url($url)
    {       	
    	/* get website/company/application name from url,
    	   attached protocol to start of url,
	   default other categories */
	$name = sites::parse_url($url);
	$url = 'https://'.$url;
	
        // setup DB connection - root for TESTING
	$con = database::setup_connection('root','crimson');
  	
	// query database to insert new website into table 
	$query = " INSERT INTO `media_flow`.`websites` 
	(`id`, `name`, `url`, `description`, `priority`) 
	VALUES (NULL, '$name', '$url', '', '1'); ";

	$result = database::query_database($query);

	// close database connection
	database::close_connection($con);
    }


    /*
     function using PHP module DomDocument to reqrite the HTML of a
     designated webpage, adding URL links by either from the database
     or inputted by the user

     @param $content - 'View' object for page
     @param $view - View being dynamically re-written or modified
     @param $element - HTML element being added or modified
     @return $content

    */
    public static function retrieve_urls($user)
    {
        // Variable for main view filename
        $view = '/var/www/html/mediaflow/application/views/pages/home.php';

        // Load the document
	$doc = new DOMDocument();	
	$doc->loadHTMLFile($view);
	$doc->formatOutput = true;
	
	//determine place to insert URLS
	$ul = $doc->getElementsByTagName('ul')->item(0);

	// setup DB connection - root for TESTING
	$con = database::setup_connection('root','crimson');
  	
	// query database for distinct urls and their corresponding site names
	$query = database::query_database('SELECT DISTINCT w.name, w.url FROM websites w WHERE 1');
	
	// process the query
	while($website_row = mysql_fetch_assoc($query))
	{
	    // Create the child elements for links
	    $li = $doc->createElement('li');
	    $a = $doc->createElement('a', $website_row['name']);
	    $br = $doc->createElement('br');  // added break line
	    $a->setAttribute('href', $website_row['url']);
	    $a->setAttribute('target','_blank'); 
	    // *** _blank opens link in new tab when pressed
	    
	    // Append (insert) the child to the parent node
	    $ul->appendChild($li);
	    $ul->appendChild($br);
	    $li->appendChild($a);
	}

	// free query results
	mysql_free_result($query);

	// close database connection
	database::close_connection($con);

	// Save the appeneded file
	return $doc->saveHTML();
    }

    
    /*
     function parese a url string to retrieve tthe domain name

     @param $url - url string
     @return $parsed - parsed url string

    */
    public static function parse_url($url)
    {   
      $parsed = str_replace('www.','',$url);
      $parsed = str_replace('.com','',$parsed);
      return $parsed;
    }

    /* function will load an html page, parse for a certain image,
       and retrieve it for use on the home page */
    public static function retrieve_img_from_url(DOMNode $domnode, $url)
    {
	/*** use PHP simple dom parser module to load html from site ***/
	//include('simple_html_dom.php');  //DIDNT WORK
	//$site = file_get_html($url);

	// create new document, load html parsed, @ suppreses errors
	$doc = new DOMDocument();	
	@$doc->loadHTML(file_get_contents($url));
	
	

    }

    /* function to print DOM Nodes */
    public static function print_DOM_Nodes(DOMNode $domnode)
    {
      foreach($domnode->childNodes as $node)
      {
	print $node->nodeName.' : '.$node->nodeType.'<br>';
	if($node->hasChildNodes()){
	  sites::print_DOM_Nodes($node);
	}
      }
    }

    /* NEED - never tested, might need later */
    public static function uncommentDOMNodes(DOMNode $domnode, DOMNode $doc)
    {
      foreach($domnode->childNodes as $node)
      {
	/* detect if php code - 7 for processing instruction */
	if($node->nodetype == 7){
	  //print $node->nodeName.' : '.$node->textContent.'<br>';
	  /* create a text fragment for a comment node to
	     recreate that node with the text only, uncommenting it */
	  $fragment = $doc->createDocumentFragment();
	  $fragment->appendChild($node->textContent);
	  $node->parentNode->replaceChild($fragment, $node);
	}
       
	/* recurse for children of nodes */
	if($node->hasChildNodes()){
	  sites::uncommentDOMNodes($node,$doc);
	}
      }
    }

}

?>