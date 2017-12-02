var conf_pass = false;

$(document).ready(function(){
    //for switching between the next and back forms in sign up
    $("#next_btn, #back_btn").click(function(){
        $("#address_pane").toggleClass("hidden");
        $("#first_pane").toggleClass("hidden");
    });

    $("#con_pass, #password").each(function(){
        $(this).keyup(function(){
             //check to see if password confirmation mathes
        if($("#con_pass").val() != $("#password").val()){
            $("#pass_no_match").removeAttr("hidden");
            conf_pass = false;
        }
        else{
            $("#pass_no_match").attr("hidden", "true");
            conf_pass = true;
        }

        });
    });


    //disables the sign up button unless all inputs has data
    $("input.signup").each(function () {
    	$(this).keyup(function () {
        	$("#signup_submit").prop("disabled", CheckInputs());
    	});
	});
});


//check to see if all form input on sign up form is populated
function CheckInputs() {
    var valid = false;
    $("input.signup").each(function () {
        if (valid) { return valid; }
        var input = $.trim($(this).val());
        valid = !input;
    });

    if(conf_pass == false)
    {
        valid = true;
    }
    else if(con_pass == true && valid == false)
    {
        valid = false;
    }

    return valid;
}