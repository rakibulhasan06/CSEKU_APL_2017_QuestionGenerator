<?php

require('./fpdf.php');
//require('mc_table.php');
$n=0;
$aname=$_POST['aname'];
$ename=$_POST['ename'];
$time=$_POST['time'];
$marks=$_POST['marks'];
$num=$_POST['num'];
$type=$_POST['type'];
$level=$_POST['sector'];
$faculty=$_POST['faculty'];
$subject=$_POST['subject'];
$sector=$_POST['sector'];
$course_code=$_POST['courseid'];

$he=$_POST['he'];
$hm=$_POST['hm'];
$hh=$_POST['hh'];
$me=$_POST['me'];
$mh=$_POST['mh'];
$le=$_POST['le'];
$lm=$_POST['lm'];
$lh=$_POST['lh'];
$mm=$_POST['mm'];

$vhe=$num*$he*(1/100);
$vhm=$num*$hm*(1/100);
$vhh=$num*$hh*(1/100);
$vme=$num*$me*(1/100);
$vmh=$num*$mh*(1/100);
$vle=$num*$le*(1/100);
$vlm=$num*$lm*(1/100);
$vlh=$num*$lh*(1/100);
$vmm=$num*$mm*(1/100);






if($he+$hm+$hh+$me+$mh+$le+$lm+$lh+$mm!=100){
 header("location: ginterface.php");
 die("Importance & diffuculty Rating Sumation must be 100  , please go back and solve this ");

}

 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTextColor(0,0,0);    
$pdf->SetAutoPageBreak(0);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80,10,' ');
$pdf->Ln(0);
$pdf->Cell(229.75,10,$aname,5,1,'C');
$pdf->Ln(1);
$pdf->Cell(229.75,10,$ename,5,1,'C');
$pdf->Ln(0);
 //echo $aname."<br>";
//echo $ename."<br>";
$con=mysqli_connect("localhost","root","","questionbank");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql='SELECT name FROM `type` WHERE id = '.$type ;
$result = mysqli_query($con,$sql);
$typ="";

while ($array =  mysqli_fetch_assoc($result)) {

$typ.= $array['name'] ;
$pdf->Cell(229.75, 6, 'Question Type : '.$typ, 0,0,'C');



}

$sql='SELECT name FROM `sector` WHERE id = '.$sector ;
$result = mysqli_query($con,$sql);
$sec="";

while ($array =  mysqli_fetch_assoc($result)) {

$sec.= $array['name'] ;
//echo "Level  : ";
//echo $sec."<br>";
$pdf->Cell(229.75, 6, 'Level : '.$sec, 2, 0, 'C');
//$pdf->Cell(30, 6, 'Level :', 1);
$pdf->Ln();


}

$sql='SELECT name FROM `faculty` WHERE id = '.$faculty ;
$result = mysqli_query($con,$sql);
$fac="";

while ($array =  mysqli_fetch_assoc($result)) {

$fac.= $array['name'] ;
$pdf->Cell(229.75, 6, 'Faculty :'.$fac, 2, 0, 'C');

//echo "Faculty/Group : ";
//echo $fac."      <br>  ";


}
$sql='SELECT name FROM `subject` WHERE id = '.$subject ;
$result = mysqli_query($con,$sql);
$sub="";

while ($array =  mysqli_fetch_assoc($result)) {

$sub.= $array['name'] ;
$pdf->Ln();
$pdf->Cell(229.75, 6, 'Subject :'.$sub, 2, 0, 'C');
$pdf->Ln();


}


$pdf->Cell(229.75, 6, 'Course No. / Suject Code : '.$course_code, 2, 0, 'C');
$pdf->Ln();
$total=$marks*$num;
$pdf->Cell(229.75, 6, 'Marks : '.$total, 2, 0, 'C');
$pdf->Ln();
$pdf->Cell(229.75, 6, 'Time '.$time.' min', 2, 0, 'C');


$pdf->SetFont('Times','B',10);

$fsid='SELECT faculty_subject.id FROM faculty_subject, faculty, sector, subject WHERE faculty.id ='.$faculty.' AND sector.id='.$sector.' AND subject.id='.$subject.' AND faculty_subject.faculty_id  = faculty.id AND faculty_subject.subject_id = subject.id';
$result_fsid = mysqli_query($con,$fsid);
while ($arr =  mysqli_fetch_array($result_fsid)) {
$fsid_no = $arr[0] ;
$pdf->Ln();
$pdf->Cell(229.75, 6, ' Number of each Question is '.$marks, 2, 0, 'C');
}
$arr[10];
// vhe
for( $i = 0; $i<$vhe; $i++ ) {

$sql="SELECT name ,id FROM question WHERE  importance =5 AND (diffuculty =1 OR diffuculty= 2) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

//$sql='SELECT name FROM 9RE  faculty_subject_id='.$faculty_subject_id';
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
$question = $array['name'] ;
$question_id = $array['id'] ;
$x=1+$i;
//$pdf->Cell(229.75, 6, ' '.$question_id, 2, 0, 'L');
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


 }        

       }


for( $i = 0; $i<$vhm; $i++ ) {

$sql="SELECT name  FROM question WHERE  importance =5 AND (diffuculty =3 OR diffuculty= 4) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhe+1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}



         }
}


//for vhh
for( $i = 0; $i<$vhh; $i++ ) {

$sql="SELECT name  FROM question WHERE  importance =5 AND diffuculty =5 AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


         }
}


//for vme 
for( $i = 0; $i<$vme; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty =1 OR diffuculty= 2) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}




         }
}


//for vmh
for( $i = 0; $i<$vmh; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty =3 OR diffuculty= 4) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme=1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}



         }
}
//for vmm
for( $i = 0; $i<$vmm; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty=5) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}




         }
}


//for vle
for( $i = 0; $i<$vle; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =1 OR importance =2) AND (diffuculty =1 OR diffuculty= 2) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;

$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+$vmm+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}



         }
}

//for vlm
for( $i = 0; $i<$vlm; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty =3 OR diffuculty= 4) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+$vmm+$vle+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


         }
}

//for vle
for( $i = 0; $i<$vlh; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =1 OR importance =2) AND (diffuculty =5 ) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+$vmm+$vlm+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


         }
}






//table
/*$pdf->SetFont('Times','B',25);
$pdf->AddPage();
$pdf->Cell(200.75, 0, ' ANSWER SHEET ', 2, 0, 'C');
for($z=1;$z<$x+1;$z++){


$pdf->SetFont('Times','B',10);


$pdf->Cell(229.75, 6, ''.$z.'' , 2, 0, 'L');



}
 */


$pdf->Output();





































//$pdf = new myExtension();
//$pdf->Output();

mysqli_close($con);


?>