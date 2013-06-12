<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

   <meta http-equiv="Content-Style-Type" content="text/html; charset=utf-8"/>
   <title><?php echo html::specialchars($title) ?></title>

   <!-- LINKS -->
   
   <!-- link for boostrap.less to compile less files -->
   <link rel="stylesheet/less" href="/mediaflow/media/less/bootstrap.less" />
   <!-- link for browser tab icon -->
   <link rel="shortcut icon" href="/mediaflow/media/ico/thumb1.ico" />
   
   <!-- STYLESHEETS -->
   <?php echo html::stylesheet(
         array('media/css/site',),
         array('screen',)
     ); 
   ?>

   <!-- JAVASCRIPTS -->

   <!-- link to include javascripts for LESS Module -->
   <script type="text/javascript" src="/mediaflow/media/js/less-1.3.3.min.js" ></script>
   <!-- link to include javascript for user site addition in right column -->
   <script type="text/javascript">
     var $_POST = <?php echo json_encode($_POST); ?>;
     /*document.write($_POST['site_input']); */
   </script>

</head>

<body background="<?php echo $bg ?>" >
   <h1><?php echo $main_heading; ?></h1>

   <div id="header" class="inner-shading outter-shading">MediaFlow</div>
   
   <!-- handle form information if controller defined as homepage -->
   <?php
       if($controller == 'home'){
	 if(isset($_POST['site_input'])){
	   /* insert to database */
	 }
       }
   ?>

   <?php echo $content; ?>

<!-- footer wrapper removed till solution to height problem found -->
<!-- <div id="footer-wrapper"> -->
     <div id="footer" class="outter-shading">
          <ul>
	      <?php foreach ($page_links as $link => $url): ?>
       	      <li><?php echo html::anchor($link, $url); ?></li>
       	      <?php endforeach ?>
	  </ul>
     </div>
<!-- </div> -->


   <p id="date"><?php  echo date(DATE_RFC822); ?></p>
   <hr/>

   <!--- JAVASCRIPTS --->

</body>
</html>
