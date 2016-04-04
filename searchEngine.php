<?php
	$button = $_GET ['submit'];
	$search = $_GET ['search'];

	if (!$button)
		echo "You didn't submit a keyword";
	else {
		if (strlen(( $sear)) <= 1)
			echo "Search term is too short";
		else {
			echo "You searched for <b> $search </b> <hr size='1' > </br> ";
			mysql_connect("localhost", "USERNAME", "PASSWORD");
			mysql_select_db(("database_name"));

			$search_exploded = explode(" ", $search);
			$x = 0;
			foreach ( $search_exploded as $search_each) {
				$x++;
				$construct = "";
				if ($x == 1)
					$construct .= "keywords LIKE '%search_each%'";
				else
					$construct .= "AND keywords LIKE '%search_each%'";
			}
			$construct = " SELECT * FROM SEARCH_ENGINE WHERE $construct ";
			$run = mysql_query($construct);

			$foundnum = mysql_num_rows($run);

			if ($foundnum == 0)
				echo "Sorry, there are no matching results for <b> $search </b>. </br></br>
			1. Try more general words. For example: If you want to search 'How to create a website'
			then use general keywords like 'Create' 'website' </br>.";
			else {
				echo "$foundnum results found! <p>";

				while ($runrows = mysql_fetch_assoc($run)) {
					$title = $runrows ['title'];
					$desc = $runrows ['description'];
					$url = $runrows ['url'];

					echo "<a href='$url'> <b> $title </b> </a> <br> $desc <br> <a href='$url'> $url </a> <p>";
				}
			}
		}
	}
?>