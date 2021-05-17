<?php
  session_start();
?>
<!doctype html>
<html lang="en-US">
<!-- include head section -->
<?php require_once("snippets/head.php"); ?>
<!--title of page-->

<title>Home</title>
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
    <img src="images/its_banner_yellow.png" alt="ITS Banner" style="display: block; margin-left: auto; margin-right: auto; width: 50%; margin-top: 35px;"></div>
  <!--Creates div for mobile only content-->
  <div class="only-mobile">
    <?php require_once("snippets/accordion_menu.php"); ?>
  </div>
<script>
    //Retrieved from https://css-tricks.com/snippets/javascript/get-url-variables/
    function getQueryVariable(variable)
    {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for(var i = 0; i < vars.length ;i++) {
                var pair = vars[i].split("=");
                if(pair[0] == variable){return pair[1];}
        }
        return false;
    }
    function scriptfun(){
        var username = document.getElementById("username_login").value;
        var password = document.getElementById("password_login").value;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("error");
               // alert(this.getAllResponseHeaders());
              var resp = this.responseText;
              //alert(resp);
               if(resp == 1){
                  //alert("something different");
                  window.open("http://its.ajnoble.com/mockup/admin/dashboard.php","_self"); 
               }
                if(resp == 2){
                  //alert("something different"); 
                  if(getQueryVariable("redirect") != '') {
                    window.open("http://its.ajnoble.com"+atob(getQueryVariable("redirect")),"_self");
                  } else {
                    window.open("http://its.ajnoble.com/mockup/index.php", "_self");
                  } 
                }
                document.getElementById('txtHint').innerHTML=this.responseText;
            }
        }
        //alert("here");
        xmlhttp.open("GET","processing/groupcheck.php?username="+ username +"&password=" + password,true);
        xmlhttp.send();
} 
</script> 
  
  <!-- About Section -->
  <section class="content" id="content">
    <p class="text_column">
    
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">                
				<h2>Please Enter Your Login Credentials Below</h2>				
				User Name:<br>
  				<input id = "username_login" type="text" name="username"/>
  				<br>
  				Password:<br>
  				<input id = "password_login" type="password" name="password"/>
  				<br><br>
                <input type="button" onclick="scriptfun()" id="submit" name="submit" value="Submit"/>
		</form>
		<div id ="txtHint"><b></b></div>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>

<!-- Main Container Ends -->
</body>
</html>
