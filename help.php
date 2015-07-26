<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());
mysql_select_db("code4good",$con);

$name=$_POST['name'];
$phone=$_POST['phone'];
if($_POST['english'])
{
$check='english';
}
else if($_POST['hindi'])
{
$check='hindi';
}
else if($_POST['telugu'])
{
$check='telugu';
}
else if($_POST['kannada'])
{
$check='kannada';
}
else if($_POST['tamil'])
{
$check='tamil';
}

if($_POST['male'])
{
$radio='male';
}

else if($_POST['female'])
{
$radio='female';
}
if($_POST['maths'])
{
$check2='maths';
}
else if($_POST['science'])
{
$check2='science';
}
else if($_POST['computers'])
{
$check2='computers';
}
else if($_POST['mechanics'])
{
$check2='mechanics';
}
else if($_POST['per_dev'])
{
$check2='personality development';
}


$s=mysql_query("insert into mentee values('$name','$radio',$phone,'$check2','$check','pending')");
mysql_execute($s);
echo 'Successfully sent message. DSF will contact you shortly';





mysql_close($con);
?>
