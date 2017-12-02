var cart_total = 0.00;
$(document).ready(function() {         
    
            $("form[name=add_to_cart]").each(function(index, el) {
                $(this).on("submit",function(e){
                    e.preventDefault();
                   
                    var item_name = $("input[name=i_name]",this).val();
                    var item_units = $("input[name=i_units]",this).val();
                    var item_price = $("input[name=i_price]",this).val();
                    var item_seller = $("input[name=i_seller]",this).val();
                    var item_image = $("input[name=i_image]",this).val();
                    var item_available_amt = $("input[name=i_ava_amt]",this).val();


                    $.post('../public/add_to_cart.php', {
                        item_name: item_name,
                        item_price: item_price,
                        item_units: item_units,
                        item_seller: item_seller,
                        item_image: item_image,
                        item_available_amt:  item_available_amt,

                    },function(data, textStatus, xhr){
                            var results = JSON.parse(data);                                                     
                            addToCart(results);                         
                        });
                });
            });           



});
        


function addToCart (item) 
{
  cart_total += parseFloat(item.price);
  var cart_item = $('<div class="row item_block" style="overflow-wrap: normal;">'+
                  '<div class="col-sm-12" >'+
                    '<div class="row no_left item_details">'+
                      '<img src="'+item.image+'"' + 'class="img-responsive thumbnail col-sm-2" height="40" width="40">'+
                      '<div class="col-sm-9" style="overflow-wrap: normal;">'+
                        '<div id="_item_name">'+
                          item.name+ 
                        '</div>'+
                      '</div>'+                   
                    '</div>'+
                   
                 '</div>'+
                  ''+
                  '<div class="row price_details">'+
                    '<div class="col-sm-12">'+
                     '<div class="col-md-7" style="font-size:12px;">'+
                        'Price/Unit: $<span>'+item.price+'</span>'+
                        
                      '</div>'+
                      '<div class="col-md-5 plus-minus-container">'+                     
                            '<div  id="minus" onclick="changeAmount(this);" class="col-sm-4"><i class="fa fa-minus minus" style="font-size:14px"></i></div>'+  
                            '<input class="col-sm-4 text-center disabled" type="number" onChange= "updateTotal(this);" value="1" id="c_quantity" name="quantity" min="0" max="1000">'+
                            '<input name ="cart_item_units" class="hidden" value="'+item.units+' ">'+        
                            '<div id="plus" onclick="changeAmount(this);" class="col-sm-4"><i class="fa fa-plus " style="font-size: 14px"></i></div>'+
                      '</div>'+
                   '</div>'+
                  '</div> '+
                  
                  '<div class="row total_display" style="margin-left:0px;" >'+
                    '<div class="col-sm-8 total">Total:$ <span>'+item.price+'</span> </div>'+
                    '<div class="col-sm-4" style="font-size: 10px;"><span class="remove btn-link" id="'+item.id+'"'+ 'onclick="removeFromCart(this);"href="#">Remove item</span></div>'+
                     '<hr>'+
                 '</div>'+
''+
                
              '</div>');

$("#cart-body").append(cart_item);  
$("#cart_total").html("0"); 
$("#cart_total").html(cart_total);     

}


            


function changeAmount(element) 
{
   var currentVal = 0;
   var quantityDisplay = $(element).siblings("#c_quantity");
   var quantityDisplayVal = $.trim($(quantityDisplay).val());    
   var units = parseInt($(element).siblings("input[name=cart_item_units]").val());
   


    if(quantityDisplayVal == "" || isNaN(quantityDisplayVal))
    {
      
    }

    currentVal = parseInt($(quantityDisplay).val());


    
    if($(element).attr("id") == "minus")
    {
       if((currentVal - 1) == 0)
      {
        currentVal = 1;
      }
      else
      {

        currentVal -= 1;
      }
    }
    else
    {
      if((currentVal + 1) > units || currentVal > units)
        {
          currentVal = units;
        }
        else
        {
            currentVal += 1;
        }
        
    }
    

    $(quantityDisplay).val(currentVal);

    
    updateTotal(quantityDisplay,element);
    
}


function updateTotal(quantity,element) 
{   
    var quantityDisplay = $(quantity);
    var quantityDisplayVal = $.trim($(quantityDisplay).val());
    var total_el = $(quantityDisplay).parents(".price_details").siblings(".total_display").children('.total').children('span');
    var price = $(quantityDisplay).parents(".plus-minus-container").prev().children('span');
    var units = parseInt($(element).siblings("input[name=cart_item_units]").val());
    var item_id = parseInt($(quantityDisplay).parents(".price_details").siblings(".total_display").find(".remove").attr("id"));
    
    cart_total = 0;

    if(quantityDisplayVal == "" || isNaN(quantityDisplayVal))
      {
        quantityDisplayVal =  $(quantityDisplay).val("1");
      }
    if(quantityDisplayVal > units)
    {
      quantityDisplayVal = units;
      $(quantityDisplay).val(units);
    }  
    var  total = parseInt($(quantityDisplay).val()) * parseFloat($(price).html());
    total_el.html(total);    
    
    $('.total').children('span').each(function(index, el) {
       var val = parseFloat($(el).html());
       cart_total += val;
    });

    $("#cart_total").html(cart_total);

    
    $.get('../public/add_to_cart.php?id='+item_id+'&units='+quantityDisplayVal+"", function(data) {
      
    });

}

function removeFromCart(el) 
{
   var id = $(el).attr("id");
   var item_total = parseFloat($(el).parent().prev().children('span').html());
    
    if (id == "empty_cart") 
    {
      $.get('../public/remove_from_cart.php?empty=true', function(data) {
        $("#cart_total").html("0");
        $("#cart-body").empty();
      });
    }
    else
    {
      $.post('../public/remove_from_cart.php', {id: id}, function(data, textStatus, xhr) {
        $(el).parents(".item_block").remove();
        cart_total -= item_total;
        $("#cart_total").html(cart_total);
      });
    }
   
    
}