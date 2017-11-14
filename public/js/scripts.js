
$(document).ready(function(){
    //for switching between the next and back forms in sign up
    $("#next_btn, #back_btn").click(function(){
        $("#address").toggleClass("hidden");
        $("#basic_row").toggleClass("hidden");
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
    return valid;
}
