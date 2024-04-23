<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo 'phase 0';

include 'includes/PHPObjectExplorer/PHPObjectExplorer.php';
//include 'includes/PHPMailer/PHPMailerAutoload.php';
include 'includes/httpful.phar';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer6.2/src/Exception.php';
require 'includes/PHPMailer6.2/src/PHPMailer.php';
require 'includes/PHPMailer6.2/src/SMTP.php';


$BaseURL2  = 'https://smf.crm3.redtailtechnology.com/api/public/v1'; //Redtail API v2 BaseURL
$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";

//$ActivityID = $_POST['ActivityID'];
$Phone 			= preg_replace("/[^0-9]/", "", $_POST['Phone'] );
//$Phone 			= substr($Phone,3);
$Email 			= $_POST['Email'];
$Source 		= $_POST['Source'];
$FirstName 		= $_POST['FirstName'];
$LastName 		= $_POST['LastName'];
$StartTime 		= $_POST['StartTime'];
$EndTime 		= $_POST['EndTime'];
$EventDate 		= substr($StartTime, 0, 10);  //Grab from StartTime?
$Title 			= $_POST['Title'];
$Description 	= $_POST['Description'];
$Owner 			= $_POST['Owner'];
$ServicingID 	= 36;
$RedtailID 		= 305201;

echo 'phase 1 <br>';

$uriContactSearch = $BaseURL2 . "/contacts/search?email={$Email}&Contact_type=Individual&has_email=true";

$ContactSearchResponse = \Httpful\Request::get($uriContactSearch)    // Build a PUT request...                              
		->sendsJson()											  // tell it we're sending (Content-Type) JSON...
		->addHeader("Authorization", $AuthKey)
//		->addHeader("include", "emails")
//		->body()
		->send();

$ContactID = $ContactSearchResponse->body->contacts[0]->id;

if(!isset($ContactID)){
	echo 'Create Contact </br>';
	
	$ContactJSON = 	"
					{
							\"type\": \"Crm::Contact::Individual\",
							\"source_id\": 52,
							\"status_id\": 34,
							\"servicing_advisor_id\": {$ServicingID},
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
									}]
					}
					";
	
	$uriContactCreate = $BaseURL2 . "/contacts";
	
	$ContactCreateResponse = \Httpful\Request::post($uriContactCreate)    	// Build a PUT request...                              
		->sendsJson()											  			// tell it we're sending (Content-Type) JSON...
		->addHeader("Authorization", $AuthKey)
																			//		->addHeader("include", "emails")
		->body($ContactJSON)
		->send();

	$ContactID = $ContactCreateResponse->body->contact->id;
	
//	$Result = var_dump($ContactCreateResponse);
 	
} else {
	echo 'Already Exists </br>';
	
	//Set Servicing Advisor
	$ContactUpdateJSON = 	"
					{
							\"servicing_advisor_id\": {$ServicingID}
					}
					";
	
	$uriContactUpdate = $BaseURL2 . "/contacts/{$ContactID}";
	
	$ContactCreateResponse = \Httpful\Request::put($uriContactUpdate)    	// Build a PUT request...                              
		->sendsJson()											  			// tell it we're sending (Content-Type) JSON...
		->addHeader("Authorization", $AuthKey)
																			//		->addHeader("include", "emails")
		->body($ContactUpdateJSON)
		->send();
	
	
}

if(isset($ContactID)){

	echo "Contact ID: {$ContactID} </br>";

	echo "Date: {$EventDate} </br>";
	
	echo "RedtailID: {$RedtailID} </br>";
	//echo "Contact JSON: </br> {$ContactJSON} </br>";

	//echo "Result: {$Result}";
	//exit;

	//Create Activity
	$CalJSON = "{
							\"subject\": \"{$Title}\",
							\"start_date\": \"{$StartTime}\",
							\"end_date\": \"{$EndTime}\",
							\"description\": \"{$Description}\",
							\"repeats\": \"never\",
							\"linked_contacts\": [
								{
									\"contact_id\": {$ContactID}
								}
							],
							\"attendees\": [
								{
									\"type\": \"Crm::Activity::Attendee::User\",
									\"user_id\": {$RedtailID}
								}
							]
					}";
	
		$uriCalCreate = $BaseURL2 . "/activities?occurrence_start_date={$EventDate}&occurrence_end_date={$EventDate}";
		$responseCal = \Httpful\Request::post($uriCalCreate)                  // Build a PUT request...
					->sendsJson()                               // tell it we're sending (Content-Type) JSON...
					->addHeader('Authorization', $AuthKey)
					->body($CalJSON)             // attach a body/payload...
					->send(); 

		$ActivityID = $responseCal->body->activity->id;


		$UDFJSON = "{
							\"contact_id\": {$ContactID},
							\"contact_udf_field_id\": 203,
							\"field_value\": \"{$EventDate}\"
					}";

		$uriUDF = $BaseURL2 . "/contacts/{$ContactID}/udfs";
		$responseUDF = \Httpful\Request::post($uriUDF)                  // Build a PUT request...
					->sendsJson()                               // tell it we're sending (Content-Type) JSON...
					->addHeader('Authorization', $AuthKey)
					->body($UDFJSON)             // attach a body/payload...
					->send(); 

		echo "ActivityID: {$ActivityID}";

		exit;
}

?>