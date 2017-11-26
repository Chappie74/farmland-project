
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



function filterTable(textbox,container) {

  var input, filter, table, tr, td, tb, tf, tc, i;

  input = document.getElementById(textbox);

  filter = input.value.toUpperCase();

  table = document.getElementById(container);

  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {

    td = tr[i].getElementsByTagName("td")[1];
   
    if (td){

      if (td.innerHTML.toUpperCase().indexOf(filter) > -1){

        tr[i].style.display = "";

      } 
      else{

        tb = tr[i].getElementsByTagName("td")[3];

        if(tb){

          if(tb.innerHTML.toUpperCase().indexOf(filter) > -1){

            tr[i].style.display = "";

          }else{

            tc = tr[i].getElementsByTagName("td")[4];

            if(tc){

              if(tc.innerHTML.toUpperCase().indexOf(filter) > -1){

                tr[i].style.display = "";

              }else{

                    tr[i].style.display = "none";

              }
            }
          }
        }
      }
    }
  }
}         
  

