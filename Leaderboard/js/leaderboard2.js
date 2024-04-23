"use strict";
const leaderboard1 = setTimeout(showAnnuityLeaderBoard, 1000);
const annuities = document.querySelector('#annuities');
const life = document.querySelector('#life');

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
