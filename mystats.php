<?php session_start(); 

if ($_SESSION['LOGIN'] != "jijiewir2(*#&$374)") {
exit("Not Authenticated.");
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html><head>
<meta charset="utf-8">
<title>My Stats - AAN Pride</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/aanpride.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php


include_once('producerheader.php');

include_once ("../gestalt.php");

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$CURDATE = date('Y-m-d H:i:s.u');
//$USCURRENCY = numfmt_create( 'en_US', NumberFormatter::CURRENCY );

$seminarstartdate = '%2022%';
$params = array($_SESSION['UserName'], $seminarstartdate);
$stmt = sqlsrv_prepare($conn, "SELECT CONVERT(varchar(12),seminar_startdate) as Date1, seminar_startdate, seminar_name, attendees, uniques, sets, desc_food_cost FROM dbo.Redtail_Retail_Seminars WHERE seminar_name LIKE ? AND seminar_startdate LIKE ? ORDER BY seminar_startdate DESC; SELECT SUM(attendees) AS TotalAttendees, SUM(uniques) AS TotalUniques, SUM(sets) AS TotalSets, SUM(Canceled) As TotalCanceled, SUM(desc_food_cost) AS TotalFoodCost FROM dbo.Redtail_Retail_Seminars WHERE Presenter LIKE '%Voyageur Canton%' AND seminar_startdate LIKE '%2022%'; SELECT COUNT(seminar_name) AS TotalPresented FROM dbo.Redtail_Retail_Seminars WHERE (seminar_name NOT LIKE '%CANCELLED%' OR seminar_name NOT LIKE '%CXL%' OR seminar_description NOT LIKE '%CANCELLED%') AND Presenter LIKE '%Voyageur Canton%' AND seminar_startdate LIKE '%2022%';  SELECT AVG(Attendees) AS AvgAttendees, AVG(Uniques) As AvgUniques, AVG(Sets) AS AvgSets, AVG(desc_food_cost) AS AvgFoodCost FROM dbo.Redtail_Retail_Seminars WHERE seminar_name LIKE '%Civiello%' AND seminar_startdate LIKE '%2022%'; SELECT COUNT(seminar_startdate) AS FutureSeminars FROM dbo.Redtail_Retail_Seminars WHERE seminar_name LIKE '%Civiello%' AND seminar_startdate > '2022-09-26';SELECT SUM(Agent_Premium) AS AtheneAnnuityUser FROM dbo.AtheneProductionApps WHERE date LIKE '%2022%' AND agent_id ='{$_SESSION['AtheneAgentId']}';  SELECT SUM(AnnualizedAnnuity) AS FGAnnuityUser FROM dbo.FGProductionApps WHERE WritingAgentNumber = '{$_SESSION['FGAgentId']}' AND LineOfBusiness = 'Annuity' AND ProcessDate LIKE '%2022%';  SELECT SUM(AccumulationAnnuitizationValue) AS AllianzAnnuityUser FROM dbo.AllianzProductionApps WHERE WritingAgentNumber = '{$_SESSION['AllianzAgentId']}' AND PolicyEffectiveDate LIKE '%2022%' AND Product LIKE '%Annuity%';  SELECT SUM(TargetPremium) AS FGLifeUser FROM dbo.FGProductionApps WHERE WritingAgentNumber = '{$_SESSION['FGAgentId']}' AND LineOfBusiness = 'Life' AND ProcessDate LIKE '%2022%';  SELECT SUM(AccumulationAnnuitizationValue) AS AllianzLifeUser FROM dbo.AllianzProductionApps WHERE WritingAgentNumber = '{$_SESSION['AllianzAgentId']}' AND PolicyEffectiveDate LIKE '%2022%' AND Product LIKE '%Life%'", $params);

sqlsrv_execute($stmt);

echo "<div class='grid-6-columns'>";
	echo "<p class='bold'>Date</p>
	<p  class='bold'>Venue</p>
	<p  class='bold'>A</p>
	<p  class='bold'>U</p>
	<p  class='bold'>S</p>
	<p  class='bold'>$</p>
	";

													// 1st STATEMENT

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	
echo "<p>" . substr($row['Date1'], 0, 6);
	//$DATETOUSE=date_create_from_format("Y-m-d",$row['Date1']);
	//echo '-' . $DATETOUSE;

	$NEWDATEFROMDB = date_format($row['seminar_startdate'],"Y-m-d H:i:s.u");

	
	if ($NEWDATEFROMDB > $CURDATE){
		echo "<span class='bold'> *</span>";
	}
	echo "</p>";
	
	echo "<p>";	
	
	$FirstThree = substr($row['seminar_name'], 0, 3);
$redtext = '';
	$strikethrough = '';

	
	if ($FirstThree === 'CAN' || $FirstThree === 'CXL')
	{
$redtext = 'redtext';
$strikethrough = 'strikethrough';
	}
	
	echo "<span class='$redtext $strikethrough'>" . $row['seminar_name'] . "</span>";
	
	echo "</p>";
	echo "<p>";
	echo $row['attendees'];
	echo "</p>";
	echo "<p>" . $row['uniques'] . "</p>";
	echo "<p>" . $row['sets'] . "</p>";
	
	$foodcost = "  $" . number_format($row['desc_food_cost'], 2, ".", ",");
	
	echo "<p>" . $foodcost . "</p>";
		
}
echo "</div>";
											// TOTALS FOR SEMINAR DATA
											//TOTAL CANCELS, ATTENDEES, UNIQUES, SETS, AND FOOD COST
											// 2nd STATEMENT
