<?php

/* Database Helper Class

*/

class database_core 
{      
      /* protected variables for user authenticaiton and login information */
      protected $database = 'media_flow';
      protected $table_name = 'websites';

      public static function setup_connection($username,$password)
      {

	   /* connect to database, find correct database */
	   $db_con = mysql_connect("localhost",$username,$password) 
	      	      or die("ERROR: Could not connect to DB media_flow");
           $db_sel = mysql_select_db("media_flow",$db_con)
	      	      or die("ERROR: could not select DB media_flow");
	   
	   /* execute query on table */
	   $sql = 'SELECT DISTINCT w.url FROM websites w';
	   $results = mysql_query($sql);
	   
	   /* while($row = mysql_fetch_assoc($results)){
	       print $row['url'];
	   }*/

	   /* free results */
	   mysql_free_result($results);
      }

      public static function close_connection($con)
      {
          mysql_close($con);
      }


}

?>