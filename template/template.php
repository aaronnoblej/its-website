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
    </div>
  <!--Creates div for mobile only content-->
  <div class="only-mobile">
    <?php require_once("snippets/accordion_menu.php"); ?>
  </div>
  <!-- About Section -->
  <section class="content" id="content"> 
    <p class="text_column"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Varius duis at consectetur lorem donec massa sapien. In fermentum et sollicitudin ac orci. Volutpat lacus laoreet non curabitur gravida. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum consequat. Egestas sed tempus urna et pharetra. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Velit sed ullamcorper morbi tincidunt ornare massa eget egestas. In eu mi bibendum neque. Adipiscing commodo elit at imperdiet dui. Tempor nec feugiat nisl pretium fusce. Faucibus nisl tincidunt eget nullam non nisi est sit amet. Adipiscing diam donec adipiscing tristique risus.<br>
      Nec nam aliquam sem et tortor. Bibendum neque egestas congue quisque egestas. Sed enim ut sem viverra aliquet eget sit amet. Tortor dignissim convallis aenean et tortor at. Nec nam aliquam sem et tortor consequat id. Amet mattis vulputate enim nulla aliquet porttitor lacus. Posuere ac ut consequat semper viverra nam libero justo laoreet. Vestibulum lectus mauris ultrices eros in. Posuere ac ut consequat semper viverra. Scelerisque fermentum dui faucibus in. Netus et malesuada fames ac turpis egestas sed tempus urna. Eu volutpat odio facilisis mauris sit amet massa vitae. Dictum varius duis at consectetur. Ultricies leo integer malesuada nunc vel risus commodo viverra. Ornare lectus sit amet est placerat in egestas erat. Augue mauris augue neque gravida in fermentum et sollicitudin. Mauris ultrices eros in cursus turpis massa.<br>
      Facilisis volutpat est velit egestas dui id ornare arcu. Aliquet lectus proin nibh nisl condimentum. Aliquet lectus proin nibh nisl condimentum id venenatis a. Convallis convallis tellus id interdum velit. Sed viverra tellus in hac habitasse platea dictumst vestibulum. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Integer malesuada nunc vel risus commodo. Tempus quam pellentesque nec nam aliquam sem et tortor. Arcu dictum varius duis at consectetur lorem. Mattis pellentesque id nibh tortor id aliquet lectus proin. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Posuere ac ut consequat semper viverra nam libero justo laoreet. Suscipit tellus mauris a diam maecenas. Vitae congue mauris rhoncus aenean vel. Eu augue ut lectus arcu bibendum at varius vel pharetra. Sem viverra aliquet eget sit amet tellus. Bibendum neque egestas congue quisque. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Tristique senectus et netus et.<br>
      Gravida quis blandit turpis cursus in. Scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis. Diam maecenas ultricies mi eget. Nunc faucibus a pellentesque sit amet. Sed arcu non odio euismod lacinia. Orci sagittis eu volutpat odio. Proin libero nunc consequat interdum varius. Fermentum posuere urna nec tincidunt praesent. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Maecenas volutpat blandit aliquam etiam erat velit scelerisque. Massa placerat duis ultricies lacus. At risus viverra adipiscing at in tellus integer feugiat. Lectus proin nibh nisl condimentum id venenatis a condimentum. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Id semper risus in hendrerit gravida rutrum quisque non tellus. Vel quam elementum pulvinar etiam. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Ut diam quam nulla porttitor massa id neque aliquam vestibulum. Ullamcorper a lacus vestibulum sed. Scelerisque eleifend donec pretium vulputate sapien.<br>
      Libero id faucibus nisl tincidunt eget. Ac tortor dignissim convallis aenean et tortor at risus. Felis eget velit aliquet sagittis id consectetur purus. Facilisi cras fermentum odio eu. Vel risus commodo viverra maecenas accumsan lacus vel facilisis. Ac ut consequat semper viverra nam libero justo laoreet. Vitae semper quis lectus nulla at volutpat. Dignissim enim sit amet venenatis urna cursus eget nunc. Pellentesque habitant morbi tristique senectus et. Porta non pulvinar neque laoreet suspendisse interdum. Suscipit adipiscing bibendum est ultricies integer quis auctor. Eget nulla facilisi etiam dignissim diam quis. At lectus urna duis convallis convallis tellus. </p>
  </section>
  <!-- Footer Section -->
  <?php require_once("snippets/footer.php"); ?>
</div>
<!-- Main Container Ends --> 
</body>
</html>
