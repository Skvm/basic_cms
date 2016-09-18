<?php
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	echo 'This file cannot be called directly.';
}
else
{
	// if(!$_SESSION['signed_in'])
	// {
	// 	echo 'You must be signed in to post a reply.';
	// }
	// else
	// {
		$sql = "INSERT INTO 
					posts(content,
						  date,
						  author) 
				VALUES ('" . nl2br(htmlspecialchars($_POST['content'])) . "',
						NOW(),
						'cool kid'";
						
		$result = mysql_query($sql);
						
		if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			echo 'Your reply has been saved.';
		}
	}

?>