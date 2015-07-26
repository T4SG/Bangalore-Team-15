<?php
$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);
$month = array("01", "02", "03","04","05","06","07","08","09","10","11","12");
$new = []; 
$count=0;
for ($i = 0; $i <= 11; $i++)
{
$r=mysql_query("SELECT count(eid) as data FROM engagement where date LIKE '2015-$month[$i]%'");



while ($result_three = mysql_fetch_array($r)) 
{ 
     $new[$count]=$result_three['data'];
     $count=$count+1;
   
}

}



	$post[]=array('01'=>$new[0],'02'=>$new[1],'03'=>$new[2],'04'=>$new[3],'05'=>$new[4],'06'=>$new[5],'07'=>$new[6],'08'=>$new[7],'09'=>$new[8],'10'=>$new[9],'11'=>$new[10],'12'=>$new[11]);

echo json_encode($post);
mysql_close($con);

?>
