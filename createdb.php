<?php

	$conn = mysqli_connect("localhost","root","");

	$createdatabase = "CREATE DATABASE IF NOT EXISTS `bookrecommender`";
	$res = mysqli_query($conn,$createdatabase);
	if(!$res)
	{
		echo "db was not created<br/>";
	}

	$conn = mysqli_connect("localhost","root","","bookrecommender");
	$tables = array(

		'category' => 'CREATE TABLE IF NOT EXISTS `category` (
			cat_id INT PRIMARY KEY AUTO_INCREMENT,
			cat_name VARCHAR(50)
		)',


		'users' => 'CREATE TABLE IF NOT EXISTS `users` (
			user_id INT PRIMARY KEY AUTO_INCREMENT,
			user_name VARCHAR(50)
		)',
		
		//Avg rating of book = avg_rating
		'ratings' => 'CREATE TABLE IF NOT EXISTS `ratings` (
			rating_id INT PRIMARY KEY AUTO_INCREMENT,
			avg_rating FLOAT
		)',

		'books' => 'CREATE TABLE IF NOT EXISTS `books` (
			book_id INT PRIMARY KEY AUTO_INCREMENT,
			book_name VARCHAR(50),
			cat_id INT,
			rating_id INT,
			FOREIGN KEY (cat_id) REFERENCES category (cat_id),
			FOREIGN KEY (rating_id) REFERENCES ratings (rating_id)
		)',

		'groups' => 'CREATE TABLE IF NOT EXISTS `groups` (
			group_id INT PRIMARY KEY AUTO_INCREMENT,
			cat_id INT,
			FOREIGN KEY (cat_id) REFERENCES category (cat_id)
		)',

		'group_members' => 'CREATE TABLE IF NOT EXISTS `group_members` (
			group_mem_id INT PRIMARY KEY AUTO_INCREMENT,
			group_id INT,
			user_id INT,
			FOREIGN KEY (group_id) REFERENCES groups (group_id),
			FOREIGN KEY (user_id) REFERENCES users (user_id)
		)',
		'books_read' => 'CREATE TABLE IF NOT EXISTS `books_read` (
			br_id INT PRIMARY KEY AUTO_INCREMENT,
			user_id INT,
			book_id INT,
			FOREIGN KEY (book_id) REFERENCES books (book_id)
		)'
	);


	//creating tables
	foreach($tables as $table_name => $query)
	{
		$result = mysqli_query($conn,$query);
		if(!$result)
		{
			echo $table_name . " was not created With error: " . mysqli_error($conn) . "<br/>";
		}
		else{
			echo true . "<br/>";
		}
	}





	/*DEMO DATA INSERTION*/
	$demoData = array(
		
		'category' => 'INSERT INTO category(cat_name) VALUES
			("fantasy"),
			("sci-fi"),
			("fiction"),
			("non-fiction"),
			("mystery"),
			("humor"),
			("horror");',


		'users' => 'INSERT INTO users(user_name) VALUES
			("harsh"),
			("rohit"),
			("raj"),
			("param");',

		'books' => 'INSERT INTO books(book_name,cat_id,rating_id) VALUES
			("harry potter and the philosophers stone",1,8),
			("Sherlock holmes",3,5),
			("To Kill a Mockingbird",3,3),
			("Alex Rider Stormbreaker",2,2),
			("The Diary of a Young Girl",4,1),
			("Gone Girl",5,4),
			("The Hitchhiker\'s Guide to the Galaxy",6,6),
			("It",7,7),
			("The Lord of The Rings",1,9),
			("The Hobbit",1,10),
			("Alex Rider Point Blanc",2,11),
			("Alex Rider skeleton key",2,12),
			("Misery",7,13),
			("Murder on the Orient Express",5,14);',

		'books_read' => 'INSERT INTO books_read (user_id,book_id) VALUES
			(1,1),
			(1,4),
			(1,6),
			(1,5),
			(2,3),
			(2,4),
			(2,1),
			(3,5),
			(3,7),
			(3,8),
			(4,2),
			(4,8),
			(4,4);',

		'groups' => 'INSERT INTO groups(cat_id) VALUES
			(1),
			(2),
			(3),
			(4),
			(5),
			(6),
			(7);',

		'group_members' => 'INSERT INTO group_members(group_id,user_id) VALUES
		(1,1),
		(1,2),
		(2,1),
		(2,2),
		(2,4),
		(3,2),
		(3,4),
		(4,1),
		(4,3),
		(5,1),
		(6,3),
		(7,3),
		(7,4);',

		'ratings' => 'INSERT INTO ratings(avg_rating) VALUES
			(3.5),
			(4.1),
			(2.6),
			(4.5),
			(4.9),
			(3.9),
			(2.9),
			(4.5),
			(4.7),
			(4.2),
			(4.1),
			(4.1),
			(4.1),
			(4.2);',
	);

	foreach($demoData as $table_name => $query)
	{
		$result = mysqli_query($conn,$query);
		if(!$result)
		{
			echo "VALUES IN " .$table_name . " were not inserted" . mysqli_error($conn) . "<br/>";
		}
		else{
			echo true . "<br/>";
		}
	}

 ?>