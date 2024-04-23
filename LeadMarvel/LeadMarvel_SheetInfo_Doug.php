<?php

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
	

							// SEARCH FOR A CONTACT FIRST BY PHONE --> GET REQUEST
										
$curl = curl_init();
$GetQueryURL = "contacts/search?phone_number={$Phone}";

curl_setopt_array($curl, array(
  CURLOPT_URL => $BaseURL . $GetQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $AuthKey
  ),
));

$response = curl_exec($curl);

$data = json_decode($response);
$ContactID = $data->contacts[0]->id;
$NumberOfRecords = $data->meta->total_records;
$StatusID = $data->contacts[0]->status_id;
$OldStatus = $data->contacts[0]->status;

curl_close($curl); 	



										//CREATE CONTACT, 
if ($NumberOfRecords == 0){

$PostQueryURL = "contacts";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $BaseURL . $PostQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
        \"type\": \"Crm::Contact::Individual\",
		\"first_name\": \"{$FirstName}\",
        \"last_name\": \"{$LastName}\",
		 \"addresses\": [
                {
                    \"street_address\": \"{$AddressLine1}\",
                    \"city\": \"{$City}\",
                    \"state\": \"{$State}\",
                    \"zip\": \"{$Zip}\",
                    \"country\": \"US\",
                    \"address_type\": 1,
                    \"is_primary\": true,
                    \"is_preferred\": false
                }],
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
        \"source_id\": 52,
        \"status_id\": 34,
        \"category\": \"Contact\",
		\"gender_id\": \"{$GenderID}\",
		\"servicing_advisor_id\": 36
  
}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

$data = json_decode($response);
$ContactID = $data->contact->id;

echo 'Contact created section --> contact id is:  ' . $ContactID;

curl_close($curl);
	
	
						// ADD INFORMATION FROM THE CONTACTS COMMENT SECTION INTO THE NOTES
	
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $BaseURL . '/contacts/' . $ContactID . '/notes',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
            \"category_id\": 2,
			\"note_type\": 1,
			\"pinned\": false,
			\"draft\": false,
			\"body\": \"&#128309;  $Comments</b>\"

}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
	
	

			// SET BODY EMAIL FOR CONTACT CREATED AND ASSIGNED TO A SEMINAR AND EMAIL STAFF
	$Body = "
			<body>
			<p>Congratulations, Doug!  A new lead came in;  {$FirstName} {$LastName}.</p>
			</br>

			Contact Name: <b>{$FirstName} {$LastName}</b></br>
			Contact Email: <b>{$Email}</b></br>
			Contact Phone: <b>{$Phone}</b></br>
			Servicing Advisor:  <b><font color='#800080'>Doug Sanders</font></b></br></br>
			Redtail Link:  <a href=\"https://smf.crm3.redtailtechnology.com/contacts/{$ContactID}\">https://smf.crm3.redtailtechnology.com/contacts/{$ContactID}</a></br>
			</body>
	";
	

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
	$mail->addBCC('dsanders@affinityadvisorynetwork.com', 'Doug');
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject = 'New lead:  ' . $FirstName . ' ' . $LastName;
	$mail->Body    = $Body;

	if(!$mail->send()) {
		echo "E-mail NOT sent!";
	} else {
		echo "E-mail sent!";
	}

	
}
	
	
?>