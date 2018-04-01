<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_GET['EMAIL']) &&  filter_var($_GET['EMAIL'], FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_GET as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }
  
  //
  mail( "newsletter@pingchain.io", $_GET['EMAIL'], $_GET['EMAIL'], "From:" . $_GET['EMAIL'] );
	echo "{\"result\":\"success\",\"msg\":\"You have been subscribed successfully\"}";
	
}else{
	echo "{\"result\":\"error\",\"msg\":\"Please enter an email address\"}";
}
?>