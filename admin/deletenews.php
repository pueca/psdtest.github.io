<?php 

$link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");

$id = $_GET['id']; 
 $query = " DELETE FROM news WHERE id = \"$id\"";
 $result = mysql_query($query); ?>
<html>
    <head>

            
    </head>
    <body>
    <center><div>
            <b>Новината е изтрита успешно</b></br>
            <a href="edit_page.php">Admin Page</a>
       <?php     header("refresh:3;url=edit_page.php"); ?>
        </div></center>
        
       
    </body>

</html>
