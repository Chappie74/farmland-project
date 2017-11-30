$(document).ready(function() {         
    
            $("form").each(function(index, el) {
                $(this).submit(function(e){
                    e.preventDefault();

                    var item_name = $("input[name=i_name]",this).val();
                    var item_units = $("input[name=i_units]",this).val();
                    var item_price = $("input[name=i_price]",this).val();
                    var item_seller = $("input[name=i_seller]",this).val();
                    var item_image = $("input[name=i_image]",this).val();

                    $.post('../public/add_to_cart.php', {
                        item_name: item_name,
                        item_price: item_price,
                        item_units: item_units,
                        item_seller: item_seller,
                        item_image: item_image

                    },function(data, textStatus, xhr){
                            var results = JSON.parse(data);                           
                            addToCart(results);                            
                        });
                });
            });

            


    });
        


    function addToCart (item) 
{
     $("#cart-body").append('<div class="row" style="overflow-wrap: normal;">'+
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
                        'Price/Unit: $'+item.price+
                      '</div>'+
                      '<div class="col-md-5 plus-minus-container">'+                     
                            '<div  id="minus" class="col-sm-4"><i class="fa fa-minus minus" style="font-size:14px"></i></div>'+  
                            '<input class="col-sm-4 text-center" type="number" value="1" id="quantity" name="quantity" min="0" max="100">'+        
                            '<div id="plus" class="col-sm-4"><i class="fa fa-plus " style="font-size: 14px"></i></div>'+
                      '</div>'+
                   '</div>'+
                  '</div> '+
                  
                  '<div class="row" style="margin-left:0px;" >'+
                    '<div class="col-sm-7">Total: <div class="total"></div> </div>'+
                    '<div class="col-sm-5" style="font-size: 10px;"><span class="remove btn-link" id="'+item.id+'"'+ 'href="#">Remove item</span></div>'+
                     '<hr>'+
                 '</div>'+
                '</div>'+
''+
                
              '</div>'
            );       
        
}        
