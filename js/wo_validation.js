function validate() {
  if(document.forms["woform"]["user_status"].value == "Choose One") {
    alert("Please choose whether you are a student, faculty/staff member, or alumnus.");
    document.forms["woform"]["user_status"].style.borderColor = "#F00";
    window.location.href = "#user_status";
    return false;
  }
  if(document.forms["woform"]["summary"].value == "") {
    alert("Please describe your issue.");
      document.forms["woform"]["summary"].style.borderColor = "#F00";
      window.location.href = "#summary";
      return false;
  }
  if(document.forms["woform"]["phoneNum"].value == "" && document.forms["woform"]["preferred_contact"].value == "Phone") {
    alert("Please enter a phone number if you would like to receive a response via phone.")
    window.location.href='#phoneNum';
    return false;
  }
}
function undoColor(elementId) {
  document.forms["woform"][elementId].style.borderColor = "#CCCCCC";
}