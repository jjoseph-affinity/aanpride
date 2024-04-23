<?php session_start();

if ($_SESSION['LOGIN'] != "jijiewir2(*#&$374)") {
    exit();
}

include_once('producerheader.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PPOD - AAN Pride</title>
	<link rel="stylesheet" href="css/aanpride.css">
     <link rel="stylesheet" media="only screen and (min-width: 30em)" href="css/aanpride-desktop.css">
    <link rel="stylesheet" media="only screen and (orientation: landscape)" href="css/aanpride-desktop.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class='blackbg whitetext'>
	
    <div class='centertext'>
	<p class='font32'>Agenda</p>
    <p>Day One</p>
    <p class='indent'>Meet The Team</p>
    <p class='indent'>Why PPOD is Different</p>
    <p class='indent'>Marketing Strategies/p>
    <p class='indent'>Analytics & CRM</p>
    
    <p>Day Two</p>
    <p class='indent'>Attend Estate Planning Seminar</p>
    <p class='indent'>Launching the Marketing Machine</p>
    <p class='indent'>Meeting Process/p>
  
    <p>Day Three</p>
    <p class='indent'>Learn About Product</p>
    <p class='indent'>Case design samples and studies</p>
    <p class='indent'>Question and Answer Session/p>
        </div>
        
</body>
</html>