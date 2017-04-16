



<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" type ="text/css" href = "Gstyle.css"/>
<style>
label{display:inline-block;width:150px;margin-bottom:40px;}
</style>
 
 
<title>Question Generate</title>
</head>


<body>
<b>
<em>
<marquee behavior="scroll" direction="left" scrollamount="4"><font size="10">Apl Question Bank Generator & Uploader project ... !</font></marquee>


</em>
	 <div class ="containerL">
	 	<a href="question_upload.php"><h2 style="font-family:tempus sans itc;">Upload Questions</h2></a> <a     href="welcome.php"><h2 style="font-family:tempus sans itc;">Home</h2></a>  <a     href="logout.php"><h2 style="font-family:tempus sans itc;">Log out</h2></a>
	 
	

	  <div/>
      	

<form method="post" action="generate.php">

 <div class ="container">
 	 
 <?php
 
 echo "Date : " . date("Y/m/d") . "<br>"; 
 ?> 
 <b>
<em>
<marquee scrollamount="5" width="40">&lt;&lt;&lt;</marquee><font size ="5">Generate Question <marquee scrollamount="5" direction="right" width="40">&gt;&gt;&gt;</marquee>
<marquee behavior="scroll" direction="left" scrollamount="4"><font size="4">Please be careful about your data !</font></marquee>

 <input type="text" name="aname" placeholder="Authority Name"/>




</em>


 <input type="text" name="ename" placeholder="Exam Name"/>
    <br />     

 <input type="text" name="time" placeholder="Time ( in min )"/>
 <input type="text" name="marks" placeholder="Marks Per Question"/>
<input type="text" name="num" placeholder="Number Of Questions"/>
    <br /> 
<input type="text" name="courseid" placeholder="Course Code : "/>
      




<div/>

<div class ="container2">
	<br/>



<label>Type</label>
<select name="type">
<option value =''>--SELECT--</option>
<?php 

$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM type';

$result = mysqli_query($connect,$sql);

$qustionType = "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$qustionType .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}

echo $qustionType;
?>
</select>
<br/>

	<label>Level </label>
<select name="sector">
<option value =''>--SELECT--</option>
<?php 

$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM sector';

$result = mysqli_query($connect,$sql);

$sector = "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$sector .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}

echo $sector;
?>
</select>

<br/>



<label>Faculty</label>
<select name="faculty">
<option value =''>--SELECT--</option>
<?php 

$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM faculty';

$result = mysqli_query($connect,$sql);

$facultyname= "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$facultyname .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}

echo $facultyname;
?>

</select>

<br/>




<label>Subject</label>
<select name="subject">
<option value =''>--SELECT--</option>
<?php 

$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM subject';

$result = mysqli_query($connect,$sql);

$subject = "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$subject .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}

echo $subject;
?>

</select>
<b/>
<marquee <label>be careful when you write importance & diffuculty % , it must not cross 100</label> </marquee>
<marquee <label>Just Enter a integer value without % </label> </marquee>
<div/>
<div class ="container3">

</br>
<label>Importane &  Difficulty : (%)</label>
<br />

<input type="text" name="he" style="width:155px" placeholder="High&Easy(%)"/>
<input type="text" name="hm" style="width:155px" placeholder="High&Medium(%)"/>
<input type="text" name="hh" style="width:155px" placeholder="High%Hard(%)"/>
<input type="text" name="me" style="width:155px" placeholder="Medium&Easy(%)"/>

<input type="text" name="mh" style="width:155px" placeholder="Medium&Hard(%)"/>
<input type="text" name="le" style="width:155px" placeholder="Low&Easy(%)"/>
<input type="text" name="lm" style="width:155px" placeholder="Low&Medium(%)"/>
<input type="text" name="lh" style="width:155px" placeholder="Low&Hard(%)"/>

<input type="text" name="mm" style="width:165px" placeholder="Medium&Medium(%)"/>
<br />


<input type="submit" name="submit"  value="Generate">

<div/>
</form>
 </body>
</html>