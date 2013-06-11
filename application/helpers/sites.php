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
	
	/* loop through body, looking for comments */
	/*foreach($doc->getElementsByTagName('body') as $body){
	  foreach($doc->childNodes as $node){
	    if($node instanceof DOMComment){
	      $fragment = $doc->createDocumentFragment();
	      $fragment->appendChild($node->textContent);
	      echo $node->textContent;
	      $node->parentNode->replaceChild($fragment, $node);
	    }
	  }
	  }*/

	sites::printDOMNodes($doc);
	//sites::uncommentDOMNodes($doc,$doc);
	// Save the appeneded file
	return $doc->saveHTML();
	
    }
	
    /* function to print DOM Nodes */
    public static function printDOMNodes(DOMNode $domnode)
    {
      foreach($domnode->childNodes as $node)
      {
	print $node->nodeName.' : '.$node->nodeValue.'<br>';
	if($node->hasChildNodes()){
	  sites::printDOMNodes($node);
	}
      }
    }

    public static function uncommentDOMNodes(DOMNode $domnode, DOMNode $doc)
    {
      foreach($domnode->childNodes as $node)
      {
	/* detect if php code */
	if($node->nodeName == 'php'){
	  print $node->nodeName.' : '.$node->textContent.'<br>';
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