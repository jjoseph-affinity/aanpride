<?php session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$Password = $_POST['text4'];

$_SESSION['AUTHKEY'] = '';
$_SESSION['SECURITYKEY'] = "";

switch ($Password) {
  case "zxc,vn~+_!`1=-":
        $User = 'Dromans';
        $AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjFFMzIyQzFFLTlDRTYtNDQyRC05NzdGLTk1QjU2MTIxRTUyQQ==";
        $_SESSION['AUTHKEY'] = $AuthKey;
        $_SESSION['SECURITYKEY'] = "weiafjieofj#(*$&7364^#^^%@%@%%(*#$))";
    break;
  case "vnsiwu3*$&%(#*)":
        $User = 'Tciviello';
        $AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjBDNjJGQkFFLTk3QkUtNDNBRC1BRjNFLTAyRUFFQ0I0RTQzRg=="; 
        $_SESSION['AUTHKEY'] = $AuthKey;
        $_SESSION['SECURITYKEY'] = "weiafjieofj#(*$&7364^#^^%@%@%%(*#$))";
    break;
  case "bxcvnER*#&$852":
        $User = 'MGsellman';
                        // Matt Gsellman's Auth Key (Retail)
        $AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OkI1NkI1MzdGLUNGRDktNEExQy1BNjRGLTNENTM1MUQ2RTUzNQ==";
        $_SESSION['AUTHKEY'] = $AuthKey;
        $_SESSION['SECURITYKEY'] = "weiafjieofj#(*$&7364^#^^%@%@%%(*#$))";
    break;
  case "dRXZ87334#*&$83S":
        $User = 'DSanders';
                        // Doug's Auth Key (Retail)
        $AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjNBM0I0MzM0LTM5NkUtNDkwQS1BODIyLTc1NTkwQ0VFRjVFMA==";
        $_SESSION['AUTHKEY'] = $AuthKey;
        $_SESSION['SECURITYKEY'] = "weiafjieofj#(*$&7364^#^^%@%@%%(*#$))";
    break;
  default:
        $User = "";
        $AuthKey = "";
        $_SESSION['AUTHKEY'] = "";
        $_SESSION['SECURITYKEY'] = "";
    exit();
}





set_include_path('site/');

                    // Query the PlateLickers table

require_once("../../gestalt.php");

                    // Create the PL array

$PLList = [];

$Query1 = "SELECT DISTINCT ID1, PLName, PLReferredBy FROM PlateLickers WHERE FalsePositive = 'no'";
$stmt = sqlsrv_query( $conn, $Query1);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$a = 0;

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

    $PLID = $row['ID1'];
    $PLName = $row['PLName'];
    $PLReferredBy = $row['PLReferredBy'];
	$PLIDReferredBy = $row['ID1'] . '-' . $row['PLReferredBy'];
    //echo $PLName . '<br>' . $PLReferredBy;
    $PLList[$PLName] = $PLReferredBy;

$array[$a]['ID'] = $PLID;
$array[$a]['NAME'] = $PLName;
$array[$a]['REFERREDBY'] = $PLReferredBy;
//echo $array[$a]['ID'] . ' ' . $array[$a]['NAME'] . ' ' . $array[$a]['REFERREDBY'] . '<br>';
	array_push($array[$a], $PLID, $PLName, $PLReferredBy);
	$a = $a + 1;
	$b = $a; 
    
}


date_default_timezone_set('America/New_York');


?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>

    <?php echo $User;
    ?>

</title>
<link rel="icon" type="image/x-icon" href="../SeminarBoard/seminarboard.ico">
<link rel="stylesheet" href="../../SeminarBoard/css/seminarboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

//$my_date_time = date("H:i", strtotime("-4 hours"));
	
//$ContactList = array('');

$ContactList0 = array('');


$DivNumber = 0;


$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL


// FIRSTLY, GET ALL ACTIVE SEMINARS WITH A DATE OF >= TODAY --> GET REQUEST
										
$curl = curl_init();
$GetQueryURL = "seminars?attendees=true&status=1&count=true";

curl_setopt_array($curl, array(
  CURLOPT_URL => $BaseURL . $GetQueryURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_AUTOREFERER => false,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 20,
  CURLOPT_TIMEOUT => 120,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $AuthKey
  ),
));

$response = curl_exec($curl);

$data = json_decode($response);
$NumberOfRecords = $data->meta->total_records;


	echo "<body>";

echo "<div class='container padding20'>";

	$CurrentDate1 = date('Y-m-d');
	
