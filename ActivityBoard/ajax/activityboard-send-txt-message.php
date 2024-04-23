<?php session_start();

echo 'phase 0<br>';

if ($_SESSION['ACTIVITYBOARD'] !== "weruu#$&^7462(&%&$#(2))") {
    exit();
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

            // Set variables from POST variables

$ID = $_POST['ID'];
$ActivityID = $_POST['ActivityID'];
$AppointmentServicingAdvisor = $_POST['AppointmentServicingAdvisor'];
$ActivityStartDate = $_POST['ActivityStartDate'];
$ActivityStartTime = $_POST['ActivityStartTime'];
$ActivitySubject = $_POST['ActivitySubject'];
$ActivityLinkedContactID = $_POST['ActivityLinkedContactID'];

'start date is:  ' . $ActivityStartDate . '<br>';
'start time is:  ' . $ActivityStartTime . '<br>';
'subject is:  ' . $ActivitySubject . '<br>';

date_default_timezone_set('America/New_York');

                        // Textmagic configuration

set_include_path('/home/site/vendor');

//echo get_include_path();

require('autoload.php');


use TextMagic\Models\SendMessageInputObject;
use TextMagic\Api\TextMagicApi;
use TextMagic\Configuration;	

// put your Username and API Key from https://my.textmagic.com/online/api/rest-api/keys page.
$config = Configuration::getDefaultConfiguration()
    ->setUsername('alexdubiel')
    ->setPassword('dQs52Tv0ipFWEKBohl6Rjv7wlHhsOo');

$api = new TextMagicApi(
    new GuzzleHttp\Client(),
    $config
);

$ToddAuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjBDNjJGQkFFLTk3QkUtNDNBRC1BRjNFLTAyRUFFQ0I0RTQzRg==";

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL


switch ($ActivityStartTime) {
   case "13:00":
    $DisplayActivityStartTime = '8:00 A.M.';
    break;
    case "13:30":
    $DisplayActivityStartTime = '8:30 A.M.';
    break;
    case "14:00":
    $DisplayActivityStartTime = '9:00 A.M.';
    break;
    case "14:30":
    $DisplayActivityStartTime = '9:30 A.M.';
    break;
    case "15:00":
    $DisplayActivityStartTime = '10:00 A.M.';
    break;
    case "15:30":
    $DisplayActivityStartTime = '10:30 A.M.';
    break;
    case "16:00":
    $DisplayActivityStartTime = '11:00 A.M.';
    break;
    case "16:30":
    $DisplayActivityStartTime = '11:30 A.M.';
    break;
    case "17:00":
    $DisplayActivityStartTime = '12:00 P.M.';
    break;
    case "17:30":
    $DisplayActivityStartTime = '12:30 P.M.';
    break;
    case "18:00":
    $DisplayActivityStartTime = '1:00 P.M.';
    break;
    case "18:30":
    $DisplayActivityStartTime = '1:30 P.M.';
    break;
    case "19:00":
    $DisplayActivityStartTime = '2:00 P.M.';
    break;
    case "19:30":
    $DisplayActivityStartTime = '2:30 P.M.';
    break;
    case "20:00":
    $DisplayActivityStartTime = '3:00 P.M.';
    break;
    case "20:30":
    $DisplayActivityStartTime = '3:30 P.M.';
    break;
    case "21:00":
    $DisplayActivityStartTime = '4:00 P.M.';
    break;
    case "21:30":
    $DisplayActivityStartTime = '4:30 P.M.';
    break;
    case "22:00":
    $DisplayActivityStartTime = '5:00 P.M.';
    break;
    case "22:30":
    $DisplayActivityStartTime = '5:30 P.M.';
    break;
    case "23:00":
    $DisplayActivityStartTime = '6:00 P.M.';
    break;
    case "23:30":
    $DisplayActivityStartTime = '6:30 P.M.';
    break;
    case "24:00":
    $DisplayActivityStartTime = '7:00 P.M.';
    break;
  default:
    $DisplayActivityStartTime = '11:30 AM';
}

echo 'linked contact id # is:  ' . $ActivityLinkedContactID . '<br>';
echo '--';

                    // Second, retrieve Phone Number from their Contact ID
										
$curl2 = curl_init();
$GetQueryURL = "contacts/$ActivityLinkedContactID/phones/";

curl_setopt_array($curl2, array(
  CURLOPT_URL => $BaseURL . $GetQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $ToddAuthKey
  ),
));

$response2 = curl_exec($curl2);

	        // Check HTTP status code
if (!curl_errno($curl2)) {
  switch ($http_code = curl_getinfo($curl2, CURLINFO_HTTP_CODE)) {
	case 200:
          echo 'Retrieved,';
          $Status = $Status + 1;
      break;
    default:
      echo 'ERROR->could NOT get #', $http_code, "\n";
  }
}


$data2 = json_decode($response2);
$Phone = $data2->phones[0]->number;

echo 'phone is:  ' . $Phone;

/*

                                // 3rd, add a note into RT



	$curl3 = curl_init();

curl_setopt_array($curl3, array(
  CURLOPT_URL => $BaseURL . '/contacts/' . $ContactID . '/notes',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "{
            \"category_id\": 2,
			\"note_type\": 1,
			\"pinned\": false,
			\"draft\": false,
			\"body\": \"&#128197;  Reminder TXT sent (via SeminarBoard):  $ThatName is scheduled for the upcoming $Type2:  $LocationName on $DayOfWeek, $DisplaySeminarStartDate at $DisplayActivityStartTime - Address:  $Address1, $Address2.  Text STOP to opt out.\"

}",
  CURLOPT_HTTPHEADER => array(
    $AuthKey,
    'Content-Type: application/json'
  ),
));

$response3 = curl_exec($curl3);

	        // Check HTTP status code
if (!curl_errno($curl3)) {
  switch ($http_code = curl_getinfo($curl3, CURLINFO_HTTP_CODE)) {
	case 201:
          echo 'Note added';
          $Status = $Status + 1;
      break;
    default:
      echo 'ERROR --> Note NOT added', $http_code, "\n";
  }
}


$input = new SendMessageInputObject();
$input->setText("Reminder:  $ThatName $GuestName $IsOrAre scheduled for the upcoming $Type2:  $LocationName on $DayOfWeek, $DisplaySeminarStartDate at $DisplayActivityStartTime - Address:  $Address1, $Address2.  Text STOP to opt out.");
$input->setPhones('+1' . $Phone);

try {
    $result = $api->sendMessage($input);
    //$test = '1';
}
	
 catch (Exception $e) {
    echo 'ERROR->txt NOT sent', $e->getMessage(), PHP_EOL;
}

if ($Status === 3) {
    echo " <span class='darkgreentext'>Success!</span>";
}

*/

?>