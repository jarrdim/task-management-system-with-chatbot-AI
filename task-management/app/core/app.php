<?php
class App 
{
    protected $controller = '_404';
    protected $method = 'index';
    public static $page = 'admin';
    public function  __construct()
    {
      
     $arr = $this->getURL();
     $arr[0] = ucfirst($arr[0]);
        
        $filename = "../app/controllers/".$arr[0].".php";
     if(file_exists($filename))
        {
            require "$filename";
            $this->controller = $arr[0];
            self::$page = $arr[0];
            unset($arr[0]);

            
        }
        else {
           require "../app/controllers/".$this->controller.".php";
        }
        //instance
        $myController = new $this->controller();
        $myMethod = $arr[1] ?? '$this->method';

        if(!empty($arr[1]))
        {
            if(method_exists($myController, strtolower($myMethod)))
            {
                $this->method = strtolower($myMethod);
                unset($arr[1]); 
            }
                          
        }
       
        //call_user_func_array(array($myController, "$myMethod"),array());
        $arr = array_values($arr);
        call_user_func_array(array($myController, "$this->method"),$arr);
    
    }



    public function getURL()
    {
        $url = $_GET['url'] ?? 'admin';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;

    }
    
}