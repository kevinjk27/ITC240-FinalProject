<?php
// Key  =>  Values
$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['products.php'] = 'Products';
$nav['promo.php'] = 'Promo';
$nav['contact.php'] = 'Contact';


define('THIS_PAGE', basename($_SERVER['PHP_SELF']) );

function makeLinks($nav){
    $myReturn ='';

    foreach($nav as $key => $value){
        if(THIS_PAGE == $key){
            $myReturn .='<li class="active"><a href="'.$key.'">'.$value.'</a></li>';
        } else{
            $myReturn .='<li><a href="'.$key.'">'.$value.'</a></li>';
        }
    }
    return $myReturn;
}

switch(THIS_PAGE) {
    case 'index.php':
        $title = 'Handyman Apparatus';
        $bodyClass = 'index';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'about.php':
        $title = 'About Us';
        $bodyClass = 'about';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'products.php':
        $title = 'Product Collections';
        $bodyClass = 'products';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'products-view.php':
        $title = 'Product Details';
        $bodyClass = 'products-details';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'promo.php':
        $title = 'Special Hourly Deals';
        $bodyClass = 'promo';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'contact.php':
        $title = 'Contact Us';
        $bodyClass = 'contact';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'register.php':
        $title = 'A New Member Register';
        $bodyClass = 'register';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'login.php':
        $title = 'Handyman Apparatus - Login to Site';
        $bodyClass = 'login';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;

    case 'thx.php':
        $title = 'Order confirmation';
        $bodyClass = 'thx';
        $headerLogo = '<img class="logo" src="images/logo.jpg" alt="handyman-apparatus">  
        <h1>Handyman Apparatus</h1>';
    break;




}

?>