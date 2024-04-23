<?php 
//if ($_POST['text1'] == '@ffiniTy5050%*%*'){

?><!DOCTYPE html><head>
<meta charset="utf-8">
<title>Leaderboard 2023</title>
	 <link rel="icon" type="image/x-icon" href="../images/lion2.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/Leaderboard/css/leaderboard.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class='leaderboardbg'>

<div class='flex-container-mobile'>
		<img height='50' width='80' src='/Leaderboard/images/leaderboard-lion-logo-transparent-orange.png'>
		<a class='leaderboardheader font16 graytext'>
		WELCOME TO THE PRIDE</a>
	</div>
	
<?php
$RANK = 1;

require ("../../gestalt.php");

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$CURDATE = date('Y-m-d H:i:s.u');

$seminarstartdate = '%2023%';
	

		$params = array(1,2);

		$stmt = sqlsrv_prepare($conn, "SELECT DISTINCT TOP 5 Date1, Producer_Premium, ShortName FROM AtheneProductionApps2 
INNER JOIN Junction2 ON Producer_Org_Code = AtheneID WHERE Producer_Premium > 0 
ORDER BY Date1 DESC;
	
	
						with 
cte_AP1 AS (select Producer_Org_Code, SUM(Producer_Premium) AS AtheneProduction FROM dbo.AtheneProductionApps2 GROUP BY Producer_Org_Code),
cte_FGP1 AS (select Writing_Agent_Number, SUM(Annualized_Annuity) AS FGProduction FROM dbo.FGProductionApps2 WHERE Line_of_Business LIKE '%Annuity%' GROUP BY Writing_Agent_Number),
cte_AllP1 AS (select Writing_Agent_Number3, SUM(Accumulation_Annuitization_Value) AS AllianzProduction FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Annuity%' AND Policy_Status LIKE '%Inforce%' GROUP BY Writing_Agent_Number3),

cte_AP2 AS (SELECT Producer_Org_Code, SUM(CASE
            WHEN Producer_Org_Split = '1'
               THEN Anticipated_Premium_Amount
               ELSE Anticipated_Premium_Amount * .5
       END) AS AthenePending FROM dbo.AthenePendingApps3 WHERE Requirements_Description = 'Application' GROUP BY Producer_Org_Code),

cte_FGP2 AS (SELECT Writing_Agent_Number, SUM(Target_Premium) AS FGPending FROM dbo.FGPendingApps2 WHERE Status LIKE '%Pending%' GROUP BY Writing_Agent_Number),

cte_AllP2 AS (SELECT Writing_Agent_Number3, SUM(Accumulation_Annuitization_Value) AS AllianzPending FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Annuity%' AND Policy_Status LIKE '%Pending%' GROUP BY Writing_Agent_Number3)

SELECT TOP 30 junc2.ShortName,
       COALESCE(SUM(AP1.AtheneProduction),0) AS AtheneProduction,
       COALESCE(SUM(FGP1.FGProduction),0) AS FGProduction,
       COALESCE(SUM(AllP1.AllianzProduction),0) AS AllianzProduction,
	   COALESCE(SUM(AP2.AthenePending),0) AS AthenePending,
	   COALESCE(SUM(FGP2.FGPending),0) AS FGPending,
	   COALESCE(SUM(AllP2.AllianzPending),0) AS AllianzPending,
       COALESCE(SUM(AP1.AtheneProduction),0)  + COALESCE(SUM(FGP1.FGProduction),0) + COALESCE(SUM(AllP1.AllianzProduction),0) AS TotalProduction,
	   COALESCE(SUM(AP2.AthenePending),0) + COALESCE(SUM(FGP2.FGPending),0) + COALESCE(SUM(AllP2.AllianzPending),0) AS TotalPending

 FROM Junction2 junc2
  LEFT
  JOIN cte_AP1 AP1 ON junc2.AtheneID = AP1.Producer_Org_Code
  LEFT
  JOIN cte_FGP1 FGP1 ON junc2.FGAnnuityID = FGP1.Writing_Agent_Number
  LEFT
  JOIN cte_AllP1 AllP1 ON junc2.AllianzID = AllP1.Writing_Agent_Number3
  LEFT
  JOIN cte_AP2 AP2 ON junc2.AtheneID2 = AP2.Producer_Org_Code  
  LEFT
  JOIN cte_FGP2 FGP2 ON junc2.FGID = FGP2.Writing_Agent_Number
  LEFT
  JOIN cte_AllP2 AllP2 ON junc2.AllianzID = AllP2.Writing_Agent_Number3
 GROUP BY junc2.ShortName
 ORDER BY TotalProduction DESC, TotalPending DESC;
 
 
		SELECT SUM(Producer_Premium) AS TotalAtheneProduction2023 FROM dbo.AtheneProductionApps2 WHERE Date1 LIKE '%2023%';  
		
		SELECT SUM(Annualized_Annuity) AS TotalFGProduction2023 FROM dbo.FGProductionApps2 WHERE Line_of_Business = 'Annuity' AND Process_Date LIKE '%2023%';
	
		SELECT SUM(Accumulation_Annuitization_Value) AS TotalAllianzProduction2023 FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Annuity%' AND Policy_Effective_Date LIKE '%2023%';
	
		SELECT SUM(Anticipated_Premium_Amount) AS TotalAthenePending FROM dbo.AthenePendingApps3 WHERE Requirements_Description = 'Application';
		
		SELECT SUM(Annualized_Annuity) AS TotalFGAnnuityPending FROM dbo.FGProductionApps2 WHERE Line_of_Business LIKE '%Annuity%';
		
        SELECT SUM(Accumulation_Annuitization_Value) AS TotalAllianzAnnuityPending FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Annuity%';

with 
cte_table1 AS (SELECT Writing_Agent_Number, SUM(Annualized_Life) AS FGLifeProduction from dbo.FGProductionApps2 WHERE Line_of_Business LIKE '%Life%' GROUP BY Writing_Agent_Number),
cte_table2 AS (SELECT Writing_Agent_Number3, SUM(Accumulation_Annuitization_Value) AS AllianzLifeProduction FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Life%' AND Policy_Status LIKE '%Inforce%' GROUP BY Writing_Agent_Number3),
cte_table3 AS (SELECT Writing_Agent_Number3, SUM(Accumulation_Annuitization_Value) AS AllianzLifePending FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Life%' AND Policy_Status LIKE '%Pending%' GROUP BY Writing_Agent_Number3)

SELECT TOP 9 junc2.ShortName AS AliasLife,
       COALESCE(SUM(table1.FGLifeProduction),0) AS FGLifeProduction,
       COALESCE(SUM(table2.AllianzLifeProduction),0) AS AllianzLifeProduction,
	   COALESCE(SUM(table3.AllianzLifePending),0) AS AllianzLifePending,
       COALESCE(SUM(table1.FGLifeProduction),0) + COALESCE(SUM(table2.AllianzLifeProduction),0) AS TotalLifeProduction

 FROM Junction2 junc2
  LEFT
  JOIN cte_table1 table1 ON junc2.FGID = table1.Writing_Agent_Number
  LEFT
  JOIN cte_table2 table2 ON junc2.AllianzID = table2.Writing_Agent_Number3
  LEFT
  JOIN cte_table3 table3 ON junc2.AllianzID2 = table3.Writing_Agent_Number3
 GROUP BY junc2.ShortName
 ORDER BY TotalLifeProduction DESC, AllianzLifePending DESC;
 
 
 SELECT SUM(Annualized_Life) AS TotalFGProductionLife FROM dbo.FGProductionApps2 WHERE Product_Type_Description LIKE '%Life%';
 
SELECT SUM(Accumulation_Annuitization_Value) AS TotalAllianzProductionLife FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Life%' AND Policy_Status LIKE '%Inforce%';

SELECT SUM(Accumulation_Annuitization_Value) AS TotalAllianzPendingLife FROM dbo.AllianzProductionApps2 WHERE (Policy_Effective_Date LIKE '%2022%' OR Policy_Effective_Date LIKE '%2023%') AND Product LIKE '%Life%' AND Policy_Status LIKE '%Pending%';
 ", $params);
	
sqlsrv_execute($stmt);

		echo "<p class='marquee-mobile height25 whiteborder whitetext'>";
	$Rank = 1;

	echo "<section class='enable-animation'>
  <div class='marquee'>
    <ul class='marquee__content'>";
	
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        
        	if ($Rank == 1 || $Rank == 3 || $Rank == 5){
				$ActiveColor = 'whitetext';
			}
			elseif ($Rank == 2 || $Rank == 4){
				$ActiveColor = 'orangetext';
			}
        
  echo "<li>1</li>
       <li>2</li>
       <li>3</li>
       <li>4</li>
       <li>5</li>
       <li>6</li>";
		
		
		$Rank = $Rank + 1;
	}
	
	  echo "</ul>
  </div>
</section>";
	
	echo "</p>";
	
	       // Get last time the date of this file was modified
    
    $LastModified = filemtime('leaderboard-mobile.php');
      
		echo "<div id='annuities' class='centertext padding10'><p class='shadow boldtext graytext padding10'><span>ANNUITIES</span> - 
		Updated:  " . date("D, M d", $LastModified);
		echo "</p>";
	
echo "<div class='grid-4-columns centertext boldtext graytext padding5topbottom'>";
echo "<p class='shadow boxshadow'>Name</p>";
echo "<p class='shadow boxshadow'>Rank</p>";
echo "<p class='shadow boxshadow'>Production</p>";
echo "<p class='shadow boxshadow'>Pending</p>";
echo "</div>";	
	

echo "<div class='grid-4-columns centertext boldtext'>";	
	
													//3rd Statement (Big Annuity Section Listings)

$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
	   
	 	if ($RANK == 1 || $RANK == 3 || $RANK == 5 || $RANK == 7 || $RANK == 9 || $RANK == 11 || $RANK == 13 || $RANK == 15 || $RANK == 17 || $RANK == 19 || $RANK == 21 || $RANK == 23 || $RANK == 25 || $RANK == 27 || $RANK == 29){
		$ActiveColor = 'whitetext';
	}
	else if ($RANK == 2 || $RANK == 4 || $RANK == 6 || $RANK == 8 || $RANK == 10 || $RANK == 12 || $RANK == 14 || $RANK == 16 || $RANK == 18 || $RANK == 20 || $RANK == 22 || $RANK == 24 || $RANK == 26 || $RANK == 28 || $RANK == 30){
		$ActiveColor = 'orangetext';
	}  
	   
	   if ($RANK == 1 || $RANK == 2  || $RANK == 3 || $RANK == 4 || $RANK == 5) {
	$Top5 = 'gold';
}	

else {$Top5 = '';
}
	   
	   $DisplayTotalProduction = "$" . number_format($row['TotalProduction'], 2, ".", ",");
	        $DisplayTotalPending = $row['AthenePending'] + $row['FGPending'] + $row['AllianzPending'];
	    $DisplayTotalPending = "$" . number_format($DisplayTotalPending, 2, ".", ",");
	   
	   	   		// calculate totals for athene pending
	   
echo "<p class='padding7 shadow $ActiveColor'>" . $row['ShortName'] . "</p>";	   
echo "<p class='padding7 shadow $ActiveColor'>" . $RANK . "</p>"; 
echo "<p class='padding7 shadow $ActiveColor'>" . $DisplayTotalProduction . "</p>"; 
echo "<p class='padding7 shadow $ActiveColor'>" . $DisplayTotalPending . "</p>";

$RANK = $RANK + 1;	
   }
}
echo "</div>";
											// 4th STATEMENT - Athene Data Totals

$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalAtheneProduction2023 = $row['TotalAtheneProduction2023'];    
   }
}
	
											// 5th STATEMENT - FG Data Totals
	$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalFGProduction2023	 = $row['TotalFGProduction2023'];     
   }
}
	
											// 6th STATEMENT - Allianz Data Totals
	
		$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalAllianzProduction2023	 = $row['TotalAllianzProduction2023'];     
   }
}
	$DisplayTotalAtheneProduction = "$" . number_format($TotalAtheneProduction2023, 2, ".", ",");
	$DisplayTotalFGProduction = "$" . number_format($TotalFGProduction2023, 2, ".", ",");
	$DisplayTotalAllianzProduction = "$" . number_format($TotalAllianzProduction2023, 2, ".", ",");
	
	$TotalProduction2023 = $TotalAtheneProduction2023 + $TotalFGProduction2023 + $TotalAllianzProduction2023;
	
	$DisplayTotalProduction2023 = "$" . number_format($TotalProduction2023, 2, ".", ",");
	
	echo "<p class='bodoni centertext whitetext'>";
	
	
													// 7th Statement Athene Pending TOTALS
			$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalAthenePending2023	 = $row['TotalAthenePending'];   
	  // echo $TotalAthenePending2023;
   }
}

														// 8th Statement FG Pending Annuity TOTALS
			$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalFGAnnuityPending2023	 = $row['TotalFGAnnuityPending'];   
	 //  echo $TotalFGAnnuityPending2023;
   }
}
    
      												// 9th Statement Allianz Pending Annuity TOTALS
			$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalAllianzAnnuityPending2023	 = $row['TotalAllianzAnnuityPending'];   
   }
}
	
	$TotalPending2023 = $TotalAthenePending2023 + $TotalFGAnnuityPending2023 + $TotalAllianzAnnuityPending2023;
	$DisplayTotalPending2023 = "$" . number_format($TotalPending2023, 2, ".", ",");
	
	
		echo "<p class='padding20'><a class='gold shadow blackbg whitetext font16 borderround padding10'>Current Production:  "  . $DisplayTotalProduction2023 . "</a></p>";
	
	echo "<p class='padding20'><a class='gold shadow blackbg whitetext font18 borderround padding10'>Current Pending:   $DisplayTotalPending2023



