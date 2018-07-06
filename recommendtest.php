<?php

$conn = mysqli_connect("localhost","root","","bookrecommender");

if($_SERVER['REQUEST_METHOD']=="GET")
{

	function getBooksRead()
	{
		$con = mysqli_connect("localhost","root","","bookrecommender");
		$id = $_GET['user_id'];
		$readBooksQuery = "SELECT book_name FROM books WHERE book_id IN (SELECT book_id FROM books_read WHERE user_id =".$id.")";
		$readBooks = mysqli_query($con,$readBooksQuery);
		if (mysqli_num_rows($readBooks) > 0) {
	    	// output data of each row
	    	echo "<br/>". ucwords(getUserName()) ." HAS READ:<br/>";
	    	while($row = mysqli_fetch_assoc($readBooks)) 
	    	{
	        	echo "" . $row["book_name"] . "<br/>";
		    }
		    echo "<br/>";
		} 
		else {
		    echo "<br/>". ucwords(getUserName()) ." HAS NOT READ ANY BOOK<br/>";
		}
	}

	function getUserName()
	{
			$id = $_GET['user_id'];
			$conn = mysqli_connect("localhost","root","","bookrecommender");
			$query="SELECT user_name FROM users WHERE user_id=" . $id;
			$result = mysqli_query($conn,$query);
			$row = $result->fetch_array();
			return $row['user_name'];
	}

	function getRecommendationBasedOnOtherUsers()
	{
		$conn = mysqli_connect("localhost","root","","bookrecommender");
		$id = $_GET['user_id'];

		//Books User Has Not Read
		$qq = "SELECT book_id FROM books_read WHERE user_id =" . $id;
		$q = "SELECT book_id FROM books WHERE book_id NOT IN (".$qq.")";

		//selecting groups user is in
		$q1 = "SELECT group_id FROM group_members WHERE user_id =" . $id;

		//selecting categories which user likes based on groups (NO NEED AS USER'S GROUP WILL BE MADE ACC. TO USER'S PREFS.)
		//$q2 = "SELECT cat_id FROM groups WHERE group_id IN(" . $q1 . ")";

		//selecting people of groups user is in (except user)
		$q3 = "SELECT user_id FROM group_members WHERE group_id IN (". $q1 .") AND user_id <>".$id;

		//books people of user's group have read
		$q4 = "SELECT book_id FROM books_read WHERE user_id IN (". $q3 .")";

		//selecting books user might like which are already read by other people of user's group
		$q5 = "SELECT b.book_id,b.book_name FROM books AS b JOIN ratings AS r ON b.rating_id = r.rating_id WHERE b.book_id IN (". $q4 .") AND b.book_id IN (". $q .") ORDER BY r.avg_rating DESC";
		$ress = mysqli_query($conn,$q5);
		if (mysqli_num_rows($ress) > 0) {
		    // output data of each row
		    echo "<br/>Customers who Read books read by you Also read:<br/>";
		    $i=1;
		    while($row = mysqli_fetch_assoc($ress)) {
		        echo $i . ") " . $row["book_name"] . "<br/>";
		        $i++;
		    }
		} 
		else {
		    echo "0 results";
		}
	}

	function getRecommendationBasedOnGenre()
	{
		$conn = mysqli_connect("localhost","root","","bookrecommender");
		$id = $_GET['user_id'];

		//Books user has not read
		$qq = "SELECT book_id FROM books_read WHERE user_id =" . $id;
		$q = "SELECT book_id FROM books WHERE book_id NOT IN (".$qq.")";

		$q1 = "SELECT group_id FROM group_members WHERE user_id =" . $id;
		$q2 = "SELECT cat_id FROM groups WHERE group_id IN(" . $q1 . ")";
		$q3 = "SELECT b.book_id,b.book_name FROM books AS b JOIN ratings AS r ON b.rating_id=r.rating_id WHERE b.cat_id IN(" . $q2 . ") AND book_id IN(".$q.") ORDER BY r.avg_rating DESC";

		//testing
		//echo "Query = ".$q3."<br/>";
		//echo $q3 . "<br/>";

		$main_result = mysqli_query($conn,$q3);
		if (mysqli_num_rows($main_result) > 0) {
		    // output data of each row
		    echo "<br/>OTHER RECOMMENDED BOOKS:<br/>";
		    $i=1;
		    while($row = mysqli_fetch_assoc($main_result)) {
		        echo $i . ") " . $row["book_name"] . "<br/>";
		        $i++;
		    }
		} else {
		    echo "0 results";
		}
	}

	getBooksRead();
	echo "<hr>";
	getRecommendationBasedOnOtherUsers();
	echo "<hr>";
	getRecommendationBasedOnGenre();
	echo "<hr>";


}

//ADDING new book Sherlock Holmes to user1's books_read
//INSERT INTO books_read(book_id,user_id) VALUES(2,1)
//INSERT INTO group_members (group_id,user_id) VALUES (3,1);
?>