$Iterations = 0;

for ($x = 0; $x <= $NumberOfRecords - 1; $x++) {	

                        // Create the array for the phone list per seminar
    
  //  $ContactList[$x] = array('');
    
	
	if ($DivNumber === 0 || $DivNumber === 2 || $DivNumber === 4 || $DivNumber === 6 || $DivNumber === 8 || $DivNumber === 10 || $DivNumber === 12 || $DivNumber === 14 || $DivNumber === 16 || $DivNumber === 18 || $DivNumber === 20 || $DivNumber === 22)
	{
		$ActiveBG = 'whitebg';
	}
	
	else {
		$ActiveBG = 'lightgraybg';
	}
	
										// RESET FCC Count back to 0
	$InitialConfirmationCompletedAmount = array('');
	$FinalConfirmationCompletedAmount = array('');
	$FinalGuestsAmount = array('');
	
    $SeminarID = $data->seminars[$x]->id ?? '';
    $SeminarName = $data->seminars[$x]->name ?? '';
	$SeminarStartDate = $data->seminars[$x]->start_date ?? '';
	$StartDate = $data->seminars[$x]->start_date ?? '';
   // $SeminarDescription = $data->seminars[$x]->description;
	
	$SeminarStartDate = substr($SeminarStartDate,11,5);
		
	$SeminarStartDate1 = substr($SeminarStartDate,0,2);
	$SeminarStartDate2 = substr($SeminarStartDate,3,5);
	$SeminarStartDate3 = $SeminarStartDate1 . ':' . $SeminarStartDate2;
	
//$DisplaySeminarStartTime = date('H:i', strtotime($SeminarStartDate3.'-4 hours'));
    
            // Case scenario for the Time
    
switch ($SeminarStartDate) {
   case "13:00":
    $DisplaySeminarStartTime = '8:00 A.M.';
    break;
    case "13:30":
    $DisplaySeminarStartTime = '8:30 A.M.';
    break;
    case "14:00":
    $DisplaySeminarStartTime = '9:00 A.M.';
    break;
    case "14:30":
    $DisplaySeminarStartTime = '9:30 A.M.';
    break;
    case "15:00":
    $DisplaySeminarStartTime = '10:00 A.M.';
    break;
    case "15:30":
    $DisplaySeminarStartTime = '10:30 A.M.';
    break;
    case "16:00":
    $DisplaySeminarStartTime = '11:00 A.M.';
    break;
    case "16:30":
    $DisplaySeminarStartTime = '11:30 A.M.';
    break;
    case "17:00":
    $DisplaySeminarStartTime = '12:00 P.M.';
    break;
    case "17:30":
    $DisplaySeminarStartTime = '12:30 P.M.';
    break;
    case "18:00":
    $DisplaySeminarStartTime = '1:00 P.M.';
    break;
    case "18:30":
    $DisplaySeminarStartTime = '1:30 P.M.';
    break;
    case "19:00":
    $DisplaySeminarStartTime = '2:00 P.M.';
    break;
    case "19:30":
    $DisplaySeminarStartTime = '2:30 P.M.';
    break;
    case "20:00":
    $DisplaySeminarStartTime = '3:00 P.M.';
    break;
    case "20:30":
    $DisplaySeminarStartTime = '3:30 P.M.';
    break;
    case "21:00":
    $DisplaySeminarStartTime = '4:00 P.M.';
    break;
    case "21:30":
    $DisplaySeminarStartTime = '4:30 P.M.';
    break;
    case "22:00":
    $DisplaySeminarStartTime = '5:00 P.M.';
    break;
    case "22:30":
    $DisplaySeminarStartTime = '5:30 P.M.';
    break;
    case "23:00":
    $DisplaySeminarStartTime = '6:00 P.M.';
    break;
    case "23:30":
    $DisplaySeminarStartTime = '6:30 P.M.';
    break;
    case "24:00":
    $DisplaySeminarStartTime = '7:00 P.M.';
    break;
  default:
    $DisplaySeminarStartTime = '11:30 AM';
}
    
    
	
	$StartDate = substr($StartDate,0,10);
	$PreAttendeeCount = $data->seminars[$x]->attendee_count ?? '';
    $PreAttendeeCount = intval($PreAttendeeCount) - 1;
	$PreGuestCount = $data->seminars[$x]->guest_count ?? '';
	$TotalSignUps = intval($PreAttendeeCount + 1) + intval($PreGuestCount);
    
	if ($StartDate == $CurrentDate1) {
		$SeminarsTodayColor = 'bluebg';
	}
	
	else {
		$SeminarsTodayColor = '';
	}
	
if ($StartDate >= $CurrentDate1)
	{

if (stripos($SeminarName, $User)) {
    
	echo "
  <div class='font22 $ActiveBG $SeminarsTodayColor margin20bottom padding20 blacktext blackborder'><span class='centertext boldtext'>$SeminarName $DisplaySeminarStartTime </span>";
    
 
    
 
    
		for ($y = 0; $y <= $PreAttendeeCount; $y++) {
$AttendeeName = $data->seminars[$x]->attendees[$y]->name;
$AttendeeID = $data->seminars[$x]->attendees[$y]->id;
$AttendeeStatusID = $data->seminars[$x]->attendees[$y]->attendee_status_id;
$AttendeeStatus = $data->seminars[$x]->attendees[$y]->attendee_status;
$ContactID = $data->seminars[$x]->attendees[$y]->contact_id;
			
				// Add contact IDs to the phone array
          //  echo $Iterations;
            //if ($Iterations === 3) {
                $Phone = '#';
						array_push($ContactList0, $ContactID);
            //}

$GuestsArray = $data->seminars[$x]->attendees[$y]->guests[0] ?? '';
$GuestID = $data->seminars[$x]->attendees[$y]->guests[0]->id ?? '';
$GuestName = $data->seminars[$x]->attendees[$y]->guests[0]->name ?? '';
			
			
      //The next line was commented out after the upgrade and added the line below it      
    //        $ContactListNumber = sizeof($ContactList[$x]);
			$ContactListNumber = '30';
            
            
			if ($AttendeeStatusID === 1) {
											
				// CHECK IF FINAL CONFIRMATION COMPLETED
		
			array_push($FinalConfirmationCompletedAmount, 1);
		
				$DisplayAttendeeStatus = '&#9989;';
}
			
			elseif ($AttendeeStatusID === 2) {
				
				array_push($InitialConfirmationCompletedAmount, 1);
				
				$DisplayAttendeeStatus = '<i class="fa fa-check yellowtext orangebg"></i>';
			}
			
			elseif ($AttendeeStatusID === 3) {
				$DisplayAttendeeStatus = '<i class="fa fa-phone"></i>';
			}
			
			elseif ($AttendeeStatusID === 5) {
				$DisplayAttendeeStatus = '<i class="fa fa-phone redtext"></i>';
			}
			
			elseif ($AttendeeStatusID === 6) {
				$DisplayAttendeeStatus = '';
			}
			
			else {
				$DisplayAttendeeStatus = '';
			}
			
            
			if ($GuestID == '' || $GuestID == NULL || $GuestName == 'No'){
                        $DisplayGuestStatus = '';
			}
			
			else {
				array_push($FinalGuestsAmount, 1);
				$DisplayGuestStatus = "<i class='fa fa-users purpletext'></i>  <span class='font16'>($GuestName)</span>";

			}
			
            // Display attendee information, name, status, guests,
            
            $RandomNumber = (mt_rand(1,500));
            
			echo "<div class='font18'><a href='https://smf.crm3.redtailtechnology.com/contacts/$ContactID' target='_blank' title='View $AttendeeName in RT'>$AttendeeName</a> $DisplayAttendeeStatus $DisplayGuestStatus <span id='$SeminarName-$AttendeeID-$RandomNumber' data-contactid='$ContactID' class='pointer' title='Show #' onclick='displayPhone(this.id,this.dataset.contactid)'>$Phone</span>";
            
           
            
            echo "<a class='floatright'>";
            
                                // txt Status display
            
            echo "<span id='confirm-text-$SeminarName-$y' class='bluetext'></span>";
            
             // Display CONFIRM ATTENDANCE icon
            
            echo "<button id='confirm-attendance-$SeminarName-$y' class='fa greentext pointer' data-id0='$y' data-contactid='$ContactID' data-name1='$AttendeeName' data-seminarname='$SeminarName' title='confirm attendance for $AttendeeName?'  onclick='confirmAttendance(this.id, this.dataset.contactid, this.dataset.name1, this.dataset.seminarname)'>&#xf111;</button>";
            
            
           // Display NO SHOW icon
            
            echo "<button id='no-show-$SeminarName-$y' class='fa yellowtext pointer' data-id0='$y' data-contactid='$ContactID' data-name1='$AttendeeName' data-seminarname='$SeminarName' title='No show for $AttendeeName?'  onclick='reportNoShow(this.id, this.dataset.contactid, this.dataset.name1, this.dataset.seminarname)'>&#xf111;</button>";
            
          // Display Send Away/Asked to leave icon
            
            echo "<button id='send-away-$SeminarName-$y' class='fa redtext pointer' data-id0='$y' data-contactid='$ContactID' data-name1='$AttendeeName' data-seminarname='$SeminarName' title='Send away $AttendeeName?'  onclick='sendAway(this.id, this.dataset.contactid, this.dataset.name1, this.dataset.seminarname)'>&#xf111;</button>";
            
            echo "</a>";
            
            echo "</div>";
			
		}
    
	
		$ICC = sizeof($InitialConfirmationCompletedAmount) - 1;
		$FCC = sizeof($FinalConfirmationCompletedAmount) - 1;
	    $Guests = sizeof($FinalGuestsAmount) - 1;
		$Total = $FCC + $Guests;
	
	if ($TotalSignUps > 0) {
		$CheckmarkOrNot = '&#9989;';
	}
	
	else {
		$CheckmarkOrNot = '';
	}
    
   
    
    echo 'Ineligible:';
    
                        // PLs are shown here
    
	for ($a = 0; $a <= $b; $a ++) {
     if ($array[$a]['REFERREDBY'] === $SeminarName) {
         ?>
        <a class='inline redtext blackshadow redstrikethrough' target='_blank' class='pointer' href=<?php echo "https://smf.crm3.redtailtechnology.com/contacts/" . $array[$a]['ID'] . " title=" . $array[$a]['NAME'] . ">";
		echo $array[$a]['NAME'];?>
           
           <?php echo "</a>";?>
           
     <?php
     }
	}
    
     /* THE ORIGINAL PL DISPLAY I HAD IN THERE
     foreach ($PLList as $Key1 => $Value1) {
    if ($Value1 === $SeminarName) {
        echo "<a class='redtext blackshadow redstrikethrough' href='https://smf.crm3.redtailtechnology.com/contacts/$PLID' target='_blank' title='view $Key1 in RT (new window)'>";
        echo $Key1;
        echo "</a>";
    }
}*/
    

	echo "<div class='centertext'><span class='yellowtext orangebg'>ICC:  " . $ICC . "</span></div>";
	
	echo "<div class='centertext'><span class='greentext lightgreenbg'>FCC:  " . $FCC . "</span></div>";
    //. "  Guests:  " . $Guests . ;
	
    
    if ($TotalSignUps > 0) {
        $TotalSignUpsTextColor = 'greentext';
        $TotalSignUpsBGColor = 'lightgreenbg';
    }
    else {
        $TotalSignUpsTextColor = 'whitetext';
        $TotalSignUpsBGColor = 'lightredbg';
    }
    
	echo "<div class='font22 centertext boldtext blackborderheavy $TotalSignUpsTextColor $TotalSignUpsBGColor'>Total sign-ups:  " . $TotalSignUps . "</div>";
	

	
  echo "</div>";
		
				$DivNumber = $DivNumber + 1;
}
    
}
    
    $Iterations = $Iterations + 1;
    
}

	?>
	
