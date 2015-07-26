<?php
$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);

$r=mysql_query("SELECT me.name, mr.name from mentor mr, mentee me, engagement e
where me.phone=e.num and mr.email=e.email;");

while($row=mysql_fetch_assoc($r))
      
{
$out[]=$row;  
    $mentor_name=$row['mr.name'];
    $mentee_name=$row['me.name'];
     
    $post[]=array('mentor_name'=>$mentor_name,'$mentee_name'=>$user_name);

}
//$p=mysql_fetch_array($post);
//$response['feed']=$post;
echo json_encode($post);
mysql_close($con);
?>
