<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

set_include_path('/home/site/vendor');

require_once('autoload.php');

set_include_path('/home/site/vendor/phpmailer/phpmailer/src');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

$TaxProjectionsDate = $_POST['taxprojectionsdate'];
$TaxProjectionsName = $_POST['taxprojectionsname'];
$InvestmentsName = $_POST['investmentsname'];
$Company = $_POST['company'];
$AccountNumber = $_POST['accountnumber'];
$OriginationDate = $_POST['originationdate'];
$InitialPremium = $_POST['initialpremium'];
$NumberOfShares = $_POST['numberofshares'];
$AccountValue = $_POST['accountvalue'];
$Penalty = $_POST['penalty'];
$SurrenderAmount = $_POST['surrenderamount'];
$CostBasis = $_POST['costbasis'];
$QualifiedNonQualifiedRoth = $_POST['qualifiednonqualifiedroth'];
$Type = $_POST['type'];
$MovingToQualified = $_POST['movingtoqualified'];
$TaxesWithheld = $_POST['taxeswithheld'];
$MonthlyYearly = $_POST['monthlyyearly'];
$NameClient = $_POST['nameclient'];
$NameSpouse = $_POST['namespouse'];
$BirthDateClient = $_POST['birthdateclient'];
$BirthDateSpouse = $_POST['birthdatespouse'];
$BlindClient = $_POST['blindclient'];
$BlindSpouse = $_POST['blindspouse'];
$DependentClient = $_POST['dependentclient'];
$DependentSpouse = $_POST['dependentspouse'];
$SocialSecurityClient = $_POST['socialsecurityclient'];
$SocialSecuritySpouse = $_POST['socialsecurityspouse'];
$PensionAnnuityIncomeClient = $_POST['pensionannuityincomeclient'];
$PensionAnnuityIncomeSpouse = $_POST['pensionannuityincomespouse'];
$IRAIncomeClient = $_POST['iraincomeclient'];
$IRAIncomeSpouse = $_POST['iraincomespouse'];
$WagesClient = $_POST['wagesclient'];
$WagesSpouse = $_POST['wagesspouse'];
$InterestIncomeClient = $_POST['interestincomeclient'];
$InterestIncomeSpouse = $_POST['interestincomespouse'];
$DividendIncomeClient = $_POST['dividendincomeclient'];
$DividendIncomeSpouse = $_POST['dividendincomespouse'];
$CapitalGainLossClient = $_POST['capitalgainlossclient'];
$CapitalGainLossSpouse = $_POST['capitalgainlossspouse'];
$OtherIncomeClient = $_POST['otherincomeclient'];
$OtherIncomeSpouse = $_POST['otherincomespouse'];
$RentalRoyaltiesClient = $_POST['rentalroyaltiesclient'];
$RentalRoyaltiesSpouse = $_POST['rentalroyaltiesspouse'];
$BusinessClient = $_POST['businessclient'];
$BusinessSpouse = $_POST['businessspouse'];
$MedicalClient = $_POST['medicalclient'];
$MedicalSpouse = $_POST['medicalspouse'];
$LongTermCareInsuranceClient = $_POST['longtermcareinsuranceclient'];
$LongTermCareInsuranceSpouse = $_POST['longtermcareinsurancespouse'];
$RealEstateTaxesClient = $_POST['realestatetaxesclient'];
$RealEstateTaxesSpouse = $_POST['realestatetaxesspouse'];
$MortgageInterestClient = $_POST['mortgageinterestclient'];
$MortgageInterestSpouse = $_POST['mortgageinterestspouse'];
$CharitableContributionsClient = $_POST['charitablecontributionsclient'];
$CharitableContributionsSpouse = $_POST['charitablecontributionsspouse'];
$Care = $_POST['care'];
$Cost = $_POST['cost'];
$TaxReturn1 = $_FILES['taxreturn1']['name'][0];
$TaxReturn2 = $_FILES['taxreturn2']['name'][0];
$Comments = $_POST['comments'];

// SET BODY EMAIL FOR CONTACT CREATED AND ASSIGNED TO A SEMINAR AND EMAIL STAFF (IF CONTACT WAS JUST CREATED)
	$Body = "
			<body>


