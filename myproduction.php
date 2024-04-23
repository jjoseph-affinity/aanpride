<?php session_start();

if ($_SESSION['LOGIN'] != "jijiewir2(*#&$374)") {
	echo 'invalid credentials';
    exit();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$AuthKey = "Authorization:  Userkeyauth YWJkZTJiNjYtNmI1NS00Nzk3LWJiZDEtNDk2NTcxMGFkYmE5OjBDNjJGQkFFLTk3QkUtNDNBRC1BRjNFLTAyRUFFQ0I0RTQzRg=="; 

$BaseURL  = 'https://smf.crm3.redtailtechnology.com/api/public/v1/'; //Redtail API v2 BaseURL

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>My Production - AAN Pride</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/aanpride.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php include_once("producerheader.php");?>

    <div class='centertext'>
<p class='inline-block margin5'>Production&nbsp;<span id='productionunchecked' class='fa fa-2x fa-square sub pointer' title='Production'></span></p>
    
<p class='inline-block margin5'>Pending&nbsp;<span id='pendingunchecked' class='fa fa-2x fa-square-o sub pointer' title='Pending'></span></p>    
    </div>
    
    
    
    <div class='centertext'>
<p class='inline-block margin5'>Athene&nbsp;<span id='atheneunchecked' class='fa fa-2x fa-square sub pointer' title='Athene'></span></p>  
    
<p class='inline-block margin5'>F&G&nbsp;<span id='fgunchecked' class='fa fa-2x fa-square-o sub pointer' title='F&G'></span></p>
    
<p class='inline-block margin5'>Allianz&nbsp;<span id='allianzunchecked' class='fa fa-2x fa-square-o sub pointer' title='Allianz'></span></p>
    </div>
    
    
    <div class='centertext'>
<p class='inline-block margin5'>YTD&nbsp;<span id='ytd' class='fa fa-2x fa-circle sub pointer' title='YTD'></span></p>

<p class='inline-block margin5'>Last 90&nbsp;<span id='last90' class='fa fa-2x fa-circle-o sub pointer' title='Last 90'></span></p>
    
<p class='inline-block margin5'>Last 60&nbsp;<span id='last60' class='fa fa-2x fa-circle-o sub pointer' title='Last 60'></span></p>  
    
<p class='inline-block margin5'>Last 30&nbsp;<span id='last30' class='fa fa-2x fa-circle-o sub pointer' title='Last 30'></span></p>  
    
<p class='inline-block margin5'>Custom&nbsp;<span id='custom' class='fa fa-2x fa-circle-o sub pointer' title='Custom dates'></span></p> 
	</div>
--
</div>

<?php 
$ProducerOrgCode = $_SESSION['PRODUCER_ORG_CODE'];
$USCURRENCY = numfmt_create( 'en_US', NumberFormatter::CURRENCY );

echo "<div id='myproductionqueryresults'>";

$serverName = "tcp:aanit.database.windows.net,1433";
$connectionInfo = array("Database"=>"Production", "UID"=>"itaffinity", "PWD"=>"%lF5Wu95dLUd5Sdi");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$query = "SELECT CONVERT(varchar(10),Date1) as Date1, Owner_Name, Producer_Premium FROM AtheneProductionApps2 WHERE Producer_Org_Code = ? ORDER BY Date1 DESC; SELECT SUM(Producer_Premium) AS ProductionAtheneYTDTotal FROM dbo.AtheneProductionApps2 WHERE Producer_Org_Code = '$ProducerOrgCode'";

$params = array($_SESSION['PRODUCER_ORG_CODE']);
$stmt = sqlsrv_query($conn, $query, $params);


$NumberOfEntries = 0;
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){

 
       $FullName = $row['Owner_Name'];
   
                // Remove the unnecessary clutter from the strings

    $FullName = str_ireplace("The"," ",$FullName);
    $FullName = str_ireplace("Family"," ",$FullName);
    $FullName = str_ireplace("Fortress"," ",$FullName);
    $FullName = str_ireplace("Trust"," ",$FullName);
    $FullName = str_ireplace("UAD"," ",$FullName);
    $FullName = str_ireplace(" A ", " ", $FullName);
    $FullName = str_ireplace(" B ", " ", $FullName);
    $FullName = str_ireplace(" C ", " ", $FullName);
    $FullName = str_ireplace(" D ", " ", $FullName);
    $FullName = str_ireplace(" E ", " ", $FullName);
    $FullName = str_ireplace(" F ", " ", $FullName);
    $FullName = str_ireplace(" G ", " ", $FullName);
    $FullName = str_ireplace(" H ", " ", $FullName);
    $FullName = str_ireplace(" I ", " ", $FullName);
    $FullName = str_ireplace(" J ", " ", $FullName);
    $FullName = str_ireplace(" K ", " ", $FullName);
    $FullName = str_ireplace(" L ", " ", $FullName);
    $FullName = str_ireplace(" M ", " ", $FullName);
    $FullName = str_ireplace(" N ", " ", $FullName);
    $FullName = str_ireplace(" O ", " ", $FullName);
    $FullName = str_ireplace(" P ", " ", $FullName);
    $FullName = str_ireplace(" Q ", " ", $FullName);
    $FullName = str_ireplace(" R ", " ", $FullName);
    $FullName = str_ireplace(" S ", " ", $FullName);
    $FullName = str_ireplace(" T ", " ", $FullName);
    $FullName = str_ireplace(" U ", " ", $FullName);
    $FullName = str_ireplace(" V ", " ", $FullName);
    $FullName = str_ireplace(" W ", " ", $FullName);
    $FullName = str_ireplace(" X ", " ", $FullName);
    $FullName = str_ireplace(" Y ", " ", $FullName);
    $FullName = str_ireplace(" Z ", " ", $FullName);
    
    //echo strstr($FullName, preg_match("[0-9]", $FullName), true) ?: $FullName;
    
                        // Remove the date (if there is one)
    
    $FullName = strstr($FullName, preg_match("[0-9]", $FullName), true) ?: $FullName;
    

    
                        // Convert to array
    
    
       $FullName = explode(' ', $FullName);
       $Length = sizeof($FullName);
    
          echo "<div class='flexbox-container-nowrap centertext'>";
       echo "<span class='blackborder'>";
       echo $row['Date1'];
       echo "</span><span class='blackborder'>";
       echo "(" . $row['Owner_Name'] . ")";
    
    
    
       echo "</span><span class='darkgreenbg whitetext blackborder'>";
       echo numfmt_format_currency($USCURRENCY, $row['Producer_Premium'], "USD");
       echo "</span>";
    
      // if (array_search("Family", $FullName)) {
         //  array_splice($FullName,0, $Length - 1, '!');
     //  }

    
        $a = 0;
    echo "<span class='blackborder'>Full =";
    for ($a = 0; $a <= $Length - 1; $a ++) {
        echo $FullName[$a] . '</span>';
        

        
        /*  $index = array_search('The',$FullName);
if($index !== FALSE){
    unset($FullName[$index]);
}
*/
        
    }
    
    echo "<span class='blackborder'>(" . sizeof($FullName) . ')</span>';
    
    
        if (sizeof($FullName) === 2) {
            $LastName = $FullName[1];
            $FirstName = $FullName[0];
            echo "<span id='lastname-$NumberOfEntries' class='blackborder'>$LastName</span>";
            echo "<span id='firstname-$NumberOfEntries' class='blackborder'>$FirstName</span>";
        }
    
    else  {
            $LastName = $FullName[2];
            $FirstName = "Unknown";
            echo "<span id='lastname-$NumberOfEntries' class='blackborder'>$LastName</span>";
            echo "<span id='firstname-$NumberOfEntries' class='blackborder'>$FirstName</span>";
    }
 
    echo "<span id='info-$NumberOfEntries'>Source =</span><br>";
 
       echo "</div><br>";
    $NumberOfEntries = $NumberOfEntries + 1;
}

                        // SEARCH FOR A CONTACT BY FIRST & LAST NAME

