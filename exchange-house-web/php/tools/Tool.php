<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tool
 *
 * @author Administrator
 */
class Tool {

    public static function _Get($str) {
        $val = !empty($_GET[$str]) ? $_GET[$str] : null;
        return $val;
    }

    public static function _Post($str) {
        $val = !empty($_POST[$str]) ? $_POST[$str] : null;
        return $val;
    }

}
