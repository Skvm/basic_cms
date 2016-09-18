<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>stuff</title>
<link rel="stylesheet" type="text/css" href="instyle.css" />
</head>

<body>

<div id="wrapper">
	<div id="post">
		<div id="bar">
			<span id="author">Posted by Mike</span>
		</div>
	<div id="posttext">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod maximus congue. Fusce luctus finibus neque eget sagittis.
		Donec a aliquet dolor. Quisque ac vulputate velit, vitae egestas urna. In fringilla eget libero non pulvinar. Nullam vestibulum lectus et aliquet feugiat.
		Praesent quam orci, dignissim a urna in, condimentum cursus turpis. Nam ut placerat elit. Aenean quis consectetur ipsum. 
		Vivamus justo urna, suscipit at posuere et, rutrum eget massa. Quisque convallis velit ut pharetra aliquet. Donec ac diam sem. 
		Mauris lectus nibh, tempus quis imperdiet ac, vestibulum nec ante. Curabitur quis scelerisque dolor. 
	</div>
	<div id="lowbar">
		<span id="date">01/01/91</span>
	</div>
	</div>

<?php
$posts_sql = "SELECT
						author,
						date,
						content
					FROM
						posts

					ORDER BY
						posts.date ASC ";
				
			$posts_result = mysql_query($posts_sql);


if (!$posts_result){
   echo"'Database error: ' . mysql_error()";
}

while($posts_row = mysql_fetch_assoc($posts_result))
{
echo '<div id="post">';

echo '<div id="bar">';
echo '<span id="author">';
echo 'Posted by ' . $posts_row['author'] . '';
echo '</span>';
echo '</div>';

echo '<div id="posttext">';
echo $posts_row['content'];
echo '</div>';

echo '<div id="lowbar">';
echo '<span id="date">';
echo $posts_row['date'];
echo '</span>';
echo '</div>';

echo '</div>';
}




?>

<tr><td colspan="2"><h2>Reply:</h2><br />
<form method="post" action="post.php">
						<textarea name="content" style="width:100%; height:100px;"></textarea><br /><br />
						<input type="submit" value="Submit reply" />
					</form></td></tr>


</div>
</body>



</html>