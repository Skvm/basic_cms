<?php
$posts_sql = "SELECT
						posts.author,
						posts.date,
						posts.content
					FROM
						posts

					ORDER BY
						posts.post_date ASC ";




					
						
			$posts_result = mysql_query($posts_sql);

			?>