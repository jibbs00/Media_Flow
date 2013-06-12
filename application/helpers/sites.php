<?php

/*
    Site Helper Class

*/

class sites_core
{
    /*
     function using PHP module DomDocument to reqrite the HTML of a
     designated webpage, adding URL links by either from the database
     or inputted by the user

     @param $content - 'View' object for page
     @param $view - View being dynamically re-written or modified
     @param $element - HTML element being added or modified
     @return $content

    */
    public static function add_url($user)
    {
        // Variable for main view filename
        $view = '/var/www/html/mediaflow/application/views/pages/home.php';

        // Load the document
	$doc = new DOMDocument;	
	$doc->loadHTMLFile($view);
	$doc->formatOutput = true;

	//determine place to insert URLS
	$ul = $doc->getElementsByTagName('ul')->item(0);
	//$parent = $doc->getElementById('right-list');

	// setup DB connection - root for TESTING
	database::setup_connection('root','crimson'); //root or crimson
  	
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

	    // Append (insert) the child to the parent node
	    $ul->appendChild($li);
	    $ul->appendChild($br);
	    $li->appendChild($a);
	}

	// free query results
	mysql_free_result($query);

	// close database connection
	//database::close_connection();

	// Save the appeneded file
	return $doc->saveHTML();
	
    }

	
    /* function to print DOM Nodes */
    public static function printDOMNodes(DOMNode $domnode)
    {
      foreach($domnode->childNodes as $node)
      {
	print $node->nodeName.' : '.$node->nodeType.'<br>';
	if($node->hasChildNodes()){
	  sites::printDOMNodes($node);
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