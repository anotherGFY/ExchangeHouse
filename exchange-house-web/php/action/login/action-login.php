<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/tools/Tool.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/php/APSK/McmModel.php");


$mcm = new McmModel();
$username = Tool::_Post("username");
$password = Tool::_Post("password");
$userLogin = $mcm->userLogin($username, $password);

$userid = $mcm->userGet($userLogin->id);
