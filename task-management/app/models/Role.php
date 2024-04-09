<?php

class Role extends Model
{
 
    public $errors=[];
    protected $table = 'roles';
      protected $afterSelect = [
        'get_permissions',
      ];
    protected $allowedColumns =[
        'role',
        'disabled',
      
    ];
    
    public function validate($data)
    {
        $this->errors = [];

          if(empty($data['role']))
        {
            $this->errors['role'] = "Please, enter your role";
        }
          else  if (!preg_match("/^[a-zA-Z ']+$/", $data['role']))
            {
                $this->errors['role'] = "Only Letter are required!";
            }
        

        if(empty($this->errors)){

            return true;
        }
          return false;  
    }

protected function get_permissions($data)
{
    if(!empty($data[0]->id) && !empty($data[0]->role))
    {
        foreach($data as $key => $row)
        {

      

            $sql = "select permission from permission_role where role_id = :role_id && disabled = 0";
            $arr['role_id']= $row->id;
            $result = $this->query($sql, $arr);

            if($result)
            { 
                $data[$key]->permissions = array_column( $result,'permission');

               
            }
        }
    }
    return $data;
}


    


}
