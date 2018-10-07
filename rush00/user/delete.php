<?PHP
session_start();
header("Location: modif.html");
if (isset($_POST["oldpw"]))
{
	if ($_POST["oldpw"] == "")
		exit ("ERROR1\n");
	if (file_exists("../htdoc/private") == FALSE)
		exit ("ERROR2\n");
	$user_info = hash('whirlpool', $_POST['oldpw']);
	$passwds = unserialize(file_get_contents("../htdoc/private/passwd"));
	foreach ($passwds as $key=>$elem)
	{
		if ($elem["login"] === $_SESSION["user"]["name"])
		{
			if ($elem["passwd"] === $user_info)
			{
				unset($passwds[$key]["passwd"]);
				unset($passwds[$key]["login"]);
				unset($passwds[$key]["droits"]);
				unset($passwds[$key]);
				file_put_contents("../htdoc/private/passwd", serialize($passwds));
				include("logout.php");
			}
			else
				exit ("ERROR3\n");
		}
	}
}
if (!isset($_POST["submit"]) || !($_POST["submit"] === "OK"))
	exit("ERROR4\n");
?>
