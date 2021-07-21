<?php
class Control{

    public $name;

    public $lastname;

    public $email;

    public $password;

    public $confirmpassword;

    public $errorMSG = array();



    function __construct($name, $lastname, $email, $password, $confirmpassword)
    {

        $this -> name = $name;

        $this -> lastname = $lastname;

        $this -> email = $email;

        $this -> password = $password;

        $this -> confirmpassword = $confirmpassword;

    }

    function validation()
    {
        if(!$this -> validation_name_lastname($this -> name)){
            
            array_push($this->errorMSG, "First name must be at least 2 characters");
        }
        
        if(!$this -> validation_name_lastname($this -> lastname)){

            array_push($this->errorMSG, "Lastname must be at least 2 characters");
        }

        if(!$this -> validation_email($this -> email)){

            array_push($this -> errorMSG, "Please Enter a valid email");
        }

        if(!$this -> validation_password($this -> password)){

            if(strlen($this -> password) < 5){

                array_push($this -> errorMSG,"Password must be at least 5 characters long");

            }

            else{            

                array_push($this -> errorMSG, "Password must include [0-9][A-Za-z][@#$%]");

            }

        }
        
        if ($this -> password != $this -> confirmpassword){

            array_push($this -> errorMSG,"Passwords do not match");

        }

        if(empty($this->errorMSG)){

            return array('success' => true, 'statusCode' => 200);
        }

        return array('success' => false , 'statusCode'=>400, 'msg'=> $this -> errorMSG);

     }

    function validation_name_lastname($text){

        $newtext = trim($text);

        if (!preg_match ("/^.{2,30}$/", $newtext)) { 

            return false;

        } 

        else {  

            return true;
        }
    
    }

    function validation_email($email){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return false;

        }

        else{

            return true;

        }

    }

    function validation_password($password){

        $pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{5,30}$/";

        return preg_match($pattern, $password);
           
    }
}
?>