<?php
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
error_log( "SMS received" );
//content type must be set to text/plain
header('Content-Type: text/plain');
//content length must be set to 0
header('Content-Length: 0');
//exotel sends a HEAD request to verify the headers
if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
	exit();
}


$con=mysql_connect("127.0.0.1","root","code4good");
mysql_select_db("code4good",$con);


//Fetching the GET params
$SmsSid = $_GET["SmsSid"];
$From = $_GET["From"];
$to1 = $_GET["To"];
$Date = $_GET["Date"];
$Body = $_GET["Body"];

$feedback=substr($Body,12,8);
$rating=substr($Body,21);
//////////////////////update rating in query
$insert_sql = sprintf("insert into dsl values ('%s', '%s', '%s', %s, '%s')", $SmsSid, $From, $to1, $Date, $Body);
error_log($insert_sql);
mysql_query($insert_sql,$con);
mysql_close($con);
?>