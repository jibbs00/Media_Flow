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
     @param $view - View being dynamicallt re-written or modified
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

	//determine place to insert code
	//$parent = $doc->getElementsByTagName('form')->item(0);
	$parent = $doc->getElementById('right');

	// Create the child element 
	$child = $doc->createElement('a','Google');
	$child->setAttribute('href', 'https://www.google.ca');

	// Append (insert) the child to the parent node
	$parent->appendChild($child);

	/* ** Uncomment any PHP snippets within the html document 
	(as DOMDOCUMENT comments them out automatically */
	//$fragment = $doc->createDocumentFragment();
	



	// Save the appeneded file
	return $doc->saveHTML();
	
    }
	
}

?>