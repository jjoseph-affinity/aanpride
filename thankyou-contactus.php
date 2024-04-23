<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>

<!doctype html>
<html lang='en'>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AAN Pride</title>
	<link rel="stylesheet" href="css/aanpride.css">
     <link rel="stylesheet" media="only screen and (min-width: 30em)" href="css/aanpride-desktop.css">
    <link rel="stylesheet" media="only screen and (orientation: landscape)" href="css/aanpride-desktop.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->
    
</head>
<body class='bgcleveland-'>

<?php include('header.php');
    
    $Name = $_POST['name1'];
    $Phone = $_POST['phone1'];
    $Email = $_POST['email1'];
    $Subject = $_POST['subject1'];
    $Comments = $_POST['comments'];
    
?>
    
 <p class='margin50topbottom font18 centertext lineheight2 padding10leftright whitetext backgroundblack-'>
    Thank you for contacting AANPRIDE.  Please allow up to 72 business hours for a response.  Your information that you have submitted is as follows:<br><br>
     
     <?php echo "Name:  $Name<br>";
           echo "Phone:  $Phone<br>";
           echo "Email:  $Email<br>";
           echo "Subject:  $Subject<br>";
           echo "Message:  $Comments<br>";
     ?>
    </p>   
    
    
    	<script src='js/header.js' defer></script>
	<script src='js/index.js' defer></script>
    
</body>
</html>

<?php

set_include_path('/home/site/vendor/phpmailer/phpmailer/src');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

date_default_timezone_set('America/New_York');


$a = 1;
$b = 1;
$Sent = 'no';
while ($a <= 4 && $Sent === 'no') {
    
    $Body = "Name:  $Name<br>
             Phone:  $Phone<br>
             E-Mail: $Email<br>
             Subject:$Subject<br>
             Message:$Comments<br>
    ";

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
	$mail->addBCC('adubiel@affinityadvisorynetwork.com', 'Alex');
	//$mail->addBCC('lfish@aanpride.com', 'Laura');
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject = "E-mail via AANPRIDE (from $Name/$Subject)";
	$mail->Body    = $Body;

	if(!$mail->send()) {
		//echo "ERROR E-mail NOT sent! [$a tries]";
            $Sent = 'no';
	} else {
		//echo "OK E-mail sent.[$a tries]";
        $Sent = 'yes';
	}
    $a = $a + 1;
    sleep($b);
    $b = $b * 2;
}


include_once('../gestalt.php');

$Page = 'contact-thankyou';
$Date1 = date('Y-m-d');
$Time1 = date('G:i');
$IpAddress = $_SERVER['REMOTE_ADDR'];
$IPAddress2 = $_SERVER['HTTP_X_FORWARDED_FOR'];
$IpAddress3 = $_SERVER['HTTP_CLIENT_IP'];
$IpAddress4 = $_SERVER["HTTP_X_REAL_IP"];
$IpAddress5 = $_SERVER['HTTP_CF_CONNECTING_IP'];

    $params1 = array($Page, $Date1, $Time1, $IpAddress, $IpAddress2, $IpAddress3, $IpAddress4, $IpAddress5);
$stmt1 = sqlsrv_prepare($conn, "INSERT INTO IpAddresses VALUES(?, ?, ?, ?, ?, ?, ?, ?)", $params1);
    $rows_affected = 0;
    $RowsAffected = 0;
/*$a = 1;
$b = 1;
while ($a <= 4 && $RowsAffected === 0) {
    */
sqlsrv_execute($stmt1);
    /*
$rows_affected = sqlsrv_rows_affected($stmt1);
 
   $a = $a + 1;
   sleep($b);
   $b = $b * 2;   
    
}
    
    if ($rows_affected >= 1) {
        $RowsAffected = 1;
    }
    else {
        $RowsAffected = 0;
    } 
*/

?>