<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('max_execution_time', 60);

date_default_timezone_set('America/New_York');
$CurrentYearAndDate = date("Y F");

set_include_path('/home/site/vendor/phpmailer/phpmailer/src');

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL
$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Phone = preg_replace("/^1|\D/", "", $_POST['Phone'] );
$Email = $_POST['Email'];
$Comments = $_POST['Comments'];

$NumberOfPhoneRecords = 0;
$NumberOfEmailRecords = 0;

$SubjectNewOrModified = 'new';
$BodyCreatedOrModified = 'created';


							// SEARCH FOR A CONTACT FIRST BY PHONE --> GET REQUEST

        if ($Phone !== '' && !empty($Phone)) {
 
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
    $AuthKey
  ),
));

$response0 = curl_exec($curl0);

$data0 = json_decode($response0);
$NumberOfPhoneRecords = $data0->meta->total_records;
$ContactID = $data0->contacts[0]->id ?? '';
$StatusID = $data0->contacts[0]->status_id ?? '';
$OldStatus = $data0->contacts[0]->status ?? '';
$OldSource = $data0->contacts[0]->source ?? '';
$OldReferredBy = $data0->contacts[0]->referred_by ?? '';
$OriginalServicingAdvisor = $data0->contacts[0]->servicing_advisor ?? '';


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




                    // SEARCH FOR A CONTACT BY E-mail also

       if ($Email !== '' && !empty($Email)) {

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
    $AuthKey
  ),
));

