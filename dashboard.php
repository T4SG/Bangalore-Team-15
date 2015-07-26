<?php
$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);


$r=mysql_query("SELECT count(name) as countpending FROM mentee where status='pending'");



while ($result_three = mysql_fetch_array($r)) 
{ 
     // Gives the id of the paragraph
    $mentorthree= $result_three['countpending']; 
}

$s=mysql_query("SELECT count(email) as countmenfree FROM mentor where isBusy='0'");
while ($result_two = mysql_fetch_array($s)) 
{ 
     // Gives the id of the paragraph
    $mentortwo= $result_two['countmenfree']; 
}

$t=mysql_query("SELECT count(email) as countmentotal FROM mentor");



while ($result_one = mysql_fetch_array($t)) 
{ 
     // Gives the id of the paragraph
    $mentorone= $result_one['countmentotal']; // Gives the comment count for the associated paragraph
}

$post[]=array('mencount'=>$mentorone,'menfree'=>$mentortwo,'pending'=>$mentorthree);
echo json_encode($post);

mysql_close($con);
?>
