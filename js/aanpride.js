"use strict";

let expanded = '0';
const hamburgericon = document.querySelector('#hamburgericon');
const menu = document.querySelector('#menu');

hamburgericon.addEventListener('click', expandOrContractMenu);

function expandOrContractMenu() {
    if (expanded === '0') {
        menu.style.display = 'block';
    }
    
    else if (expanded === '1') {
        menu.style.display = 'none';  
    }
}