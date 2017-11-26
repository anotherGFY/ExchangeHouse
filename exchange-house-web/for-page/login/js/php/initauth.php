<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$out = <<<EOF
    window.onload=function(){
         window.location.href="../login.php?backurl="+window.location.href; 
   };
EOF;

echo $out;

