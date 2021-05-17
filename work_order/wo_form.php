<?php
//PHP Validation
function validatePHP() {
	
}


?>
<script src="js/submit_wo.js"></script>
<form id="woform" name="woform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
      <p class="form-fields"> 
        <!-- first name field -->
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" value="<?php echo $firstname ?>" readonly style="background-color:#ebebeb">
        <br>
        <!-- last name field -->
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" value="<?php echo $lastname ?>" readonly style="background-color:#ebebeb">
        <br>
        <!-- cord username field -->
        <label for="cord_username">Username</label>
        <input type="text" id="cord_username" name="cord_username" value="<?php echo $username ?>" readonly style="background-color:#ebebeb">
        <br>
		  
	    <!-- user status list --> 
        <!-- required field -->
        <label for="user_status">Faculty, Staff, Alumni, Student, Other?</label>
        <select id = "user_status" name="user_status">
          <option value = "Choose One" disabled selected value>Choose One</option>
          <option value = "Faculty">Faculty</option>
          <option value = "Staff">Staff</option>
		  <option value = "Alumni">Alumni</option>
          <option value = "Student">Student</option>
          <option value = "Other">Other</option>
        </select><br><br>
        
		<!-- phone number field --> 
        <!-- optional field -->
        <label for="phoneNum">Phone Number</label>
        <input type="tel" id="phoneNum" name="phoneNum" pattern="\(?[0-9]{3}\)?-[0-9]{3}-[0-9]{4}" placeholder="(999)-999-9999"><br><br>
        <!-- figure out input validation to make sure people are submitting a valid #, work for all countries -->
		
<!-------------------------TRIGGERED BY FACULTY OR STAFF DROPDOWN --------------------------->
		<!-- office extension field --> 
        <!-- optional field -->
        <div id="office_extension_field" style="display: none; width: 80%;"><label for="office_extension">Office Extension</label>
        <input input type="number" id="office_extension" name="office_extension" placeholder="1234"><br><br></div>
<!-------------------------TRIGGERED BY FACULTY OR STAFF DROPDOWN END------------------------>
        
        <!-- contact me radio button buttons--> 
        <!-- optional field -->
        <label for="preferred_contact">Contact Me By: </label><br><br>
        <label for="phone_Radio">
          <input type="radio" id="phone_Radio" name="preferred_contact" value="phoneNum">
          Phone</label><br><br>
        <label for="email_Radio">
          <input type="radio" id="email_Radio" name="preferred_contact" value="email">
          Email</label><br><br><br>
		  
        <!-- catagory list --> 
        <!-- required field -->
		<div id="catagory_choices" style="width: 80%;">
        <label for="category">Category</label>
        <select id = "category" name="category">
          <option value = "Choose One">Choose One</option>
          <option value = "Email">Outlook 365</option>
          <option value = "Printer">Uniprint Station/Printer</option>
		  <option value = "Moodle">Moodle</option>
          <option value = "WiFi">Wi-Fi</option>
		  <option value = "LabClass">Lab or Classroom</option>
          <option value = "Other">Other</option>
        </select><br></div>

<!-------------------------TRIGGERED BY WIFI DROPDOWN -------------------------------------->
		<!-- duration textarea --> 
        <!-- required field -->
        <div id="duration_field" style="display: none; width: 80%;"><label for="duration">How long has this been happening?</label>
        <textarea id="duration" name="duration" placeholder="Duration..." style="height:50px"></textarea><br> </div> 
		
		<!-- phone os textarea --> 
        <!-- optional field -->
        <div id="phone_os_field" style="display: none; width: 80%;"><label for="phone_os">Phone software (if applicable)</label>
        <textarea id="phone_os" name="phone_os" placeholder="Phone software..." style="height:50px"></textarea><br></div>
		
		<!-- computer os textarea --> 
        <!-- optional field -->
        <div id="computer_os_field" style="display: none; width: 80%;"><label for="computer_os">Computer software (if applicable)</label>
        <textarea id="computer_os" name="computer_os" placeholder="Computer software..." style="height:50px"></textarea><br></div>
		  
		<!-- uptime textarea --> 
        <!-- optional field -->
        <div id="uptime_field" style="display: none; width: 80%;"><label for="device_uptime">When was the last time the device(s) was/were restarted?</label>
        <textarea id="device_uptime" name="device_uptime" placeholder="Last restart..." style="height:50px"></textarea><br></div>
		
		<!-- location textarea --> 
        <!-- required field -->
        <div id="location_field" style="display: none; width: 80%;"><label for="location">Location (as specific as possible)</label>
        <textarea id="location" name="location" placeholder="Location..." style="height:50px"></textarea><br></div>
		
		<!-- ip address textarea --> 
        <!-- required field -->
        <div id="ip_adress_field" style="display: none; width: 80%;">
		<div class="tooltip">
		<label for="ip_address">IP Address</label>
		<div class="tip_mark">?</div>
  		<span class="tooltiptext">Google 'what is my IP address?'</span> </div>
        <textarea id="ip_address" name="ip_address" placeholder="IP addresses for all devices..." style="height:50px"></textarea><br></div>
		  
		<!-- mac address textarea --> 
        <!-- required field -->
        <div id="mac_adress_field" style="display: none; width: 80%;">
		<div class="tooltip">
		<label for="mac_address">MAC Address</label>
		<div class="tip_mark">?</div>
  		<span class="tooltiptext">Google 'what is my MAC address?' *NOTE: This has no relation to Apple, all devices have a MAC address</span> </div>
        <textarea id="mac_address" name="mac_address" placeholder="MAC addresses for all devices..." style="height:50px"></textarea><br></div>
		
		<!-- notes textarea --> 
        <!-- optional field -->
        <div id="notes_field" style="display: none; width: 80%;"><label for="notes">Additional Notes (optional)</label>
        <textarea id="notes" name="notes" placeholder="Notes..." style="height:200px"></textarea><br></div>
		
		<p id="notice" style="display: none; font-weight: bold; color: #930C30">NOTE: If your roommate(s) are having similar issues, they also have to send ITS this information</p>
