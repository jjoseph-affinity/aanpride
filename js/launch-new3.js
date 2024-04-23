"use strict";
		const learnmoreapps = document.querySelector('#learnmoreapps');
		const learnmoreppod = document.querySelector('#learnmoreppod');
		const virtualnationalleads = document.querySelector('#virtualnationalleads');
		const traditionalseminarsystem = document.querySelector('#traditionalseminarsystem');
		const appsmore = document.querySelector('#appsmore');
		const ppodmore = document.querySelector('#ppodmore');

		learnmoreapps.addEventListener('click', displayMoreApps);
		learnmoreppod.addEventListener('click', displayMorePPOD);

function displayMoreApps(){
		traditionalseminarsystem.style.display = 'none';
		virtualnationalleads.style.width = '100%';
		appsmore.style.display = 'block';
}

function displayMorePPOD(){
		virtualnationalleads.style.display = 'none';
		traditionalseminarsystem.style.width = '100%';
		ppodmore.style.display = 'block';
}