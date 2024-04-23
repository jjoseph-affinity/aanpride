"use strict";

const productionunchecked = document.querySelector('#productionunchecked');
const pendingunchecked = document.querySelector('#pendingunchecked');
const atheneunchecked = document.querySelector('#atheneunchecked');
const fgunchecked = document.querySelector('#fgunchecked');
const allianzunchecked = document.querySelector('#allianzunchecked');
const ytd= document.querySelector('#ytd');
const last90 = document.querySelector('#last90');
const last60 = document.querySelector('#last60');
const last30 = document.querySelector('#last30');
const custom = document.querySelector('#custom');
let a = 0;
let firstname = '';
let lastname = '';

productionunchecked.addEventListener('click', checkProduction);
pendingunchecked.addEventListener('click', checkPending);
atheneunchecked.addEventListener('click', checkAthene);
fgunchecked.addEventListener('click', checkFG);
allianzunchecked.addEventListener('click', checkAllianz);
ytd.addEventListener('click', checkYTD);
last90.addEventListener('click', checkLast90);
last60.addEventListener('click', checkLast60);
last30.addEventListener('click', checkLast30);
custom.addEventListener('click', checkCustom);




function checkProduction() {
    productionunchecked.classList.toggle('fa-square-o');
    productionunchecked.classList.toggle('fa-square');
}

function checkPending() {
    pendingunchecked.classList.toggle('fa-square-o');
    pendingunchecked.classList.toggle('fa-square');
}

function checkAthene() {
    atheneunchecked.classList.toggle('fa-square-o');
    atheneunchecked.classList.toggle('fa-square');
}

function checkFG() {
    fgunchecked.classList.toggle('fa-square-o');
    fgunchecked.classList.toggle('fa-square');
}

function checkAllianz() {
    allianzunchecked.classList.toggle('fa-square-o');
    allianzunchecked.classList.toggle('fa-square');
}

function checkYTD() {
    console.log ('ytd');
    ytd.classList.toggle('fa-circle-o');
    ytd.classList.toggle('fa-circle');
    
    if (last90.classList.contains('fa-circle')) {
    last90.classList.remove('fa-circle');
    last90.classList.add('fa-circle-o');
    }
    
    if (last60.classList.contains('fa-circle')) {
    last60.classList.remove('fa-circle');
    last60.classList.add('fa-circle-o');
    }
    
    if (last30.classList.contains('fa-circle')) {
    last30.classList.remove('fa-circle');
    last30.classList.add('fa-circle-o');
    }
    
    if (custom.classList.contains('fa-circle')) {
    custom.classList.remove('fa-circle');
    custom.classList.add('fa-circle-o');
    }
}

function checkLast90() {
    console.log ('last 90');
    last90.classList.toggle('fa-circle-o');
    last90.classList.toggle('fa-circle');
    
    if (ytd.classList.contains('fa-circle')) {
        console.log ('ytd circle removed');
    ytd.classList.remove('fa-circle');
    ytd.classList.add('fa-circle-o');
    }
    
    if (last60.classList.contains('fa-circle')) {
    last60.classList.remove('fa-circle');
    last60.classList.add('fa-circle-o');
    }
    
    if (last30.classList.contains('fa-circle')) {
    last30.classList.remove('fa-circle');
    last30.classList.add('fa-circle-o');
    }
    
    if (custom.classList.contains('fa-circle')) {
    custom.classList.remove('fa-circle');
    custom.classList.add('fa-circle-o');
    }
}

function checkLast60() {
    last60.classList.toggle('fa-circle-o');
    last60.classList.toggle('fa-circle');
    
    if (ytd.classList.contains('fa-circle')) {
    ytd.classList.remove('fa-circle');
    ytd.classList.add('fa-circle-o');
    }
    
    if (last90.classList.contains('fa-circle')) {
    last90.classList.remove('fa-circle');
    last90.classList.add('fa-circle-o');
    }
    
    if (last30.classList.contains('fa-circle')) {
    last30.classList.remove('fa-circle');
    last30.classList.add('fa-circle-o');
    }
    
    if (custom.classList.contains('fa-circle')) {
    custom.classList.remove('fa-circle');
    custom.classList.add('fa-circle-o');
    }
}

function checkLast30() {
    last30.classList.toggle('fa-circle-o');
    last30.classList.toggle('fa-circle');
    
    if (ytd.classList.contains('fa-circle')) {
    ytd.classList.remove('fa-circle');
    ytd.classList.add('fa-circle-o');
    }
    
    if (last90.classList.contains('fa-circle')) {
    last90.classList.remove('fa-circle');
    last90.classList.add('fa-circle-o');
    }
    
    if (last60.classList.contains('fa-circle')) {
    last60.classList.remove('fa-circle');
    last60.classList.add('fa-circle-o');
    }
    
    if (custom.classList.contains('fa-circle')) {
    custom.classList.remove('fa-circle');
    custom.classList.add('fa-circle-o');
    }
}

function checkCustom() {
    custom.classList.toggle('fa-circle-o');
    custom.classList.toggle('fa-circle');
    
    if (ytd.classList.contains('fa-circle')) {
    ytd.classList.remove('fa-circle');
    ytd.classList.add('fa-circle-o');
    }
    
    if (last90.classList.contains('fa-circle')) {
    last90.classList.remove('fa-circle');
    last90.classList.add('fa-circle-o');
    }
    
    if (last60.classList.contains('fa-circle')) {
    last60.classList.remove('fa-circle');
    last60.classList.add('fa-circle-o');
    }
    
    if (last30.classList.contains('fa-circle')) {
    last30.classList.remove('fa-circle');
    last30.classList.add('fa-circle-o');
    }
}


function getRTInfo(a) {
console.log ('ran ' + a);
   const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById('info-' + a).innerHTML = xhttp.responseText;
        console.log(xhttp.responseText);
    }
};
	
xhttp.open("POST", "../myproduction/ajax/get-rt-info.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("FirstName=" + firstname + "&LastName=" + lastname); 
}

for (a = 0; a <= 9; a ++) {
    console.log ('a=' + a);
    firstname = document.querySelector('#firstname-' + a).textContent;
    lastname = document.querySelector('#lastname-' + a).textContent;
    
    console.log (firstname);
    
    getRTInfo(a);
        

}