</a>";
	echo "</p>";
	echo "</div>";
    
	echo "<div id='life' class='centertext padding10'><p class='shadow boldtext graytext padding10'><span>ANNUITIES</span> - 
		Updated:  " . date("D, M d", $LastModified);
		echo "</p>";

	
	echo "<div class='grid-4-columns centertext boldtext graytext padding20'>";
echo "<p class='shadow boxshadow'>Name</p>";
echo "<p class='shadow boxshadow'>Rank</p>";
echo "<p class='shadow boxshadow'>Production</p>";
echo "<p class='shadow boxshadow'>Pending</p>";
echo "</div>";	

													//9th Statement (Big Life Section Listings)

	echo "<div class='grid-4-columns centertext boldtext'>";
	$RANKLIFE = 1;
	
$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
	   
	 	if ($RANKLIFE == 1 || $RANKLIFE == 3 || $RANKLIFE == 5 || $RANKLIFE == 7 || $RANKLIFE == 9 || $RANKLIFE == 11 || $RANKLIFE == 13 || $RANKLIFE == 15 || $RANKLIFE == 17 || $RANKLIFE == 19 || $RANKLIFE == 21){
		$ActiveColor = 'orangetext';
	}
	else if ($RANKLIFE == 2 || $RANKLIFE == 4 || $RANKLIFE == 6 || $RANKLIFE == 8 || $RANKLIFE == 10 || $RANKLIFE == 12 || $RANKLIFE == 14 || $RANKLIFE == 16 || $RANKLIFE == 18 || $RANKLIFE == 20 || $RANKLIFE == 22){
		$ActiveColor = 'whitetext';
	} 

