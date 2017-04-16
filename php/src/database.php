

<?php
$connect=mysqli_connect('localhost','root','','apl01');
 
if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}
 else
	 echo 'Welcome'
?>