<?php
ini_set("display_errors",1);

class Model extends Database
{
    public $offset = 0;
    public $limit = 50;
    public $order = 'desc';
     public function insert($data)
    { 
    
         // removing unwanted
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        //implode function returns a string from elements of an array
        $keys = array_keys($data);

        $sql = "insert into $this->table ";
        $sql .="(".implode(", ",$keys).") values(:".implode(", :",$keys).")";  
 
        $this->query($sql,$data);
    
    }


    public function where($data)
    {
        //select * from db where email = :email;
        $sql = "select * from $this->table where ";
       
         foreach ($data as $key => $value) {
             $sql .="".$key. " = :$key"."&&";      
         }
        $sql = trim($sql,'&&');
        $sql .= " order by id $this->order limit $this->limit";
         $result = $this->query($sql,$data);
         if(is_array($result))
         {  
            //after select 
            if(property_exists($this, 'afterSelect'))
            {
                foreach ($this->afterSelect as  $functions) {
                   $result =  $this->$functions($result);
                  
                }
            }
            return $result ;

         }
         return false;
    }
      public function first($data)
    {
        //select * from db where email = :email order by desc limit 1;
        $sql = "select * from $this->table where ";
       
         foreach ($data as $key => $value) {
             $sql .="".$key. " = :$key"."&&";      
         }
        $sql = trim($sql,'&&');
        $sql .= " order by id desc limit 1";

         $result = $this->query($sql,$data);
         if(is_array($result))
         {
             if(property_exists($this, 'afterSelect'))
            {
                foreach ($this->afterSelect as  $functions) {
                   $result =  $this->$functions($result);
                  
                }
            }
            return $result[0] ;
         }
         return false;
    }

       public function update($id, $data)
    { 
    
         // removing unwanted
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        //implode function would work in ths situation
        $keys = array_keys($data);
        $sql = "update $this->table set ";
       foreach ($keys as $key) {
            $sql .= $key." =:".$key.", ";
       }
            $sql = trim($sql, ', ');
            $sql .= " where id = :id";



           $data['id']=$id;
           

        $this->query($sql,$data);

      

        //update users set username = :username where id = :id;
    
    }
    
     public function findAll()
    {
        //select * from db 
        $sql = "select * from $this->table order by id $this->order";
       
        
         $result = $this->query($sql);
         if(is_array($result))
         {
             if(property_exists($this, 'afterSelect'))
            {
                foreach ($this->afterSelect as  $functions) {
                   $result =  $this->$functions($result);
                  
                }
            }
            return $result ;
         }
         return false;
    }

     public function delete($id=null):bool
    {
        //dlete
        $sql = "delete from $this->table where id = :id limit 1";

            $this->query($sql,['id'=>$id]);
         return true;
    }
}
