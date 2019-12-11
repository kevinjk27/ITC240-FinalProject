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

    <main class="index">
    <h1>Welcome to Handyman Apparatus</h1>
    <h2>Your building material and hardware solution!</h2>
    <p>Our goal is to be your one stop shopping solution</p>
    <p>We have tools for every project you work on!</p>
    </main>
    <aside class="index">
    <img class="aside-index" src="images/aside-main.jpg" alt="tool-for-every-project">
   
    </aside>
    
 
    
    <?php include('includes/footer.php')?>