<?php
	session_start();
	include("auth.php");
	if ($_SESSION['user']['name'] && $_SESSION['user']['passwd'])
	{
		if (auth($_SESSION['user']['name'], $_SESSION['user']['passwd']))
		{
			$_SESSION['user']['log'] = 2;
			header("Location: ../index.php");
		}
		else
		{
			$_SESSION['user']['log'] = 0;
			$_SESSION['user']['name'] = NULL;
			session_destroy();
			header("Location: ../index.php");
		}
	}
	else
		header("Location: ../index.php");
?>