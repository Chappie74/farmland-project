<!-- <div class="col-md-1 " ></div>
<div class="col-md-10" id="items_sections">
<div class="row">
	<?php foreach ($products as $product): ?>
	<div   class="w3-card-4 col-md-3 card" style="width:20%" >
		<a href="#"><div class="row" id="card_top">
			<div class="col-md-12">
	    		<img src="<?php echo $product->image?>"  width="300px" style="width:100%;height: 150px	" class="img-thumbnail img-responsive">
	    		<div class="row tag"><?php echo $product->category; ?></div>
	    	</div>

		</div></a>
		<div class="w3-container" id="lower-half">
			<div class="row" id="card_middle">
				<div class="row" >
					<div class="col-md-12 text-center " style="font-size: 20px;text-transform:capitalize;font-family: 'Permanent Marker', cursive;">
						<b><?php echo $product->name; ?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12"><hr size="200px"></div>
				</div>
				<div class="row">
					<div class="col-md-6 Fredoka_font " >
						  <b>Units:</b>
					</div>
					<div class="col-md-6 Fredoka_font ">
						<?php echo $product->units; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 Fredoka_font " >
						  <b>Price:</b>
					</div>
					<div class="col-md-6 Fredoka_font ">
						$<?php echo $product->price; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 Fredoka_font " >
						  <b>Date Listed:</b>
					</div>
					<div class="col-md-6 Fredoka_font ">
						<?php echo $product->date_listed; ?>
					</div>
				</div>

				<div class="row" >
					<div class="col-md-12" id="seller">
						<hr>
						<b>Listed by:</b> <a href="#" class="btn-link"><?php echo $product->seller; ?></a>
					</div>
				</div>
			</div>

			<div class="row" id="card_bottom">
				<div class="col-md-12">
					<div class="row ">
						<span class="col-lg-10">
							<i class="fa fa-shopping-cart" style="font-size:23px;color: white;"></i>
							<span style="font-size: 15px; color: white; font-weight: bold">&nbsp&nbspAdd to cart</span>
						</span>
						<span class="col-lg-2"><i class="fa fa-plus-circle" style="font-size:24px; color: white"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;?>
</div>
	</div>

</div>
<div class="col-md-1"></div>
 -->
<?php
	if(!empty($cart_items))
	{
		foreach ($cart_items as $item) {
			$cart_total += $item["units"] * $item["price"];
		}
	}
	else
		$cart_total = 0;
?>

<div class="container">

<div class="col-xs-12">

    <div class="page-header">

        <h3>Browse</h3>

        <p>Fresh produce offered by trusted farmers</p>

    </div>

    <div class="carousel slide" id="myCarousel">

        <div class="carousel-inner">

            <div class="item active">
            		<?php if(is_null($products) || empty($products)): ?>
            			<span>There are no products for sale at this time.</span>
            		<?php else: ?>	
                    <ul class="thumbnails">
                    	<?php foreach ($products as $product): ?>

	                        <li id="card" class="col-sm-3">

	    						<div class="fff">

									<div class="thumbnail">

										<a href="#"><img src="<?php echo $product->image?>" alt=""></a>

									</div>

									<div class="caption">

											<h4 class="text-center" style="text-transform:capitalize;"><?php echo $product->name; ?></h4>
											<p><?php echo $product->category; ?></p>
											<p>Units Available: <?php echo $product->units; ?></p>
											<p>Price: <?php echo $product->price; ?></p>
											<p>Date listed: <?php echo $product->date_listed; ?></p>
											<p>Sold By: <?php echo $product->seller; ?></p>

											<form name="add_to_cart" method="POST" action="../public/add_to_cart.php">
												<input class="btn btn-info" name="add_status"  type="submit"  value="Add to cart"
												id="<?php echo $product->id ?>">
												<input type="hidden" name="i_name" value="<?php echo $product->name; ?>">
												<input type="hidden" name="i_units" value="<?php echo $product->units; ?>">
												<input type="hidden" name="i_price" value="<?php echo $product->price; ?>">
												<input type="hidden" name="i_seller" value="<?php echo $product->seller; ?>">
												<input type="hidden" name="i_image" value="<?php echo $product->image; ?>">
												<input type="hidden" name="i_ava_amt" value="<?php echo $product->units; ?>">
											</form>
									</div>

	                            </div>

	                        </li>

	                    <?php endforeach;?>
	                <?php endif;?>

                    </ul>
              </div>
    	</div>
	</div>
