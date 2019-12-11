<?php 
//to start session in every page!!
session_start();

if (!isset($_SESSION['UserName'])){
    $_SESSION['msg'] = 'You must log in first!';
    header('Location: login.php');
}

if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');

}
include('includes/header.php')?>
    
   <div id="wrapper"> 
   <div class="login-box">
<?php
if(isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>


<?php 
if(isset($_SESSION['UserName'])) :?>
<p>Hello <strong><?php echo $_SESSION['UserName'];?></strong>,</p>
<p><a href="index.php?logout='1'">Logout</a></p>
<?php endif;?>
</div>

<!-- to destroy session in every page!! -->

<main class="about">
<h2>Meet our Store Manager</h2>
<p class="about">Kevin has been working in Handyman Apparatus for 4 years. He has been helping the guests to get what they wanted since the first day he joined the store. He has big interest in woodworking and home interior. So if you guys need help of that area, he is more than happy to help you to pick what tools and materials required for your project.</p>
</main>

    <aside class="about">
    <img class="aside-about" src="images/kevin.JPG" alt="kevin-the-manager">
</aside>

    <?php include('includes/footer.php')?>