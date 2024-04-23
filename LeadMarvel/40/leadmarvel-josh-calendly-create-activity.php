<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../../../gestalt.php');

set_include_path('/home/site/vendor/phpmailer/phpmailer/src');

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
//$Phone = preg_replace("/^1|\D/", "", $_POST['Phone'] );

$Phone = preg_replace("/^\+?1|\D/", "", $_POST['Phone'] );



$Title = $_POST['Title'];
$Description = $_POST['Description'];
$Comments = $_POST['Comments'];
$Location = $_POST['Phone'];

$StartTime = $_POST['StartTime'];
$EndTime = $_POST['EndTime'];

$JoshAuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjE4N0ZFNTA0LTBDMkMtNDRCMy1BQURFLTc4RTA5NDc4NDY1RA==";

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL

/*
                        // SEARCH FOR A CONTACT BY PHONE TO GET REDTAIL ID
if ($Phone !== '' && isset($Phone)) {
$a = 1;
$b = 1;
$http_code0 = '';
while ($a <= 4 && $http_code0 !== 200) {
   
$curl0 = curl_init();
$GetQueryURL = "contacts/search?phone_number={$Phone}";

curl_setopt_array($curl0, array(
  CURLOPT_URL => $BaseURL . $GetQueryURL,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_FRESH_CONNECT => true,
  CURLOPT_SSH_COMPRESSION => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $JoshAuthKey
  ),
));

$response0 = curl_exec($curl0);

$data0 = json_decode($response0);
$ContactID = $data0->contacts[0]->id ?? '';
$NumberOfRecords = $data0->meta->total_records;

  switch ($http_code0 = curl_getinfo($curl0, CURLINFO_RESPONSE_CODE)) {
    case 200:
          echo "OK search phone[$a tries]";
      break;
    default:
      echo "ERROR search phone[$a tries]-->" . $http_code0;
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}

}



else if ($Email !== '' && isset($Email)) {

$a = 1;
$b = 1;
$http_code1 = '';
while ($a <= 4 && $http_code1 !== 200) {

$curl1 = curl_init();
$GetQueryURL = "contacts/search?email={$Email}";

curl_setopt_array($curl1, array(
  CURLOPT_URL => $BaseURL . $GetQueryURL,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_FRESH_CONNECT => true,
  CURLOPT_SSH_COMPRESSION => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $JoshAuthKey
  ),
));

$response1 = curl_exec($curl1);

    
$data1 = json_decode($response1);
$NumberOfEmailRecords = $data1->meta->total_records;
	
	if ($NumberOfEmailRecords > 0) {
		$ContactID = $data1->contacts[0]->id ?? '';
	}
    
  switch ($http_code1 = curl_getinfo($curl1, CURLINFO_RESPONSE_CODE)) {
    case 200:
          echo "OK search e-mail[$a tries]";
      break;
    default:
      echo "ERROR search e-mail[$a tries]-->" . $http_code1;
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}

    
}

*/


     // Grab the Redtail ID of the person that signed up (via phone or e-mail) from LeadMarvels table

if ($Phone !== '') {
    echo 'phone found<br>';
$Query1 = "SELECT TOP 1 FirstName, LastName, RedTailID, Phone, Email, Comments FROM LeadMarvels WHERE Phone = 
'$Phone' ORDER BY RedTailID DESC";
    
    $stmt = sqlsrv_query( $conn, $Query1);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$a = 0;

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    $RedTailID = intval($row['RedTailID']);
    $Comments = $row['Comments'];
}
    
}

else if ($Email !== '' && isset($Email)) {
    echo 'email only<br>';
$Query1 = "SELECT TOP 1 FirstName, LastName, RedTailID, Phone, Email, Comments FROM LeadMarvels WHERE Email = 
'$Email' ORDER BY RedTailID DESC";  
    
    $stmt = sqlsrv_query( $conn, $Query1);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$a = 0;

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

$RedTailID = intval($row['RedTailID']);
$Comments = $row['Comments'];
    
}
    
}

