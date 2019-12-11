<?php include ('server.php');
include ('includes/header.php');
?>

<div id="wrapper">
<h2>Register Now!</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"> 
<fieldset>

<label>First Name</label>
<input class="signup" type="text" name="FirstName" value="<?php echo htmlspecialchars($_POST['FirstName']);?>">


<label>Last Name</label>
<input class="signup" type="text" name="LastName" value="<?php echo htmlspecialchars($_POST['LastName']);?>">


<label>Username</label>
<input class="signup" type="text" name="UserName" value="<?php echo htmlspecialchars($_POST['UserName']);?>">


<label>Email</label>
<input class="signup" type="email" name="Email" value="<?php echo htmlspecialchars($_POST['Email']);?>">


<label>Phone Number</label>
<input class="signup" type="text" name="PhoneNumber" value="<?php echo htmlspecialchars($_POST['PhoneNumber']);?>">

<label>Password</label>
<input class="signup" type="password" name="Password_1">


<label>Confirm Password</label>
<input class="signup" type="password" name="Password_2">

<button type="submit" class="btn" name="reg_user">Register!</button>
<button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'">Reset</button>

<?php include('errors.php');?>

</fieldset>
</form>

<p class="center italic">Already a member? <a href="login.php">Sign In!</a> </p>


<?php include ('includes/footer.php');?>