$FirstName = 'June';
$LastName = 'Kikkawa';

$a = 1;
$b = 1;
$http_code0 = '';
while ($a <= 4 && $http_code0 !== 200) {
   
$curl0 = curl_init();
$GetQueryURL = "contacts/search?last_name=$LastName&first_name=$FirstName";

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
$WritingAdvisor = $data0->contacts[0]->writing_advisor ?? '';


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

echo 'Writing Advisor is:' . $WritingAdvisor . '<br>';
echo 'Referred By is:' . $ReferredBy . '<br>';
    
// Move to the next result and display results.
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
       echo "<p class='centertext blackborder margin10-top padding10 orangebg whitetext'>";
       echo numfmt_format_currency($USCURRENCY, $row['ProductionAtheneYTDTotal'], "USD");
       echo "</p>";
   }
} elseif( is_null($next_result)) {
     echo "No Athene writing.<br />";
} else {
     die(print_r(sqlsrv_errors(), true));
}


/*



$USCURRENCY = numfmt_create( 'en_US', NumberFormatter::CURRENCY );
$QueryAthene = "SELECT CONVERT(varchar(10),Date1) as Date1, Producer_Premium FROM dbo.AtheneProductionApps2 WHERE Producer_Org_Code = $_SESSION['PRODUCER_ORG_CODE'] ORDER BY Date1 DESC";
$QUERYATHENEPENDINGALLTIME = "SELECT CONVERT(varchar(10),App_Signed_Date) As Date2, Anticipated_Premium FROM dbo.AthenePendingApps WHERE Agent_Name LIKE '%hall%' ORDER BY Date2 DESC";
$QUERYATHENETOTAL = "SELECT SUM(Agent_Premium) AS AgentTotal FROM dbo.AtheneProductionApps WHERE Agent_Name LIKE '%hall%'";
$stmt = sqlsrv_query( $conn, $QueryAthene);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
echo "<div class='grid-container'><p>Athene (production, YTD)</p>";

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
echo "<div class='grid-item'>";
	echo $row['Date1'] . "  ";
	//echo $row['Product_Name'] . '     ';
	//echo $row['Agent_Premium'];
	echo numfmt_format_currency($USCURRENCY, $row['Agent_Premium'], "USD");
    
	echo "</div>";
	//echo $row['Anticipated_Premium'] . "  ";
}

$stmt = sqlsrv_query( $conn, $QUERYATHENETOTAL);

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	echo "<p class='bottomright orangebg padding10 dayssansblack borderround'>Grand total:  </p>";
echo "<div class='grid-item'>Total:  ";
	echo numfmt_format_currency($USCURRENCY, $row['AgentTotal'], "USD");
echo "</div>";
}

/*echo "Athene (Pending, All time)";

$stmt = sqlsrv_query( $conn, $QUERYATHENEPENDINGALLTIME);

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
echo "<div class='grid-item'>";
	echo $row['Date2'] . "  ";
	//echo $row['Product_Name'] . '     ';
	//echo $row['Agent_Premium'];
	echo numfmt_format_currency($USCURRENCY, $row['Anticipated_Premium'], "USD");
	echo "</div>";
	//echo $row['Anticipated_Premium'] . "  ";
}
*/


echo "</div>";
?>
	<!--<script src='/js/producerheader.js' defer></script>-->
	<script src='/js/myproduction.js' defer></script>
	</body>
</html>
