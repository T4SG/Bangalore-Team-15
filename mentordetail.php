<?php
$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);


$id=$_POST['name'];



$r=mysql_query("select name,email,phone,gender,isBusy from mentor where name='$id'");

while($row=mysql_fetch_assoc($r))
		
{
$out[]=$row;	
        
	$user_name=$row['name'];
        $user_email=$row['email'];
        $user_phone=$row['phone'];
        $user_gender=$row['gender'];
        $user_isbusy=$row['isBusy'];
        
        
	
	
	
	$post[]=array('name'=>$user_name,'email'=>$user_email,'phone'=>$user_phone,'gender'=>$user_gender,'status'=>$user_isbusy);

}
//$p=mysql_fetch_array($post);
//$response['feed']=$post;
echo json_encode($post);
mysql_close($con);
?>

