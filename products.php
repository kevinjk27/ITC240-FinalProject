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
//this is going to be our people page
include('config.php');


$sql = 'SELECT * FROM products';
//we need to connect to the database!


$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or 
die (myerror(__FILE__,__LINE__,mysqli_connect_error()));


// we need to extract the data
$result = mysqli_query($iConn, $sql) or
die (myerror(__FILE__,__LINE__,mysqli_connect_error($iConn)));

//we need an if statement asking if we have more than 0 rows

if(mysqli_num_rows($result) > 0) { //show the records
    while ($row = mysqli_fetch_assoc($result)){
        echo '<div class="column">';
        echo '<a href ="products-view.php?id='.$row['ProductID'].'"><img class="item-thumb" src="images/item'.$row['ProductID'].'.jpg" alt="item'.$row['ProductID'].'"></a>';
        echo '<a class="product-name" href ="products-view.php?id='.$row['ProductID'].'"><p class=product-name>'.$row['Brand'].' '.$row['ProductName'].'</p></a>';
        echo '<p class=product-price>'.$row['Price'].'</p>';
        echo '</div>';

    } // end of while loop
} else //end if statement and if not cutsomer exist!
    {
        echo 'Sorry, no items are showing!';
    }


//relese web server
@mysqli_free_result($result);
//close the connection
@mysqli_close($iConn);


include('includes/footer.php');