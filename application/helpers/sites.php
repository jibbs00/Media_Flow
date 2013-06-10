<?php

/*
    Site Helper Class

*/

class sites_core
{
   /*
     function using PHP moule DomDocument to re-write the
     HTML of a designated webpage, adding URL links
     by (either from the database or inputted by the user)
     
     @param $content - 'View' Object for page
     @param $view - View being dynamically re-written or modified
     @param $element - html element being added or modified 
     @return $content 
   */
    public static function add_url($content)
    {
        // Variable for main view filename
        $view = '/var/www/html/mediaflow/application/views/pages/home.php';

        // Load the document
	$doc = new DOMDocument;	
	$doc->loadHTMLFile($view);

	// Determine place to insert code
	//$parent = $doc->getElementsByTagName('form')->item(0);
	$parent = $doc->getElementById('right');

	// Create the child element 
	$child = $doc->createElement('a','Google');
	$child->setAttribute('href', 'https://www.google.ca');

	// Append (insert) the child to the parent node
	$parent->appendChild($child);

	// Save the appeneded file
	//echo $doc->saveHTML();

	return $doc->saveHTML();
    }
	
}

?>