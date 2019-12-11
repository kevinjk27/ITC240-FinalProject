<?php
session_start(); //to initialize the log in situation!!
include('config.php'); // config has credentials & debug function

// step 1
// initialize our variables
$FirstName = '';
$LastName = '';
$UserName = '';
$PhoneNumber = '';
$Email = '';
$errors = array();

// step 2
//connect to the database
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// step 3
//register our user!
if(isset($_POST['reg_user'])){ //when submit is clicked assigned these info to these columns!!
// we are gonna receive input values from our form!
$FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($db, $_POST['LastName']);
$UserName = mysqli_real_escape_string($db, $_POST['UserName']);
$PhoneNumber = mysqli_real_escape_string($db, $_POST['PhoneNumber']);
$Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
$Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);
$Email = mysqli_real_escape_string($db, $_POST['Email']);


//form validation - we want to make sure the form is filled out
// array push add additional information

//showing errors of the column what is missing!!
if(empty($FirstName)) {
    array_push($errors, 'First name is required!');
}// end if empty


if(empty($LastName)) {
    array_push($errors, 'Last name is required!');
}// end if empty


if(empty($UserName)) {
    array_push($errors, 'User name is required!');
}// end if empty

if(empty($Email)) {
    array_push($errors, 'Email is required!');
}// end if empty

if(empty($PhoneNumber)) {
    array_push($errors, 'Phone Number is required!');
}// end if empty

if(empty($Password_1)) {
    array_push($errors, 'Password is required!');
}// end if empty

//Why do we do have 2 password?? They have to be equal!!

if ($Password_1 != $Password_2) {
    array_push($errors, 'The two passwords don\'t match');
}// end if don't match

// step 4
// we need to make sure the user name or email doesn't exist!

// nor email and user name can be duplicated!
$user_check_query ="SELECT * FROM users WHERE UserName = '$UserName' or Email = '$Email' LIMIT 1 ";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

// if username and email exist, spits error message!

if ($user){
    if($user['UserName'] == $UserName) {
        array_push($errors, 'Username already exists!!');
    }

    if($user['Email'] == $Email) {
        array_push($errors, 'Email already exists!!');
    }
}// close user if already exists

        // if there are zero errors!! halelujah! we can submit!!

        if(count($errors)==0){ // if there are no error
            $Password = md5($Password_1); // will encrypt the password before saving it to the database && password 1 will be inserted to password


            //inserting to the table!
            $query = "INSERT INTO users (FirstName, LastName, UserName, Email, PhoneNumber, Password)
            VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$PhoneNumber', '$Password')";


            mysqli_query($db, $query);

            
            $_SESSION['UserName'] = $UserName;
            //new member greeting!
            $_SESSION['success'] = 'Thanks for registering!';

            header('Location:index.php');

        } //close count errors

} // end if isset





// down here will be our login page and add the php so our log in page will work!


if(isset($_POST['login_user'])){
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);


    if(empty($UserName)) {
        array_push($errors, 'User Name is required!');
    } //end if empty username login

    if(empty($Password)) {
        array_push($errors, 'Password is required!');
    } //end if empty password login


    //if we have zero errors, yippy good!!!!!
    if(count($errors)==0){
        $Password = md5($Password); //encrypting password


        $query = "SELECT * FROM users WHERE UserName = '$UserName' AND Password = '$Password'";
        $result = mysqli_query($db, $query);



        if(mysqli_num_rows($result) == 1) { //only one user name (no repetition)
            $_SESSION['UserName'] = $UserName;
            //old member greeting!
            $_SESSION['success'] = 'Welcome Back!!';
            header('Location:index.php');
        } else{
            array_push ($errors, 'Wrong username or password combination');

        } //end else


    } //end if count



} //end if set