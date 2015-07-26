<?php
$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);
$month = array("01", "02", "03","04","05","06","07","08","09","10","11","12");
$new = []; 
for ($i = 0; $i <= 11; $i++)
{
$r=mysql_query("SELECT count(eid) as data FROM engagement where date stamp LIKE '2015-'$month[$i]'%'");


$count=0;
while ($result_three = mysql_fetch_array($r)) 
{ 
     $new[count]=$result_three['data'];
   
}

}

echo $new;
mysql_close($con);
?>
