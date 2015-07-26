<?php
$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);


$r=mysql_query("SELECT count(email) as countmenfree FROM mentor where isBusy='0'");



while ($result_three = mysql_fetch_array($r)) 
{ 
     // Gives the id of the paragraph
    echo $result_three['countmenfree']; // Gives the comment count for the associated paragraph
}


mysql_close($con);
?>
