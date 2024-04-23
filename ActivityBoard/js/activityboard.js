"use strict";


function sendTextReminder(ID, activityID, appointmentServicingAdvisor, activityStartDate, activityStartTime, activitySubject, activityLinkedContactID) {
    
 if (window.confirm('Txt ?')) {
    retrievePhoneNumber(ID, activityID, appointmentServicingAdvisor, activityStartDate, activityStartTime, activitySubject, activityLinkedContactID);
 }

}

function sendEmailReminder(ID, ID0, contactID, thatID, thatName, thatGuestName, thatSeminarID, thatSeminarName) {
    
 if (window.confirm('E-mail ' + thatName + '?')) {
    retrieveEmailAddress(ID, ID0, contactID, thatID, thatName, thatGuestName, thatSeminarID, thatSeminarName);
 }

}


function retrievePhoneNumber(ID, activityID, appointmentServicingAdvisor, activityStartDate, activityStartTime, activitySubject, activityLinkedContactID) {
    
    document.getElementById(ID).textContent = 'txting...';

   const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById(ID).innerHTML = xhttp.responseText;
          document.getElementById(ID).disabled = true;
        console.log(xhttp.responseText);
        alert (activityID);
        alert (activitySubject);
        alert (activityStartDate);
        alert (activityStartTime);
        alert (activityLinkedContactID);
    }
};
	
xhttp.open("POST", "../ActivityBoard/ajax/activityboard-send-txt-message.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("ID=" + ID + "&ActivityID=" + activityID + "&AppointmentServicingAdvisor=" + appointmentServicingAdvisor + "&ActivityStartDate=" + activityStartDate + "&ActivityStartTime=" + activityStartTime + "&ActivitySubject=" + activitySubject + "&ActivityLinkedContactID=" + activityLinkedContactID);  
  
}

function retrieveEmailAddress(ID, ID0, contactID, thatID, thatName, thatGuestName, thatSeminarID, thatSeminarName) {
    
    document.getElementById(ID).textContent = 'e-mailing';

   const xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById(ID).innerHTML = xhttp.responseText;
          document.getElementById(ID).disabled = true;
        console.log(xhttp.responseText);
    }
};
	
xhttp.open("POST", "../SeminarBoard/ajax/send-email.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("ID=" + ID + "&ID0=" + ID0 + "&ContactID=" + contactID + "&ThatID=" + thatID + "&ThatName=" + thatName + "&GuestName=" + thatGuestName + "&SeminarID=" + thatSeminarID + "&SeminarName=" + thatSeminarName);  
  
}



