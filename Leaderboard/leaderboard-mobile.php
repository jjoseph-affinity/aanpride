<?php 
//if ($_POST['text1'] == '@ffiniTy5050%*%*'){

?><!DOCTYPE html><head>
<meta charset="utf-8">
<title>Leaderboard 2024</title>
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
    
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
    
$RANK = 1;

require ("../../gestalt.php");
    
$username1 = $_GET['username1'];    
$text1 = $_GET['text1'];
$Credentials = array($username1, $text1);

date_default_timezone_set('America/New_York');

$Date = date("Y-m-d");    
$TrueTime = date("Gi");
$DisplayTime = date("g:i A");
    
  function logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime)  {
            
$params1 = array($Alias, $Date, $TrueTime, $DisplayTime);
$stmt1 = sqlsrv_prepare($conn, "INSERT INTO LeaderBoardLogin VALUES(?, ?, ?, ?)", $params1);
$rows_affected = 0;
$a = 1;
$b = 1;
$RowInserted = 'No';
while ($a <= 4 && $rows_affected === 0 && $RowInserted = 'No') {
    
sqlsrv_execute($stmt1);
    
$rows_affected = sqlsrv_rows_affected($stmt1);
 
   $a = $a + 1;
   sleep($b);
   $b = $b * 2;   
    
        if ($rows_affected === 1) {
        //echo 'OK 1 row updated.';
        $RowInserted = 'Yes';
        
    }
    else {
        $RowInserted = 'No';
    }
    
}
    

      
  }


	switch ($Credentials) {
  case array("dstidham", "M9#yMZB4eNG*Xkj4");
            $Alias = 'Daniel Stidham';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
  case array("alaemmert", "N(ynZz*R39JNEHQ#");
            $Alias = 'Anna Laemmert';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
  case array("ddaugherty", "byNv(@LTfP4!E!x9");
            $Alias = 'David Daugherty';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
  case array("lgrishkevich", "XNLX^4P35Ayje5(A");
            $Alias = 'Leah Grishkevich';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;            
  case array("dsanders", "fD4Nw-9y_MVTh_ct");
            $Alias = 'Doug Sanders';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
   case array("jarcher", "LDB+f6m_kAsdtF3V");
            $Alias = 'Jeff Archer';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;           
   case array("marvay", "sF7)mwCYTBC#@x)J");
            $Alias = 'Michael Arvay';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;            
    case array("dbell", "w3BS%)Mpz(VCju@N");
            $Alias = 'Debra Bell';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;   
    case array("jbell", "rT*_aG<XK&8d5#");
            $Alias = 'John Bell';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break; 
    case array("bbell", "VP&!+5j4)('nsaC7");
            $Alias = 'Brian Bell';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break; 
    case array("ttt", "L+8yfw6_B)HM3E2Z");
            $Alias = 'TTT/Carmen Civiello';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break; 

    case array("jgreen", "R5a^@+9=kG)frSXZ");
            $Alias = 'Jason Green';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("rwood", "yNzYfWv9FC!3^+M%");
            $Alias = 'Ryan Wood';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
                      
    case array("rhall", "1111");
            $Alias = 'Robert Hall';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("ojett", "EYVD$7jK+&CW5RUt");
            $Alias = 'Olivea Jett';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("dhorn", "GjvuWe3REC_6ZfS&");
            $Alias = 'Diana Horn';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
                 
    case array("jpronio", "k25bVwjMW9*Bf-Yh");
            $Alias = 'Joe Pronio';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("vkong", "X5d#ZwLu(*cah_v8");
            $Alias = 'Vi Kong';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("ndaddona", "dWazC^=7euG-4+H2");
            $Alias = 'Nicholas Daddona';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("mcrawford", "x#gfv*Q!Y=d2ka5_");
            $Alias = 'Mike Crawford';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("plepage", "nF&7mQ@8KT+=(9Zc");
            $Alias = 'Peter LePage';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("jcottrell", "RwA-QFcV4Laz=u(7");
            $Alias = 'Joshua Cottrell';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("mengler", "M#3*nVBs8DS59R@X");
            $Alias = 'Mike Engler';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("sleitzell", "rKZNc7Hd5A#svCwX");
            $Alias = 'Steve Leitzell';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("dezzell", "qb59vQ#H(W6!@Rw8");
            $Alias = 'David Ezzell';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("ashaffer", "vFdt=4B^UmCVqp@-");
            $Alias = 'Adam Shaffer';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("srichards", "xAd9=m%QN5qVeKba");
            $Alias = 'Stephanie Richards';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("jpuffenbarger", "aAu9@4SY(8NHnG=-");
            $Alias = 'Jeremy Puffenbarger';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("macrawford", "UFQ(Euy&Z)3gK8Rk");
            $Alias = 'Mariela Crawford';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;

    case array("nsommerville", "mD!YzPp9gv@WSkLR");
            $Alias = 'Natasha Sommerville';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("staing", "CKfqSGUEDy=V@2j-");
            $Alias = 'Samnang Taing';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("dromans", "Uy%VF9@TZk2JLBu6");
            $Alias = 'David Romans';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("mprado", "fP72aKH#pWVAtZ(k");
            $Alias = 'Melissa Prado';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("jprado", "mNeTxb5-&Z6%dVFk");
            $Alias = 'Jesse Prado';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("jmilburn", "cj4XtL-Jv*GE_N6=");
            $Alias = 'Jared Milburn';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("tciviello", "h(#PsN3LV!2UkyJv");
            $Alias = 'Todd Civiello';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("bgrishkevich", "r!QX(2MmUbYJtw8h");
            $Alias = 'Bruce Grishkevich';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("jmays", "FS63_ZmxNf%hs*at");
            $Alias = 'Jesse Mays';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("cmalovany", "P7YCfX4S!#tDVAwn");
            $Alias = 'Christina Malovany';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("tjarman", "a5ZnM#yA!RN6+Q3*");
            $Alias = 'Todd Jarman';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;

    case array("tgraybeal", "f9_LPs!a&Ry=JGV%");
            $Alias = 'Thomas Graybeal';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("bbellew", "Zm*92!f%vDar8Q^k");
            $Alias = 'Brian Bellew';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("mking", "FWn24kDvSEGV@(_c");
            $Alias = 'Matthew King';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("gchin", "e6Yy=M%8n^B)wNz3");
            $Alias = 'Gregory Chin';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
 
    case array("pcarson", "V2=DXa7!^wuqvp%C");
            $Alias = 'Patrick Carson';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("jbarjenbruch", "a%w3KFTMGLbm97*2");
            $Alias = 'Joel Barjenbruch';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
        
    case array("mlally", "XxQuJDsL!jW*5_vK");
            $Alias = 'Michael Lally';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("rcastro", "FjWs)uT_#5pf4K&G");
            $Alias = 'Rene Castro';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("smorrison", "jA5sV*Ek2bpt(%Wd");
            $Alias = 'Susan Morrison';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("dned", "Jg^6H5ZyMAtn*pSY");
            $Alias = 'Deric Ned';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("gjimenez", "MpZc_tWuTV+6m3Ak");
            $Alias = 'Gus Jimenez';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("kyleholker", "uA8RawUH79+4^&gK");
            $Alias = 'Kyle Holker';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("kodyholker", "d5DnR)Lk_ZQj3^Tc");
            $Alias = 'Kody Holker';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("tfarnholtz", "TypSkE2agrAeJZ=!");
            $Alias = 'Tary Farnholtz';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("dgrace", "C*up2L%9nWD8tE-H");
            $Alias = 'Denise Grace';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("mgsellman", "qJ#s3Ftx^cuDNS47");
            $Alias = 'Matt Gsellman';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("rrials", "sPnm)Y9S!w5AE_XQ");
            $Alias = 'Rusty Rials';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("tfroehlich", "qkgn-p(sB*CN94uy");
            $Alias = 'Thomas Froehlich';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
            
    case array("ksanna", "C5WwSUh7M(%-Pd3^");
            $Alias = 'Kyle Sanna';
            logUserInfo($conn, $Alias, $Date, $TrueTime, $DisplayTime);
    break;
  default:
        die("<p class='centertext font24 whitetext'>Username or password is incorrect.  Please try again.</p>");
$Test = '1';
}
	
    //echo "<a class='centertext'>Welcome, $Alias!</a>";
    
    
    // Textmagic configuration

