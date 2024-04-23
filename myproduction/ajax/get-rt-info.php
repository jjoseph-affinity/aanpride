<?php

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];

$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";

$BaseURL  = "https://smf.crm3.redtailtechnology.com/api/public/v1/"; //Redtail API v2 BaseURL

	// SEARCH FOR A CONTACT (NEED TO GET THEIR INFORMATION FIRST) FIRST BY PHONE --> GET REQUEST

//$Phone = $_POST['Phone'];

$a = 1;
$b = 1;
$http_code0 = '';
while ($a <= 4 && $http_code0 !== 200) {
   
$curl0 = curl_init();
    
    
                // Check if both First & Last name are valid
    
    if ($FirstName !== 'Unknown' && $LastName !== '') {
    
$GetQueryURL = "contacts/search?first_name=$FirstName&last_name=$LastName";
        
    }
    
                // If first name is not known, just search by last name
    
    else if ($FirstName === 'Unknown') {
        
        $GetQueryURL = "contacts/search?last_name=$LastName";
        
    }

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
$ContactID = $data0->contacts[0]->id ?? '';
$NumberOfRecords = $data0->meta->total_records;
$StatusID = $data0->contacts[0]->status_id ?? '';
$Status = $data0->contacts[0]->status ?? '';
$Source = $data0->contacts[0]->source ?? '';
$ReferredBy = $data0->contacts[0]->referred_by ?? '';
$ServicingAdvisor = $data0->contacts[0]->servicing_advisor ?? '';
$WritingAdvisorID = $data0->contacts[0]->writing_advisor_id ?? '';

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
if ($WritingAdvisorID == 9) {
echo "<span class='whitetext greenbg'>$ReferredBy</span>";
}

else {
    
echo "<span class='yellowbg'>$ReferredBy</span>";
    
}

?>