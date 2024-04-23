"use strict";
        const hamburgermenu = document.querySelector('#hamburgermenu');
        const menu = document.querySelector('#menu');

		const home = document.querySelector('#home');
        const training = document.querySelector('#training');
        const ppod = document.querySelector('#ppod');
        const apps2 = document.querySelector('#apps2');
        const kpis = document.querySelector('#kpis');
        const leaderboard = document.querySelector('#leaderboard');
		const productsandcarriers = document.querySelector('#productsandcarriers');
        const aanwealthadvisors = document.querySelector('#aanwealthadvisors');
        const logout = document.querySelector('#logout');

        hamburgermenu.addEventListener('click',expandOrContractMenu);

		//home.addEventListener("mouseover", function() {scaleUp(this.id);}); 
		//home.addEventListener("mouseout", function() {scaleDown(this.id);});

		//login.addEventListener("mouseover", function() {scaleUp(this.id);}); 
		//login.addEventListener("mouseout", function() {scaleDown(this.id);});
			

function expandOrContractMenu() {
    console.log ('test');
    menu.classList.toggle('hideme');
    home.classList.toggle('hideme');
    training.classList.toggle('hideme');
    ppod.classList.toggle('hideme');
    apps.classList.toggle('hideme');
    kpis.classList.toggle('hideme');
    leaderboard.classList.toggle('hideme');
    productsandcarriers.classList.toggle('hideme');

    aanwealthadvisors.classList.toggle('hideme');
    logout.classList.toggle('hideme');
}
        

		//backgroundimage1.addEventListener('mouseout',fadeBG);
		//backgroundimage1.addEventListener('mouseover',normalBG);
		
		
		function scaleUp(thatid){
		thatid.classList.toggle('scaleup');
	}
			function scaleDown(thatid){
		thatid.classList.toggle('scaleup');
				
	}
		
// Get the modal
const loginmodal = document.getElementById('loginmodal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == loginmodal) {
        loginmodal.style.display = "none";
    }
}


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


		
		function underlineMe(thatid){
		//document.querySelector('#text2').classList.toggle('underlinesmooth');
	}
			function removeUnderline(thatid){
		//document.querySelector('#text2').classList.toggle('underlinesmooth');
	}
		
		
				function glowBorder(thatid){
	//	document.querySelector('#testimonials').classList.toggle('borderglow');
	}
			function removeGlowBorder(thatid){
	//	document.querySelector('#testimonials').classList.toggle('borderglow');
	}
		
			function scaleUp4(thatid){
	//	document.querySelector('#videos').classList.toggle('fontsize32');
	}
			function scaleDown4(thatid){
	//	document.querySelector('#videos').classList.toggle('fontsize32');
	}
		
					function changeBGColorRed(thatid){
		//document.querySelector('#contact').classList.toggle('redbackground');
			//			document.querySelector('#contact').style.backgroundColor = 'lightgreen';
	}
			function changeBGColorGray(thatid){
		//document.querySelector('#contact').classList.toggle('redbackground');
			//	document.querySelector('#contact').style.backgroundColor = '#f1f1f1';
			
	}
function fadeBG() {
//	document.querySelector('#backgroundimage1').classList.toggle('faded');
}
		
		function normalBG() {
//	document.querySelector('#backgroundimage1').classList.toggle('faded');
}

		function displayLoginScreen() {
	//document.querySelector('#loginscreen').style.display = 'block';
	document.getElementById('loginscreen').style.display='block';
}

		function closeLoginScreen() {
	document.querySelector('#loginscreen').style.display = 'none';
}

function displayDropDownMenu() {
  if (topnav.className === "topnav") {
    topnav.className += " responsive";
  } else {
    topnav.className = "topnav";
  }
}
