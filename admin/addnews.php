
<?php 
session_start();
$link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');
mysql_query("SET CHARACTER SET utf8");

$date_created = $_POST['date_created'];
$title_bg = $_POST['title_bg'];
$description_bg = $_POST['description_bg'];
$source = $_POST['source'];
$content_bg = $_POST['content_bg'];


 if(empty($_POST['date_created'])){
    echo 'Въведи дата';
 }else if (empty($_POST['title_bg'])){
     echo 'Въведи заглавие';
 }else if (empty($_POST['description_bg'])){
     echo 'Въведи описание';
 }else if (empty($_POST['source'])){
     echo 'Въведи източник';
 }else if (empty($_POST['content_bg'])){
     echo 'Въведи съдържание';
 } else {
     $query = "INSERT INTO news (`date_created`, `title_bg`, `description_bg`, `source`, `content_bg`)
       VALUES ('$date_created', '$title_bg', '$description_bg', '$source', ('".mysql_real_escape_string($content_bg)."'))";
$result = mysql_db_query('novini1', "$query");

 if (!$result) {
 echo "There was an SQL error!<br />";
 echo mysql_errno().": ".mysql_error()."<br />";
 } else {
 Header('Location: edit_page.php');
 }
 }
     
     
     
     
     
     
     
     
     
 /*$query = "INSERT INTO news (`date_created`, `title_bg`, `description_bg`, `source`, `content_bg`)
       VALUES ('$date_created', '$title_bg', '$description_bg', '$source', ('".mysql_real_escape_string($content_bg)."'))";
var_dump($query);
$result = mysql_db_query('novini1', "$query");

 if (!$result) {
 echo "There was an SQL error!<br />";
 echo mysql_errno().": ".mysql_error()."<br />";
 } else {
 Header('Location: edit_page.php');
 } */
