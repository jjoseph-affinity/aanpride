<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_include_path('/home/site/vendor');

require_once('autoload.php');

set_include_path('/home/site/vendor/phpmailer/phpmailer/src');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

$TaxReturn1 = $_FILES['taxreturns']['name'][0];
$TaxReturn2 = $_FILES['taxreturns']['name'][1];


// SET BODY EMAIL FOR CONTACT CREATED AND ASSIGNED TO A SEMINAR AND EMAIL STAFF (IF CONTACT WAS JUST CREATED)
	$Body = "
			<body>



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

    // Check file size
if ($_FILES["taxreturns"]["size"] > 500000) {
  echo "Sorry, your file is larger than 5MB.  Your file size must be smaller than 5MB.";
  exit();
} 
    
    if (isset($_FILES['taxreturns'])
    && $_FILES['taxreturns']['error'] == UPLOAD_ERR_OK
) 
    {
    $mail->addAttachment($_FILES['taxreturns']['tmp_name'][0],
                         $_FILES['taxreturns']['name'][0]);
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