set_include_path('/home/site/vendor');

//echo get_include_path();

require('autoload.php');


use TextMagic\Models\SendMessageInputObject;
use TextMagic\Api\TextMagicApi;
use TextMagic\Configuration;	

// put your Username and API Key from https://my.textmagic.com/online/api/rest-api/keys page.
$config = Configuration::getDefaultConfiguration()
    ->setUsername('erronbarrino')
    ->setPassword('7ta94XDglCKKN4aA2zAOAInsGGrQ4D');

$api = new TextMagicApi(
    new GuzzleHttp\Client(),
    $config
);
    
    			// Send a txt message to Robert when someone logs in to the leaderboard mobile version (except him)

$a = 1;
$b = 1;
$Sent = 'no';
$Phone = 3304137989;
    if ($Alias !== 'Robert Hall') {
while ($a <= 4 && $Sent === 'no' && $Phone !== "") {
	
$input = new SendMessageInputObject();
$input->setText("New LeaderBoard login:  $Alias on $Date @ $DisplayTime.");
$input->setPhones('+1' . $Phone);

try {
    $result = $api->sendMessage($input);
	//echo 'OK confirmation txt sent.';
	$Sent = 'yes';
} catch (Exception $e) {
  //  echo 'Exception when calling TextMagicApi->sendMessage: ', $e->getMessage(), PHP_EOL;
	//echo 'ERROR txting confirmation!';
    $error1 = '';
}    
 
	$a = $a + 1;
    sleep($b);
    $b = $b * 2;
    
}

    }

    
    

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

