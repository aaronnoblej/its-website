<!--css for accordion menu-->
<style>
.accordion {
    float: right;
    background-color: #eea904;
    color: #eea904;
    padding: 25px;
    width: 100px;
    border: none;
    text-align: right;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}
.accordion:after {
    float: right;
    content: " ";
	display: inline-block;
    top: 4px;
    width: 40px;
    height: 2px;
    border-top: 6px double #930C30;
    border-bottom: 2px solid #930C30;
	margin-right: 6px;
}
.active:after {
    float: right;
    content: " ";
	display: inline-block;
    top: 4px;
    width: 40px;
    height: 2px;
    border-top: 6px double #930C30;
    border-bottom: 2px solid #930C30;
	margin-right: 6px;
}
.active, .accordion:hover {
    background-color: #fdd068;
}
.panel { 
    float: right;
    background-color: #fffef5;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    width: 200px;
}
.panel ul {
    list-style: none;
    float: right;
}
.panel ul li {
    line-height: 200%;
	height; 50px;
    float: right;
    color: #FFFFFF;
    font-size: 14px;
    text-align: right;
    margin-right: 25px;
    letter-spacing: 2px;
    font-weight: bold;
    transition: all 0.3s linear;
    border: 1px solid #FFF;
}
ul li a {
    color: #eea904;
    text-decoration: none;
	float: right;
}
ul li:hover a {
    color: #B3B3B3;
}
</style>

<!--Header section-->
<header>
<!--ITS banner image-->
<a href="index.php"><img src="images/its_banner_yellow.png" alt="ITS Banner" style="display: inline-block;  width: 50%; margin-top: 15px; margin-bottom: 10px; padding-left: 7px;"></a>
<!--Accordion menu button-->
<button class="accordion"></button>
<!--Link panel-->
<div class="panel">
  <ul>
    <li><a href="index.php">HOME</a></li><br><br>
    <li><a href="about.php">ABOUT</a></li><br><br>
    <li> <a href="contact.php">CONTACT</a></li><br><br>
    <li> <a href="faq.php">FAQ</a></li><br><br>
    <li> <a href="submit_wo.php">SUBMIT A WORK ORDER</a></li>
  </ul>
</div>
</header>	

<!--JS for menu-->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

