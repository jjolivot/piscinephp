<?php
session_start();

if ($_POST['login'] && $_POST['passwd'])
	$passwd = hash('whirlpool', $_POST['passwd']);
if ($_POST['login'] && $_POST['passwd'] && $_POST['connexion'] == 'connexion')
{
	if (!file_exists('../htdoc'))
		mkdir('../htdoc/private/', 0755, true);
	if (!file_exists('../htdoc/private'))
		mkdir('../htdoc/private',0755);
	if (!file_exists('../htdoc/private/passwd'))
		file_put_contents('../htdoc/private/passwd', null);
	$list = unserialize(file_get_contents('../htdoc/private/passwd'));
	$_SESSION['user']['name'] = $_POST['login'];
	$_SESSION['user']['passwd'] = $passwd;
	$_SESSION['user']['log'] = 2;
	if ($list)
	{
		foreach ($list as $elem)
		{
			if ($elem['login'] == $_SESSION['user']['name'] && $elem['droits'] == 'administrateur')
				$_SESSION['user']['droits'] = 2;
		}
	}
	header("Location: login.php");
}
else if ($_POST['login'] && $_POST['passwd'] && $_POST['creation'] == 'creer un compte')
{
	if (!file_exists('../htdoc'))
		mkdir('../htdoc/private/', 0755, true);
	if (!file_exists('../htdoc/private'))
		mkdir('../htdoc/private',0755);
	if (!file_exists('../htdoc/private/passwd'))
		file_put_contents('../htdoc/private/passwd', null);
	$list = unserialize(file_get_contents('../htdoc/private/passwd'));
	if ($list)
	{
	$i = 0;
		foreach ($list as $elem)
		{
			$i++;
			if ($elem['login'] == $_POST['login'])
			{
				echo "
					<p>Utilisateur existant</p>
					<a href='../index.php'>Se connecter<a/>
				";
				exit;
			}
			else if ($elem['login'] == $_SESSION['user']['name'] && $elem['droits'] == 'administrateur')
				$_SESSION['user']['droits'] = 2;
		}
	$_SESSION['user']['name'] = $_POST['login'];
	$_SESSION['user']['passwd'] = $passwd;
	$_SESSION['user']['log'] = 2;
	}
	$acount = array('id' => $i, 'login' => $_SESSION['user']['name'], 'passwd' => $_SESSION['user']['passwd'], 'droits' => 'utilisateur');
	$list[] = $acount;
	file_put_contents('../htdoc/private/passwd', serialize($list));
	header("Location: ../index.php");
}
else
{
	echo "
		<p>Veuillez Creer un compte</p>
		<a href='../index.php'>Creer un compte<a/>
	";
}
?>
