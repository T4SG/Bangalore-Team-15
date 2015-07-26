 <?php
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

//$SmsSid=0;
//Fetching the GET params
$SmsSid = $_GET["SmsSid"];
$From = $_GET["From"];
$to1 = $_GET["To"];
$Date = $_GET["Date"];
$Body = $_GET["Body"];
$feedback=substr($Body,11,8);
$rating=substr($Body,14);

//echo "SMS recieved!";


$r=mysql_query("SELECT e.num
FROM engagement e, mentor mr, mentee me
WHERE me.phone = e.num
AND mr.email = e.email
AND mr.phone = '$From'");

$insert_sql = sprintf("insert into dsl values ('%s', '%s', '%s', %s, '%d')", $SmsSid, $From, $to1, $Date, $rating);
mysql_query($insert_sql,$con);
//exotel1
$post_data = array(
    // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
    // For promotional, this will be ignored by the SMS gateway
    'From'   => '8808891988',
    'To'    => '8892816209',
    'Body'  => 'How did the session with your mentor go? Please give a feedback with 1 being excellent and 5 being pathetic',
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
//print "Response = ".print_r($http_result);
mysql_close($con);


?>