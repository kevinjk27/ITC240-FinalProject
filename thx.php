<?php include('includes/header.php')?>
<div id="wrapper">

<section>
<h1>Thank you for your order!</h1>
<h2>Your order has been received!</h2>
<!-- <div style="display:none;">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset(
        $_POST['name'],
        $_POST['address'],
        $_POST['comments'],
        $_POST['payment'],
        $_POST['cardNumber'],
        $_POST['menu'])
        )
    {
            $name = $_POST['name'];
            $address = $_POST['name'];
            $comments = $_POST['comments'];
            $payment = $_POST['payment'];
            $last4digit = substr($_POST['cardNumber'],-4);
            $myReturn = implode (", ",$_POST['menu']);
    }
}
?>
</div>
<p>Thank you <?=$name;?> for your order! </p>
<p>Your order will be delivered to <?=$address;?> </p>
<p>Your orders are <?php $myReturn;?> </p>
<p>Your special request: <?=$comments;?> </p>
<p>Payment was made using <?=$payment;?> card ending with <?=$last4digit;?> </p>




</section> -->

<p> <a href="contact.php"> Create a new order </a> <p>

<?php include('includes/footer.php')?>