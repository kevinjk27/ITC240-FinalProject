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
//this is going to be our Handyman Apparatus Product View
include('config.php');

if(isset($_GET['id'])) {
    $id=(int)$_GET['id'];

} else {
    header('Location:products.php');


}//closing the if statement




$sql = 'SELECT * FROM products WHERE ProductID = '.$id.'';
//we need to connect to the database!


$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or 
die (myerror(__FILE__,__LINE__,mysqli_connect_error()));


// we need to extract the data
$result = mysqli_query($iConn, $sql) or
die (myerror(__FILE__,__LINE__,mysqli_connect_error($iConn)));

//we need an if statement asking if we have more than 0 rows

if(mysqli_num_rows($result) > 0) { //show the records
    while ($row = mysqli_fetch_assoc($result)){
        //the mysqli fetch assocoative array will display the contents of the row
        $ProductID = stripslashes($row['ProductID']);
        $ProductName = stripslashes($row['ProductName']);
        $Brand = stripslashes($row['Brand']);
        $Description = stripslashes($row['Description']);
        $Price = stripslashes($row['Price']);
        $feedback = '';
    } // end of while loop
} else //end if statement and if not cutsomer exist!
    {
        echo 'Sorry, no candidates!';
    }
?>

<h2><?php echo $firstName;?> </h2>
<?php

 echo '<main class="item-view-main">';
 echo '<ul>';
 echo '<li><strong>Brand : </strong>'.$Brand.'</li>';
 echo '<li><strong>Product Name : </strong><span style="font-size:1.6em">'.$ProductName.'</span></li>';
 echo '<li><strong>Description : </strong><br>'.$Description.'</li>';
 echo '<li><strong>Price : </strong>'.$Price.'</li>';
 echo '</ul>';
 echo '</main>';
 
 echo '<aside class="item-view-aside">';
 echo '<img class="item-thumb" src="images/item'.$ProductID.'.jpg" alt="item'.$ProductID.'">';
 echo '</aside>';

 echo '<a class="back-to-players" href="products.php">Back to Product Catalogue</a>';
//relese web server
@mysqli_free_result($result);
//close the connection
@mysqli_close($iConn);


include('includes/footer.php');
?>








