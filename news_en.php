
<html>
    <head>
         <?php  include 'css.php' ;  ?>
         </head>
         
         <body>
<?php
session_start();
$id = isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : '';
$link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");
$query = "SELECT * FROM news WHERE id = \"$id\"";
$news = mysql_query($query) or die("Select failed");

  $ref = $_SERVER['HTTP_REFERER'];

if (preg_match('/page/', $ref)) { ?>
         <center><a href="<?php echo $ref ?>">back</a></center> <?php 
}

else { ?>
         <center><a href="index_en.php">back</a></center> <?php

}   
 $newsx = mysql_fetch_array($news); ?>
         
         <div class="newz">
             <div class="newztitle"><?php  echo $newsx['title_en']; ?></br></div>
             <div class="newzdate"><?php  echo $newsx['date_created']; ?></br></div>
             <div class="newzcontent"><?php  echo $newsx['content_en']; ?></br></div>
             <div class="newzsource"><?php  echo $newsx['source']; ?></br></div>
         </div>
        
        </body>
  
</html>