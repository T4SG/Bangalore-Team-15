<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());


mysql_select_db("code4good",$con);

$id=$_POST['uid'];
$pass=$_POST['pass'];


$r=mysql_query("select password from mentor where email='$id'");
if($r==null)
{
 echo 'wrong username or password';
}
else
{
 header("Location: ec2-54-169-129-45.ap-southeast-1.compute.amazonaws.com/mentor.html");
}


mysql_close($con);
?>

