"use strict";

const allianz = document.querySelector('#allianz');
const americo = document.querySelector('#americo');
const athene = document.querySelector('#athene');
const fg = document.querySelector('#fg');

allianz.addEventListener("mouseover", function() {highLiteColor(this.id);}); 
allianz.addEventListener("mouseout", function() {removeHighLiteColor(this.id);}); 

americo.addEventListener("mouseover", function() {highLiteColor(this.id);}); 
americo.addEventListener("mouseout", function() {removeHighLiteColor(this.id);});

athene.addEventListener("mouseover", function() {highLiteColor(this.id);}); 
athene.addEventListener("mouseout", function() {removeHighLiteColor(this.id);});

fg.addEventListener("mouseover", function() {highLiteColor(this.id);}); 
fg.addEventListener("mouseout", function() {removeHighLiteColor(this.id);});

function highLiteColor(that) {
//    that.classList.toggle('greenbg');
}

function removeHighLiteColor(that) {
   // that.classList.toggle('greenbg');
}