<?php

/**
 * ApicloudModel
 */
require('Http.php');

class ApicloudModel extends Http {

    protected $http;
    public $appid = "A6066116094707";
    public $appkey = "BA2C51DB-715C-57D9-DBB3-75AA191EBB7A";

    // protected $appid = "A6961432222584";
    // protected $appkey = "179AD9D4-FEF1-30DF-2D6C-606FD8C9CB73";


    function __construct() {
        $now = time();
        $this->httpheader = array(
            "X-APICloud-AppId: " . $this->appid,
            "X-APICloud-AppKey: " . sha1($this->appid . "UZ" . $this->appkey . "UZ" . $now) . "." . $now
        );
    }

}

?>