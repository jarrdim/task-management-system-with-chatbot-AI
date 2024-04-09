<?php
define('WEB_NAME','TASK MANAGEMENT ');
 define('DESCRIPTION','TASK MANAGEMENT ');


define('DEBUG',"true");




if( $_SERVER['SERVER_NAME'] == '127.0.0.1' || $_SERVER['SERVER_NAME'] == 'localhost')
{
    //localhost
    //configurations

    define('DBHOST','127.0.0.1');
    define('DBUSER','root');
    define('DBPASSWORD','');
    define('DBNAME','task_management');
    define('DBDRIVER','mysql');
    define('ROOT','http://127.0.0.1/PROJECTS/task-management/public');
 

}
else
{
    //live server
       //configurations
       define('DBHOST','127.0.0.1');
       define('DBUSER','guru');
       define('DBPASSWORD','moting');
       define('DBNAME','classified');
       define('DBDRIVER','mysql');

       define('ROOT','http://');
}