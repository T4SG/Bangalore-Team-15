<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());
mysql_select_db("code4good",$con);

$num=$_POST['num'];
$email=$_POST['email'];



$s=mysql_query("Update mentee set status='success' where phone='$num'");
//mysql_execute($s);


$s1 = mysql_query("UPDATE mentor set isBusy=1 where email='$email'");
//mysql_execute($s1);
mysql_close($con);
?>




