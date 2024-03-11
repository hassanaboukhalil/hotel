<?php

//=============== require the autoload.php from the vendor folder first , this file calls the needed files
require_once './login_with_google/vendor/autoload.php';

// Start a new PHP session
session_start();


//=============== init configuration, bring them from credensials from the project you created in the google cloud
$clientID = 'your client ID';
$clientSecret = 'your secret ID';
$redirectUri = 'redirecturl from the google cloud account';


//================ create Client Request to access Google API
$client = new Google_Client(); // $client = new Google\Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);


//================= authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {

  //================ Authenticate the user and exchange the authorization code for an access token
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);


  //=============== Get the authenticated user's information
  $service = new Google\Service\Oauth2($client);
  $user = $service->userinfo->get();


  //============== Access the user's information
  // now you can use this profile info to create account in your website or for login if the user already has an account
  $email =  $user->email;
  $name =  $user->name;
  $user_code = $user->id;   // save this unique user id in the database
  $with_google = "true";

  include("./cred.php");
  //================= if the user has an account in the database -----> login
  $sql = "SELECT email, user_code FROM user WHERE user_code = '$user_code'";
  $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
  $row = mysqli_fetch_assoc($result);
  //
  if ($row and $row["user_code"] == $user_code) {
    $_SESSION["email"] = $row["email"];
    header("location: user_index.php"); // if the user has an account he will be forward to user_index.php file
    exit;
  } else {
    //=================== if the user does not has an account -----> sign up/ register
    /////////
    $with_google = "true";
    $sql = "INSERT INTO user (`fname`,`email`, `with_google`, `user_code`) VALUES ('$name', '$email', '$with_google','$user_code')";
    $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
    //
    $_SESSION["email"] = $email;
    header("location: user_index.php");
    exit;
  }
} else {
  //============== scopes that i want to use from the user account
  $client->addScope("email");
  $client->addScope("profile");

  //============== Generate the Google Sign-In URL
  $authUrl = $client->createAuthUrl();

  //============== Redirect the user to the Google Sign-In URL
  // the user will be redirected to this page
  header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}
