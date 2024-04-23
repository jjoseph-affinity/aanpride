<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/New_York');

set_include_path('/home/site/vendor/phpmailer/phpmailer/src');

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Phone = preg_replace("/^\+?1|\D/", "", $_POST['Phone'] );
//$Phone = preg_replace("/^1|\D/", "", $_POST['Phone'] );

$Subject = "Appointment w/ " . $FirstName . " " . $LastName;
$Comments = $_POST['Comments'];
$Location = $_POST['Phone'];

$StartTime = $_POST['StartTime'];
$EndTime = $_POST['EndTime'];

$JoshAuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjE4N0ZFNTA0LTBDMkMtNDRCMy1BQURFLTc4RTA5NDc4NDY1RA==";

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL


$a = 1;
$b = 1;
$http_code3 = '';
while ($a <= 4 && $http_code3 !== 201) {

    $curl3 = curl_init();
    
curl_setopt_array($curl3, array(
  CURLOPT_URL => $BaseURL . "contacts",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
  CURLOPT_ENCODING => '',
  CURLOPT_SSH_COMPRESSION => true,
  CURLOPT_FRESH_CONNECT => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
        \"type\": \"Crm::Contact::Individual\",
		\"first_name\": \"{$FirstName}\",
        \"last_name\": \"{$LastName}\",
		
		\"phones\": [
									{
										\"number\": \"{$Phone}\",
										\"country_code\": 1,
										\"phone_type\": 1,
										\"is_preferred\": true,
										\"is_primary\": true
									} ],

							\"emails\": [
									{
										\"address\": \"{$Email}\",
										\"email_type\": 1,
										\"is_primary\": true,
										\"is_preferred\": true
									}],
							\"status_id\": 34,
                            \"category\": \"Contact\",
                            \"source_id\": 52,
		\"servicing_advisor_id\": 56
}",
  CURLOPT_HTTPHEADER => array(
    $JoshAuthKey,
    'Content-Type: application/json'
  ),
));
    
	$response3 = curl_exec($curl3);
    

	        // Check HTTP status code
  switch ($http_code3 = curl_getinfo($curl3, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK contact (e-mail + phone) created [$a tries]";
      break;
    default:
      echo "ERROR contact (e-mail + phone) NOT created! [$a tries]-->" . $http_code3 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
$data3 = json_decode($response3);
$ContactID = $data3->contact->id;
	
	}

            // ASSIGN CONTACT (AND LINK CONTACT) TO ACTIVITY ON JOSH'S CALENDAR

$a = 1;
$b = 1;
$http_code3_5 = '';
$curl3_5 = '';
$response3_5 = '';
while ($a <= 4 && $http_code3_5 !== 201) {
    
    echo "rt id is:  $ContactID <br>";
			
     $curl3_5 = curl_init();
    
		curl_setopt_array($curl3_5, array(
  CURLOPT_URL => $BaseURL . "activities",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
  CURLOPT_ENCODING => '',
  CURLOPT_SSH_COMPRESSION => true,
  CURLOPT_FRESH_CONNECT => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
		\"category_id\": 1,
        \"activity_code_id\": 3,
        \"all_day\": false,
        \"start_date\": \"{$StartTime}\",
        \"end_date\": \"{$EndTime}\",
        \"subject\": \"{$Subject}\",
        \"description\": \"{$Comments}\",
        \"location\": \"{$Phone}\",
        \"importance\": 2,
        \"repeats\": \"never\",
        \"completed\": false,
        \"deleted\": false,
        \"instanced\": false,
        \"linked_contacts\": [
									{
                                        \"type\":  \"Individual\",
										\"contact_id\": $ContactID
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

echo 'Activity is:  ' . $ActivityID;
echo 'start is:' . $StartTime;
        
?>