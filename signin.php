<?php
include 'connect.php';

echo '<h3>Sign in</h3><br />';

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo 'You are already signed in';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<form method="post" action="">
			Username: <input type="text" name="username" /><br />
			Password: <input type="password" name="password"><br />
			<input type="submit" value="Sign in" />
		 </form>';
	}
	else
	{

		$errors = array(); 
		
		if(!isset($_POST['username']))
		{
			$errors[] = '';
		}
		
		if(!isset($_POST['password']))
		{
			$errors[] = '';
		}
		
		if(!empty($errors)) 
		{
		echo "error";
		}
		else
		{
			$sql = "SELECT 
						username
					FROM
						users
					WHERE
						username = '" . mysql_real_escape_string($_POST['username']) . "'
					AND
						password = '" . ($_POST['password']) . "'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				echo "error";
			}
			else
			{

				if(mysql_num_rows($result) == 0)
				{
					echo 'wrong user/pass';
				}
				else
				{
					$_SESSION['signed_in'] = true;
					
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['username'] 	= $row['username'];
					}
					
					echo 'Welcome, ' . $_SESSION['username'] . '.';
				}
			}
		}
	}
}
?>