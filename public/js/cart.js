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
    
            $("form").each(function(index, el) {
                $(this).submit(function(e){
                    e.preventDefault();

                    var item_name = $("input[name=i_name]",this).val();
                    var item_units = $("input[name=i_units]",this).val();
                    var item_price = $("input[name=i_price]",this).val();
                    var item_date = $("input[name=i_date]",this).val();
                    var item_seller = $("input[name=i_seller]",this).val();

                    $.post('../public/add_to_cart.php', {
                        item_name: item_name,
                        item_price: item_price,
                        item_date: item_date,
                        item_seller: item_seller

                    },function(data, textStatus, xhr){
                            alert(data);
                        });

                });
            });

    });
        
    




