<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $flag = true;
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
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $hashedPassword = hash('sha256',$password);

            if(!$conn) die("ErrorDB");

            $query = "SELECT user_id FROM users WHERE user_email='$email' AND user_password ='$hashedPassword'";

            //echo "<br/>".$query."<br/>";
            $result = mysqli_query($conn,$query);
            if($result!==false)
            {
                if(mysqli_num_rows($result)==1)
                {
                    $row=mysqli_fetch_assoc($result);
                    $cookie_value=$row["user_id"];
                    //setting cookies
                    $cookie_name = "userid";
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    echo "Success";
                    
                }
                else
                {
                    echo "Incorrect";
                    //echo "error:" . mysqli_error($conn);
                }
            }
            else{
            }  
        }
}
else{
    echo "LOOKS LIKE YOU'RE LOST";
}

?>