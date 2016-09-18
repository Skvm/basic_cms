<?php
include 'connect.php';

echo '<h2>Sign out</h2>';

if(isset($_SESSION['signed_in']))
{
	session_destroy();
	
	echo 'Succesfully signed out, thank you for visiting.';
}
else
{
	echo 'You are not signed in.';
}

?>