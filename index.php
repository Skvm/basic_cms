<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>stuff</title>
<link rel="stylesheet" type="text/css" href="instyle.css" />
<link href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

</head>

<body>

<div id="wrapper">

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
echo '<p>';
echo $posts_row['content'];
echo '</p>';
echo '</div>';

echo '<div id="lowbar">';
echo '<span id="date">';
echo $posts_row['date'];
echo '</span>';
echo '</div>';

echo '</div>';
}




if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
echo '<h2>Post:</h2><br />';
echo '<form method="post" action="post.php">';
echo '<textarea name="content" style="width:100%; height:100px;"></textarea><br /><br />';
echo '<input type="submit" value="Submit reply" />';
echo '</form>';
}
?>
</div>
</body>



</html>