<?php 
//echo '--> ' . $_SESSION['LOGIN'];
if ($_SESSION['LOGIN'] != "jijiewir2(*#&$374)") {
    echo 'invalid producer credentials for the header portion';
    exit();
}
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />

	<link rel="stylesheet" href="css/aanpride.css">
     <link rel="stylesheet" media="only screen and (min-width: 30em)" href="css/aanpride-desktop.css">
    <link rel="stylesheet" media="only screen and (orientation: landscape)" href="css/aanpride-desktop.css"> 
  
<span id='hamburgermenu' class='font32 whitetext pointer' title='Menu'>&#9776;</span>

<div id='menu' class='flex-container- whitetext blackshadow marginleft5percent font20 centertext hideme'>

    <span id='home' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='Home'><a class='grayhover' href='index2.php'>HOME</a></span>
    
    <span id='training' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='Training'><a class='grayhover' href='#trainingsplash'>TRAINING</a></span>
    

    <span id='ppod' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='PPOD'><a href='#ppodsplash' title='PPOD'>PPOD</a></span>
    
    <span id='apps' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='Apps2'><a href='#appssplash' title='APPS'>APPS</a></span>
    
    <span id='kpis' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='KPIs'><a href='#kpissplash' title='KPIs'>KPIs</a></span>
    
    <span id='leaderboard' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='LeaderBoard'><a href='https://aanpride.com/Leaderboard/leaderboard-mobile.php' target='_blank' title='LeaderBoard'>LEADERBOARD</a></span>
    
    <span id='productsandcarriers' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='Products and Carriers'><a href='#productsandcarrierssplash'>PRODUCTS & CARRIERS</a></span>
    
    <span id='aanwealthadvisors' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='AAN Wealth Advisors'><a href='https://aanwealthadvisors.com'>AAN WEALTH ADVISORS</a></span>
    
    <span id='contactus' class='margin5- padding12- whiteborder- borderround pointer grayhover hideme' title='Contact Us'><a href='#contactussplash'>CONTACT US</a></span>
    
    <span id='logout' class='margin5- padding12- whiteborder- borderround pointer grayhover pointer hideme'>LOGOUT</span>
</div>
    
    
     <section id='loginscreen' class='margin10 whitetext centertext autowidth font24 hideme'><form method='post' action='login.php'>
         <p>Username:</p><p><input type='text' name='text1' class='lineheight2'></p>
        <p>Password:</p><p><input type='text' name='password1' class='lineheight2'></p>
         <p><button type='submit' class='font18 padding10 twoem whitetext greenbg pointer' title='Login'>Login</button></p></form>
        </section>
    
</div>