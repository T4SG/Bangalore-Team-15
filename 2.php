

<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());


mysql_select_db("code4good",$con);




$r=mysql_query("select name from admin");

while($row=mysql_fetch_assoc($r))
		
{
$out[]=$row;	
        
	$user_name=$row['name'];
	
	$post[]=array('Username'=>$user_name);

}
//$p=mysql_fetch_array($post);
//$response['feed']=$post;
echo json_encode($post);
mysql_close($con);
?>

