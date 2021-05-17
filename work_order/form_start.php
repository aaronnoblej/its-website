<!-- user status list --> 
<!-- required field -->
<label for="user_status">Faculty, Staff, Alumni, Student, Other?</label>
<select id = "user_status" name="user_status" onchange="undoColor('user_status')">
  <option value = "Choose One" disabled selected value>Choose One</option>
  <option value = "Faculty">Faculty</option>
  <option value = "Staff">Staff</option>
  <option value = "Alumni">Alumni</option>
  <option value = "Student">Student</option>
  <option value = "Other">Other</option>
</select>
<br>
<br>
<!-- phone number field -->
<label for="phoneNum">Phone Number</label>
<input type="tel" id="phoneNum" name="phoneNum" pattern="^\d{3}-?\d{3}-?\d{4}$" placeholder="(999)-999-9999">
<br>
<br>
<!-- figure out input validation to make sure people are submitting a valid #, work for all countries --> 

<!-- office extension field --> 
<!-- optional field -->
<div id="office_extension_option" style="width: 80%; padding-left: 5px;">
<div class="tooltip">
  <label for="office_extension">Office Extension</label>
  <div class="tip_mark">?</div>
  <span class="tooltiptext">For Faculty and Staff ONLY</span> </div>
<input type="number" id="office_extension" name="office_extension" placeholder="1234">
<br>
<br></div>

<!-- contact me radio button buttons-->
<label for="preferred_contact">Contact Me By: </label>
<br>
<br>
<label for="phone_Radio">
  <input type="radio" id="phone_Radio" name="preferred_contact" value="Phone">
  Phone</label>
<br>
<br>
<label for="email_Radio">
  <input type="radio" id="email_Radio" name="preferred_contact" value="Email">
  Email</label>
<br>
<br>
<br>
