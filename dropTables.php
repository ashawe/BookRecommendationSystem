<?php

$table_names = array('category','users', 'ratings', 'books', 'groups', 'group_members', 'books_read');


$conn = mysqli_connect("localhost","root","","bookrecommender");

$flag = true;

foreach($table_names as $k)
{
    $query = "DROP TABLE " . $k;
    $res = mysqli_query($conn,$query);

    if(!$res) 
    {
        echo "drop not successful for table " .$k ."<br/>";
        $flag = false;
    }
}
if($flag)
{
    echo "All tables dropped successfully";
}

?>