<?php

include( 'connect.php');

class DbFunction {

    private $conn;

    public function __construct()
    {

        // connecting to database  
        $db = new DbConnect();

        $this -> conn = $db -> getConnectionObj();
    }  

    public function UserRegister($name, $lastname, $email, $password)

    {       
        $duplicate = mysqli_query($this -> conn,"select * from users where email='$email'");

        if (mysqli_num_rows($duplicate) > 0){

            echo json_encode(array("success" => false, "statusCode" => 400, "msg" => ["این ایمیل وجود دارد!"]));
        }

        else{

            $qr = mysqli_query($this -> conn,"INSERT INTO users(name, lastname, email, password) values('$name ','$lastname', '$email', '$password')") ;
            
            if ($qr) {

                echo json_encode(array("statusCode" => 200)); 
            }

            else{
                echo json_encode(array("statusCode" => 500));
            }
            
    }   

    mysqli_close($this->conn);

    }
}  

?>  