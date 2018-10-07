<?PHP
session_start();
header("Location: panier.php");
foreach ($_POST as $k => $elem)
{
	$_SESSION["user"]["panier"][] = [$k => $elem];
}
?>
