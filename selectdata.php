<?php

$con = mysqli_connect("localhost","id6411411_ibookie","iBookie@123","id6411411_ibookie");

$query = "SELECT * FROM users";
		$users = mysqli_query($con,$query);
		if (mysqli_num_rows($users) > 0) {
	    	// output data of each row
	    	echo "<br/>USERS:<br/>";
	    	while($row = mysqli_fetch_assoc($users)) 
	    	{
	        	echo "" . $row["user_name"] . "<br/>";
		    }
		    echo "<br/>";
		} 
		else {
		    echo "<br/>NO USERS<br/>";
		}

?>