<style>
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    margin-top: 17px;
    padding: 10px;
    line-height: 30px;
    text-align: left;
    display: none;
    position: absolute;
    background-color: #930C30;
    min-width: 160px;
    z-index: 1;
	margin-left: -4px;
}
.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<link href="css/template_css.css" rel="stylesheet" type="text/css">
<header>
  <a href="index.php">  
  <img id="its_logo" src="images/its_favicon_yellow.png" alt="ITS Logo" style="display: inline-block; width: 50px; height: 40px; padding: 7px"> </a>
  <span id="welcome_message"><?php if(isset($_SESSION['FirstName'])) echo strtoupper('WELCOME, ' . $_SESSION['FirstName'] . '!'); ?></span>
  <nav>
    <ul>
		<?php if(isset($_SESSION['Username'])) {
          echo '<li><a href="logout.php">LOG OUT</a></li>';
        } else {
          echo '<li><a href="login.php">LOG IN</a></li>';
        }
        if(isset($_SESSION['GroupNo']) && ($_SESSION['GroupNo'] == 1)) {
          echo '<li><a href="admin/dashboard.php">ADMIN</a></li>';
        }
      ?>
      <li><a href="index.php">HOME</a></li>
      <li><a href="contact.php">CONTACT</a></li>
      <div class="dropdown">
        <li><a href="faq.php">FAQ</a></li>
        <div class="dropdown-content">
          <li><a href="faq_internet.php">Campus Internet Access</a></li><br>
          <li><a href="faq_outlook.php">Email on Smart Phones</a></li><br>
          <li><a href="faq_printer.php">Campus Printing</a></li><br>
		  <li><a href="faq_upkeep.php">Computer Upkeep</a></li><br>
		  <li><a href="faq_networkdrive.php">Connect to a Network Drive</a></li><br>
        </div>
      </div>
      <div class="dropdown">
        <li><a href="submit_wo.php">SUBMIT A WORK ORDER</a></li>
        <div class="dropdown-content">
          <li><a href="submit_wo.php">Generic</a></li><br>
		  <li><a href="outlook_wo.php">Outlook 365</a></li><br>
          <li><a href="labclass_wo.php">Lab Or Classroom</a></li><br>
		  <li><a href="moodle_wo.php">Moodle</a></li><br>
		  <li><a href="wifi_wo.php">WiFi</a></li><br>
		  <li><a href="printer_wo.php">Uniprint Station/Printer</a></li><br>
		  <li><a href="googledrive_wo.php">Google Drive Password Reset</a></li><br>
		  
        </div>
      </div>
      
    </ul>
  </nav>
</header>
