<?php
session_start();
?>
<!doctype html>
<html lang="en-US">
<!-- include head section -->
<?php require_once("snippets/head.php"); ?>
<!--title of page-->

<title>FAQ</title>
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
    <h1>Frequently Asked Questions</h1>
    <hr><br>
    <h2>Is there wireless internet access on campus?</h2>
    Yes. Concordia has wireless access points in all academic and residence halls. Connection strengths may vary. Wired connections are also available within the residence halls. Depending on the dorm room, either one or two Ethernet cords are supplied by Residence Life. Ethernet connections offer a faster and more reliable connection ideal for streaming video and gaming.<br>
    <h2>How much computer support do students receive at Concordia College?</h2>
    The ITS Solution Center assists students with all basic personal computer issues, including virus removal, and the diagnosis of hardware issues free of charge. The Solution Center <strong>does not</strong> provide hardware repair or full operating system installations, but can recommend hardware repair shops in the area.<br>
    <h2>Can personal computers be used in class?</h2>
    Policy regarding the use of personal technology devices during class periods, lectures, and labs are determined by each faculty member. For specific information regarding technology use, please contact faculty.<br>
    <h2>Should I get a desktop, laptop, or ultrabook?</h2>
    <strong>Ultrabook:</strong> The most portable and energy efficient computers, ideal for simple Internet browsing, email and word processing. They do not have CD drives and often have less hard drive space.<br>
    <strong>Laptop:</strong> The computer of choice for the vast majority of students because most laptops are portable but powerful enough to do most tasks.<br>
    <strong>Desktop:</strong> Provides great functionality; however, they lack portability. Typically, desktops are the most powerful systems for the lowest price.<br>
    <h2>Is peer-to-peer file sharing allowed on campus?</h2>
    Peer-to-peer connections (Bittorrent, LimeWire, etc.) are blocked on all campus Internet connections.<br>
    <h2>Should I purchase a MAc or PC?</h2>
    Choose between a PC or Mac based on your own comfort level and needs. Academic departments may have specific hardware and software recommendations. For example, the music and art programs primarily use Macs, while the Offutt School of Business relies heavily on PCs. The education department uses either platform and most other programs do not have a preference. However, if a student is familiar with a specific operating system and would prefer to stick with it, that is not a problem. Both Macs and PCs are available in computer labs across campus, so no matter what type of computer you have the other is available somewhere on campus.
    Please note when purchasing a new Windows laptop that some Windows laptops will come with Windows 10 S. Windows 10 S is a more locked down, restrictive version of Windows that is more similar to a Chromebook or an iPad in the sense that applications can only be installed via the Microsoft Store (similar to the App Store on iOS). Windows 10 S does not currently work with our printing system. For more information on Windows 10 S, please see Microsoft's website.<br>
    <h2>Does Concordia provide storage space for student data?</h2>
    Students are provided with a Google Education Account through Concordia and through this get unlimited storage on Google Drive.<br>
    <h2>Do I need a printer?</h2>
    The Uniprint system allows students to print directly from their computer to lab printers. Free grayscale is available in many places on campus including all residence halls. Paid color printing is available in the library and the Parke Student Leadership Center. To obtain Uniprint printing instructions, visit our CobberNet site or contact us at 218.299.3375. Alternatively, students are allowed to bring their own printer to campus, but it cannot have wireless functionality enabled.<br>
    <h2>What sort of virus protection do you recommend?</h2>
    Concordia strongly recommends that all computers have an anti-virus program installed on them. Visit our downloadable software page to find a list of free antivirus programs that can be installed for both Windows and macOS/Mac OS X. If you have Windows 8/8.1/10, Windows Defender is already installed and protecting you as long as you do not have any other antivirus program installed. However, many other antivirus programs offer superior protection than Windows Defender. Any paid program should do; however, there are also free alternatives such as AVG or Avast that do a good job as well.<br>
    <h2>Is a tablet enough?</h2>
    Depending on your needs, a tablet may or may not be enough. Many now have full keyboards as an option, and so they can be adequate for writing papers, etc. However, many tablets cannot use our printing software or any special software that may be needed for certain classes. Some tablets, however, have the full version of Windows on them which are essentially a full laptop in tablet form (such as the Surface Pro). For more details on tablets, or what tablets have the full edition of Windows, feel free to contact the Solution Center.<br>
    <h2>Can I use a Chromebook?</h2>
    For those considering purchasing a Chromebook for college, please note that you will not be able to print directly to our printing system. You would need to email or use a USB drive to transfer the document to a campus system to print it from there. You will not be able to install programs on a Chromebook, only those provided by the Chrome Web Store. Special software that is used by various departments and is available to students (such as Mathematica and JMP) will not be able to be installed on Chromebooks, so Chromebooks are not recommended for some majors including, but not limited to, mathematics, computer science, art, chemistry, biology, and physics. All necessary software is installed on campus computers; however, so students can get by with a Chromebook, it just may not be ideal for their needs. Chromebooks are decent cheap alternatives to both Windows and Mac computers as long as their limitations are kept in mind.<br>
    <h2>What student discounts are available for software and computers?</h2>
    There are many discounts that can be found online by searching “student software discounts” or "student discounts" along with the software or computer brand you are looking for in any search engine.<br>
    <h2>Are students required to bring their own computer to campus?</h2>
    No. Concordia has computers that are widely accessible to all students. There are computer labs in each residence hall, as well as numerous publicly accessible computers in the library. Many academic buildings also have labs, but those may have some time constraints due to classes that are taught in them. However, having a personal computer on campus is much more convenient for most students.<br>
    <h2>How do I change my password?</h2>
    Please sign into Cobbernet and follow the instructions on our password change form. The form is located inside cobbernet at <span style="text-decoration: underline;">https://cobbernet.cord.edu/directories/offices-services/information-technology/solution-center/resources/password-help/</span>.<br>
    </p>
  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>
</div>
<!-- Main Container Ends -->
</body>
</html>