else if ($FirstName !== '' && isset($FirstName) && $LastName !== '' && isset($LastName)) {
    echo 'first & last name only<br>';
$Query1 = "SELECT TOP 1 FirstName, LastName, RedTailID, Phone, Email, Comments FROM LeadMarvels WHERE LastName = 
'$LastName' AND FirstName = '$FirstName' ORDER BY RedTailID DESC";  
    
    $stmt = sqlsrv_query( $conn, $Query1);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$a = 0;

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

$RedTailID = intval($row['RedTailID']);
$Comments = $row['Comments'];
}
    
}

echo "RT ID = $RedTailID<br>";



/*
$FirstName = 'first1';
$LastName = 'last1';
$Email = 'adubs@test.test.net';
$Phone = '1234567890';
$Comments = 'Comments';

$Title = 'title goes here';
$Description = 'description here';
$Location = 'location 1';

$StartTime = "2023-11-04T16:01:00.000Z";
$EndTime = "2023-11-04T17:01:00.000Z";
*/

date_default_timezone_set('America/New_York');

//$ToddAuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjBDNjJGQkFFLTk3QkUtNDNBRC1BRjNFLTAyRUFFQ0I0RTQzRg==";

//$MyAuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";
       
$DescriptionAndComments = $Description . '<br><br>' . $Comments;

        echo 'starttime is: ' . $StartTime . "<br>";
        echo 'endtimeis is: ' . $EndTime . "<br>";
        echo 'title is: ' . $Title . "<br>";
        echo 'description and comments is: ' . $DescriptionAndComments . "<br>";
        echo 'Location is: ' . $Location . "<br>";
        echo 'RT ID is: ' . $RedTailID . "<br>";

            // ASSIGN CONTACT (AND LINK CONTACT) TO ACTIVITY ON JOSH'S CALENDAR

