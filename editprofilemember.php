<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $flag = true;
        if(!isset($_POST['name']))
        {
            echo "<br/>Please Enter Your Name<br/>";
            $flag = false;
        }
        if(!isset($_POST['address']))
        {
            echo "<br/>Please Enter Your address<br/>";
            $flag = false;
        }
    
        

        if($flag)
        {
            $conn = mysqli_connect("localhost","id6411411_ibookie","iBookie@123","id6411411_ibookie");
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $address = mysqli_real_escape_string($conn,$_POST['address']);
    

            if(!$conn) die("Error Connecting to Database. Try again later");

            $query = "UPDATE TABLE users set user_name='$name' , user_address='$address' where ";

            //echo "<br/>".$query."<br/>";
            $result = mysqli_query($conn,$query);
            if($result)
            {
                echo "<br/>You are successfully registered<br/>";
            }
            else
            {
                echo "There was an error while handling your request.";
                //echo "error:" . mysqli_error($conn);
            }
        }
}
else{
    echo "LOOKS LIKE YOU'RE LOST";
}

?>