</div>
<div id="toggle" class="cart-footer hidden" style="left:80%; z-index: 10000" onclick="toggleCart('1')">Open Cart</div>
<div class="cart-container">

              <div class="row cart-header"  onclick="toggleCart('0')">

                <div class="col-sm-2">
                  Cart
                </div>
                <div class="col-sm-8" style="padding-left: 5px;" >
                  Total: $<span id="cart_total"><?php echo $cart_total?></span>
                </div>
                <div class="dropdown">
                <div class="col-sm-2 text-center " id="ellipsis">
                    <div class="fa fa-ellipsis-v " style="font-size:24px;padding-left:10px;padding-right:10px;margin-left:-20px;" data-toggle="dropdown"></div>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a id="empty_cart" onclick="removeFromCart(this);">Empty Cart</a></li>
                      <li><a   class="checkout">Check Out</a></li>
                    </ul>
                  </div>
                </div>
              </div><br>

              <span id = "cart-toggle" >
              <div id="cart-body">
              	<?php if (!empty($cart_items)):?>

              		<?php foreach ($cart_items as $item): ?>
		                <div class="row item_block" style="overflow-wrap: normal;">
		                  <div class="col-sm-12" >
		                    <div class="row no_left item_details">
		                      <img src="<?php echo $item["image"];?>" class="img-responsive thumbnail col-sm-2" height="40" width="40">
		                      <div class="col-sm-9" style="overflow-wrap: normal;">
		                        <div id="_item_name">
		                          <?php echo $item["product_name"]; ?>
		                        </div>
		                      </div>
		                    </div>

		                 </div>

		                  <div class="row price_details">
		                    <div class="col-sm-12">
		                     <div class="col-md-7" style="font-size:12px;">
		                        Price/Unit: $<span><?php echo $item["price"] ?></span>

		                      </div>
		                      <div class="col-md-5 plus-minus-container">
		                            <div  id="minus" onclick="changeAmount(this);" class="col-sm-4"><i class="fa fa-minus minus" style="font-size:14px"></i></div>
		                            <input class="col-sm-4 text-center disabled" type="number" onChange= "updateTotal(this);" value="<?php echo $item["units"]; ?>" id="c_quantity" name="quantity" min="0" max="1000">
		                            <input name ="cart_item_units" class="hidden" value="<?php echo $item["ava_amt"]?>">
		                            <div id="plus" onclick="changeAmount(this);" class="col-sm-4"><i class="fa fa-plus " style="font-size: 14px"></i></div>
		                      </div>
		                   </div>
		                  </div>

		                  <div class="row total_display" style="margin-left:0px;" >
		                   <div class="col-sm-8 total">Total:$ <span><?php echo $item["price"] * $item["units"]?></span> </div>
		                    <div class="col-sm-4" style="font-size: 10px;"><span class="remove btn-link" id="<?php echo $item["item_id"]; ?>" onclick="removeFromCart(this);" href="#">Remove item</span></div>
		                     <hr>
		                 </div>
		              </div>
		            <?php endforeach;?>
          		<?php endif; ?>
              </div>
              <div class="row cart-footer checkout">Checkout</div>
              <span>
            </div>

<div class="container">
<!-- Modal -->
  <div class="modal fade" id="checkout_modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Comfirm Purchase</h4>
        </div>
        <div class="modal-body">
          <div class="text-center">Are you sure you want to purchase all items in cart?</div>
          <div class="row text-center" >
          <br>
          <a href="../public/checkout.php"><button class="btn btn-primary">Yes</button></a>
          <button class="btn btn-primary" data-dismiss="modal">No</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
