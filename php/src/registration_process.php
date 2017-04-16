<?php

//connect to database
$db=mysqli_connect("localhost","root","","questionbank");
if(isset($_POST['Register']))
{
    session_start();
        $fname=mysql_real_escape_string($_POST['fname']);
    $username=mysql_real_escape_string($_POST['username']);
    $email=mysql_real_escape_string($_POST['email']);
    $password=mysql_real_escape_string($_POST['password']);
    $password1=mysql_real_escape_string($_POST['password1']);  
     if($password==$password1)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO user(username,full_name,mobile_or_email,password) VALUES('$username','$fname','$email','$password')";
            mysqli_query($db,$sql);  
        
            $_SESSION['username']=$username;
            header("location:session.php");  //redirect home page
 }
    else
    {
     echo "<h1>Your passwords donot match<h1>"
        . "";
     }
}
?>