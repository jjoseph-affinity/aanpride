<?php session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if ($_POST['text3'] !== "@ffiniTy7070&)&)" && $_SESSION['ACTIVITYBOARD'] !== "weruu#$&^7462(&%&$#(2))") {
	exit();
}

$_SESSION['ACTIVITYBOARD'] = "weruu#$&^7462(&%&$#(2))";


date_default_timezone_set('America/New_York');

?>

<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Activity Board</title>
<head>
<link rel="icon" type="image/x-icon" href="seminarboard.ico">
<link rel="stylesheet" href="../SeminarBoard/css/seminarboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body><div class='lightyellowbg'>
<?php


                // Firstly, Purge the records from the ActivityBoard table
    
include_once("../../gestalt.php");
  
$Query1 = "DELETE FROM ActivityBoard";
$stmt = sqlsrv_query( $conn, $Query1);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$a = 1;
$Purged = 'no';
while ($a <= 4 && $Purged !== 'yes') {
try {

sqlsrv_execute($stmt);
    echo "<span class='darkgreentext'>Purged success</span>";
$Purged = 'yes';
}

catch (Exception $ex) {
   "<span class='redtext'>Error, please refresh the page!</span>";
}

}



$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkYwNDRCMTE0LUE1MzctNEUyMS05RkZGLTM2NTQ3QTBFMkVGNw==";

$ToddAuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjBDNjJGQkFFLTk3QkUtNDNBRC1BRjNFLTAyRUFFQ0I0RTQzRg==";

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL

$AppointmentStartDate = date('Y-m-d');
    
    //date('Y-m-d', strtotime('-1 day', strtotime($date_raw))));
    
$AppointmentEndDate = date('Y-m-d', strtotime($AppointmentEndDate . ' +4 days'));
//$AppointmentEndDate = '2024-01-12';
//$TodaysDate = '2024-01-03';

$AppointmentServicingAdvisor = 'test';

 // Search activities for that entire day
$a = 1;
$b = 1;
$http_code7 = '';
while ($a <= 4 && $http_code7 !== 200) {
	$curl7 = curl_init();

curl_setopt_array($curl7, array(
  CURLOPT_URL => "{$BaseURL}activities?start_date=$AppointmentStartDate&end_date=$AppointmentEndDate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
  CURLOPT_ENCODING => "",
  CURLOPT_SSH_COMPRESSION => true,
  CURLOPT_FRESH_CONNECT => true,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    $ToddAuthKey,
    'Content-Type: application/json',
  ),
));

$response7 = curl_exec($curl7);

		        // Check HTTP status code
  switch ($http_code7 = curl_getinfo($curl7, CURLINFO_RESPONSE_CODE)) {
	case 200:
          echo "Query success [$a tries]";
      break;
	case 422:
          echo "Query 422 error [$a tries]";
      break;
    default:
      echo "Query ERROR [$a tries]-->" . $http_code7 . "";
  }
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}


$data7 = json_decode($response7);
//sort($response7);
//$Activities = $data7->activites[$a];
$TotalActivities = $data7->meta->total_records;
$TotalActivities1 = $TotalActivities - 1;
//print_r($data7);


echo '<br>';

            // Now, display all of the activities for the entire day

for ($a = 0; $a <= $TotalActivities1; $a ++) {
    $ActivityID = $data7->activities[$a]->id;
    $ActivityStartTimeRaw = $data7->activities[$a]->start_date;
    $ActivityStartDate = substr($ActivityStartTimeRaw, 0, 10);
    $ActivityStartTime = substr($ActivityStartTimeRaw, 11, 5);
    $ActivityStartYear = substr($ActivityStartTimeRaw, 0, 4);
    $ActivityEndTime = $data7->activities[$a]->end_date;
    $AllDayActivity = $data7->activities[$a]->all_day;
 
    $ActivitySubject = $data7->activities[$a]->subject;
    
    $ActivityLinkedContactID = $data7->activities[$a]->linked_contacts[0]->contact_id;

   // echo "$ActivityStartTime2  $ActivityStartTime1$ActivityStartTime0 (<span class='darkgreentext'></span>) " . $ActivitySubject . "<br>";
    

        
    
    
    $test = '12345';
    
    
            // Insert the rows into the ActivityBoard table so that we can manipulate them later
    
          $params1 = array($AppointmentServicingAdvisor, $ActivityStartDate, $ActivityStartTime, $ActivitySubject, $ActivityLinkedContactID, $test, $test, $ActivityID);
$stmt1 = sqlsrv_prepare($conn, "INSERT INTO ActivityBoard VALUES(?, ?, ?, ?, ?, ?, ?, ?)", $params1);
    $rows_affected = 0;
    
        if ($ActivityStartYear === '2024') {
        
        //echo $ActivityStartDate . '  ' . $ActivitySubject . '<br><br>';
    
    //echo $ActivityStartTime . '  ' . $ActivitySubject . '<br>';
    
sqlsrv_execute($stmt1);
            
        }
        
    
$rows_affected = sqlsrv_rows_affected($stmt1);
 
 //  $c = $c + 1;
//   sleep($d);
//   $d = $d * 2;   
    
}


