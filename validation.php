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

    public function validation()
        //in this function use other functions to check validation
    {
        if(!$this -> validation_name_lastname($this -> name)){
            
            array_push($this->errorMSG, "نام باید حداقل دو حرف باشد");
        }
        
        if(!$this -> validation_name_lastname($this -> lastname)){

            array_push($this->errorMSG, "نام خانوادگی باید حداقل دو حرف باشد");
        }

        if(!$this -> validation_email($this -> email)){

            array_push($this -> errorMSG, "لطفا ایمیل معتبر وارد کنید");
        }

        if(!$this -> validation_password($this -> password)){

            if(strlen($this -> password) < 5){

                array_push($this -> errorMSG,"رمز عبور باید حداقل 5 کاراکتر باشد");

            }

            else{            

                array_push($this -> errorMSG, " رمز عبور باید با حرف شروع شود سپس عدد سپس شامل حرف، عدد یا کاراکترهای خاص باشد ");

            }

        }
        
        if ($this -> password != $this -> confirmpassword){

            array_push($this -> errorMSG,"رمزها مطابقت ندارند");

        }

        if(empty($this->errorMSG)){

            return array('success' => true, 'statusCode' => 200);
        }

        return array('success' => false , 'statusCode'=>400, 'msg'=> $this -> errorMSG);

     }

    private function validation_name_lastname($text){

        $newtext = trim($text);

        if (!preg_match ("/^.{2,30}$/", $newtext)) { 

            return false;

        } 

        else {  

            return true;
        }
    
    }

    private function validation_email($email){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return false;

        }

        else{

            return true;

        }

    }

    private function validation_password($password){

        $pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{5,30}$/";

        return preg_match($pattern, $password);
           
    }
}
?>