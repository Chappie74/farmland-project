$(document).ready(function() {
    $("#plus").click(function() {
        var currentVal = parseInt($("#quantity").val());
        $("#quantity").val(currentVal + 1);



    });

     $("#minus").click(function() {
        var currentVal = parseInt($("#quantity").val());
        $("#quantity").val(currentVal - 1);

        if(currentVal < 1)
        {
            $("#quantity").val("1");  
        }
    });    
});