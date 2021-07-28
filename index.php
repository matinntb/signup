<!DOCTYPE html>  
 <html lang="en" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Language" content="fa" />  
        <title>Sign up</title>
        <script src="assets/js/jquery.js"></script>
        <!--include sweet alert2 -->
        <script src="assets/sweetalert2/package/dist/sweetalert2.min.js"></script>
        <link type="text/css" rel="stylesheet" href="assets/sweetalert2/package/dist/sweetalert2.min.css">
        <!--include rtl semantic -->
        <link rel="stylesheet" href="assets/fomantic-ui/dist/semantic.rtl.min.css" >
        <script src="assets/fomantic-ui/dist/semantic.rtl.min.js" ></script>
        <!--include my css and js files-->
        <script type="text/javascript" src="assets/js/js-signup.js"></script>
        <link type="text/css" rel="stylesheet" href="assets/css/css-signup.css">

    </head>
    <body>
        <div class="ui doubling stackable two column centered grid"> <!--nesfe safhe ra migire -->
            <div class="row">
                <div class="ui nine wide computer column">
                    <div class="ui raised segment">
                        <div class="ui doubling stackable two column grid" id="form-image-div">
                            <div class="middle aligned column" id="center">
                                <img class="register-img" src="assets/img/register.jpg">
                            </div>
                            <div class="column">
                                <div class="ui form" id="signup-form">
                                    <h1 class="ui center aligned header">
                                    عضویت
                                    </h1>

                                    <div class=" required field">
                                        <label for="firstname">نام</label>
                                        <div class="ui icon input">
                                            <input type="text" name="firstname" id="firstname" class="input" placeholder="نام">
                                            <i class="user icon"></i>
                                        </div>
                                    </div>

                                    <div class="required field">
                                        <label for="lastname">نام خانوادگی</label>
                                        <div class="ui icon input">
                                            <input type="text" name="lastname" id="lastname" class="input" placeholder="نام خانوادگی">
                                            <i class="user icon"></i>
                                        </div>
                                    </div>

                                    <div class="required field">
                                        <label for="email">ایمیل</label>
                                        <div class="ui icon input">
                                            <input type="email" name="email" id="email" class="input" placeholder="ایمیل">
                                            <i class="envelope icon"></i>
                                        </div>
                                    </div>

                                    <div class="required field">
                                        <label for="password">رمز عبور</label>
                                        <div class="ui icon input">
                                            <input type="password" name="password" id="password" class="input" placeholder="رمز عبور">
                                            <i class="lock icon"></i>
                                        </div>
                                    </div>

                                    <div class="required field">
                                        <label for="confirmpassword"> تکرار رمز عبور</label>
                                        <div class="ui icon input">
                                            <input type="password" name="confirmpassword" id="confirmpassword" class="input" placeholder="تکرار رمز عبور">
                                            <i class="lock icon"></i>
                                        </div>
                                    </div>

                                    <div class="required field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="checkbox" id="checkbox" class="checkbox">
                                            <label>
                                                <a>شرایط و قوانین</a> را می پذیرم
                                            </label>
                                        </div>
                                    </div>
                                    <button class="fluid ui primary submit button" name="register" id="button" >عضویت</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>  
</html>  
