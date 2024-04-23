<?php

echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

error_reporting(E_ALL);

date_default_timezone_set('America/New_York');

$DisplayLastUpdatedTime = date('m-d @ H:i');

echo $DisplayLastUpdatedTime . '!';

$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL

$Phone = '3305650010';
										
$curl1 = curl_init();
$GetQueryURL = "contacts/search?phone_number={$Phone}";

curl_setopt_array($curl1, array(
  CURLOPT_URL => $BaseURL . $GetQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_FRESH_CONNECT => true,
  CURLOPT_SSH_COMPRESSION => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $AuthKey
  ),
));

$response1 = curl_exec($curl1);

$data1 = json_decode($response1);
$ContactID = $data1->contacts[0]->id;
$NumberOfRecords = $data1->meta->total_records;
$StatusID = $data1->contacts[0]->status_id;
$OldStatus = $data1->contacts[0]->status;
$OldSource = $data1->contacts[0]->source;
$OldReferredBy = $data1->contacts[0]->referred_by;
$OriginalServicingAdvisor = $data1->contacts[0]->servicing_advisor;

    // Check HTTP status code
if (!curl_errno($curl1)) {
  switch ($http_code = curl_getinfo($curl1, CURLINFO_HTTP_CODE)) {
    case 200:
          echo 'OK(200/curl1)\n';
      break;
	case 201:
          echo 'OK(201/curl1)\n';
      break;
    default:
      echo 'ERROR(curl1)->', $http_code, "\n";
  }
}

		curl_close($curl1); 		

echo '<br>nor = ' . $NumberOfRecords;
echo '<br>' . $StatusID . '<br>' . $OldReferredBy;
?>