echo '<br><br>';

                // Select the table for displaying it in the proper format


$Query1 = "SELECT DISTINCT ActivityID, ServicingAdvisor, StartDate, StartTime, Subject, LinkedContactID FROM ActivityBoard";
$stmt = sqlsrv_query( $conn, $Query1);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$a = 0;

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    
    $RowActivityID = $row['ActivityID'];

     if ($row['StartTime'] === '0500') {
        $DisplayTime = "<span class='redtext'>ALL DAY EVENT</span>";
        //$MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '14:00') {
        $DisplayTime = '9 A.M.';
        $MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '14:30') {
        $DisplayTime = '9:30 A.M.';
        $MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '15:00') {
        $DisplayTime = '10 A.M.';
        $MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '15:30') {
        $DisplayTime = '10:30 A.M.';
        $MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '16:00') {
        $DisplayTime = '11 A.M.';
        $MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '16:30') {
        $DisplayTime = '11:30 A.M.';
        $MAE = 'Morning';
    }
    
    else if ($row['StartTime'] === '17:00') {
        $DisplayTime = '12 Noon';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '17:30') {
        $DisplayTime = '12:30 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '18:00') {
        $DisplayTime = '1 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '18:30') {
        $DisplayTime = '1:30 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '19:00') {
        $DisplayTime = '2 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '19:30') {
        $DisplayTime = '2:30 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '20:00') {
        $DisplayTime = '3 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '20:30') {
        $DisplayTime = '3:30 P.M.';
        $MAE = 'Afternoon';
    }
    
    else if ($row['StartTime'] === '21:00') {
        $DisplayTime = '4 P.M.';
        $MAE = 'Evening';
    }
    
    else if ($row['StartTime'] === '21:30') {
        $DisplayTime = '4:30 P.M.';
        $MAE = 'Evening';
    }
    
    else if ($row['StartTime'] === '22:00') {
        $DisplayTime = '5 P.M.';
        $MAE = 'Evening';
    }
    
    else if ($row['StartTime'] === '22:30') {
        $DisplayTime = '5:30 P.M.';
        $MAE = 'Evening';
    }
     
    echo "<div class='margin30'><a><b>";
    echo $row['StartDate'] . "  $DisplayTime</b></a>";

    echo "<a href='https://smf.crm3.redtailtechnology.com/activities/$RowActivityID' target='_blank'>";
    echo $row['Subject'] . "</a>";
    
    echo '  ' . $ActivityLinkedContactID;
    
    
            // Get the contact ID
    $AppointmentServicingAdvisor = $row['ServicingAdvisor'];
    $ActivityStartDate = $row['StartDate'];
    $ActivityStartTime = $row['StartTime'];
    $ActivitySubject = $row['Subject'];
    $ActivityLinkedContactID = $row['LinkedContactID'];
    
    
               // Display send text message icon
            
     echo "<button id='text-reminder-$ActivityStartDate' class='fa pointer' data-activityid='$ActivityID' data-appointmentservicingadvisor='$AppointmentServicingAdvisor' data-activitystartdate='$ActivityStartDate' data-activitystarttime='$ActivityStartTime' data-activitysubject='$ActivitySubject' data-contactid='$ActivityLinkedContactID' title='Txt reminder?'  onclick='sendTextReminder(this.id, this.dataset.activityid, this.dataset.appointmentservicingadvisor, this.dataset.activitystartdate, this.dataset.activitystarttime, this.dataset.activitysubject, this.dataset.contactid)'>&#xf1d7;</button>";
            
                      // Display send e-mail icon
            
     echo "<button id='text-reminder-$ActivityStartDate' class='fa pointer' data-appointmentservicingadvisor='$AppointmentServicingAdvisor' data-activitystartdate='$ActivityStartDate' data-activitystarttime='$ActivityStartTime' data-activitysubject='$ActivitySubject' data-contactid='$ActivityLinkedContactID' title='Txt reminder?'  onclick='sendTextReminder(this.id, this.dataset.appointmentservicingadvisor, this.dataset.activitystartdate, this.dataset.activitystarttime, this.dataset.activitysubject, this.dataset.contactid)'>&#xf1ea;</button>";
    
    echo "</div>";
    
    echo "<div class='lightgrayline'></div>";
}



$DisplayLastUpdatedTime = date('m-d @ H:i');
echo "<p class='font22 bottomright whitetext blackbg'>$DisplayLastUpdatedTime</p>";
?>


</div>


<script src='/ActivityBoard/js/activityboard.js' defer></script>

</body></html>

