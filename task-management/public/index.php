<?php


session_start();
ini_set("display_errors",1);


    // if(DEBUG == 'true')
    // {
    //     ini_set("display_errors",1);

    // }
    // else{
    //     ini_set("display_errors",0);
    // }




//the initializer of all core files 
require "../app/core/init.php";
$app = new App();


