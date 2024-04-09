<?php
class auth{
     public static function authenticate($row)
     {
        if(is_object($row))
        {
            $_SESSION['USER_DATA'] = $row;
        }
     }
       public static function logout()
     {
        if(!empty($_SESSION['USER_DATA']))
        {
            unset($_SESSION['USER_DATA']);
        }
   
     }

      public static function is_admin()
     {
        if(!empty($_SESSION['USER_DATA']))
        {
           
           if(!empty($_SESSION['USER_DATA']->role_name))
           {
            if(strtolower($_SESSION['USER_DATA']->role_name) == 'admin')
               {
                  return true;
               }
           }
            
        }
        else
        {
            return false;
        }
     }

     public static function logged_in()
     {
        if(!empty($_SESSION['USER_DATA']))
        {
            return  true;
        }
        else
        {
            return false;
        }
     }

      public static function __callstatic($fuction, $key)
     {
        $key = str_replace('get','', $fuction);
        $key = strtolower($key);
         if(!empty($_SESSION['USER_DATA']->$key))
        {
           return  $_SESSION['USER_DATA']->$key;
        }
    
     }
}