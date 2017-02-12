<?php

<?php
require_once 'src/Facebook/Facebook.php';

$appapikey = '[1249536545094446]';
$appsecret = '[c8f85c6915a6e856f59042dbd1ee5acf]';
$facebook = new Facebook($appapikey, $appsecret);
$user = $facebook->require_login();

$appcallbackurl = '[Callback URL]';

//catch the exception that gets thrown if the cookie has an invalid session_key in it
try {
  if (!$facebook->api_client->users_isAppAdded()) {
    $facebook->redirect($facebook->get_add_url());
  }
} catch (Exception $ex) {
  //this will clear cookies for your application and redirect them to a login prompt
  $facebook->set_user(null, null);
  $facebook->redirect($appcallbackurl);
}
