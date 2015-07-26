<?php
$con=mysql_connect("mysql5.000webhost.com","a7004816_skar","streetf00d");
mysql_select_db("a7004816_street",$con);


//$id=$_POST['cat'];
$response=array();
$post=array();
$email=$_POST['email'];

$r=mysql_query("select distinct 

u.u_id,u.u_name,u.u_img,p.p_img_path,p.vendor_name,p.Comments,p.Ratings,p.timestamp 

from user u,post p where u.u_id=p.u_id and u.u_email=$email");
while($row=mysql_fetch_array($r))
		//$out[]=$row;	
{
        $user_id=$row['u_id'];
	$user_name=$row['u_name'];
	$user_image=$row['u_img'];
	$post_image=$row['p_img_path'];
	$vendor_name=$row['vendor_name'];
	$comments=$row['Comments'];
	$ratings=$row['Ratings'];
	$timestamp=$row['timestamp'];
	
	$post[]=array('User Id'=>$user_id,'Username'=>$user_name,'User Image'=>$user_image,'Post Image'=>$post_image,'Vendor Name'=>$vendor_name,'Comments'=>

$comments,'Ratings'=>$ratings,'Timestamp'=>$timestamp);

}

$response['feed']=$post;
print(json_encode($response));
mysql_close($con);
?>

