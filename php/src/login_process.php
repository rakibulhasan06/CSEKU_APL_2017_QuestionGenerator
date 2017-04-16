<?php
include "connector.php";
session_start();
$username=mysql_real_escape_string($_POST['username']);
    $password=mysql_real_escape_string($_POST['password']);
      $password=md5($password);
login($username, $password);


function login($username , $password) {
    $sql = "SELECT * FROM user WHERE username ='$username'";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)) {
        if($row['password'] == $password) {
             $_SESSION['username']=$username;
             header('Location:question_upload.php');
             die();
        } else {
          header('Location:login.php?error=1');
        }
        
    }
    header('Location:login.php?error=1');
}
?>
