 <?php
/*ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
*/
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

//Recieve the message from the mentor
//Fetching the GET params
$SmsSid = $_GET["SmsSid"];
$From = $_GET["From"];
//echo $From;
$to1 = $_GET["To"];
$Date = $_GET["Date"];
$Body = $_GET["Body"];
$condition=substr($Body,11,1);
if($condition=="f")
{
$feedback=substr($Body,11,8);
$rating=substr($Body,14);



//echo "SMS recieved!";

$select_query="SELECT distinct e.num FROM engagement e, mentor mr, mentee me WHERE me.phone = e.num AND mr.email = e.email AND mr.phone = '$From'";
$r=mysql_query($select_query);
$res=mysql_fetch_assoc($r);

$insert_sql = sprintf("insert into dsl values ('%s', '%s', '%s', %s, '%s')", $SmsSid, $From, $to1, $Date, $rating);
mysql_query($insert_sql,$con);
//exotel1 - Send a prompt to the mentee to give feedback.
$post_data = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
    // For promotional, this will be ignored by the SMS gateway
    'From'   => '8808891988',
    'To'    => substr($row['num'], 1),
    'Body'  => 'How did the session with your mentor go? Please give a feedback with 1 being excellent and 3 being bad',
);
$exotel_sid = "urja5"; // Your Exotel SID
$exotel_token = "2222c69deb58c63f65c0ba7758d9645b0f8dad2b"; // Your exotel token
 
$url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Sms/Send";

 
$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FAILONERROR, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 
$http_result = curl_exec($ch);
$error = curl_error($ch);
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 curl_close($ch);
mysql_close($con);

}
else
{
   header('Content-Type: text/plain');
//content length must be set to 0
header('Content-Length: 0');
//exotel sends a HEAD request to verify the headers
if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
	exit();
}





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

}



?>
