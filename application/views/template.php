<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="Content-Style-Type" content="text/html; charset=utf-8"/>
   <title><?php echo html::specialchars($title) ?></title>
   <!-- Cascadin stylesheets -->
   <?php echo html::stylesheet(
         array('media/css/site',),
         array('screen',)
     ); 
   ?>
</head>

<body>
   <h1>Michaels Homepage</h1>
   <ul>
       <?php foreach ($links as $link => $url): ?>
       <li><?php echo html::anchor($link, $url); ?></li>
       <?php endforeach ?>
   </ul>
   
   <?php echo $content ?>

   <h2>The Time!</h2>
   <p><?php  echo $message.$now ?></p>
   <hr/>
</body>
</html>
