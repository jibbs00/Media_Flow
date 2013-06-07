<?php

/*
    Site Helper Class

*/

class sites_core
{
    public static function add_url($user)
    {
        //variable for main view filename
        $home = '/var/www/html/mediaflow/application/views/pages/home.php';
    
        // open temporary file for writing a new dynaic view
	//$file = fopen('temp_home.php','w');
	//fwrite($file,'d');
	//fclose($file);

        // Load the document
	$doc = new DOMDocument;
	
	$doc->loadHTMLFile($home);

	//determine place to insert code
	$parent = $doc->getElementsByTagName('form')->item(0);

	// Create the child element 
	$child = $doc->createElement('a');
	$child->setAttribute('href', 'https://www.google.ca');
	$child->setAttribute('value','Google');

	// Append (insert) the child to the parent node
	$parent->appendChild($child);

	// Save the appeneded file
	echo $doc->saveHTMLFile($home);
	
    }
	
}

?>