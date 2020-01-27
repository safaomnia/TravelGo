<?php
//Database credentials

define("HOST", "localhost");     // The host you want to connect to.
define("USER", "root");    // The database username. 
define("PASSWORD", "changewithyourpassword");    // The database password. 
define("DATABASE", "changewithyourdbname");    // The database name.

//Connect with database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);


$system_mode = 'test'; // set 'test' for sandbox and leave blank for real payments.
$paypal_seller = 'changewith@youremail.com'; //Your PayPal account email address

$payment_return_success = 'https://demo.dopehacker.com/paypal_integration/payment_success.php'; //after payment, user will be redirected in this page, change with your own url
$payment_return_cancel = 'https://demo.dopehacker.com/paypal_integration/payment_cancel.php'; //if payment cancelled, user will be redirected in this page, change with your own url

if ($system_mode == 'test') {$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; } 
else {$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';}

?>