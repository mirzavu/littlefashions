<?php
@session_start();
ob_start();
// added in v4.0.0
require_once 'autoload.php';

require 'functions.php';  
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1035996793132799','a59ab2b60316ab85b09b8928880af59b' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://littlefashions.in/fbconfig.php' );
    
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=email,first_name,last_name,gender' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	$fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	$first_name =$graphObject->getProperty('first_name');    // To Get Facebook email ID
	 $email = $graphObject->getProperty('email');  
        $gender=$graphObject->getProperty('gender');          

	 $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	$_SESSION['EMAIL'] =$email;
    
      $_SESSION['user_id'] =$fbid;

      $_SESSION['username'] =$first_name;
      $_SESSION['loggedin'] =1;
checkuser($fbid,$fbfullname,$email,$first_name);
   
  header("Location: index.php");
} else {
  $loginUrl =$helper->getLoginUrl(array(
   'scope' => 'email'
  ));
 header("Location: ".$loginUrl);
}
?>