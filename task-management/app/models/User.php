<?php
class User extends Model
{
 
    public $errors=[];
    protected $table = 'users';
    protected $allowedColumns =[
        'email',
        'username',
        'password',
        'role',
        'date',
        'about',
        'lastname',
        'address',
        'phone',
        'slug',
        'country',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'image',
        
    ];
     protected $afterSelect = [
        'get_role',
           
    ];
    
    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['username']))
        {
            $this->errors['username'] = "Please, enter your name!";
        }
          if(empty($data['email']))
        {
            $this->errors['email'] = "Please, enter your email!";
        }
        elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
             $this->errors['email'] = "Please, enter yvalid email!";
        }
          if(empty($data['password']))
        {
            $this->errors['password'] = "Please, enter your password";
        }
          else  if (!preg_match("#[A-Z]+#", $data['password']))
            {
                $this->errors['password'] = "Your Password Must Contain At Least 1 Capital Letter!";
            }
           
          if(empty($data['terms']))
        {
            $this->errors['terms'] = "You must agree before submitting.";
        }

        if(empty($this->errors)){

        
            return true;

        }
          return false;  
    }



    public function validate_edit($data,$id)
    {
        $this->errors = [];

        if(empty(trim($data['username'])))
        {
            $this->errors['username'] = "Please, enter your First name!";
        }
        else if(!preg_match("/^[a-zA-Z]+$/",trim($data['username'])))
        {
            $this->errors['username'] = "Please, only characters area required!";
        }


         if(empty(trim($data['lastname'])))
        {
            $this->errors['lastname'] = "Please, enter your last name!";
        } else if(!preg_match("/^[a-zA-Z]+$/",trim($data['lastname'])))
        {
            $this->errors['lastname'] = "Please, only characters are required!";
        }



          if(empty(trim($data['email'])))
        {
            $this->errors['email'] = "Please, enter your email!";
        }
          if($result = $this->where(['email'=>$data['email']]))
        {  
            foreach ($result as $ress) {
              if($id != $ress->id )
              {
                 $this->errors['email'] = "Please, enter your email!";
              }
            }
           
        }
        elseif(!filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL))
        {
             $this->errors['email'] = "Please, enter valid email!";
        }



        if(empty(trim($data['country'])))
        {
            $this->errors['country'] = "Please, enter your last name!";
        } else if(!preg_match("/^[a-zA-Z]+$/",trim($data['country'])))
        {
            $this->errors['country'] = "Please, only characters are required!";
        }



        if(empty(trim($data['address'])))
        {
            $this->errors['address'] = "Please, enter your last name!";
        } else if(!preg_match("/^[a-zA-Z ,]+$/",trim($data['address'])))
        {
            $this->errors['address'] = "Please, only characters are required!";
        }



           if(!empty(trim($data['phone'])))
        {
             if(!preg_match("/^(07|\+254)[0-9]{8}$/" ,trim($data['phone'])))
              {
            $this->errors['phone'] = "Please, enter valid phone number!";
              }
        }
       




        if(!empty(trim($data['twitter_link'])))
        {
            if(!filter_var(trim($data['twitter_link']), FILTER_VALIDATE_URL))
            {
              $this->errors['twitter_link'] = "Please, enter your link!";
            }
        }



        if(!empty(trim($data['facebook_link'])))
        {
          if(!filter_var(trim($data['facebook_link']), FILTER_VALIDATE_URL))
            {
              $this->errors['facebook_link'] = "Please, enter your name!";
            }
        }




        if(!empty(trim($data['instagram_link'])))
        {
          if(!filter_var(trim($data['instagram_link']), FILTER_VALIDATE_URL))
            {
              $this->errors['instagram'] = "Please, enter your name!";
            }
        }
      

        if(empty($this->errors)){

            return true;
        }
          return false;  
    }




    protected function get_role($data)
{
    if(!empty($data[0]->email) && !empty($data[0]->role))
    {
        foreach($data as $key => $row)
        {


             $sql = "select role from roles where id =:id limit 1"; 
             $result = $this->query($sql,['id'=>$row->role]);

                if($result)
                {
                    $data[$key]->role_name = $result[0]->role;
                }
          
        }
    }
    return $data;
}


}
