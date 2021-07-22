$(document).ready(function () {

  function check_validate(){
    if($("#firstname").parent().parent().hasClass("error") || $("#lastname").parent().parent().hasClass("error") || $("#email").parent().parent().hasClass("error") ||
     $("#password").parent().parent().hasClass("error") || $("#confirmpassword").parent().parent().hasClass("error") || $('#checkbox').parent().parent().hasClass("error") ||
     !$('#firstname').val() || !$('#lastname').val() || !$('#email').val() || !$('#password').val() || !$('#confirmpassword').val() || $('#checkbox').is(':checked')==false){
     
      return false
    }
    
    else{
      
      return true
    }

  }
  
  $('.ui.form')
  .form({
    on: 'blur',
    inline:true,
      fields: {
      firstname: {
        identifier  : 'firstname',
        rules: [
          {
            type    : 'empty',
            prompt  : 'Please Enter First name'
          },
          {
            type   : 'minLength[2]',
            prompt : 'First name must be 2 characters'
          }
        ]
      },
      lastname: {
        identifier  : 'lastname',
        rules: [
          {
            type    : 'empty',
            prompt  : 'Please Enter Last name'
          },
          {
            type   : 'minLength[2]',
            prompt : 'Last name must be 2 characters',
          }
        ]
      },
      email: {
        identifier  : 'email',
        rules: [
          {
            type    : 'empty',
            prompt  : 'Please Enter email'
          },
          {
            type   : 'email',
            prompt : 'Please Enter a valid email'
          }
        ]
      },
      password: {
        identifier  : 'password',
        rules: [
          {
            type    : 'empty',
            prompt  : 'Please Enter password'
          },
          {
            type    : 'minLength[5]',
            prompt  : 'Please must be at least 5 characters long'
          },
          {
            type    : 'maxLength[30]',
            prompt  : 'Please must be at most 30 characters long'
          },
          {
            type   : 'regExp[/^([A-Za-z]+)([0-9]+)(([A-Za-z0-9!@#$%&*?])*){5,30}$/]',//regExp[/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{5,30}$/]
            prompt : 'password must include [A-Za-z][0-9][@$!%*#?&]'
          }
        ]
      },
      confirmpassword: {
        identifier  : 'confirmpassword',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'Passwords do not match'
          }
        ]
      },
      checkbox:{
        identifier  : 'checkbox',
        rules:[
          {
            type: 'checked',
            prompt:'You must agree to the terms'
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

    // if(firstname!="" && lastname!="" && email!="" && password!="" && confirmpassword!="" && checkbox ){

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

            $('#signup-form').find('input').val('');

            $('#checkbox').prop('checked',false);
            
            Swal.fire({

              icon: 'success',

              title: 'Registration successful !'

            })
        
          }

          else if(dataResult.statusCode==400){

            if(dataResult.msg.length>1){
            
              const list = document.createElement('ul');
              
              let listItem;

                for (var i = 0 ; i < dataResult.msg.length ; i++) {

                  listItem = document.createElement('li');
                  
                  listItem.innerHTML = dataResult.msg[i];

                  list.appendChild(listItem);
                  
              }
                  
                Swal.fire({

                  icon: 'error',

                  title: "Error entering information",

                  html: list

                })

            }
            else{
              Swal.fire({

                icon: 'error',

                title: "Error entering information",

                html: dataResult.msg

              })
            }
                    
          }

          else if(dataResult.statusCode==500){
          
          Swal.fire({

            icon: 'error',

            title: 'An error occurred at the server !'

          })

          }

        }

      });

    }
    // }

  });  
});
