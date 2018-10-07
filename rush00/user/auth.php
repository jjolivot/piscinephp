<?php
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return (false);
		$h_passwd = $passwd;
		$data = unserialize(file_get_contents('../htdoc/private/passwd'));
		if ($data)
		{
			foreach ($data as $value)
			{
				if ($value['login'] == $login)
				{
					if($value['passwd'] == $h_passwd)
						return (true);
				}
			}
		}
		return (false);
	}
?>