<?php
	session_start();

	function db_connect()
	{
		$mysqli = mysqli_connect("localhost", "root", "Templier1988", "botanica");
		if (mysqli_connect_errno())
		{
			die("Failed to connect to MySQL: " . mysqli_connect_error());
		}
		return ($mysqli);
	}
?>
