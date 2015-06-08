<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../../login/index.php'>logging in again</a>";
	die();
}

$string = $_GET['emails'];
$pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
preg_match_all($pattern, $string, $matches);

#include_once('../../includes/database.php');

function key_gen($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

require 'vendor/autoload.php';
use Mailgun\Mailgun;

foreach ($matches[0] as &$email) {
  $rand = key_gen();
  $key = "coach $rand";
  $access_code = hash('sha512', $key);

	if($stmt = $mysqli -> prepare("INSERT INTO invitations VALUES(?, ?, ?)")) {
	    $stmt -> bind_param("sss", $access_code, $email, 'coach');
	    $stmt -> execute();
	    $stmt -> fetch();
	    $stmt -> close();
}

	$mgClient = new Mailgun('key-e0a18393d1f579823cafb6790799b517');
	$domain = "sacyberpatriot.org";
	$result = $mgClient->sendMessage($domain, array(
	    'from'    => 'SACyberPatriot@sacyberpatriot.org',
	    'to'      => $email,
	    'subject' => "You're Invited to Join sacyberpatriot.org as a Coach!",
	    'text'    => "SA Cyberpatriot is a website used to provide training material and news for free to San Antonio CyberPatriot teams. \n Reedem your coach account: http://www.sacyberpatriot.org/redeem.php?ac=$access_code",
      'html'    => "<!DOCTYPE html5>
											<head>
  											<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
											</head>
											<body style='font-family: Lato, sans-serif;' align='center'>
  									<div style='border-bottom: solid grey 1px;'>
    									<a href='www.sacyberpatriot.org' style='text-decoration: none;'>
      									<h1 style='color: #5674D6;'>SA CyberPatriot</h1>
    									</a>
  									</div>
  									<div >
    									<h3>You Have Been Invited as a Coach on sacyberpatriot.org</h3>
    									<p>Register with the link below to become a coach on San Antonio CyberPatriot website.</p>
    									<a href='http://sacyberpatriot.org/redeem.php?ac=$access_code'>Register on sacyberpatriot.org as Coach</a>
    									<br />
    									<img style='width: 20%; padding: 5%;' src='http://sacyberpatriot.org/images/sacyberlogo.png'/>
  									</div>
										</body>"
									));

}

$mysqli -> close();

print 'done';

?>
