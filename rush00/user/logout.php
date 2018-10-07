<?php
session_start();

$_SESSION['user']['name'] = NULL;
$_SESSION['user']['log'] = 1;
// if (ini_get("session.use_cookies")) { // supprime le cookie
// 	$params = session_get_cookie_params();
// 	setcookie(session_name(), '', time() - 42000,
// 	$params["path"], $params["domain"],
// 	$params["secure"], $params["httponly"]
// );
// }
header("Location: ../index.php");
