<?PHP
session_start();
if (isset($_POST["oldpw"]) && isset($_POST[("newpw")]))
{
	if ($_POST["oldpw"] == "" || $_POST["newpw"] == "")
		exit ("ERROR1\n");
	if (file_exists("../htdoc/private") == FALSE)
		exit ("ERROR2\n");
	$user_info = array('login' => $_POST['login'], 'oldpw' => hash('whirlpool', $_POST['oldpw']), 'newpw' => hash("whirlpool", $_POST["newpw"]));
	$passwds = unserialize(file_get_contents("../htdoc/private/passwd"));
	foreach ($passwds as $key => $elem)
	{
		if ($elem["login"] === $_SESSION["user"]["name"])
		{
			if ($elem["passwd"] === $user_info["oldpw"])
			{
				$passwds[$key]["passwd"] = $user_info["newpw"];
				echo "OK\n";
			}
			else
			{
				header("Location: modif.html");
				exit ("ERROR3\n");
			}
		}
	}

	file_put_contents("../htdoc/private/passwd", serialize($passwds));
}
if (!isset($_POST["submit"]) || !($_POST["submit"] === "OK"))
	exit("ERROR4\n");
	header("Location: ../index.php");
?>
