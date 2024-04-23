"use strict";
        const hamburgermenu = document.querySelector('#hamburgermenu');
        const menu = document.querySelector('#menu');

		//const home = document.querySelector('#home');
        const aanstory = document.querySelector('#aanstory');
        const marketing = document.querySelector('#marketing');
        const carriersandproducts = document.querySelector('#carriersandproducts');
        const training = document.querySelector('#training');
        const events = document.querySelector('#events');
        const aanwealthadvisors = document.querySelector('#aanwealthadvisors');
        const redtailcrm = document.querySelector('#redtailcrm');
        const forms = document.querySelector('#forms');
        const taxprojection = document.querySelector('#taxprojection');
        const contactus = document.querySelector('#contactus');
		//const login = document.querySelector('#login');
		//const loginscreen = document.querySelector('#loginscreen');
		const iconcloseloginscreen = document.querySelector('#iconcloseloginscreen');

        hamburgermenu.addEventListener('click',expandOrContractMenu);

        aanstory.addEventListener("mouseover", function() {scaleUp(this.id);}); 
        aanstory.addEventListener("mouseout", function() {scaleDown(this.id);});

        forms.addEventListener('click',displayTaxProjectionForm);
		//login.addEventListener('click',displayLoginScreen);
		

function expandOrContractMenu() {
    console.log ('test');
    menu.classList.toggle('hideme');
    //home.classList.toggle('hideme');
    aanstory.classList.toggle('hideme');
    marketing.classList.toggle('hideme');
    carriersandproducts.classList.toggle('hideme');
    training.classList.toggle('hideme');
    events.classList.toggle('hideme');
    aanwealthadvisors.classList.toggle('hideme');
    redtailcrm.classList.toggle('hideme');
    forms.classList.toggle('hideme');
    contactus.classList.toggle('hideme');
    //login.classList.toggle('hideme');
}
        


//if (iconcloseloginscreen){
		//iconcloseloginscreen.addEventListener('click',closeLoginScreen);
//}
		//backgroundimage1.addEventListener('mouseout',fadeBG);
		//backgroundimage1.addEventListener('mouseover',normalBG);
		
		
		function scaleUp(thatid){
		document.getElementById(thatid).classList.toggle('scaleup');
	}
			function scaleDown(thatid){
		document.getElementById(thatid).classList.toggle('scaleup');
				
	}
		
// Get the modal
/*const loginmodal = document.getElementById('loginmodal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == loginmodal) {
        loginmodal.style.display = "none";
    }
}*/


// Get the modal
/*var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/


		
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


		function displayTaxProjectionForm() {
	taxprojection.classList.toggle('hideme');
}

		function displayLoginScreen() {
	//document.querySelector('#loginscreen').style.display = 'block';
	loginscreen.classList.toggle('hideme');
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



// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
