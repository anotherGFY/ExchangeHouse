<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/tools/Tool.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/APSK/McmModel.php");


$mcm = new McmModel();
$username = Tool::_Post("username");
$password = Tool::_Post("password");
$backurl = Tool::_Get("backurl") == NULL ? "../../../profile.html" : Tool::_Get("backurl");

if ($username != NULL && $password != NULL) {
    $userLogin = $mcm->userLogin($username, $password);

    $userid = $mcm->userGet($userLogin->userId, $userLogin->id);
    $userid->verificationToken = $userLogin->id;
    setcookie("usertoken", $userid->verificationToken, time() + 3600 * 12, "/");


    Header("HTTP/1.1 200 LoginOK");
    Header("Location: " . $backurl);
} else {
    Header("HTTP/1.1 200 LoginOK");
    Header("Location: ../../../login.php");
}
//$mcm = new McmModel();
//$token = $userid->verificationToken;
//$mcm->userLogout($token);
