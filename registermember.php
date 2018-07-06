<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $flag = true;
        if(!isset($_POST['name']))
        {
            echo "<br/>Please Enter Your Name<br/>";
            $flag = false;
        }
        if(!isset($_POST['email']))
        {
            echo "<br/>Please Enter Your Email<br/>";
            $flag = false;
        }
        if(!isset($_POST['password']))
        {
            echo "<br/>Please Enter Your Password<br/>";
            $flag = false;
        }
        

        if($flag)
        {
            $conn = mysqli_connect("localhost","id6411411_ibookie","iBookie@123","id6411411_ibookie");
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $hashedPassword = hash('sha256',$password);

            if(!$conn) die("Error Connecting to Database. Try again later");

            $query = "INSERT INTO users(user_name, user_email,user_password) VALUES('". $name ."','". $email ."','". $hashedPassword ."')";

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