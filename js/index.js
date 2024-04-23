"use strict";

const spaceadder = document.querySelector('#spaceadder');
const aanstorysplash2 = document.querySelector('#aanstorysplash');
const robert = document.querySelector('#robert');

let animationran = 'no';

function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)

    );
}


const triggeraanstory = document.querySelector('#triggeraanstory');

document.addEventListener('scroll', function () {
    const messageText = isInViewport(triggeraanstory) ?
        '' :
        '';
  
    if (isInViewport && animationran === 'no') {
        console.log('yes');
        aanstorysplash2.classList.toggle('w3-animate-opacity');
        aanstorysplash2.classList.remove('hideme');
        spaceadder.classList.remove('margin1000top-');
           aanstorysplash.classList.remove('opacity0');
        //const myTimeout = setTimeout(myGreeting, 800);
        animationran = 'yes';
    }
    
    

}, {
    passive: true
});


/*function myGreeting() {
    console.log('ran');
    aanstorysplash.classList.remove('opacity0');
}*/



function addMap() {
    
    const screenavailwidth = window.screen.availWidth;
    
  // create a new div element
    const mapsmall = document.querySelector('#mapsmall');
    const mapmedium = document.querySelector('#mapmedium');
    const maplarge = document.querySelector('#maplarge');
	
  // Set map sizes
	

	
	  // create attributes for the new map
	
			// If on a mobile device or small device or portrait mode
	
	if (screenavailwidth <= '415') {
		
mapsmall.classList.toggle('hideme');
		
	}

else if (screenavailwidth > '415' && screenavailwidth <= '816') {
		
mapmedium.classList.toggle('hideme');
		
	}
	
else if (screenavailwidth > '816') {
		
maplarge.classList.toggle('hideme');
		
	}
    
    else {
        mapsmall.classList.toggle('hideme');
    }
    
}

addMap();