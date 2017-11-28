<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/tools/Tool.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/APSK/McmModel.php");


$mcm = new McmModel();
$username = Tool::_Post("username");
$password = Tool::_Post("password");
$backurl = Tool::_Get("backurl") == NULL ? "../../../personal/profile.html" : Tool::_Get("backurl");

if ($username != NULL && $password != NULL) {
    $userLogin = $mcm->userLogin($username, $password);
    if (isset($userLogin->error)) {
        switch ($userLogin->error->statusCode) {
            case 401:
                Header("HTTP/1.1 401 errorauth");
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
                //Header("Location: ../../../login.html");
                break;
        }
    } else {
        $userid = $mcm->userGet($userLogin->userId, $userLogin->id);
        $userid->verificationToken = $userLogin->id;
        setcookie("usertoken", $userid->verificationToken, time() + 2900, "/");
        setcookie("user", $userLogin->userId, time() + 2900, "/");

        Header("HTTP/1.1 200 LoginOK");
        Header("Location: " . $backurl);
    }
}

//$mcm = new McmModel();
//$token = $userid->verificationToken;
//$mcm->userLogout($token);
