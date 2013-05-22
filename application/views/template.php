<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Style-Type" content="text/html; charset=utf-8"/>
   <title><?php echo html::specialchars($title) ?></title>
   <!-- link for tab icon -->
   <link rel="shortcut icon" href="/mediaflow/media/icons/thumb1.ico" />
   <!-- Cascading stylesheets -->
   <?php echo html::stylesheet(
         array('media/css/site',),
         array('screen',)
     ); 
   ?>
</head>

<body background="<?php echo $bg ?>" >
   <h1><?php echo $main_heading; ?></h1>
   <ul>
       <?php foreach ($links as $link => $url): ?>
       <li><?php echo html::anchor($link, $url); ?></li>
       <?php endforeach ?>
   </ul>
   
   <?php echo $content; ?>

   <p id="date"><?php  echo date(DATE_RFC822); ?></p>
   <hr/>
</body>
</html>
