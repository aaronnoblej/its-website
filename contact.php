<?php
session_start();
$firstname = '';
$lastname = '';
$username = $_SESSION['Username'];
$userId = 0;
if(!isset($_SESSION['Username'])) {
  header('Location: http://its.ajnoble.com/mockup/login.php');
} else {
  //Set user information correctly
  require('admin/db/database.php');
  $db = new database();
  try {
    $db->connect();
    $sql = 'SELECT FirstName, LastName, userId FROM User WHERE UserUsername=:username';
    $ps = $db->getConnection()->prepare($sql);
    $ps->bindParam(':username', $username);
    if($ps->execute()) {
      $result = $ps->fetchAll();
      $firstname = $result[0]['FirstName'];
      $lastname = $result[0]['LastName'];
      $userId = $result[0]['userId'];
    } else {
      die('Connection Error! Please try again.');
    }
  } catch(PDOException $e) {
    die('DATABASE ERROR --- ' . $e->getMessage());
  }
}
if ( isset( $_POST[ 'submit' ] ) ) {

  //Validate that all required fields are not empty
  function validate() {
    $requiredFields = array( $_POST['email'], $_POST[ 'topic' ], $_POST[ 'summary' ] );
    for ( $i = 0; $i < count( $requiredFields ); $i++ ) {
      if ( empty( $requiredFields[ $i ] ) ) {
        echo 'Missing required field!';
        return false;
      }
    }
    if(!isset($_POST['contact-perm'])) {
      echo 'Please check the box to give us permission to contact you.';
      return false;
    }
    return true;
  }

  if ( validate() ) {

    //Set up variables
    $firstname = $_POST[ 'firstname' ];
    $lastname = $_POST[ 'lastname' ];
    $email = $_POST[ 'email' ];
    $phoneNumber = $_POST[ 'phoneNum' ];
    $topic = $_POST[ 'topic' ];
    $preferred_contact = $_POST[ 'preferred_contact' ];
    $message = $_POST[ 'summary' ];

    //Set up message
    $subject = "Message from " . $firstname . " " . $lastname . " - " . $topic;
    $header = "First Name: " . $firstname . "\n" .
    "Last Name: " . $lastname . "\n" .
    "Email: " . $email . "\n" .
    "Phone Number: " . $phoneNumber . "\n" .
    "Response Method: " . $preferred_contact . "\n" .
    "Topic: " . $topic . "\n";
    $message = wordwrap( $message, 70 );

    //Mail message to its@ajnoble.com
    mail( 'its@ajnoble.com', $subject, $message, $header );
    header( 'Location: contactsubmit.php' );

  } else {
    require_once( "contact.php" );
  }

}
?>
<!doctype html>
<html lang="en-US">
<!-- include head section -->
<?php require_once("snippets/head.php"); ?>
<!--title of page-->

<title>Contact Us</title>
<!--Body Starts Here-->
<body>
<!-- Main Container -->
<div class="container"> 
  <!--Creates div for desktop only content-->
  <div class="desktop"> 
    <!-- Navigation -->
    <?php require_once("snippets/header.php"); ?>
    <!--incluce php error handling for if require_once fails--> 
    <!-- Hero Section -->
    <?php require_once("snippets/hero.php"); ?>
  </div>
  <!--Creates div for mobile only content-->
  <div class="only-mobile">
    <?php require_once("snippets/accordion_menu.php"); ?>
  </div>
  <!-- About Section -->
  <section class="content" id="content">
    <p class="text_column">
    <h1>Contact Us</h1>
    <h2>Have a question or concern? Send us a message by filling out the form below!</h2>
    <p class="note">*Note that this page is used for general messages. If you are trying to contact us about a technology problem, please see <a href="submit_wo.php">Submit A Work Order</a></p>
    <hr>
    <br>
    <script type="text/javascript">
      function validate() {
        if(document.forms["contactForm"]["email"].value == "") {
          alert("Please enter an email address.");
          document.forms["contactForm"]["email"].style.borderColor = "#F00";
          return false;
        }
        if(document.forms["contactForm"]["topic"].value == "Choose One") {
          alert("Please choose a topic for your issue.");
          document.forms["contactForm"]["topic"].style.borderColor = "#F00";
          return false;
        }
        if(document.forms["contactForm"]["summary"].value == "") {
          alert("Please describe your issue.");
          document.forms["contactForm"]["summary"].style.borderColor = "#F00";
          return false;
        }
        if(document.forms["contactForm"]["phoneNum"].value == "" && document.forms["contactForm"]["preferred_contact"].value == "Phone") {
          alert("Please enter a phone number if you would like to receive a response via phone.")
          window.location.href='#phoneNum';
          return false;
        }
        if(!document.getElementById("contact-perm").checked) {
          alert("Please check the box to give us permission to contact you.");
          window.location.href='#contact-perm';
          return false;
        }
        return true;
      }
      function undoColor(elementId) {
        document.forms["contactForm"][elementId].style.borderColor = "#CCCCCC";
      }
    </script>
    <form name="contactForm" id="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate();">
      <p class="form-fields"> 
        <!-- first name field -->
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" value="<?php echo $firstname ?>" readonly style="background-color:#ebebeb">
        <br>
        <!-- last name field -->
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" value="<?php echo $lastname ?>" readonly style="background-color:#ebebeb">
        <br>
        <!-- email field -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="johndoe@cord.edu" onchange="undoColor('email')">
        <br>
        
        <!-- phone number field -->
        <label for="phoneNum">Phone Number (Optional)</label>
        <input type="tel" id="phoneNum" name="phoneNum" pattern="^\d{3}-?\d{3}-?\d{4}$" placeholder="(999)-999-9999">
        <br>
        <!-- figure out input validation to make sure people are submitting a valid #, work for all countries --> 
        
        <!-- topic list-->
        <label for="topic">Topic</label>
        <select id="topic" name="topic" onchange="undoColor('topic')">
          <option value = "Choose One">Choose One</option>
          <option value = "Employment">Application/Employment</option>
          <option value = "Report">Report Issue/Complaint</option>
          <option value = "Other">Other</option>
        </select>
        <br>
        <br>
        
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
        
        <!-- comments textarea -->
        <label for="summary">Summary</label>
        <textarea id="summary" name="summary" placeholder="Issue Summary..." style="height:200px" onchange="undoColor('summary')"></textarea>
        <br>
        
        <!-- permission to contact checkbox -->
        <label for="contact-perm">By checking this box, you are agreeing to let us contact you:
          <input type="checkbox" id="contact-perm" name="contact-perm">
        </label>
        <br>
        <br>
        <br>
        
        <!-- submit button-->
        <input type="submit" name ="submit" value="Submit">
      </p>
    </form>
    </p>
  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>
</div>
<!-- Main Container Ends -->
</body>
</html>
