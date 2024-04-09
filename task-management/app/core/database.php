<?php

class Database{
    private function connect(){

        $string = "mysql:host=".DBHOST.";dbname=".DBNAME; 
        $con = new PDO($string,DBUSER,DBPASSWORD);
        return $con;
    }

    public function query($query, $data=[],$type = 'object')
    {
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        if($statement)
        {
         $check = $statement->execute($data);
         if($check)
         {
            if($type == 'object')
            {
                $type = PDO::FETCH_OBJ;
            }
            else
            {
                $type = PDO::FETCH_ASSOC;
            }
            $result = $statement->fetchAll($type);
            if(is_array($result) && count($result)>0)
            {
                //reading after select that is to include other tables data
            
                    //after select 
                    if(property_exists($this, 'afterSelect'))
                    {
                        foreach ($this->afterSelect as  $functions) {
                        $result =  $this->$functions($result);
                        
                        }
                    }
            
                return $result;
            }
         }
        }
        return false;
    }

    public function transaction()
    {
        $db = $this->connect();
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

}