SELECT TOP 27 junc2.ShortName,
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
cte_table3 AS (SELECT Writing_Agent_Number3, SUM(Accumulation_Annuitization_Value) AS AllianzLifePending FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Life%' AND Policy_Status LIKE '%Pending%' GROUP BY Writing_Agent_Number3),
cte_table4 AS (SELECT AgentID, SUM(TargetCommission) AS GlobalProduction FROM dbo.GlobalAtlantic GROUP BY AgentID)

SELECT TOP 6 junc2.ShortName AS AliasLife,
       COALESCE(SUM(table1.FGLifeProduction),0) AS FGLifeProduction,
       COALESCE(SUM(table2.AllianzLifeProduction),0) AS AllianzLifeProduction,
	   COALESCE(SUM(table3.AllianzLifePending),0) AS AllianzLifePending,
	   COALESCE(SUM(table4.GlobalProduction),0) AS GlobalProduction,
       COALESCE(SUM(table1.FGLifeProduction),0) + COALESCE(SUM(table2.AllianzLifeProduction),0) + COALESCE(SUM(table4.GlobalProduction),0) AS TotalLifeProduction

 FROM Junction2 junc2
  LEFT
  JOIN cte_table1 table1 ON junc2.FGID = table1.Writing_Agent_Number
  LEFT
  JOIN cte_table2 table2 ON junc2.AllianzID = table2.Writing_Agent_Number3
  LEFT
  JOIN cte_table3 table3 ON junc2.AllianzID2 = table3.Writing_Agent_Number3
  LEFT
  JOIN cte_table4 table4 ON junc2.GlobalID = table4.AgentID
 GROUP BY junc2.ShortName
 ORDER BY TotalLifeProduction DESC, AllianzLifePending DESC; 
 
 SELECT SUM(Annualized_Life) AS TotalFGProductionLife FROM dbo.FGProductionApps2 WHERE Product_Type_Description LIKE '%Life%';
 
SELECT SUM(Accumulation_Annuitization_Value) AS TotalAllianzProductionLife FROM dbo.AllianzProductionApps2 WHERE Product LIKE '%Life%' AND Policy_Status LIKE '%Inforce%';

SELECT SUM(Accumulation_Annuitization_Value) AS TotalAllianzPendingLife FROM dbo.AllianzProductionApps2 WHERE (Policy_Effective_Date LIKE '%2022%' OR Policy_Effective_Date LIKE '%2023%') AND Product LIKE '%Life%' AND Policy_Status LIKE '%Pending%';
 ", $params);
	
sqlsrv_execute($stmt);

		echo "<p class='marquee-mobile height25 whiteborder whitetext'>";
	$Rank = 1;

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        
        	if ($Rank == 1 || $Rank == 3 || $Rank == 5){
				$ActiveColor = 'whitetext';
			}
			elseif ($Rank == 2 || $Rank == 4){
				$ActiveColor = 'orangetext';
			}
        
  echo "<span class='$ActiveColor'>" . $row['ShortName'] . "&nbsp;</span>";
		
   echo "<span class='fa $ActiveColor'>  &#xf0d8;  </span";
        
  $USD = "$" . number_format($row['Producer_Premium'], 2, ".", ",");
  echo "<span class='padding5 $ActiveColor'> " . $USD . "&nbsp;</span>";
		
  $Date1 = $row['Date1']->format('m/d/Y');	
  echo "<span class='padding10right $ActiveColor'> (" . $Date1 . ") </span>";
		$Rank = $Rank + 1;
	}					
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
	   
	 	if ($RANK == 1 || $RANK === 3 || $RANK === 5 || $RANK === 7 || $RANK === 9 || $RANK === 11 || $RANK === 13 || $RANK === 15 || $RANK === 17 || $RANK === 19 || $RANK === 21 || $RANK === 23 || $RANK === 25 || $RANK === 27 || $RANK === 29 || $RANK === 31){
		$ActiveColor = 'whitetext';
	}
	else if ($RANK === 2 || $RANK === 4 || $RANK === 6 || $RANK === 8 || $RANK === 10 || $RANK === 12 || $RANK === 14 || $RANK == 16 || $RANK === 18 || $RANK === 20 || $RANK === 22 || $RANK === 24 || $RANK == 26 || $RANK === 28 || $RANK === 30){
		$ActiveColor = 'orangetext';
	}  
	   
	   if ($RANK == 1 || $RANK === 2  || $RANK === 3 || $RANK === 4 || $RANK === 5) {
	$Top5 = 'gold';
}	