<!-------------------------TRIGGERED BY WIFI DROPDOWN END------------------------------------>

<!-------------------------TRIGGERED BY PRINTER DROPDOWN ------------------------------------>
        <!-- building list --> 
        <!-- required field -->
		<div id="building_choices" style="display: none; width: 80%;">
        <label for="building">Building</label>
        <select id = "building" name="building">
          <option value = "Choose One" disabled selected value>Choose One</option>
          <option value = "BogsEast">Bogstad East</option>
          <option value = "BogsManor">Bogstad Manor</option>
		  <option value = "ParkRegion">Park Region</option>
          <option value = "Olin">Olin</option>
          <option value = "Library">Library</option>
		  <option value = "FishBowl">Fish Bowl</option>
		  <option value = "Hallet">Hallet</option>
		  <option value = "Erickson">Erickson</option>
		  <option value = "ICS1">ISC Floor 1</option>
		  <option value = "ISC2">ISC Floor 2</option>
		  <option value = "ParkeSLC">Parke SLC</option>
		  <option value = "Maize">Maize</option>
		  <option value = "GrantResRoom">Grant Resource Room</option>
		  <option value = "Grant118">Grant 118</option>
		  <option value = "Fjelstad">Fjelstad</option>
		  <option value = "Livedalen">Livedalen</option>
		  <option value = "Hoyum">Hoyum</option>
		  <option value = "CSS">Center for Student Success</option>
		  <option value = "BoeOlson">Boe Olson</option>
        </select><br>
		</div>
		
		<!-- uniprint station or printer buttons--> 
        <!-- required field -->
		<div id="printer_radios" style="display: none; width: 80%;">
		<p style="text-align: left;">What is having the issue?</p><br>
        <label for="uniprint_issue">Uniprint Station or Uniprint Printer </label><br><br>
        <label for="uniprint_Radio">
          <input type="radio" id="uniprint_Radio" name="uniprint_issue" value="uniprint_station">
          Uniprint Station</label><br><br>
        <label for="printer_Radio">
          <input type="radio" id="printer_Radio" name="uniprint_issue" value="uniprint_printer">
          Uniprint Printer</label><br><br><br></div>
        
<!-------------------------TRIGGERED BY PRINTER DROPDOWN END--------------------------------->

<!-------------------------TRIGGERED BY Lab Classroom DROPDOWN ------------------------------>
        <!-- classroom location textarea --> 
        <!-- required field -->
        <div id="classroom_location" style="display: none; width: 80%;"><label for="classroom">Location (as specific as possible)</label>
        <textarea id="classroom" name="classroom" placeholder="Location..." style="height:50px"></textarea><br></div>
		
		<!-- building list --> 
        <!-- required field -->
		<div id="classroom_issue_choices" style="display: none; width: 80%;">
        <label for="common_issues">Issue Type</label>
        <select id = "common_issues" name="common_issues">
          <option value = "Choose One">Choose One</option>
          <option value = "Instructor Station">Instructor Station Computer Issue</option>
          <option value = "Projector Issue">Projector</option>
		  <option value = "Sound Issue">Sound</option>
          <option value = "Doc Cam">Doc Cam</option>
          <option value = "Other">Other</option>
        </select><br>
		</div>
		
<!-------------------------TRIGGERED BY Lab Classroom DROPDOWN END--------------------------->
		
<!-------------------------TRIGGERED BY OTHER DROPDOWN -------------------------------------->
        <!-- comments textarea --> 
        <!-- otional field -->
        <div id="summary_field" style="display: none; width: 80%;"><label for="summary">Summary</label>
        <textarea id="summary" name="summary" placeholder="Issue Summary..." style="height:200px"></textarea><br></div>
        
        <!-- allow user to upload image of error or issue --> 
        <!-- optional field -->
        <div id="error_image" style="display: none;"><label for="file-input">Upload an image or images</label><br>
        <input type="file" accept="image/*" id="file-input"><br>
		<input type="file" accept="image/*" id="file-input"><br><br></div>
