

<<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());


mysql_select_db("code4good",$con);



$name=$_POST['name'];
$pass=$_POST['pass'];




$r=mysql_query("select pass from admin where name ='$name'");
while($row=mysql_fetch_assoc($r))
{

$passwrd=$row['pass'];

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
