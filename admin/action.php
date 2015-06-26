
<?php 
include 'common.php';
if(isset($_GET['login'])) {
	login($_POST['username'], $_POST['password']);
}  else {
	echo 'nothing';
}