<!-------------------------TRIGGERED BY OTHER DROPDOWN END----------------------------------->
		
        <!-- permission to contact checkbox --> 
        <!-- required field -->
        <label for="contact-perm">By checking this box, you are agreeing to let us contact you:
          <input type="checkbox" id="contact-perm" name="contact-perm">
        </label><br><br><br>
        
        <!-- submit button-->
        <input type="submit" value="Submit" name="submit">
      </p>
    </form>

<script>
//SOURCE CODE: http://jsfiddle.net/2kGzZ/2/   
	$('#category').on('change', function () {
    if (this.value == 'Other') {
		//other options
        $('#summary_field').show();
		$('#error_image').show();
		//wifi options
		$('#duration_field').hide();
		$('#phone_os_field').hide();
		$('#computer_os_field').hide();
		$('#uptime_field').hide();
		$('#location_field').hide();
		$('#ip_adress_field').hide();
		$('#mac_adress_field').hide();
		$('#notes_field').hide();
		$('#notice').hide();
		$('#building_choices').hide();
		$('#printer_radios').hide();
		$('#classroom_issue_choices').hide();
		$('classroom_location').hide();
    } 
	else if (this.value == 'Moodle') {
		//other options
        $('#summary_field').show();
		$('#error_image').show();
		//wifi options
		$('#duration_field').hide();
		$('#phone_os_field').hide();
		$('#computer_os_field').hide();
		$('#uptime_field').hide();
		$('#location_field').hide();
		$('#ip_adress_field').hide();
		$('#mac_adress_field').hide();
		$('#notes_field').hide();
		$('#notice').hide();
		$('#building_choices').hide();
		$('#printer_radios').hide();
		$('#classroom_issue_choices').hide();
		$('classroom_location').hide();
    }
	else if (this.value == 'Email') {
		//other options
        $('#summary_field').show();
		$('#error_image').show();
		//wifi options
		$('#duration_field').hide();
		$('#phone_os_field').hide();
		$('#computer_os_field').hide();
		$('#uptime_field').hide();
		$('#location_field').hide();
		$('#ip_adress_field').hide();
		$('#mac_adress_field').hide();
		$('#notes_field').hide();
		$('#notice').hide();
		$('#building_choices').hide();
		$('#printer_radios').hide();
		$('#classroom_issue_choices').hide();
		$('classroom_location').hide();
    }
	else if (this.value == 'Printer') {  
		$('#building_choices').show();
		$('#printer_radios').show();
		//other options
        $('#summary_field').show();
		$('#error_image').show();
		//wifi options
		$('#duration_field').hide();
		$('#phone_os_field').hide();
		$('#computer_os_field').hide();
		$('#uptime_field').hide();
		$('#location_field').hide();
		$('#ip_adress_field').hide();
		$('#mac_adress_field').hide();
		$('#notes_field').hide();
		$('#notice').hide();
		$('#classroom_issue_choices').hide();
		$('classroom_location').hide();
    }
	else if (this.value=='WiFi'){
		//wifi options
		$('#duration_field').show();
		$('#phone_os_field').show();
		$('#computer_os_field').show();
		$('#uptime_field').show();
		$('#location_field').show();
		$('#ip_adress_field').show();
		$('#mac_adress_field').show();
		$('#notes_field').show();
		$('#notice').show();
		//other options
		$('#summary_field').hide();
		$('#error_image').hide();
		$('#building_choices').hide();
		$('#printer_radios').hide();
		$('#classroom_issue_choices').hide();
		$('classroom_location').hide();
	}   
	else if (this.value=='LabClass'){
		//other options
        $('#summary_field').show();
		$('#error_image').hide();
		//wifi options
		$('#duration_field').hide();
		$('#phone_os_field').hide();
		$('#computer_os_field').hide();
		$('#uptime_field').hide();
		$('#location_field').hide();
		$('#ip_adress_field').hide();
		$('#mac_adress_field').hide();
		$('#notes_field').hide();
		$('#notice').hide();
		$('#building_choices').hide();
		$('#printer_radios').hide();
		$('#classroom_issue_choices').show();
		$('classroom_location').show();
	}   
	else {
		//other options
        $('#summary_field').hide();
		$('#error_image').hide();
		//wifi options
		$('#duration_field').hide();
		$('#phone_os_field').hide();
		$('#computer_os_field').hide();
		$('#uptime_field').hide();
		$('#location_field').hide();
		$('#ip_adress_field').hide();
		$('#mac_adress_field').hide();
		$('#notes_field').hide();
		$('#notice').hide();
		$('#building_choices').hide();
		$('#printer_radios').hide();
		$('#classroom_issue_choices').hide();
		$('classroom_location').hide();
    }

});
	
$('#user_status').on('change', function () {
    if (this.value == 'Faculty') {
        $('#office_extension_field').show();
    }
	else if (this.value == 'Staff') {
        $('#office_extension_field').show();
    } 
	else {
        $('#office_extension_field').hide();
    }

});
</script>