<div id="header">
     MediaFlow     
</div>

<div id="container">
     <div id="center" class="column centrecol-outter-shading">
     	  <p>test</p>
     </div>
     <div id="left" class="column leftcol-inner-shading">
	   <p id="outter">Links!</p>
	   <ul>
		<?php foreach ($page_links as $link => $url): ?>
       		<li><?php echo html::anchor($link, $url); ?></li>
       		<?php endforeach ?>
	   </ul>
     </div>
     <div id="right" class="column rightcol-inner-shading">
     	  <h3>Add Content!</h3>
     	  <input class="input-rightcol" type="text" placeholder="type in a URL">
	  <!-- test -->
	  <?php echo html::anchor('https://www.speedhunters.com','SpeedHunters'); ?>
     </div>
</div>

<div id="footer-wrapper">
     <div id="footer">
     	  Footer
     </div>
</div>