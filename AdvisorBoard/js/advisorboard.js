"use strict";

function displayPhone(thatID, thatContactID) {
    
    document.getElementById(thatID).textContent = '.........';
    
 const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById(thatID).innerHTML = xhttp.responseText;
		
    }
};
	
xhttp.open("POST", "../SeminarBoard/ajax/display-phone-number.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("ContactID=" + thatContactID);   
    
}

function confirmAttendance(ID0, contactID, attendeeName, seminarName) {
    
 if (window.confirm('Confirm ' + attendeeName + "'s attendance?'")) {
    confirmAttendance2(ID0, contactID, attendeeName, seminarName);
 }

}


function confirmAttendance2(ID0, contactID, attendeeName, seminarName) {
    
    document.getElementById(ID0).textContent = 'confirming...';

   const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById(ID0).innerHTML = xhttp.responseText;
        console.log(xhttp.responseText);
    }
};
	
xhttp.open("POST", "../AdvisorBoard/ajax/confirm-attendance.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("ContactID=" + contactID + "&AttendeeName=" + attendeeName + "&SeminarName=" + seminarName);  
}



function reportNoShow(ID0, contactID, attendeeName, seminarName) {
    
 if (window.confirm('Report ' + attendeeName + " as a no show?'")) {
    reportNoShow2(ID0, contactID, attendeeName, seminarName);
 }

}


function reportNoShow2(ID0, contactID, attendeeName, seminarName) {
    
    document.getElementById(ID0).textContent = 'confirming...';

   const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById(ID0).innerHTML = xhttp.responseText;
        console.log(xhttp.responseText);
    }
};
	
xhttp.open("POST", "../AdvisorBoard/ajax/report-noshow.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("ContactID=" + contactID + "&AttendeeName=" + attendeeName + "&SeminarName=" + seminarName);  
}




function sendAway(ID0, contactID, attendeeName, seminarName) {
    
 if (window.confirm('Send away ' + attendeeName + "?")) {
    sendAway2(ID0, contactID, attendeeName, seminarName);
 }

}


function sendAway2(ID0, contactID, attendeeName, seminarName) {
    
    document.getElementById(ID0).textContent = 'confirming...';

   const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById(ID0).innerHTML = xhttp.responseText;
        console.log(xhttp.responseText);
    }
};
	
xhttp.open("POST", "../AdvisorBoard/ajax/send-away.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("ContactID=" + contactID + "&AttendeeName=" + attendeeName + "&SeminarName=" + seminarName);  
}


