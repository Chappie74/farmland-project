$(document).ready(function(){

  $("#change_pass_btn").click(function() {
      $('#danger_incorrect,#conf_pass,#success').addClass('hidden');
      $("input[name=password],input[name=new_password],input[name=con_password]").val("");
  });


  $("form[name=change_pass]").submit(function(e) {
    e.preventDefault();
    var current_password = $("input[name=password]").val();
    var new_password = $("input[name=new_password]").val();
    var confirm_password = $("input[name=con_password]").val();

    if ($.trim(current_password) != '' || $.trim(new_password) != '' ||  $.trim(confirm_password) != '' )
    {
      $.post('../public/change-password.php', {
          current_password: current_password,
          new_password: new_password,
          confirm_password:confirm_password


        },function(data, textStatus, xhr) {
          var results = JSON.parse(data);


          if(results["curr_password"] && results["password_match"])
          {
              $('#conf_pass,#success').removeClass('text-danger hidden');
              $('#conf_pass').addClass('text-success');
              $('#success').html("You password has been updated successfully.");
              $("input[name=password],input[name=new_password],input[name=con_password]").val("");
              $('#danger_incorrect,#conf_pass').addClass('hidden');

              setTimeout(function() {
                $('#success').addClass('hidden')
              }, 3000);

          }
          else
          {
            if(results["curr_password"])
            {
              $('#danger_incorrect').removeClass('text-danger hidden');
              $('#danger_incorrect').addClass('text-success');
              $('#danger_incorrect').html("Correct Password");
            }
            else
            {
              $('#danger_incorrect').removeClass('hidden text-success');
              $('#danger_incorrect').addClass('text-danger');
              $('#danger_incorrect').html("Incorrect Password");
            }

            if(results["password_match"])
            {
                $('#conf_pass').removeClass('text-danger hidden');
                $('#conf_pass').addClass('text-success');
                $('#conf_pass').html("Password matches.");
            }
            else
            {
                $('#conf_pass').removeClass('hidden text-success');
                $('#conf_pass').addClass('text-danger');
                $('#conf_pass').html("Password does not matches.");
            }
          }
      });

    } 

  });




});