$response1 = curl_exec($curl1);

    
$data1 = json_decode($response1);
$NumberOfEmailRecords = $data1->meta->total_records;
	
	if ($NumberOfEmailRecords > 0) {
		$ContactID = $data1->contacts[0]->id ?? '';
        $StatusID = $data1->contacts[0]->status_id ?? '';
		$OldStatus = $data0->contacts[0]->status ?? '';
		$OldSource = $data0->contacts[0]->source ?? '';
		$OldReferredBy = $data0->contacts[0]->referred_by ?? '';
		$OriginalServicingAdvisor = $data0->contacts[0]->servicing_advisor ?? '';
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


										//CREATE CONTACT BIG SECTION

$PostQueryURL = "contacts";

								// IF CLIENT HAS BOTH PHONE & AN EMAIL ADDRESS
	if ($NumberOfPhoneRecords === 0 && $NumberOfEmailRecords === 0 && $Phone !== '' && $Email !== '') {
 
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
  CURLOPT_FOLLOWLOCATION => false,
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
    $AuthKey,
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
        
}
			
    
                
     							// IF CLIENT Has Phone ONLY and NO EMAIL
	
else if ($NumberOfPhoneRecords === 0 && $NumberOfEmailRecords === 0 && $Phone !== '' && $Email === '') {

$a = 1;
$b = 1;
$http_code3_5 = '';
$curl3_5 = '';
$response3_5 = '';
while ($a <= 4 && $http_code3_5 !== 201) {
			
     $curl3_5 = curl_init();
    
		curl_setopt_array($curl3_5, array(
  CURLOPT_URL => $BaseURL . $PostQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
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
							\"status_id\": 34,
                            \"category\": \"Contact\",
                            \"source_id\": 52,
		\"servicing_advisor_id\": 56
}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

	 $response3_5 = curl_exec($curl3_5);

	        // Check HTTP status code
  switch ($http_code3_5 = curl_getinfo($curl3_5, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK contact (phone only) created [$a tries]";
      break;
    default:
      echo "ERROR contact (phone only) NOT created! [$a tries]-->" . $http_code3_5 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
$data3_5 = json_decode($response3_5);
$ContactID = $data3_5->contact->id;           
                
}
	
}


     							// IF CLIENT Has E-Mail ONLY and NO Phone
	
else if ($NumberOfPhoneRecords === 0 && $NumberOfEmailRecords === 0 && $Phone === '' && $Email !== '') {

$a = 1;
$b = 1;
$http_code3_6 = '';
$curl3_6 = '';
$response3_6 = '';
while ($a <= 4 && $http_code3_6 !== 201) {
			
     $curl3_6 = curl_init();
    
		curl_setopt_array($curl3_6, array(
  CURLOPT_URL => $BaseURL . $PostQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
        \"type\": \"Crm::Contact::Individual\",
		\"first_name\": \"{$FirstName}\",
        \"last_name\": \"{$LastName}\",
		
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
    $AuthKey,
    'Content-Type: application/json'
  ),
));

	 $response3_6 = curl_exec($curl3_6);

	        // Check HTTP status code
  switch ($http_code3_6 = curl_getinfo($curl3_6, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK contact (e-mail, no phone) created [$a tries]";
      break;
    default:
      echo "ERROR contact (e-mail, no phone) NOT created! [$a tries]-->" . $http_code3_6 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
$data3_6 = json_decode($response3_6);
$ContactID = $data3_6->contact->id;           
                
}
	
}


			// IF CLIENT does NOT HAVE PHONE OR E-MAIL
	
else if ($NumberOfPhoneRecords === 0 && $NumberOfEmailRecords === 0 && $Phone === '' && $Email === '') {

$a = 1;
$b = 1;
$http_code3_7 = '';
$curl3_7 = '';
$response3_7 = '';
while ($a <= 4 && $http_code3_7 !== 201) {
			
     $curl3_7 = curl_init();
    
		curl_setopt_array($curl3_7, array(
  CURLOPT_URL => $BaseURL . $PostQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
        \"type\": \"Crm::Contact::Individual\",
		\"first_name\": \"{$FirstName}\",
        \"last_name\": \"{$LastName}\",
							\"status_id\": 34,
                            \"category\": \"Contact\",
                            \"source_id\": 52,
		\"servicing_advisor_id\": 56
}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

	 $response3_7 = curl_exec($curl3_7);

	        // Check HTTP status code
  switch ($http_code3_7 = curl_getinfo($curl3_7, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK contact (no e-mail, no phone) created [$a tries]";
      break;
    default:
      echo "ERROR contact (no e-mail, no phone) NOT created! [$a tries]-->" . $http_code3_7 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
$data3_7 = json_decode($response3_7);
$ContactID = $data3_7->contact->id;           
                
}
	
}

            // ADD AN INITIAL NOTE TO THEIR CONTACT INFO saying contact was created
if ($NumberOfPhoneRecords === 0 && $NumberOfEmailRecords === 0) {
$a = 1;
$b = 1;
$http_code5_6 = '';
while ($a <= 4 && $http_code5_6 !== 201) {
    
		$curl5_6 = curl_init();

curl_setopt_array($curl5_6, array(
  CURLOPT_URL => $BaseURL . '/contacts/' . $ContactID . '/notes',

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
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
            \"category_id\": 2,
			\"note_type\": 1,
			\"pinned\": false,
			\"draft\": false,
			\"body\": \"&#128309;  Contact created via Automation 4.0.\"

}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response5_6 = curl_exec($curl5_6);

		        // Check HTTP status code
  switch ($http_code5_6 = curl_getinfo($curl5_6, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK initial note noted into RT [$a tries]";
      break;
    default:
      echo "ERROR INITIAL NOTE NOT noted into RT(curl6) [$a tries]-->" . $http_code5_6 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}
   
    }
    
            // ADD AN ADDITIONAL NOTE TO THEIR CONTACT INFO
	
$a = 1;
$b = 1;
$http_code6 = '';
while ($a <= 4 && $http_code6 !== 201) {
    
		$curl6 = curl_init();

curl_setopt_array($curl6, array(
  CURLOPT_URL => $BaseURL . '/contacts/' . $ContactID . '/notes',
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
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
            \"category_id\": 2,
			\"note_type\": 1,
			\"pinned\": false,
			\"draft\": false,
			\"body\": \"$FirstName $LastName<br>$Phone<br>$Email\"

}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response6 = curl_exec($curl6);

		        // Check HTTP status code
  switch ($http_code6 = curl_getinfo($curl6, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK txt noted into RT [$a tries]";
      break;
    default:
      echo "ERROR TXT NOT noted into RT(curl6) [$a tries]-->" . $http_code6 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}

    
                // ADD THEIR COMMENTS (from the LM Google Sheet sign-up) INTO THE NOTE
	
$a = 1;
$b = 1;
$http_code7 = '';
while ($a <= 4 && $http_code7 !== 201) {
    
		$curl7 = curl_init();

curl_setopt_array($curl7, array(
  CURLOPT_URL => $BaseURL . '/contacts/' . $ContactID . '/notes',
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
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
            \"category_id\": 2,
			\"note_type\": 1,
			\"pinned\": false,
			\"draft\": false,
			\"body\": \"$Comments\"

}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response7 = curl_exec($curl7);

		        // Check HTTP status code
  switch ($http_code7 = curl_getinfo($curl7, CURLINFO_RESPONSE_CODE)) {
	case 201:
          echo "OK txt noted into RT [$a tries]";
      break;
    default:
      echo "ERROR TXT NOT noted into RT(curl6) [$a tries]-->" . $http_code7 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}
    
if ($NumberOfPhoneRecords > 0 || $NumberOfEmailRecords > 0) {
    
$SubjectNewOrModified = 'modified';
$BodyCreatedOrModified = 'modified';
   
      		// CHANGE Status, Source, and Servicing Advisor PUT REQUEST
	
$a = 1;
$b = 1;
$http_code8 = '';
while ($a <= 4 && $http_code8 !== 200) {

	$curl8 = curl_init();

curl_setopt_array($curl8, array(
  CURLOPT_URL => $BaseURL . '/contacts/' . $ContactID,
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
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => "{
	                        \"status_id\": 34,
                            \"category\": \"Contact\",
                            \"source_id\": 52,
		                    \"servicing_advisor_id\": 56
}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response8 = curl_exec($curl8);

		        // Check HTTP status code
  switch ($http_code8 = curl_getinfo($curl8, CURLINFO_RESPONSE_CODE)) {
	case 200:
          echo "OK info changed. [$a tries]";
      break;
    default:
      echo "ERROR info NOT changed! [$a tries]-->" . $http_code8 . "";
  }
    
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
	
}
    
}

                    // SET BODY EMAIL FOR CONTACT CREATED AND EMAIL JOSH AND I

if ($Email !== '' && isset($Email)) {
	$Body = "
			<body>
			<p>LM Contact $BodyCreatedOrModified: {$FirstName} {$LastName} via automation <i>4.0</i>.</p>
			</br>

			Name: <b>{$FirstName} {$LastName}</b></br>
			Email: <b>{$Email}</b></br>
			Phone: <b>{$Phone}</b></br>
			Redtail Link:  <a href=\"https://smf.crm3.redtailtechnology.com/contacts/{$ContactID}\">https://smf.crm3.redtailtechnology.com/contacts/{$ContactID}</a></br>
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
    //$mail->addBCC('jmickley@affinityadvisorynetwork.com', 'Josh');
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject = "LM $SubjectNewOrModified contact: $FirstName $LastName";
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

                        // INSERT ENTRY INTO DATABASE LEADMARVELS TABLE
    
    include_once('../../../../gestalt.php');
        $params1 = array($FirstName, $LastName, $ContactID, $Phone, $Email, $Comments);
$stmt1 = sqlsrv_prepare($conn, "INSERT INTO LeadMarvels VALUES(?, ?, ?, ?, ?, ?)", $params1);
$rows_affected = 0;
$a = 1;
$b = 1;
while ($a <= 4 && $rows_affected === 0) {
    
sqlsrv_execute($stmt1);
    
$rows_affected = sqlsrv_rows_affected($stmt1);
 
   $a = $a + 1;
   sleep($b);
   $b = $b * 2;   
    
}
    
       if ($rows_affected === 1) {
        echo 'OK 1 row updated.';
    }
    else {
        echo 'WARNING row not updated.';
    }



?>