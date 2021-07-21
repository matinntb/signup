<!DOCTYPE html>  
 <html lang="en">  
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Language" content="fa" />  
        <title>Sign up</title>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/validation.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/fomantic-ui/dist/semantic.min.css">
        <script src="assets/fomantic-ui/dist/semantic.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
         <!-- <script src="assets/sweetalert2/package/dist/sweetalert2.all.min.js"></script> -->
        <script src="assets/sweetalert2/package/dist/sweetalert2.min.js"></script>
        <link type="text/css" rel="stylesheet" href="assets/sweetalert2/package/dist/sweetalert2.min.css">
        <link type="text/css" rel="stylesheet" href="assets/css/css-signup.css"> 
        <script type="text/javascript" src="assets/js/js-signup.js"></script> 

    </head>  
    <body> 
        <div class="ui doubling stackable two column centered grid"> <!--nesfe safhe ra migire -->
            <div class="row">
                <div class="ui nine wide computer column">
                    <div class="ui raised segment">
                        <div class="ui doubling stackable two column grid">
                            <div class="middle aligned column" id="center">
                                <img class="register-img" src="assets/img/register.jpg">
                            </div>
                            <div class="column">
                                    <div class="ui form" id="signup-form">
                                        <h1 class="ui center aligned header">
                                        Sign Up
                                        </h1>
                                    <div class="required field">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstname" id="firstname" class="input" placeholder="First name">
                                    </div>

                                    <div class="required field">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" name="lastname" id="lastname" class="input" placeholder="Lastname">
                                    </div>
                                    <div class="required field">
                                        <label for="email">E-mail</label>
                                        <input type="email" name="email" id="email" class="input" placeholder="E-mail">
                                    </div>
                                    <div class="required field">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="input" placeholder="Password">
                                    </div>
                                    <div class="required field">
                                        <label for="confirmpassword">Confirmpassword</label>
                                        <input type="password" name="confirmpassword" id="confirmpassword" class="input" placeholder="Confirmpassword">
                                    </div>
                                    <button class="fluid ui primary submit button" name="register" id="button" >SIGN UP</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  
</html>  
