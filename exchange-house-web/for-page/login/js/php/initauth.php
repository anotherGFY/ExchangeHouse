<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/APSK/McmModel.php");

$uri = isset($_GET["login"]) ? $_GET["login"] : "http://www.hades.com/login.html";

$out = <<<EOF
     window.location.href="$uri?backurl="+window.location.href;
EOF;

$isChecked = FALSE;

if (isset($_COOKIE["usertoken"]) && isset($_COOKIE["user"])) {
    $mcm = new McmModel();
    $name = 'accessToken';
    $id = $_COOKIE["usertoken"];
    $token = $mcm->objGet($name, $id, $id);
    if (isset($token) && !isset($token->error)) {
        $isChecked = $token->userId == $_COOKIE["user"];
        setcookie("usertoken", $_COOKIE["usertoken"], time() + 900, "/");
        setcookie("user", $_COOKIE["user"], time() + 900, "/");
    } else {
        setcookie("usertoken", NULL, time() - 1000, "/");
        setcookie("user", NULL, time() - 1000, "/");
        switch ($token->error->statusCode) {
            case 401:
                echo "alert('用户登录超时');";
                break;
            default :
                echo "alert('操作超时,请重新登录');";
                break;
        }
    }
} else {
    echo "alert('由于您长时间未有任何操作,请重新登录');";
}

if ($isChecked == FALSE) {//验证未通过
    echo $out;
}

