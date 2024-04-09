<?php
class Signup extends Controller
{
   
    public function index()
    {
     
      
        $data['errors'] = [];
        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            if($user->validate($_POST))
            {
                //insert into database
                $_POST['role'] = '1';
                $_POST['date'] = date('Y:m:d H:i:s') ;
                $user->insert($_POST);
                message("account created successfuly. Please login");
                redirect('login');
            }
        }
     
       $data['errors'] = $user->errors;
       $data['title'] = "signup";
      $this->view('signup', $data);
    }
     public function edit()
    {
      
    }
}
