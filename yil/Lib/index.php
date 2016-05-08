<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function autoload($class){
    $file = './'.$class . '.php';
        if (is_file($file)) {
            require_once($file);
        }
}
spl_autoload_register( 'autoload' );
