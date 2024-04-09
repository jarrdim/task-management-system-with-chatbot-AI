<?php
class Login extends Controller
{
   
    public function index()
    {
        $data['title'] = "login";
        $data['errors'] = [];
        $user = new User();
        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            
            $arr['email'] = $_POST['email'];
            $row  = $user->first($arr);
            if($row)
            {
                if($_POST['password'] == $row->password )
                {
                    //$db = new Database();
                    //getting user role name
                    $id = $row->role;
                    $sql = "select role from roles where id =:id limit 1"; 
                    $role = $user->query($sql,['id'=>$id]);

                    if($role)
                    {
                        $row->role_name = $role[0]->role;
                    }
                    else
                    {
                        $row->role_name = '';
                    }

                   
                     
                     /* Now i auth the user
                      * Using aute class to check if logged in, if ia admin or user
                      * Now in Auth class im going to assign data from $row to a session variable
                      * Meaning all the data will be avaible throughout the session
                     */  
                    Auth::authenticate($row);
                    //$_SESSION['USER_DATA'] = $row;
                    
                    redirect('admin/dashboard');
                      //show( $_SESSION['USER_DATA']);
                }
             
            }
            $data['errors']['email'] = "Incorrect email or password!";

          
        }
        $this->view('login', $data);
    }
}
