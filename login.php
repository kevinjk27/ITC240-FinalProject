<?php
// this will be log in page of HW!
include('server.php');
include('includes/header.php');
?>

<!doctype html>
<html lang="en">
<head>
<title>Login</title>
<style>
fieldset{
    display: block;
}
</style>
</head>

<div id="wrapper">
<h2>Login Now</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<fieldset>

<label>Username</label>
<input class="login" type="text" name="UserName" value="<?php echo htmlspecialchars($UserName);?>">

<label>Password</label>
<input class="login" type="password" name="Password">
<?php include('errors.php');?>


<button type="submit" name="login_user">Log In!</button>
<button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'">Reset</button>

</fieldset>
</form>
<p>Not yet a member? <a href="register.php">Sign Up!</a></p>

<?php include('includes/footer.php');?>