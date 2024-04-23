<?php session_start();

if ($_SESSION['SECURITYKEY'] !== "weiafjieofj#(*$&7364^#^^%@%@%%(*#$))") {
 exit();
}

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$ContactID = $_POST['ContactID'];
$AttendeeName = $_POST['AttendeeName'];
$SeminarName = $_POST['SeminarName'];

/* Alex AuthKey
$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";
*/

// Erron's AuthKey

//$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjFFMzIyQzFFLTlDRTYtNDQyRC05NzdGLTk1QjU2MTIxRTUyQQ==";


$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL


				// Add a note into RT stating they have CONFIRMED ATTENDANCE

$a = 1;
$b = 1;
$http_code0 = '';
while ($a <= 4 && $http_code0 !== 201) {

$curl0 = curl_init();

curl_setopt_array($curl0, array(
  CURLOPT_URL => $BaseURL . 'contacts/' . $ContactID . '/notes',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
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
			\"body\": \"&#128994;  Check-in confirmed @ $SeminarName (via SeminarBoard).\"

}",
  CURLOPT_HTTPHEADER => array(
    $_SESSION['AUTHKEY'],
    'Content-Type: application/json'
  ),
));

$response0 = curl_exec($curl0);


    	        // Check HTTP status code

      switch ($http_code0 = curl_getinfo($curl0, CURLINFO_HTTP_CODE)) {
	case 201:
          echo "OK-->confirmed attendance in RT; [$a tries]<br>";
      break;
    default:
      echo "ERROR-->nothing noted in RT [$a tries]-->" . $http_code0;
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
    
}

?>