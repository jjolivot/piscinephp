<?php
	include 'connect.php';
	include 'queries.php';
	
	$mysqli = db_connect();

	function action_create_user($mysqli)
	{
		if (isset($_POST['submit']))
		{
			if ($_POST['submit'] === 'Create account')
			{
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$login = $_POST['login'];
				$passwd = $_POST['passwd'];
				$address = $_POST['address'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				if ($first_name !== '' && $last_name !== '' && $tel !== '' && $email !== '' && $address !== '' && $login !== '' && $passwd !== '')
				{
					new_user($mysqli, $first_name, $last_name, $tel, $email, $address, $login, $passwd, false);
					header('Location: index.php');
				}
			}
		}
	}

	// if (isset($_SESSION['loggued']))
	// {
	// 	header('Location: index.php');
	// }
	action_create_user($mysqli);

?>
<html>
	<head>
		<title>Create login</title>
		<link rel="stylesheet" href="header.css">
		<link rel="stylesheet" href="create_login.css">
	</head>
	<body>
<div class=header>

		<a href="index.php" title="Home">
			<div id = "title">
				<div id= titlename>Botanica</div>
			</div>
		</a>

	<p id = "title_description">
	</p>
</div>
<hr>
<div id=login_form>
<form action="create_login.php" method="post">
<p>		First name: <input type="text" name="first_name" value=""/><br>
		Last name: <input type="text" name="last_name" value=""/><br><br>
		Login : <input type="text" name="login" value=""/><br>
		Password : <input type="text" name="passwd" value=""/><br><br>
		Adresse : <input type="text" name="address" value=""/><br>
		Email : <input type="text" name="email" value=""/><br>
		Phone number : <input type="numbers" name="tel" value=""/></p>
		<input type="submit" name="submit" value="Create account" />
</form>
</div>
</html>
