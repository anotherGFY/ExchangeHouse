<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/APSK/McmModel.php");

$uri = isset($_GET["login"]) ? $_GET["login"] : "http://www.hades.com/login.html";

$out = <<<EOF
     USERINFO ={};
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
        setcookie("usertoken", $_COOKIE["usertoken"], time() + 2900, "/");
        setcookie("user", $_COOKIE["user"], time() + 2900, "/");
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
} else {
    $token = $_COOKIE["usertoken"];
    $user = $_COOKIE["user"];
    $mcm = new McmModel();
    $now = time();
    $appkey = sha1($mcm->appid . "UZ" . $mcm->appkey . "UZ" . $now) . "." . $now;



//     USERINFO = {
//        APP: "$mcm->appid" ,
//        KEY: "$appkey" ,
//        TOKEN: "$token" ,
//        ID: "$user"
//     };
$userinfo = <<<EOF

USERINFO = {
    APP: "$mcm->appid" ,
    KEY: "$appkey" ,
    TOKEN: "$token" ,
    ID: "$user"
};

if (typeof (pMethod) == "undefined")
    var pMethod = function (uri, data, type, success, fail)
    {
        var data = $.trim(data) == "" ? "{}" : data;
        $.ajax({
            "url": uri,
            "cache": true,
            "headers": {
                "X-APICloud-AppId": USERINFO.APP,
                "X-APICloud-AppKey": USERINFO.KEY,
                "authorization": USERINFO.TOKEN
            },
            "data": data,
            "type": (type == "POST") ? "POST" : "GET"
        }).success(function (data, status, header) {
            if ($.isFunction(success))  success(data, status, header);
        }).fail(function (header, status, errorThrown) {
            if ($.isFunction(fail)) fail(header, status, errorThrown);
        });
    };    
            
EOF;
    echo $userinfo;
}