if ($RANKLIFE == 1 || $RANKLIFE == 2 || $RANKLIFE == 3 || $RANKLIFE == 4 || $RANKLIFE == 5) {
	$Top5_life = 'gold';
}	


else {$Top5_life = '';
}
	   
	   $DisplayTotalLifeProduction = "$" . number_format($row['TotalLifeProduction'], 2, ".", ",");
	    $DisplayTotalPending = "$" . number_format($row['AllianzLifePending'], 2, ".", ",");

	   
echo "<p class='padding5topbottom shadow $ActiveColor'>" . $row['AliasLife'] . "</p>";	   
echo "<p class='padding5topbottom shadow $ActiveColor'>" . $RANKLIFE . "</p>"; 
echo "<p class='padding5topbottom shadow $ActiveColor'>" . $DisplayTotalLifeProduction . "</p>"; 
//echo "<p class='padding20 $ActiveColor'>" . $DisplayTotalPending . "</p>";
	   echo "<p class='padding5topbottom shadow $ActiveColor'>" . $DisplayTotalPending . "</p>";	
$RANKLIFE = $RANKLIFE + 1;	
   }
}
	
	echo "<div class='padding20'> </div>";	   
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";
	echo "<div class='padding20'> </div>";	
	echo "<div class='padding20'> </div>";	
	
						// 10TH Statement Total for FGProduction LIFE
	
	$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalFGProductionLife = $row['TotalFGProductionLife'];    
   }
}
	
							// 11TH Statement Total for AllianzProduction LIFE
	
	$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalAllianzProductionLife = $row['TotalAllianzProductionLife'];    
   }
}
	
								// 12TH Statement Total for AllianzPending LIFE
	
	$next_result = sqlsrv_next_result($stmt);
if( $next_result ) {
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
$TotalAllianzPendingLife = $row['TotalAllianzPendingLife'];    
   }
}
					//TOTALS FOR LIFE PRODUCTION AND PENDING
	$TotalLifeProduction = $TotalFGProductionLife + $TotalAllianzProductionLife;
	$TotalLifePending = $TotalAllianzPendingLife;
	$DisplayTotalLifeProduction = "$" . number_format($TotalLifeProduction, 2, ".", ",");
	$DisplayTotalLifePending = "$" . number_format($TotalLifePending, 2, ".", ",");
	
		
echo "</div>";
		
	
	echo "<p class='padding20'><a class='gold shadow blackbg whitetext font16 borderround padding10'>Current Production:  "  . $DisplayTotalLifeProduction . "</a></p>";
	
	echo "<p class='padding20'><a class='gold shadow blackbg whitetext font18 borderround padding10'>Current Pending:   $DisplayTotalLifePending</a>";
	echo "</p>";
	
	
?>

</div>

<script src='/Leaderboard/js/leaderboard2.js' defer></script>

	</body>
	</html>

<?php
	//}
?>