echo "<div class='flex-container-space-around graybg'>";
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
      echo "<p class='bold'>Cancelled:  " . $row['TotalCanceled'] . "</p>";
	   echo  "<p class='bold'>Total:  </p>";
	         echo  "<p class='bold'>Attendees:  " . $row['TotalAttendees'] . "</p>";
   echo "<p class='bold'>Uniques:  " . $row['TotalUniques'] . "</p>";
	    echo  "<p class='bold'>Sets:  " . $row['TotalSets'] . "</p>";
	    echo  "<p class='bold'>Food:  " . $row['TotalFoodCost'] . "</p>";
   }
}
								
echo "</div>";

													//TOTAL PRESENTED ONLY
													// 3rd STATEMENT
echo "<div class='flex-container-space-around graybg'>";
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
      echo "<p class='bold'>Presented:  " . $row['TotalPresented'] . "</p>";

   }
}
													//AVERAGES FOR ATTENDEES, UNIQUES, SETS, FOOD COST
													// 4th STATEMENT
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$AvgFoodCostDisplay = number_format($row['AvgFoodCost'],2);
    echo  "<p class='bold'>Average:</p>";
	    echo  "<p class='bold'>Attendees:  " . $row['AvgAttendees'] . "</p>";
   echo "<p class='bold'>Uniques:  " . $row['AvgUniques'] . "</p>";
	    echo  "<p class='bold'>Sets:  " . $row['AvgSets'] . "</p>";
	    echo  "<p class='bold'>Food  :  $" . $AvgFoodCostDisplay . "</p>";
   }
}

echo "</div>";

echo "<p class='centertext bold graybg'>Percent complete:  ???</p>";
													// FUTURE SEMINARS
													// 5th STATEMENT
echo "<div class='grid-3-columns'>
<p class='bold'>Metric</p><p class='bold'>Count</p><p class='bold'>% of Total</p>

<p>Registered for a future seminar</p>";

$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
      echo  "<p>" . $row['FutureSeminars'] . "</p>";
	   $futurepercent = $row['FutureSeminars']/30 * 100;
	  echo  "<p>" . number_format($futurepercent,1) . "</p>";
   }
}
echo "</div>";


													//ATHENE ANNUITY
													// 6th STATEMENT
echo "<div class='flex-container-space-around'>";
echo "<div class='inline-block center padding20 greenborder'>";
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
//$AvgFoodCostDisplay = number_format($row['AvgFoodCost'],2);
	   
	   	$USD = "  $" . number_format($row['AtheneAnnuityUser'], 2, ".", ",");
	   
echo "<p>Athene Annuity:  " . $USD . "</p>";
	   
	   $_SESSION['AtheneAnnuityUser'] = $row['AtheneAnnuityUser'];
   }
}

													//F&G ANNUITY
													// 7th STATEMENT
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
//$AvgFoodCostDisplay = number_format($row['AvgFoodCost'],2);
	   
	   	$FGAnnuity = "  $" . number_format($row['FGAnnuityUser'], 2, ".", ",");
	   
echo "<p>F&G Annuity:  " . $FGAnnuity . "</p>";
	   $_SESSION['FGAnnuityUser'] = $row['FGAnnuityUser'];
   }
}

													//ALLIANZ ANNUITY
													// 8th STATEMENT
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
//$AvgFoodCostDisplay = number_format($row['AvgFoodCost'],2);
	   
	   	$AllianzAnnuity = "  $" . number_format($row['AllianzAnnuityUser'], 2, ".", ",");   
	   
	   $_SESSION['AllianzAnnuityUser'] = $row['AllianzAnnuityUser'];
   }
}
													// TOTALS FOR ANNUITY

$_SESSION['TotalAnnuity'] = $_SESSION['AtheneAnnuityUser'] + $_SESSION['FGAnnuityUser'] + $_SESSION['AllianzAnnuityUser'];

echo "<p class='greenbg'> -</p>";

   	$TotalAnnuity = "  $" . number_format($_SESSION['TotalAnnuity'], 2, ".", ",");

