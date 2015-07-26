<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());


mysql_select_db("code4good",$con);



$id=$_POST['uid'];
$pass=$_POST['pass'];




$r=mysql_query("select password from mentor where email='$id'");
while($row=mysql_fetch_assoc($r))
{

$passwrd=$row['password'];

if($passwrd!=$pass)
{
 echo 'wrong username or password';
}
else
{
 header("Location: mentor.html");
}
}


mysql_close($con);
?>

