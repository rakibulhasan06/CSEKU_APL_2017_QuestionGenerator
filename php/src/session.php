<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root",'',"questionbank");


?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="header">
    <h1>Registration complete </h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>

<div>
    <h4>Welcome <?php echo $_SESSION['username']; ?></h4></div>
</div>
<a href="login.php">You can login now</a>

</body>
</html>
