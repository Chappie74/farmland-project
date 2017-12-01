

// $(document).ready(function(){
//     //for switching between the next and back forms in sign up
//     $("#next_btn, #back_btn").click(function(){
//         $("#address").toggleClass("hidden");
//         $("#basic_row").toggleClass("hidden");
//     });

//     //disables the sign up button unless all inputs has data
//     $("input.signup").each(function () {
//     	$(this).keyup(function () {
//         	$("#signup_submit").prop("disabled", CheckInputs());
//     	});
// 	});
// });


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

        tb = tr[i].getElementsByTagName("td")[2];

        if(tb){

          if(tb.innerHTML.toUpperCase().indexOf(filter) > -1){

            tr[i].style.display = "";

          }else{

            tc = tr[i].getElementsByTagName("td")[3];

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



$(document).ready(function(){
    $.ajax({
      url : "http://localhost/farmland-project/public/chart.php",
      type : "GET",
      success : function(purchaseData,saleData){
        console.log(purchaseData);
        console.log(saleData);
        
        var id = [];
        var values = [];


        for(var i in purchaseData){
          id.push(purchaseData[i].name); 
          values.push(purchaseData[i].total);
        }

        var chartdata = {
          labels : id,
          dataset : [
                      {
                        label:'item',
                        backgroundColor:'rgba(59, 89, 152, 0.75)',
                        borderColor:'rgba(59, 89, 152, 1)',
                        pointHoverBackgroundColor:'rgba(59, 89, 152, 1)',
                        pointHoverBorderColor:'rgba(59, 89, 152, 1)',
                        data: values
                      }
                    ]
        };

        var ctx = $("#mycanvas");

        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });


      },
      error : function(purchaseData){
        console.log("error");
      }
    });
});