else {$Top5 = '';
}
       
                 if ($row['TotalProduction'] >= 10000000) {
                    
           $Fire = 'fire';
           $Hesonfire = "<span class='absolute font20'>ON FIRE!</span>";
           $Red = 'redtext';
           $Redglow = 'redglow';
           $FireGradient = 'firegradient';
       }
       
else 
{
    $Fire = '';
    $Hesonfire = '';
}
       
            if ($row['TotalProduction'] >= 5000000 && $row['TotalProduction'] < 10000000)  {
           $Fire = 'fire'; 
           $Red = 'redtext';
           $Redglow = 'redglow';
           $Hot = "<span class='font24'>HOT</span>";
           $FireGradient = '';
       }
       
       else {
           $Red = '';
           $Redglow = 'redglow';
           $Hot = '';
       }
       
	   
	   $DisplayTotalProduction = "$" . number_format($row['TotalProduction'], 2, ".", ",");
	        $DisplayTotalPending = $row['AthenePending'] + $row['FGPending'] + $row['AllianzPending'];
	    $DisplayTotalPending = "$" . number_format($DisplayTotalPending, 2, ".", ",");
	   
	   	   		// calculate totals for athene pending
	   
echo "<p class='padding7 shadow $ActiveColor '>" . $row['ShortName'] . "</p>";	   
echo "<p class='padding7 shadow $ActiveColor '>" . $RANK . "</p>"; 
       
                // Display the candle for 1st place
       
   /*    if ($RANK === 1) {
             echo "<img src='images/candle5.gif'>"; 
       } 
       else {
           echo " ";
       }  */
       
       
echo "<p class='relative padding7 shadow $ActiveColor $Fire'>";
       
if ($RANK === 1) {
    //$DisplayTotalProduction = '';
   // echo "<img src='images/fire3.gif'>";
    echo "<img style='position:  absolute; z-index: -1;' width='110' height='25' src='images/fire.gif'>";
}
       else {
           $FireGradient = '';
       }
       
echo $DisplayTotalProduction . "</p>"; 
echo "<p class='padding7 shadow $ActiveColor'>" . $DisplayTotalPending . "</p>";

$RANK = $RANK + 1;	
   }
}
echo "</div>";
    
    echo '<br><br><br><br>';
    
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
	
	
		echo "<p class='padding20'><a class='gold shadow blackbg whitetext font16 borderround padding10'>Current Production:  "  . '$30,224,813.59







'
 . "</a></p>";
	
	echo "<p class='padding20'><a class='gold shadow blackbg whitetext font18 borderround padding10'>Current Pending:   $8,612,953.04










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
		
	
	echo "<p class='padding20'><a class='gold shadow blackbg whitetext font16 borderround padding10'>Current Production:  "  . '$1,262,911.04






' . "</a></p>";
	
	echo "<p class='padding20'><a class='gold shadow blackbg whitetext font18 borderround padding10'>Current Pending:   $510,177.13


</a>";
	echo "</p>";
	
	
?>

</div>

<script src='/Leaderboard/js/leaderboard2.js' defer></script>

	</body>
	</html>

<?php
	//}
?>