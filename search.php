<?PHP
	// Connect to the database
	$db=mysql_connect ("Servername", "Username", "Password") 
	or die ('I cannot connect to the database because : ' . mysql_error()));
	
	// Select the database to use
	$mydb=mysql_select_db("Your Database here");
	
	// Query the database
	$sql="SELECT ####, ###, ##, FROM #### WHERE ###### etc etc etc" ;
	
	// Run the query against the mysql query function
	$result=mysql_query($sql);
	
	// Create the while loop and loop through the result
	while($row=mysql_fetch_array($result))
	{
		#### = $ #####
		### = $ ###
		## = $ ##
		
		// Display the result of the array
		echo "<ul\n" // creats list/row/columns
	}
	
	
	
?>