<?php session_start();?>
<!doctype html>
<html lang='en'>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AAN Pride</title>
		<link rel="stylesheet" href="css/aanpride.css">
     <link rel="stylesheet" media="only screen and (min-width: 30em)" href="css/aanpride-desktop.css">
    <link rel="stylesheet" media="only screen and (orientation: landscape)" href="css/aanpride-desktop.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class='bgcleveland-'>
	<?php
	

	
	//set_include_path('site/');

	//include_once("../gestalt.php");
	
$text1 = $_POST['text1'];
$password1 = $_POST['password1'];
$Credentials = array($text1, $password1);
    
	switch ($Credentials) {
  case array("tciviello", "test");
            $_SESSION['LOGIN'] = "jijiewir2(*#&$374)";
            $Alias = 'Todd';
            $_SESSION['PRODUCER_ORG_CODE'] = "YWHQ2";
          include_once('producerheader.php');
    break;
  default:
    $_SESSION['LOGIN'] = '';
            include_once('header.php');
            exit();
}
	
    
    echo "<a class='topright font18 whitetext'>Welcome, $Alias!</a>";
	?>
    
    

    
    <div class='parallax'> </div>
    
    
    
    
    
    
    
	
    <p id='trainingsplash' class='centertext padding20 lineheight1_5 blackbg opaque2'>
    <a href='https://affinityadvisorynetworkcom.teamplaybookbuilder.app/file-viewer/affinity-advertising-marketing-machine.pdf?file=accounts/922209afc3bc99de01790b98a9699f03/1b2fe9349139b96a32ae1e4b21cc944a.pdf'>Playbook builder Training
        </a>
    </p>
    
    
    	
    
    
    
     <div class='parallax'> </div>

    
    
   
    
    
     <div class='parallax'> </div>
    
    

<picture>
  <source media="(max-width: 1000px)" srcset="images/retirement-readiness-radio-small.png" />
  <source class='maxwidth50' media="(min-width: 1001px)" srcset="images/retirement-readiness-radio-large.png" />
  <img class='maxwidth50' src="images/retirement-readiness-radio-large.png" alt="Retirement Readiness Radio logo" />
</picture>


    
    
    <br><br><br><br>
    
    
<p id='ppodsplash' class='font24 centertext lineheight2 whitetext blackbg'>
    <img width='200' height='200' src="images/ppod-2023-logo2-transparent.png">
    </p>
    
    
    	<p class='centertext padding20 lineheight1_5'>   
PPOD
    </p>
    
    
    
    
    <div class='parallax'> </div>
    
    
    
    
    
    <div class='parallax'> </div>
    
    
    
    
      
            
            
  <center><div class="centertext content padding20">
Test 1234 goes here
            </div></center>
    
   
    
    <div class='parallax flex-container'>
	</div>
    
    
    
      <p class='padding20 lineheight1_5 centertext graybg'>
  <span id='appssplash'>
APPS2
</span>
    </p>
    
    
    
    <div class='parallax flex-container'>
	</div>

      <p class='padding20 lineheight2 whitetext centertext blackbg' title='Contact Us'><a href='contact.php'>
</a>
    </p>
    
    <div class='parallax flex-container'>
	</div>
    

    
    
  <div id='kpisplash' class='flex-container-space-around width80 font24 centertext lineheight2 whitetext blackshadow blackbg'> 
      <a href='mystats.php'><button id='mystats' class='font20 padding5- pointer' title='My Stats'>My Stats</button></a>

    <a href='myproduction.php'><button id='myproduction' class='font18 padding5- pointer' title='My Production'>My Production</button></a>
    </div>
    
	
	
    
    
    
    
	<div class='parallax flex-container'> </div>
	


    
        <p id='productsandcarrierssplash' class='flexbox2 font18 centertext lineheight1_5 blackbg opaque2'>
  <a class='margin8-top-bottom borderround padding5- whiteborder cursive font18 pointer whitebghover blackhover' title='Allianz'>ALLIANZ</a>  <a class='margin8-top-bottom borderround padding5- whiteborder cursive font18 pointer grayhover' title='Americo'>AMERICO</a>   <a class='margin8-top-bottom borderround padding5- whiteborder cursive font18 pointer grayhover' title='Athene'>ATHENE</a>    <a class='margin8-top-bottom borderround padding5- whiteborder font18 cursive pointer grayhover' title='F&G'>F&G</a> 
    </p>
    
    
    
    
    <div class='parallax flex-container'> </div>
    
  
    
    
    
      <div id='contactussplash' class='margin10-topbottom- padding10-top- font18 whitetext blackbg opaque3'>
          
          
          <p class='grid-container margin10-topbottom-'>
          
  <span>Name:&nbsp;&nbsp;</span>

              <span><input type='text'></span>
              
              </p>
          
              
          
              <p class='grid-container margin10-topbottom-'>
          
  <span>E-mail:&nbsp;&nbsp;</span>

              <span><input type='email'></span>
              
              </p>
          
          
          
                    <p class='grid-container margin10-topbottom-'>
          
  <span>Phone:&nbsp;&nbsp;</span>

              <span><input type='phone'></span>
              
              </p>
          
          
                     <p class='grid-container margin10-topbottom-'>
          
  <span>Comments:&nbsp;&nbsp;</span>

              <span><textarea></textarea></span>
              
              </p>
          
          
         <p class='margin10-topbottom- padding10-bottom- centertext font18'> <button type='submit' id='submit1' class='font20 lineheight1_5 borderround pointer grayhover' title='Send'>SEND</button> </p>
          
          
    
    </div>
    
    
    
	
	
	<div class='parallax flex-container'> </div>
	
	<div class='container'><div class='content padding20'>
	<p class='centertext bold font32 padding20'>
	
	</p></div></div>
	
	<div class="parallax"></div>
	
	<p class='centertext font18 padding20 graygradient'>
	<span class='italic'></span></p>
	
	<div class="parallax"></div>
	
    <?php
	/*
$params = array($username1, $password1);
$stmt = sqlsrv_prepare($conn, "SELECT UserID, Password, Alias, UserName, AtheneAgentId, FGAgentId, AllianzAgentId FROM SecurePasswords WHERE UserID = ? AND Password = ?", $params);

sqlsrv_execute($stmt);


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	


		echo "<div class='padding10 fontlarge whitetext'>Username and/or password is incorrect.  Please try again.</div>";
		die();
		

		$_SESSION['TOKENLOGIN'] = 'ERIO#$(&FJE)';
	echo "<div id='leaderboarddisplay'>-</div>";
	echo "<div class='centertext dayssansblack font24'>Welcome," . $row['Alias'] . "!</div>";
$_SESSION['UserName'] = '%' . $row['UserName'] . '%';
$_SESSION['AtheneAgentId'] = $row['AtheneAgentId'];
$_SESSION['FGAgentId'] = $row['FGAgentId'];
$_SESSION['AllianzAgentId'] = $row['AllianzAgentId'];

}*/
	
//sqlsrv_free_stmt( $stmt);
	
	?>
	<script src='/js/producerheader.js' defer></script>
</body>
</html>