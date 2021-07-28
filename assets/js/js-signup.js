$(document).ready(function () {
  // this function checks the inputs have error or not and also checks that they are empty or not
  function check_validate(){
    if ($("#firstname").parent().parent().hasClass("error") || $("#lastname").parent().parent().hasClass("error") || $("#email").parent().parent().hasClass("error") ||
     $("#password").parent().parent().hasClass("error") || $("#confirmpassword").parent().parent().hasClass("error") || $('#checkbox').parent().parent().hasClass("error") ||
     !$('#firstname').val() || !$('#lastname').val() || !$('#email').val() || !$('#password').val() || !$('#confirmpassword').val() || $('#checkbox').is(':checked')==false){
     
      return false
    }
    
    else{
      
      return true
    }

  }

  // front-end validation using semantic form-validation
  $('.ui.form').form({
    on: 'blur',
    inline:true,
      fields: {
      firstname: {
        identifier  : 'firstname',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا نام را وارد کنید'
          },
          {
            type   : 'minLength[2]',
            prompt : 'نام باید حداقل دو حرف باشد'
          }
        ]
      },
      lastname: {
        identifier  : 'lastname',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا نام خانوادگی را وارد کنید'
          },
          {
            type   : 'minLength[2]',
            prompt : 'نام خانوادگی باید حداقل دو حرف باشد',
          }
        ]
      },
      email: {
        identifier  : 'email',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا ایمیل را وارد کنید'
          },
          {
            type   : 'email',
            prompt : 'لطفا ایمیل معتبر وارد کنید'
          }
        ]
      },
      password: {
        identifier  : 'password',
        rules: [
          {
            type    : 'empty',
            prompt  : 'لطفا رمز عبور را وارد کنید'
          },
          {
            type    : 'minLength[5]',
            prompt  : 'رمز عبور حداقل شامل 5 کاراکتر است'
          },
          {
            type    : 'maxLength[30]',
            prompt  : 'رمز عبور حداکثر شامل 30 کاراکتر است'
          },
          {
            type   : 'regExp[/^([A-Za-z]+)([0-9]+)(([A-Za-z0-9!@#$%&*?])*){5,30}$/]',
            prompt : ' رمز عبور باید با حرف شروع شود سپس عدد سپس شامل حرف، عدد یا کاراکترهای خاص باشد '
          }
        ]
      },
      confirmpassword: {
        identifier  : 'confirmpassword',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'رمزها مطابقت ندارند'
          }
        ]
      },
      checkbox:{
        identifier  : 'checkbox',
        rules:[
          {
            type: 'checked',
            prompt:'باید شرایط و قوانین را قبول کنید'
          }
        ]
      }
  }

  });

  $('#button').click( function() {

    $(this).transition('pulse');

    if(check_validate()){

    var firstname = $('#firstname').val();

    var lastname = $('#lastname').val();

    var email = $('#email').val();

    var password = $('#password').val();

    var confirmpassword = $('#confirmpassword').val();

      $.ajax({

        url: "base.php",

        type: "POST",

        data: {

          firstname: firstname,

          lastname : lastname,

          email: email,

          password: password,

          confirmpassword : confirmpassword		

        },

        success: function(dataResult){

          var dataResult = JSON.parse(dataResult);

          if(dataResult.statusCode==200){

            $('input').val('');

            $('#checkbox').prop('checked',false);

            // use sweet alert2 to show message
            Swal.fire({

              icon: 'success',

              title: 'ثبت نام با موفقیت انجام شد',

              confirmButtonText: "باشه"

            })

          }

          else if(dataResult.statusCode==400){

            if(dataResult.msg.length>1){
            
              const list = $('<ul></ul>');

                for (var i = 0 ; i < dataResult.msg.length ; i++) {

                  list.append('<li>'+dataResult.msg[i]+'</li>')

                  // li=$('<li></li>')

                  // li.html(dataResult.msg[i])

                  // list.append(li)
                  
                }
                  
                Swal.fire({

                  icon: 'error',

                  title: "خطا در وارد کردن اطلاعات",

                  html: list,

                  confirmButtonText: "باشه"

                })

            }

            else{
              Swal.fire({

                icon: 'error',

                title: "خطا در وارد کردن اطلاعات",

                html: dataResult.msg,

                confirmButtonText: "باشه"

              })
            }
                    
          }

          else if(dataResult.statusCode==500){
          
          Swal.fire({

            icon: 'error',

            title: 'خطایی در سمت سرور رخ داد!',

            confirmButtonText: "باشه"

          })

          }

        }

      });

    }
  });  
});