<b>Tax Projection Request</b><br><br>

       Date:  $TaxProjectionsDate<br><br>
       Advisor Name:  $TaxProjectionsName<br><br>
       Investments Name:  $InvestmentsName<br><br>
       Company Name:  $Company<br><br>
       Account #:  $AccountNumber<br><br>
       Origination Date:  $OriginationDate<br><br>
       Initial Premium:  $InitialPremium<br><br>
       Number of Shares:  $NumberOfShares<br><br>
       Account Value:  $AccountValue<br><br>
       Penalty:  $Penalty<br><br>
       Surrender Amount:  $SurrenderAmount<br><br>
       Qualified/Non-Qualified/Roth:  $QualifiedNonQualifiedRoth<br><br>
       <b>Cost Basis:  $CostBasis</b><br><br>
       Type:  $Type<br><br>
       Moving to Qualified:  $MovingToQualified<br><br>
       Monthly or Yearly:  $MonthlyYearly <br><br>
       Client Name:  $NameClient<br><br>
       Spouse Name:  $NameSpouse<br><br>
       Client Birthdate:  $BirthDateClient<br><br>
       Spouse Birthdate:  $BirthDateSpouse<br><br>
       Client blind?  $BlindClient<br><br>
       Spouse blind:  $BlindSpouse<br><br>
       Client dependent:  $DependentClient<br><br>
       Spouse dependent:  $DependentSpouse<br><br>
       Client Social Security:  $SocialSecurityClient<br><br>
       Spouse Social Security:  $SocialSecuritySpouse<br><br>
       Pension Annuity income client:  $PensionAnnuityIncomeClient<br><br>
       Pension Annuity income spouse:  $PensionAnnuityIncomeSpouse<br><br>
       Client IRA income:  $IRAIncomeClient<br><br>
       Spouse IRA income:  $IRAIncomeSpouse<br><br>
       Client wages:  $WagesClient<br><br>
       Spouse wages:  $WagesSpouse<br><br>
       Client interest income:  $InterestIncomeClient<br><br>
       Spouse interest income:  $InterestIncomeSpouse<br><br>
       Client Dividend Income:  $DividendIncomeClient<br><br>
       Spouse Dividend Income:  $DividendIncomeSpouse<br><br>
       Client Capital Gain/Loss:  $CapitalGainLossClient<br><br>
       Spouse Capital Gain/Loss:  $CapitalGainLossSpouse<br><br>
       Client Other income:  $OtherIncomeClient<br><br>
       Spouse Other Income:  $OtherIncomeSpouse<br><br>
       Client Rental Royalties:  $RentalRoyaltiesClient<br><br>
       Spouse Rental Royalties:  $RentalRoyaltiesSpouse<br><br>
       Client Business:  $BusinessClient<br>
       Spouse Business:  $BusinessSpouse<br>
       Client Medical:  $MedicalClient<br>
       Spouse Medical:  $MedicalSpouse<br>
       Client Long Term Care Insurance:  $LongTermCareInsuranceClient<br>
       Spouse Long Term Care Insurance:  $LongTermCareInsuranceSpouse<br>
       Client Real Estate Taxes:  $RealEstateTaxesClient<br><br>
       Spouse Real Estate Taxes:  $RealEstateTaxesSpouse<br><br>
       Client Mortgage Interest:  $MortgageInterestClient<br><br>
       Spouse Mortgage Interest:  $MortgageInterestSpouse<br><br>
       Client Charitable Contributions:  $CharitableContributionsClient<br><br>
       Spouse Charitable Contributions:  $CharitableContributionsSpouse<br><br>
       Care:  $Care<br><br>
       Cost:  $Cost<br><br>
       Comments:  $Comments<br><br>
       
files attached:  $TaxReturn1  &nbsp;&nbsp; $TaxReturn2

			</body>
	";
	
$a = 1;
$b = 1;
$Sent = 'no';
while ($a <= 4 && $Sent === 'no') {

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'donotreply@affinityadvisorynetwork.com';                 // SMTP username
	$mail->Password = 'ueuu#$&77cnwnwi(#*%^@xjsuwu@*#*#&5__-++-283';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
	$mail->Port = '587';                                    // TCP port to connect to

	$mail->From = 'donotreply@affinityadvisorynetwork.com';
	//$mail->addAddress('adubiel@affinityadvisorynetwork.com');     // Add a recipient
	$mail->addBCC('adubiel@affinityadvisorynetwork.com', '');
	//$mail->addBCC('jmickley@affinityadvisorynetwork.com', 'Josh');
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject = 'New request:  Tax Projection';
	$mail->Body    = $Body;

    // Check file size 1
if ($_FILES["taxreturn1"]["size"] > 50000000) {
  echo "Sorry, your 1st file is larger than 5MB.  Your 1st file size must be smaller than 5MB.";
  exit();
} 
    
    // Allow only certain file formats for file 1
    
$target_file1 = basename($_FILES["taxreturn1"]["name"]);
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    
if($imageFileType1 != "pdf") {
  echo "Sorry, only PDF files are allowed.";
    exit();
}
    
    if (isset($_FILES['taxreturn1'])
    && $_FILES['taxreturn1']['error'] == UPLOAD_ERR_OK
) 
        
        /*
        // Only check this section if file 2 is selected
        
            // Check file size 2
if ($_FILES["taxreturn2"]["size"] > 50000000) {
  echo "Sorry, your 2nd file is larger than 5MB.  Your 2nd file size must be smaller than 5MB.";
  exit();
} 
    
    // Allow only certain file formats for file 2
    
$target_file2 = basename($_FILES["taxreturn2"]["name"]);
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    
    if ($TaxReturn2 != '') {
if($imageFileType2 != "pdf") {
  echo "Sorry, only PDF files are allowed.";
    exit();
}
        
    }
    
    
    if (isset($_FILES['taxreturn2'])
    && $_FILES['taxreturn2']['error'] == UPLOAD_ERR_OK
)
    */
    
        
        
        
    {
    $mail->addAttachment($_FILES['taxreturn1']['tmp_name'],
                         $_FILES['taxreturn1']['name'],
                       // $_FILES['taxreturn2']['tmp_name'],
                        // $_FILES['taxreturn2']['name']
                        
                        );
}
    
	if(!$mail->send()) {
            $Sent = 'no';
	} else {
        $Sent = 'yes';
	}
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}

?>

<!doctype html>
<html lang='en'>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AAN Pride - Tax Projection submitted</title>
	<link rel="stylesheet" href="css/aanpride.css">
     <link rel="stylesheet" media="only screen and (min-width: 30em)" href="css/aanpride-desktop.css">
    <link rel="stylesheet" media="only screen and (orientation: landscape)" href="css/aanpride-desktop.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class='bgcleveland-'>
	
<?php include('header.php');  

    if ($Sent === 'yes') {
        echo "
<p class='margin50topbottom centertext indent padding30top lineheight2 padding10leftright whitetext backgroundblack- padding30bottom font18'>
Thank you for your submission.  Please allow 5 business days for completion.
    </p>";
    }
    
    ?>
    
    	<script src='js/header.js' defer></script>
</body>
</html>