echo "<p class='bold'>Total Annuity:  " . numfmt_format_currency($USCURRENCY, $_SESSION['TotalAnnuity'], "USD");

echo "</div>";

													//F&G LIFE
													// 9th STATEMENT
echo "<div class='inline-block center padding20 greenborder'>";
echo "<p>Global Life:  $0</p>";
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
//$AvgFoodCostDisplay = number_format($row['AvgFoodCost'],2);
echo "<p>F&G Life:  " . numfmt_format_currency($USCURRENCY, $row['FGLifeUser'], "USD") . "</p>";
   }
}

													//ALLIANZ LIFE
													// 10th STATEMENT

$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
//$AvgFoodCostDisplay = number_format($row['AvgFoodCost'],2);
echo "<p>Allianz Life:  " . numfmt_format_currency($USCURRENCY, $row['AllianzLifeUser'], "USD") . "</p>";
   }
}

echo "<p class='greenbg'> -</p>";

echo "<p class='bold'>Total Life:  " . numfmt_format_currency($USCURRENCY, $_SESSION['TotalLife'], "USD");

echo "</div>";

echo "<div class='inline-block center padding20 greenborder'>";
echo "<p>Kai-Zen:  $0</p>";
echo "<p>AANW:  ?</p>";
echo "</div>";
echo "</div>";

echo "<p>Needs called to confirm 1st Appointment</p><p></p><p></p>
<p>Currently and actively working</p><p></p><p></p>
<p>Completed financial business with (i.e., Client)</p><p></p><p></p>
<p>No show to seminar</p><p></p><p></p>
<p>Attended seminar, not interested in meeting</p><p></p><p></p>
<p>Cancelled or no-show 1st appointment</p><p></p><p></p>
<p>Loss</p><p></p><p></p>
<p>Legal-only case</p><p></p><p></p>
<p class='bold'>Total</p><p class='bold'></p><p class='bold'></p>
";

echo "</div>";

sqlsrv_free_stmt($stmt);


echo "<p class='bold'>Production:</p>";
echo "<p>Annuity production data is closed business as reported by carrier’s portal for the time period covered in this report. Life values are Commissionable Target Premiums. AANW is Affinity Advisory Network Wealth (managed money with RIA).";

echo "<div class='grid-3-columns'><p class='inline-block'>Athene Annuity  000,000,000</p>

</div>";
	
?>





















<br><br><br><br><br><br><br><br>

<div class='graybg'>
	
<p class='dayssansblack padding10'>Seminars Awaiting Data (0): 	14</p>
<p class='dayssansblack whitetext padding10'>Seminar Attendees: 	121</p>
<p class='dayssansblack whitetext padding10'> <?php echo $_SESSION['TotalAttendees']; ?> </p>
<p class='dayssansblack padding10'>Seminar Uniques: 	75</p>
<p class='dayssansblack padding10'> <?php echo $_SESSION['TotalUniques']; ?> </p>
<p class='dayssansblack whitetext padding10'>Seminar Sets: 	47</p>
<p class='dayssansblack whitetext padding10'> <?php echo $_SESSION['TotalSets']; ?> </p>
<p class='dayssansblack padding10'>Seminar Set Rate: (65%) 	63%</p>
<p class='dayssansblack whitetext padding10'>Prospects: 	18 (38%)</p>
<p class='dayssansblack padding10'>Clients: 	3 (6%)</p>
<p class='dayssansblack whitetext padding10'>No Show Seminar: 	18</p>
<p class='dayssansblack padding10'>Attendee Did Not Set: 	21</p>
<p class='dayssansblack whitetext padding10'>Cancelled / No Show 1st Appt: 	4 (9%)</p>
<p class='dayssansblack whitetext padding10'> <?php echo $_SESSION['TotalCanceled']; ?> </p>
<p class='dayssansblack padding10'>Loss: 	7 (15%)</p>
<p class='dayssansblack whitetext padding10'>Close Rate: (20%) 	30%</p>
<p class='dayssansblack padding10'>BSR: (100) 	150</p>
<p class='dayssansblack whitetext padding10'>Efficiency Score: (100) 	70</p>
<p class='dayssansblack padding10'>1st to 2nd Retention: (75%) 	16 (48%)</p>
<p class='dayssansblack whitetext padding10'>Average Meetings Per Week: 	9</p>
<p class='dayssansblack padding10'>Annuity Case Count: 	12</p>
<p class='dayssansblack whitetext padding10'>Annuity Premium: 	$2,263,518.03</p>
<p class='dayssansblack padding10'>IUL Target Premium: 	$541.77</p>
      
    </div >
	
	<div>
	
	
	</div>
	
	<script src='/js/producerheader.js' defer></script>
	<script src='/js/mystats.js' defer></script>
</body></html>