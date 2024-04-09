<?php
class Admin extends Controller
{
   
    public function index()
    {
     if(! Auth::logged_in())
      {
         redirect('login');
      }
       
        $data['title'] = "404";
      $this->view('admin/404', $data);
    }

    public function dashboard()
    {
     
        if(! Auth::logged_in())
          {
            redirect('login');
          }
          if(!user_can('view_dashbord'))
          {
            message("You don't have the permission");
            redirect('login');
          }


        $id = Auth::getId();

        
        $task = new Task();
   
        $data['rows'] = $task->where(['assigned_to'=>$id]);
        
        $num = 0;

        if(is_array($data['rows']))
        {
          foreach($data['rows'] as $count)
          {
            $num++;
          }
        }
      $data['num'] =$num;
      //show($data['rows']);
        $data['title'] = "dashboard";
      $this->view('admin/dashboard', $data);
        
    }
 
//PROFILE METHHODS

    public function profile($id = null)
    {

       if(! Auth::logged_in())
      {
         redirect('login');
      }
        //escaping typing ig in url
       //$id = $id  ?? Auth::getid();
        $id =Auth::getid();
          $user = new User();
          $arr['id'] = $id;
          $data['row'] = $row   = $user->first($arr);
             if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
              {
                //if there is any image 
                //check if yhe filename exist first
                //to bypass errors
                $folder = "uploads/images/";
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder.'index.php','');
                    file_put_contents('uploads/index.php', '');
                }
                if($user->validate_edit($_POST,$id))
                {
                    
                  $allowed = ['image/jpeg', 'image/png','image/jpg'];
                  
                  if(!empty($_FILES['image']['name']))
                  {
                    if($_FILES['image']['error'] == 0)
                    {
                      if(in_array($_FILES['image']['type'], $allowed))
                      {
                        $destination = $folder.time().$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                       // resize_image($destination);
   
                    
                        $_POST['image'] = $destination;
                        

                     
                     
                        if(file_exists($row->image))
                        {
                          unlink($row->image);
                        }
                      //echo $destination;
                     
                      }
                      else{

                        $user->errors['image'] = "File type is not allowed";
                      }
                    }
                    else
                    {
                      $user->errors['image'] = "cound not upload image";
                    }
                  }
                 
                  $user->update($id, $_POST);
                  $_SESSION['USER_DATA']->image = $destination;
                
                 
                  
               }
               if(empty($user->errors))
               {
                    message("successfully saved");
                  redirect('admin/profile/'.$id);
               }
            
              }

        
             
       $data['errors']= $user->errors;
      $data['title'] = "profile";
      $this->view('admin/profile', $data);
    }





  //PERMISSIONS FUNCTION METHOD
      public function roles($action =null, $id = null)
    {
       
          if(! Auth::logged_in())
            {
              redirect('login');
            }
         
            $user_id = Auth::getId();
            $data['action'] = $action;
            $data['id'] = $id;
            $data['title'] = "role";


            $role = new Role();
            //$ads = new Ads_model();
          

            if(user_can('view_roles'))
            {
              if($action == "add")
              {
                $data['role'] = $role->findALL();
              
                if($_SERVER['REQUEST_METHOD'] == 'POST' )
                      {
                        if(user_can('add_role'))
                        {
                          if($role->validate($_POST))
                          {
                              //insert category and disabled in the category  into database
                              //$_POST['user_id'] = $user_id;
                              $_POST['slug'] = str_to_url($_POST['category']);
                              //show($_POST);die;
                              $role->insert($_POST);
                          
                              message("Role created  successfuly");
                        
                                redirect('admin/roles');
                            
                              
                          }
                        }
                        else
                        {
                          $role->errors['category'] = 'You have no permission!';
                        }
                          $data['errors']= $role->errors;
                      }
                      

              } 
              elseif($action == "delete")
              {
              
                $data['row'] = $row  = $role->first(['id'=>$id]);
                
                  if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
                      {
                        if(user_can('delete_role'))
                        {
                      
                          $role->delete($row->id);
                          message('successfuly deleted');
                          redirect('admin/roles');
                        }
                      }
              }

              elseif($action == "edit")
              {
        
                $data['row'] = $row  = $role->first(['id'=>$id]);

                if($_SERVER['REQUEST_METHOD'] == 'POST' && $row )
                      {
                        if(user_can('edit_role'))
                        {
                      
                          if($role->validate($_POST))
                          {
                              //insert category and disabled in the category  into database
                              //$_POST['user_id'] = $user_id;
                              //$_POST['slug'] = str_to_url($_POST['category']);
                              //show($_POST);die;
                              $role->update($row->id,$_POST);
                          
                              message("category created  successfuly");
                        
                                redirect('admin/roles');
                            
                              
                          }
                        }
                        $data['errors']= $role->errors;
                      }   
              }
              else 
              {
                //VIEWING OR GETTING ALL ROLES THAT IS ELSE AFETR ACTIONS
                
                    $data['rows'] = $role->findALL();
                  
                  
                  if($_SERVER['REQUEST_METHOD'] == 'POST' )
                      { 
                        //disable permissions before we do anything
                      $sql = "update permission_role set disabled = 1 where id > 0";
                      $role->query($sql);

                        foreach ($_POST as $key => $permission) {
                          echo $permission;
                          if(preg_match("/[0-9]+\_[0-9]+/", $key))
                          {
                            $row_id = preg_replace("/\_[0-9]+/", "",$key);
                            //if record exist
                           
                            $datas =[];
                            $datas['role_id'] = $row_id;
                            $datas['permission']= $permission;

                            $sql = "select id from permission_role  where permission = :permission and role_id = :role_id limit 1";
                            $chck = $role->query($sql, $datas);
                            if($chck)
                            {
                              //we update if the record is found
                            $sql = "update  permission_role  set disabled = 0 where  permission = :permission  &&  role_id = :role_id limit 1";
                            }
                            else{
                              //then int database permission_roles table if record not found
                              $sql = "insert into permission_role (role_id, permission) values (:role_id, :permission)";
                            }
                            //show($sql);
                          // show($datas);die;
                            $role->query($sql, $datas);
                          }
                        }
                        //die;
                        redirect('admin/roles');
                      }
                    
              }
            }
            
            $this->view('admin/roles', $data);
                
  }


  //Gate pass form

  public function task($action =null, $id = null)
  {

    $data = [];
    if(! Auth::logged_in())
      {
        redirect('login');
      }

       if($_SERVER['REQUEST_METHOD'] == 'POST' )
       {

        $role = Auth::getRole();
        $_POST['submitted_by'] = Auth::getUsername();
        $_POST['submitted_role'] = $role;
        $_POST['user_id'] = Auth::getId();

        

        if($role == 1)
        {
          $_POST['receiver'] = '4' ;//documentaion officer
        }
        else if($role == 4)
        {
          $_POST['receiver'] = '5'; //terminal officer
        }
        else if($role = 5)
        {
          $_POST['receiver'] = '6';//manager
        }
        
        else if($role = 6)
        {
          $_POST['receiver'] = '7';//security guard
        }


        //show($_POST);die;
        $gatepass = new Gatepass();
        $gatepass->insert($_POST);
        
       }

    

    $this->view('admin/tasks', $data);
  }

  public function ajaxData($action =null, $id = null)
  {

   
    
    $data= [];
    if(! Auth::logged_in())
      {
        redirect('login');
      }

    $task = new Task();

    
      if($action == "view")
      {


        $sql = "SELECT tasks.*, users.username
        FROM tasks 
        JOIN users ON users.id = tasks.assigned_to where tasks.id = :id
        ";
        $row = $task->query($sql,['id'=>$id]);
        header('Content-Type: application/json');
        echo json_encode($row);die;

    }
     else if($action == "edit")
      {
         if($_SERVER['REQUEST_METHOD'] == 'POST' )
          {
            if(Auth::is_admin())
            {
              $sql2 = "UPDATE tasks 
            SET assigned_to = :assigned_to, 
                end_time = :end_time, 
                task_name = :task_name, 
                start_time = :start_time, 
                status = :status,
                task_description = :task_description 
            WHERE id = :id";


              $task->query($sql2, $_POST);
              echo json_encode('success');die;
           
            }
            else{

              $dd['id'] = $_POST['id'];
              $dd['status'] = $_POST['status'];
              $sql2 = "UPDATE tasks SET status = :status WHERE id = :id";



              $task->query($sql2, $dd);
              echo json_encode('success');die;
           
            }
          }
     
      }


    
  }
  public function assignedtasks($action=null, $id=null)
  {

    $data= [];
    if(! Auth::logged_in())
      {
        redirect('login');
      }

    $task = new Task();
    $users = new User();

    if($action == "delete")
    {
      $sql3 = "delete from tasks where id = :id";
      $task->query($sql3,['id'=>$id]);
      message("Record deleted successfuly");
      redirect('admin/assignedtasks');

    }

     if($_SERVER['REQUEST_METHOD'] == 'POST' )
     {
      $_POST['assigned_by'] = Auth::getrole_name();
      $_POST['date'] = date("Y:m:d H:i:s");
      $task->insert($_POST);
      message("Task created successfuly");
      redirect("admin/assignedtasks");

     }
      
    

    
   if(Auth::getRole_name() == 'admin')
    {
          $data['employees']= $users->where(['role'=>1]);

          $sql = "SELECT tasks.*, users.username, users.email 
          FROM tasks 
          JOIN users ON users.id = tasks.assigned_to;
          ";
          $data['rows'] = $task->query($sql);
    }
    else if(Auth::getRole_name()== "user")
    {
    
         $user_id = Auth::getId();
       
        $data['employees']= $users->where(['role'=>1]);

        $sql = "SELECT tasks.*, users.username, users.email 
        FROM tasks 
        JOIN users ON users.id = tasks.assigned_to where assigned_to = :assigned_to;
        ";
       $data['rows'] = $task->query($sql,['assigned_to'=>$user_id]);
      
    }
  


    $this->view('admin/assignedtasks', $data);


  }

  public function users($action='',$id='')
    {
       if(!Auth::logged_in())
      {
        redirect('login');die;
      }
     
    
      $user = new User();
      $data=[];
      $data['action'] = $action;
      if(!Auth::logged_in())
      {
         //redirect('login');die;
      }
        if(!Auth::is_admin())
        {
         // redirect('login');die;

        }
        if($action == "add")
        {  if(Auth::user_can('add_user') )
        {

        }
        }
        elseif($action == "delete")
        {
    

        if(Auth::is_admin('delete_user') )
        {
          
          if($_SERVER['REQUEST_METHOD'] == "POST")
          {
             $arr['id'] = $id;
             //echo $id;die;
            //  $users = new User();
             $sql = "DELETE FROM users where id = :id";
             $user->query($sql, ['id'=>$id]);//delete($arr);
             message("deleted succefully");
             redirect("admin/users");
          }
        }
         
        }
        elseif($action == "edit")
        {
            if(Auth::user_can('edit_user') )
        {
        }
        }


      $rows = $user->findAll();

   
      $data['rows']= $rows;
        //show($data);die;
      $this->view('admin/users',$data);

      
  
    }



    public function Api($action=null, $id=null)
    {
        try {
            $endpoint = "http://127.0.0.1:5000/api";
            $input = json_decode(file_get_contents('php://input'),true);
            $data = array('message' => $input['message']);
    

            $json_data = json_encode($data);
            
            $ch = curl_init($endpoint);

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
            $result = curl_exec($ch);
    
            if ($result === false) {
                throw new Exception(curl_error($ch));
            }
    
            // Close cURL session
            curl_close($ch);
            $response = json_decode($result, true);
            if ($response === null) {
                throw new Exception("Failed to decode JSON response");
            }
  
            print_r(json_encode($response));die;
      
        } catch (Exception $e) {
           
            echo $e->getMessage();die;
        }
    }
    
}
