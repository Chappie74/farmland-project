$(document).ready(function(){
    $("#next_btn, #back_btn").click(function(){
        $("#address").toggleClass("hidden");
        $("#basic_row").toggleClass("hidden");
    });
});