<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());
mysql_select_db("code4good",$con);

$num=$_POST['num'];
$email=$_POST['email'];

$sql = "UPDATE mentee set status='sucess' where phone='$num'";
$con->query($sql);

$sql1 = "UPDATE mentor set isBusy='1' where email='$email'";
$con->query($sql1);

mysql_close($con);
?>




