<?php
    include_once('function.php');

    include_once('validation.php');

    $funObj = new DbFunction();
        
    $name = $_POST['firstname'];

    $lastname = $_POST['lastname'];

    $email = $_POST['email'];  

    $password = $_POST['password'];  

    $confirmpassword = $_POST['confirmpassword'];

    $valObj = new Control($name, $lastname, $email, $password, $confirmpassword);
    
    $validate_data = $valObj->validation();
    
    if ($validate_data['success']){

        $funObj->UserRegister($name, $lastname, $email, $password);

    }

    else{

        echo json_encode($validate_data);
        
    }
   
?>  
