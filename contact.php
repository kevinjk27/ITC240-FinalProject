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
// Emailable form of International Kitchen

$name = $email = $payment = $comments = $menu = $phone = $privacy = $address = $cardNumber = $cardName = $cardMonth = $cardYear = '';
$nameErr = $emailErr = $paymentErr = $commentsErr = $menuErr = $phoneErr = $privacyErr = $addressErr = $cardNumberErr = $cardNameErr = $cardMonthErr = $cardYearErr ='';

if ($_SERVER['REQUEST_METHOD'] =='POST') {
    
    if (empty($_POST['name']) ) {
        $nameErr = 'Please fill up your name!';
    }else{
        $name = $_POST['name'];
    }


    if (empty($_POST['email']) ) {
        $emailErr = 'Please fill up your email!';
    }else{
        $email = $_POST['email'];
    }
    

    if (empty($_POST['address']) ) {
        $addressErr = 'Please fill up your address!';
    }else{
        $address = $_POST['address'];
    }


    if (empty($_POST['payment']) ) {
        $paymentErr = 'Please choose your payment!';
    }else{
        $payment = $_POST['payment'];
    }


    if (empty($_POST['privacy']) ) {
        $privacyErr = 'Please check privacy!';
    }else{
        $privacy = $_POST['privacy'];
    }


    if (empty($_POST['menu']) ) {
        $menuErr = 'Please choose your items!';
    }else{
        $menu = $_POST['menu'];
    }


    if (empty($_POST['comments']) ) {
        $commentsErr = 'Please fill up your comments!';
    }else{
        $comments = $_POST['comments'];
    }


    if(empty($_POST['phone'])) {  // if empty, type in your number
        $phoneErr = 'Please enter your phone number!';
        } elseif(array_key_exists('phone', $_POST)){
            if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
            {// if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
            $phoneErr = 'Please input the valid format phone number!';
            } else{
            $phone = $_POST['phone'];
        }
        }
    
    if (empty($_POST['cardNumber']) ) {
        $cardNumberErr = 'Please input your card number!';
    } elseif(array_key_exists('cardNumber', $_POST)){
        if(!preg_match('/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/', $_POST['cardNumber']))
        {
        $cardNumberErr = 'Please input the valid format card number!';
        }    
            else{
                $cardNumber = $_POST['cardNumber'];
            }
        }
    

    if (empty($_POST['cardName']) ) {
        $cardNameErr = 'Please input your card name!';
    }else{
        $cardName = $_POST['cardName'];
    }


    if($_POST['cardMonth'] == 'NULL' && $_POST['cardYear'] == 'NULL'){
        $cardMonthErr = 'Please input your card expiry month & year!';
    } elseif($_POST['cardMonth'] == 'NULL' && $_POST['cardYear'] != 'NULL'){
        $cardMonthErr = 'Please input your card expiry month';
    } elseif($_POST['cardMonth'] != 'NULL' && $_POST['cardYear'] == 'NULL'){
        $cardMonthErr = 'Please input your card expiry year';
    }
    else{
        $cardMonth = $_POST['cardMonth'];
    }
    


    if(isset($_POST['name'],
    $_POST['email'],
    $_POST['payment'],
    $_POST['comments'],
    $_POST['privacy'],
    $_POST['menu'],
    $_POST['cardNumber'],
    $_POST['cardName'],
    $_POST['cardMonth'],
    $_POST['cardYear']
    )) {
        
       function mymenu (){
            $myReturn = '';
            if(!empty($_POST['menu'])){
                    $myReturn = implode (", ",$_POST['menu']); //seperate array by ", " (comma)
            }
            return $myReturn; //end for if not empty

        } //end of function

        function last4digit (){
            $last4digit = '';
            if(!empty($_POST['cardNumber'])){
                    $last4digit = substr($_POST['cardNumber'],-4); //take last 4 digit
            }
            return $last4digit; //end for if not empty

        } //end of function


    $to = 'kevin15huge@gmail.com, szemeo@mystudentswa.com';
    $subject ='Your order on Handyman Apparatus on ' .date("m/d/y");
    $body = 'Thank you '.$name.' for your order! '.PHP_EOL.'';
    $body .= 'Your order will be delivered to '.$address.'.'.PHP_EOL.'';
    $body .= 'Your orders are '.mymenu().' '.PHP_EOL.'';
    $body .= 'Your special request: '.$comments.' '.PHP_EOL.'';
    $body .= 'Payment was made using '.$payment.' card ending with '.last4digit().' '.PHP_EOL.'';


    $headers = array( //to not showing hosting provider email address!
        'From' => 'orderconfirmation@handymanapparatus.com',
        'Reply-to' => ''.$email.'');
    
    if($_POST['name']!="" && $_POST['email']!="" && $_POST['payment']!="" && $_POST['privacy']!="" && $_POST['menu']!="" && $_POST['comments']!="" && $_POST['phone']!="" && $_POST['address']!="" && $_POST['cardNumber']!="" && $_POST['cardName']!="" && $_POST['cardMonth']!="NULL" && $_POST['cardYear']!="NULL" )
        {
        mail ($to, $subject, $body, $headers);
        header('Location: thx.php');
        }

    } // closing if isset 
}//closing if server post

