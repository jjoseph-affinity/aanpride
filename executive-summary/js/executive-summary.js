"use strict";

let teammembercount = 4;

document.querySelector('#single').addEventListener('click', function() {
  setUnderline(this.id);
});

document.querySelector('#married').addEventListener('click', function() {
  setUnderline(this.id);
});

document.querySelector('#retired').addEventListener('click', function() {
  setUnderline(this.id);
});

document.querySelector('#working').addEventListener('click', function() {
  setUnderline(this.id);
});

document.querySelector('#square-trust-intake').addEventListener('click', function() {
  selectTrustIntake(this.id);
});

document.querySelector('#check-trust-intake').addEventListener('click', function() {
  deSelectTrustIntake(this.id);
});

document.querySelector('#square-trust-signing').addEventListener('click', function() {
  selectTrustSigning(this.id);
});

document.querySelector('#check-trust-signing').addEventListener('click', function() {
  deSelectTrustSigning(this.id);
});


document.querySelector('#addateammember').addEventListener('click', displayWhoWhat);



function setUnderline(that) {
    
    document.getElementById(that).classList.toggle('blackunderline');
    
}

function selectTrustIntake(that) {
    
    document.getElementById('square-trust-intake').classList.add('hideme');
    document.getElementById('square-trust-intake').classList.remove('fa');
    
    document.getElementById('check-trust-intake').classList.remove('hideme');
    document.getElementById('check-trust-intake').classList.add('fa');
    document.getElementById('check-trust-intake').classList.add('fa-check-square');
    
}

function deSelectTrustIntake(that) {
    
    document.getElementById('check-trust-intake').classList.add('hideme');
    document.getElementById('check-trust-intake').classList.remove('fa');
    
    document.getElementById('square-trust-intake').classList.remove('hideme');
    document.getElementById('square-trust-intake').classList.add('fa');
    document.getElementById('square-trust-intake').classList.add('fa-square-o');
    
}

function selectTrustSigning(that) {
    
    document.getElementById('square-trust-signing').classList.add('hideme');
    document.getElementById('square-trust-signing').classList.remove('fa');
    
    document.getElementById('check-trust-signing').classList.remove('hideme');
    document.getElementById('check-trust-signing').classList.add('fa');
    document.getElementById('check-trust-signing').classList.add('fa-check-square');
    
}

function deSelectTrustSigning(that) {
    
    document.getElementById('check-trust-signing').classList.add('hideme');
    document.getElementById('check-trust-signing').classList.remove('fa');
    
    document.getElementById('square-trust-signing').classList.remove('hideme');
    document.getElementById('square-trust-signing').classList.add('fa');
    document.getElementById('square-trust-signing').classList.add('fa-square-o');
    
}

function displayWhoWhat() {
    
    document.querySelector('#whodiv').style.display = 'inline-block';
    document.querySelector('#whatdiv').style.display = 'inline-block';
    
}

function addMember() {
    
document.querySelector('#person4').textContent = document.querySelector('#who').value;
document.querySelector('#teammember4').value = document.querySelector('#what').value;
    
document.querySelector('#row4').style.display = 'inline-block';
document.querySelector('#image4').style.display = 'inline-block';
document.querySelector('#span4').style.display = 'inline-block';
document.querySelector('#teammember4').style.display = 'inline-block';
    
teammembercount = teammembercount + 1;
    
}
