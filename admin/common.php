<?php
session_start();
$link = @mysql_connect('localhost','root','') or die('No server');
mysql_select_db('novini1', $link) or die('No database');


function login($username, $password) {

	$sql = "SELECT * FROM `user`
			WHERE `username` = '$username' AND `password` = '$password'";
	$result = mysql_query($sql);
	$user = mysql_fetch_assoc($result);
	if($user) {
		if($user['active']) {
			$_SESSION['user'] = $user;
			header('Location: edit_page.php');
		} else {
			$_SESSION['error'] = 'User is inactive';
			unset($_SESSION['user']);
			header('Location: ../index.php');
		}
	} else {
		$_SESSION['error'] = 'Wrong username or password';
		unset($_SESSION['user']);
		header('Location: ../index.php');
	}
} 