?>
<h1>Order Form </h1>
<p>Kindly fill up this form and we will prepare your order!</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<legend>Order Details</legend>
<label>Name</label>
<input type="text" name="name" value="
<?php if (isset($_POST['name']))echo htmlspecialchars($_POST['name']); ?>"> 
<span class="rederror" style="color:red"><?php echo $nameErr;?></span> 


<label>Email</label> 
<input type="email" name="email" value="
<?php if (isset($_POST['email']))echo htmlspecialchars($_POST['email']); ?>"> 
<span class="rederror" style="color:red"><?php echo $emailErr;?></span> 


<label>Phone</label> 
<input type="text" name="phone" placeholder="xxx-xxx-xxxx" value="
<?php if (isset($_POST['phone']))echo htmlspecialchars($_POST['phone']); ?>"> 
<span class="rederror" style="color:red"><?php echo $phoneErr;?></span> 


<label>Address</label> 
<input type="text" name="address" value="
<?php if (isset($_POST['address']))echo htmlspecialchars($_POST['address']); ?>"> 
<span class="rederror" style="color:red"><?php echo $addressErr;?></span> 


<label>Item:</label> 
<ul>
<li><input type="checkbox" name="menu[]" value="RYOBI1"
<?php if (isset($_POST['menu']) && in_array('RYOBI1', $menu))echo 'checked="checked"';?>>RYOBI 20-Volt MAX Lithium-Ion Cordless 13 in. Brushless Dual Line String Grass Trimmer w/ (1) 5.0Ah Battery and Charger</li>
<li><input type="checkbox" name="menu[]" value="MAKITA1"
<?php if (isset($_POST['menu']) && in_array('MAKITA1', $menu))echo 'checked="checked"';?>>MAKITA 18-Volt LXT Lithium-Ion Cordless 1/2 in. XPT Drill/Driver Kit with Two 2.0 Ah Batteries Charger and Hard Case</li>
<li><input type="checkbox" name="menu[]" value="MILWAUKEE1"
<?php if (isset($_POST['menu']) && in_array('MILWAUKEE1', $menu))echo 'checked="checked"';?>>MILWAUKEE M18 FUEL 18-Volt Lithium-Ion Brushless Cordless Jig Saw with One 5.0 Ah Battery, Charger and Bag</li>
<li><input type="checkbox" name="menu[]" value="RYOBI2"
<?php if (isset($_POST['menu']) && in_array('RYOBI2', $menu))echo 'checked="checked"';?>>RYOBI 18-Volt ONE+ Cordless Orbital Jig Saw (Tool-Only)</li>
<li><input type="checkbox" name="menu[]" value="WEN1"
<?php if (isset($_POST['menu']) && in_array('WEN1', $menu))echo 'checked="checked"';?>>WEN 10 in. Variable Speed Drill Press</li>
<li><input type="checkbox" name="menu[]" value="MILWAUKEE2"
<?php if (isset($_POST['menu']) && in_array('MILWAUKEE2', $menu))echo 'checked="checked"';?>>MILWAUKEE High Capacity 52 in. 11-Drawer Tool Chest Mobile Workbench with Clamp-Ready Wood Top</li>
<li><input type="checkbox" name="menu[]" value="HUSKY1"
<?php if (isset($_POST['menu']) && in_array('HUSKY1', $menu))echo 'checked="checked"';?>>HUSKY Magnetic Hand Tool Screwdriver Set (18-Piece, 12-Pack)</li>
<li><input type="checkbox" name="menu[]" value="MILWAUKEE3"
<?php if (isset($_POST['menu']) && in_array('MILWAUKEE3', $menu))echo 'checked="checked"';?>>MILWAUKEE 14 in. Bolt Cutter With 5/16 in. Max Cut Capacity</li>
<li><input type="checkbox" name="menu[]" value="RYOBI3"
<?php if (isset($_POST['menu']) && in_array('RYOBI3', $menu))echo 'checked="checked"';?>>RYOBI 16 in. 37cc 2-Cycle Gas Chainsaw with Heavy-Duty Case</li>
<span class="rederror" style="color:red"><?php echo $menuErr;?></span> 
</ul>

<label>Special handling:</label>  
<textarea name="comments" placeholder="Do not leave it in porch or only daytime delivery"><?php if (isset($_POST['comments'])) echo $_POST['comments'];?></textarea> 
<span class="rederror" style="color:red"><?php echo $commentsErr;?></span>


