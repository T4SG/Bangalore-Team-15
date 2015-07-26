<?php
$con=mysql_connect("127.0.0.1","root","code4good")
or die('Error connecting to mysql: '.mysql_error());
mysql_select_db("code4good",$con);

//$num=$_POST('number');


//$id=$_POST['cat'];
//$response=array();
//$post=array();

$new=[];
$d=mysql_query("select phone,name from mentee where status='pending'");

while($bigrow=mysql_fetch_assoc($d))
{
 $phone=$bigrow['phone'];
$name=$bigrow['name'];

 
$r=mysql_query("select e.email,e.name,e.phone from mentor as e,mentee as p,menski as m,menlan as l where e.email=m.email and e.email=l.email and p.phone='$phone' and p.language=l.language and p.interest=m.skill");

while($row=mysql_fetch_assoc($r))
		
{
$out[]=$row;
	
        
	$user_name=$row['name'];
	$user_email=$row['email'];
	$user_phone=$row['phone'];
	
	
	$post[]=array('username'=>$user_name,'useremail'=>$user_email,'userphone'=>$user_phone);
        

}
$new[]=array('name'=>$name,'phone'=>$phone,'matches'=>$post);

}
echo json_encode($new);
mysql_close($con);
?>

