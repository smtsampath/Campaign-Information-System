<?php


	session_start();
	
	// chek session still their.
	function logged_in() {
		return isset($_SESSION['uid']);
			
	}
	
	// confirm users logged in.
	function confirm_logged_in() {
		if(!logged_in()) {
			header("location:../index.php");
			
		}
	}
	
	// cinfirn if logged user is admin.
	function admin_confirm() {
		if(!$_SESSION['admin'] || $_SESSION['admin'] == 0) {
			header("location:../index.php");
		}
	}

	
?>