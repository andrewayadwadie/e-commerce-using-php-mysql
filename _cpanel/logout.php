<?php
	session_start();
	if(isset($_SESSION['userMemeber']) && isset($_SESSION['password']) && isset($_SESSION['job_type']))
	{
		unset($_SESSION['userMemeber']);
		unset($_SESSION['password']);
                unset($_SESSION['job_type']);
                header("location: login.php");
                exit();
	}else {
		header("location: index.php");
                exit();
	}
?>