$a = 1;
$b = 1;
$http_code3_5 = '';
$curl3_5 = '';
$response3_5 = '';
while ($a <= 4 && $http_code3_5 !== 201 && $RedTailID !== '') {
    
    echo 'rt id is not blank...good<br>';
			
     $curl3_5 = curl_init();
    
		curl_setopt_array($curl3_5, array(
  CURLOPT_URL => $BaseURL . "activities",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
		\"category_id\": 1,
        \"activity_code_id\": 2,
        \"all_day\": false,
        \"start_date\": \"{$StartTime}\",
        \"end_date\": \"{$EndTime}\",
        \"subject\": \"{$Title}\",
        \"description\": \"{$DescriptionAndComments}\",
        \"location\": \"{$Location}\",
        \"importance\": 2,
        \"repeats\": \"never\",
        \"completed\": false,
        \"deleted\": false,
        \"instanced\": false,
        \"linked_contacts\": [
									{
                                        \"type\":  \"Individual\",
										\"contact_id\": $RedTailID
									} ]
 
}",
  CURLOPT_HTTPHEADER => array(
    $JoshAuthKey,
    'Content-Type: application/json'
  ),
));

	 $response3_5 = curl_exec($curl3_5);

	        // Check HTTP status code
  switch ($http_code3_5 = curl_getinfo($curl3_5, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK activity created [$a tries]";
      break;
    default:
      echo "ERROR activity NOT created! [$a tries]-->" . $http_code3_5 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
$data3_5 = json_decode($response3_5);
//$ContactID = $data3_5->contact->id;           
$ActivityID = $data3_5->activity->id;   
           
}

            // ASSIGN CONTACT (No linked contacts) TO ACTIVITY ON JOSH'S CALENDAR

$a = 1;
$b = 1;
$http_code4 = '';
$curl4 = '';
$response4 = '';
while ($a <= 4 && $http_code4 !== 201 && ($RedTailID === '' || $RedTailID === NULL)) {
    			
     $curl4 = curl_init();
    
		curl_setopt_array($curl4, array(
  CURLOPT_URL => $BaseURL . "activities",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
		\"category_id\": 1,
        \"activity_code_id\": 2,
        \"all_day\": false,
        \"start_date\": \"{$StartTime}\",
        \"end_date\": \"{$EndTime}\",
        \"subject\": \"{$Title}\",
        \"description\": \"{$DescriptionAndComments}\",
        \"location\": \"{$Location}\",
        \"importance\": 2,
        \"repeats\": \"never\",
        \"completed\": false,
        \"deleted\": false,
        \"instanced\": false
}",
  CURLOPT_HTTPHEADER => array(
    $JoshAuthKey,
    'Content-Type: application/json'
  ),
));

	 $response4 = curl_exec($curl4);

	        // Check HTTP status code
  switch ($http_code4 = curl_getinfo($curl4, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK activity created [$a tries]";
      break;
    default:
      echo "ERROR activity NOT created! [$a tries]-->" . $http_code4 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
$data4 = json_decode($response4);
//$ContactID = $data4->contact->id;           
$ActivityID = $data4->activity->id;   
           
}
	

                    // SET BODY EMAIL FOR ACTIVITY CREATED AND EMAIL JOSH AND I

echo 'email is:' . $Email . '<br>';
if ($Email !== '' && isset($Email)) {
    $DisplayStartTime = substr($StartTime, 0, 16);
	$Body = "
			<body>
			<p>LM Activity Created: {$FirstName} {$LastName} via automation <i>4.0</i>.</p>
			</br>

			Name: <b>{$FirstName} {$LastName}</b></br>
			Email: <b>{$Email}</b></br>
			Phone: <b>{$Phone}</b></br>
            <br><br>
            Time: <b><span style='color:  #800000'>{$DisplayStartTime}</span></b></br>
			Redtail Link:  <a href=\"https://smf.crm3.redtailtechnology.com/activities/{$ActivityID}\">https://smf.crm3.redtailtechnology.com/activities/{$ActivityID}</a></br>
			</body>
	";
	
$a = 1;
$b = 1;
$Sent = 'no';
while ($a <= 4 && $Sent === 'no') {

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'donotreply@affinityadvisorynetwork.com';                 // SMTP username
	$mail->Password = 'ueuu#$&77cnwnwi(#*%^@xjsuwu@*#*#&5__-++-283';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
	$mail->Port = '587';                                    // TCP port to connect to

	$mail->From = 'donotreply@affinityadvisorynetwork.com';
	//$mail->addAddress('adubiel@affinityadvisorynetwork.com');     // Add a recipient
	$mail->addBCC('adubiel@affinityadvisorynetwork.com', 'Alex');
    $mail->addBCC('jmickley@affinityadvisorynetwork.com', 'Josh');
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject = "NEW CALENDLY ACTIVITY SCHEDULED: $FirstName $LastName";
	$mail->Body    = $Body;

	if(!$mail->send()) {
		echo "ERROR E-mail NOT sent! [$a tries]";
            $Sent = 'no';
	} else {
		echo "OK E-mail sent.[$a tries]";
        $Sent = 'yes';
	}
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}

}


  
//$data1 = json_decode($response1);
//sort($response7);
$a = 0;
//$Activities = $data7->activites[$a];
//$TotalActivities = $data1->meta->total_records;
//$TotalActivities1 = $TotalActivities - 1;

//print_r($data7);

echo '<br><br><br><br>';


    //echo $ActivityID . '<br>';
    //echo 'total activities:  ' . $TotalActivities . '<br><br><br>';
/*
for ($a = 0; $a <= $TotalActivities1; $a ++) {
    $ActivityID = $data1->activities[$a]->id;
    $ActivityStartTime = $data1->activities[$a]->start_date;
    $ActivitySubject = $data1->activities[$a]->subject;
    echo "($ActivityID, $ActivityStartTime)" . $ActivitySubject . '<br>';
}
*/


?>