<legend>Payment Methods</legend>
<label>Card type</label>
        <ul>
        <li><input type="radio" name="payment" value="Amex"
        <?php if(isset($_POST['payment']) && $_POST['payment']== 'Amex') echo 'checked = "checked"';?>><img src="images/credit-card-amex.png" alt=amex-cc>American Express</li>
        <li><input type="radio" name="payment" value="Visa"
        <?php if(isset($_POST['payment']) && $_POST['payment']== 'Visa') echo 'checked = "checked"';?>><img src="images/credit-card-visa.png" alt=visa-cc>Visa</li>
        <li><input type="radio" name="payment" value="Master"
        <?php if(isset($_POST['payment']) && $_POST['payment']== 'Master') echo 'checked = "checked"';?>><img src="images/credit-card-master.png" alt=mc-cc>Master Card</li>
        <li><input type="radio" name="payment" value="Discover"
        <?php if(isset($_POST['payment']) && $_POST['payment']== 'Discover') echo 'checked = "checked"';?>><img src="images/credit-card-discover.png" alt=discover-cc>Discover</li>
        </ul>
        <span class="rederror" style="color:red"><?php echo $paymentErr;?></span> 

<label>Card Number</label>
    <input type="text" name="cardNumber" placeholder="xxxx-xxxx-xxxx-xxxx" value="<?php if (isset($_POST['cardNumber']))echo htmlspecialchars($_POST['cardNumber']); ?>">
    <span class="rederror" style="color:red"><?php echo $cardNumberErr;?></span> 


<label>Card Name</label>
    <input type="text" name="cardName" value="<?php if (isset($_POST['cardName']))echo htmlspecialchars($_POST['cardName']); ?>">
    <span class="rederror" style="color:red"><?php echo $cardNameErr;?></span> 

<label>Card Expiry</label>

    <select name="cardMonth">
        <option value="NULL"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='month'){echo 'selected="unselected"';}?>>Month</option>
        <option value="January"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='January'){echo 'selected="selected"';}?>>January</option>
        <option value="February"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='February'){echo 'selected="selected"';}?>>February</option>
        <option value="March"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='March'){echo 'selected="selected"';}?>>March</option>
        <option value="April"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='April'){echo 'selected="selected"';}?>>April</option>
        <option value="May"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='May'){echo 'selected="selected"';}?>>May</option>
        <option value="June"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='June'){echo 'selected="selected"';}?>>June</option>
        <option value="July"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='July'){echo 'selected="selected"';}?>>July</option>
        <option value="August"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='August'){echo 'selected="selected"';}?>>August</option>
        <option value="September"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='September'){echo 'selected="selected"';}?>>September</option>
        <option value="October"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='October'){echo 'selected="selected"';}?>>October</option>
        <option value="November"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='November'){echo 'selected="selected"';}?>>November</option>
        <option value="December"<?php if(isset($_POST['cardMonth'])&& $_POST['cardMonth']=='December'){echo 'selected="selected"';}?>>December</option>
    </select> 
    


    <select name="cardYear">
       <option value="NULL"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='NULL'){echo 'selected="unselected"';}?>>Year</option>
       <option value="2029"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2029'){echo 'selected="selected"';}?>>2029</option>
       <option value="2028"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2028'){echo 'selected="selected"';}?>>2028</option>
        <option value="2027"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2027'){echo 'selected="selected"';}?>>2027</option>
        <option value="2026"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2026'){echo 'selected="selected"';}?>>2026</option>
        <option value="2025"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2025'){echo 'selected="selected"';}?>>2025</option>
        <option value="2024"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2024'){echo 'selected="selected"';}?>>2024</option>
        <option value="2023"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2023'){echo 'selected="selected"';}?>>2023</option>
        <option value="2022"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2022'){echo 'selected="selected"';}?>>2022</option>
        <option value="2021"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2021'){echo 'selected="selected"';}?>>2021</option>
        <option value="2020"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2020'){echo 'selected="selected"';}?>>2020</option>
        <option value="2019"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2019'){echo 'selected="selected"';}?>>2019</option>
        <option value="2018"<?php if(isset($_POST['cardYear'])&& $_POST['cardYear']=='2018'){echo 'selected="selected"';}?>>2018</option>
    </select>
    
</fieldset>  
<span class="rederror" style="color:red"><?=$cardMonthErr;?></span>
 


<label>Privacy Policy</label>
<input type="radio" class="privacy" name="privacy" value="yes"
<?php if (isset($_POST['privacy']) && $_POST ['privacy'] == 'yes') echo 'checked="checked"';?>> 
<span class="rederror" style="color:red"><?php echo $privacyErr;?></span> 


<input type="submit" name="submit" value="Send it!">

<input type="button" onclick="window.location.href = '<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>'" value="RESET!">

</form>
<?php include('includes/footer.php')?>