<div id="container" class="outter-shading">
     <div id="center" class="column inner-shading centrecol-outter-shading">
     	  
     </div>
     <div id="left" class="column leftcol-inner-shading">
	   
     </div>
     <div id="right" class="column rightcol-inner-shading">
     	  <h3>Add Content!</h3>
	  <form name="site_form" class="form-inline" method="post" action="home">
	  	<div class="input-append">
		     <input name="site_input" class="input-rightcol" type="text" placeholder="add URL">
		     <button name="add_button" class="btn" type="submit">Add</button>
		</div>
	  </form>
	  <!-- test -->
	  <!--
	      $db_con = mysql_connect("localhost","root","") 
	      	      or die("ERROR: Could not connect to DB media_flow");
              $db_sel = mysql_select_db("media_flow")
	      	      or die("ERROR: could not select DB media_flow");
	  -->
	  <?php echo html::anchor('https://www.speedhunters.com','SpeedHunters'); ?>
     </div>
</div>
