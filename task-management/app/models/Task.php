<?php
class Task extends Model
{
 
    public $errors=[];
    protected $table = 'tasks';
    protected $allowedColumns =[
      'assigned_by',
      'task_name',
      'task_description',
      'start_time',
      'end_time',
      'assigned_to',
      'status',
      'date',
      
 
    ];
    
    public function validate($data)
    {
        $this->errors = [];

         
        

        if(empty($this->errors)){

            return true;
        }
          return false;  
    }



    


}
