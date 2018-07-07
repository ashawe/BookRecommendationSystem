<?php

$table_names = array('books_read','group_members','groups', 'wishlist', 'cart', 'sold_books', 'books_on_sale', 'books'
				,'ratings','users','category');

$conn = mysqli_connect("localhost","id6411411_ibookie","iBookie@123","id6411411_ibookie");

$flag = true;

foreach($table_names as $k)
{
    $query = "DROP TABLE " . $k;
    $res = mysqli_query($conn,$query);

    if(!$res) 
    {
        echo "drop not successful for table " .$k ."<br/>Error:" . mysqli_error($conn) . "<br/>";
        $flag = false;
    }
}
if($flag)
{
    echo "All tables dropped successfully";
}

?>