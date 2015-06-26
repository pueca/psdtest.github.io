<?php 
session_start();
$link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");

//$id = isset($_REQUEST['id']) ? $id = $_REQUEST['id'] : '';
$id = $_POST['id'];
$title_bg = $_POST['title_bg'];
$description_bg = $_POST['description_bg'];
$content_bg = $_POST['content_bg'];
        
$query = "UPDATE `news` SET ";
 $query .= "`title_bg`=\"$title_bg\", ";
 $query .= "`description_bg`=\"$description_bg\", ";
 $query .= "`content_bg`=('".mysql_real_escape_string($content_bg)."')";
 $query .= "WHERE `id`=$id ";
 $result = mysql_db_query('novini1', "$query");
 
 if (!$result) {
 echo "There was an SQL error!<br />";
 echo mysql_errno().": ".mysql_error()."<br />";
 } else {
 Header('Location: edit_page.php');
 }
?> 
