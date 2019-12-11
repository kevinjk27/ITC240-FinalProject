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

<?php
if(isset($_GET['time'])) {
    $time = $_GET['time'];
} else{
    $time = date('gA');
    $clock = date('g');

}

switch($time) {
    case ($time == '6AM' || $time == '7AM' || $time == '8AM'):
        $item = 'MILWAUKEE 14 in. Bolt Cutter With 5/16 in. Max Cut Capacity';
        $itempic = 'promo1';
        $priceWas= '$34.97';
        $priceNow= '$19.23';
        $discountPercentage ='45%';

    break;

    case ($time == '9AM' || $time == '10AM' || $time == '11AM'):
        $item = 'Dewalt 20-Volt MAX Lithium-Ion Cordless 13 in. Brushless Dual Line String Grass Trimmer w/ (1) 5.0Ah Battery and Charger';
        $itempic = 'promo2';
        $priceWas= '$209.00';
        $priceNow= '$177.65';
        $discountPercentage ='15%';


    break;

    case ($time == '12PM' || $time == '1PM' || $time == '2PM'):
        $item = 'RYOBI 16 in. 37cc 2-Cycle Gas Chainsaw with Heavy-Duty Case';
        $itempic = 'promo3';
        $priceWas= '$139.00';
        $priceNow= '$118.15';
        $discountPercentage ='15%';



    break;

    case ($time == '3PM' || $time == '4PM' || $time == '5PM'):
        $item = 'DeWALT Mechanics Tool Set (226-Piece) with ToughSystem 22 in. Large Tool Box';
        $itempic = 'promo4';
        $priceWas= '$149.00';
        $priceNow= '$81.95';
        $discountPercentage ='45%';



    break;

    case ($time == '6PM' || $time == '7PM' || $time == '8PM'):
        $item = 'DeWALT 20-Volt MAX Lithium-Ion Cordless Compact Drill/Drill Driver (Tool-Only)';
        $itempic = 'promo5';
        $priceWas= '$109.99';
        $priceNow= '$71.50';
        $discountPercentage ='35%';



    break;

    case ($time == '9PM' || $time == '10PM' || $time == '11PM'):
        $item = 'RYOBI 18-Volt ONE+ Cordless Orbital Jig Saw (Tool-Only)';
        $itempic = 'promo6';
        $priceWas= '$69.00';
        $priceNow= '$51.75';
        $discountPercentage ='25%';



    break;

    case ($time == '12AM' || $time == '1AM' || $time == '2AM' || $time == '3AM' || $time == '4AM' || $time == '5AM'):
        $item = 'WERNER 6 ft. Aluminum Step Ladder with 250 lb. Load Capacity Type I Duty Rating';
        $itempic = 'promo7';
        $priceWas = '$74.98';
        $priceNow = '$56.25';
        $discountPercentage ='25%';


    break;

}
?>


    <main class=hourly-promo>
    <h1 style="color:<?="$color";?>"><?="$time";?>'s Special</h1>
    
    <h2><?="$item";?></h2>
    <p>Price was = <?php echo $priceWas?></p>
    <p>Price now = <?php echo $priceNow?></p>
    <p>Savings of <?php echo $discountPercentage?></p>

    </main>
    <aside class=hourly-promo>
    <img class="item-promo" src ="images/<?="$itempic";?>.jpg" alt="<?="$itempic";?>">
    <p><?=$image_desc?></p>
    </aside>

    <h3> Wanna know more about what items are on sale? Find out our special deals on other the hour by simply clicking the link below </h3>
    <ul>
    <li><a href="promo.php?time=6AM">6 AM - 8:59 AM</a></li>
    <li><a href="promo.php?time=9AM">9 AM - 11:59 AM</a></li>
    <li><a href="promo.php?time=12PM">12 PM - 2:59 PM</a></li>
    <li><a href="promo.php?time=3PM">3 PM - 5:59 PM</a></li>
    <li><a href="promo.php?time=6PM">6 PM - 8:59 PM</a></li>
    <li><a href="promo.php?time=9PM">9 PM - 11:59 PM</a></li>
    <li><a href="promo.php?time=12AM">12 AM - 5:59 PM</a></li>

    </ul>


    <?php include('includes/footer.php')?>