</div>

<?php

//$DisplayLastUpdatedTime = date('m-d @ H:i', strtotime($DisplayLastUpdatedTime.'-4 hours'));
$DisplayLastUpdatedTime = date('m-d @ H:i');
echo "<p class='font22 bottomright whitetext blackbg'>$DisplayLastUpdatedTime</p>";
?>

<div id='updatestatus' class='center width300height300 yellowbg blackborderheavy borderradius padding20 hideme'>Update status for:  <span id='updatestatusfor'></span>  <i id='iconcloseupdatestatus' class="fa fa-2x floatright pointer" title='Close'>&#xf2d4;</i>
    <p>  <button id='setfcc' class='pointer' onclick='updateFCC()'>FCC</button> <span id='fcclabel'>---</span></p>
    <p>  <button id='seticc' class='pointer' onclick='updateICC()'>ICC</button> <span id='icclabel'>---</span></p>
    <p>  <button id='setleftmessage' class='pointer' onclick='updateLeftMessage()'>Left message</button>  <span id='leftmessagelabel'>---</span></p>
    <p>  <button id='settried' class='pointer' onclick='updateTried()'>Tried, cannot get a hold of</button></p>
</div>

<script src='/AdvisorBoard/js/advisorboard.js' defer></script>

</body></html>

