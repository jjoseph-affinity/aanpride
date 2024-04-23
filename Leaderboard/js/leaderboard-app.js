"use strict";
const leaderboard1 = setTimeout(showAnnuityLeaderBoard, 1000);
const annuities = document.querySelector('#annuities');
const life = document.querySelector('#life');
const producersnames = document.getElementsByName('#producersnames');

for (let i = 0; i < producersnames.length; i++) {
  document.getElementsByName('producersnames')['i'].addEventListener('click', displayWall);
}

function displayWall(){
	console.log ('test');
}

function showLifeLeaderBoard() {
 annuities.style.display = 'none';
	//annuities.classList.toggle('hidden');
	life.style.display = 'block';
     setTimeout(showAnnuityLeaderBoard, 15000);
}


function showAnnuityLeaderBoard(){
	life.style.display = 'none';
	//life.classList.remove('hideme');
	//annuities.classList.toggle('hidden');
	 annuities.style.display = 'block';
	  const leaderboard1 = setTimeout(showLifeLeaderBoard, 45000);
}
