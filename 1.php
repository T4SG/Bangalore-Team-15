

<?php
$con=mysql_connect("ec2-54-169-129-45.ap-southeast-1.compute.amazonaws.com","root","code4good");
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

