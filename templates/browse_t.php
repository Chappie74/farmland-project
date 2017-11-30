


<div class="container">

<div class="col-xs-12">

    <div class="page-header">

        <h3>Browse</h3>

        <p>Fresh produce offered by trusted formers</p>

    </div>
        
    <div class="carousel slide" id="myCarousel">

        <div class="carousel-inner">

            <div class="item active">

                    <ul class="thumbnails">

                    	<?php foreach ($products as $product): ?>

	                        <li id="card" class="col-sm-3">

	    						<div class="fff">

									<div class="thumbnail">

										<a href="#"><img src="<?php echo $product->image?>" alt=""></a>

									</div>

									<div class="caption">
										
											<h4><?php echo $product->name; ?></h4>
											<p><?php echo $product->category; ?></p>
											<p>Units Available:<?php echo $product->units; ?></p>
											<p>Price:<?php echo $product->price; ?></p>
											<p>Date listed:<?php echo $product->date_listed; ?></p>
											<p>Sold By:<?php echo $product->seller; ?></p>
											<form method="POST" action="../public/add_to_cart.php">	
												<input class="btn btn-default " type="submit" value="Add to cart">																
												<input type="hidden" name="i_name" value="<?php echo $product->name; ?>">
												<input type="hidden" name="i_units" value="<?php echo $product->units; ?>">
												<input type="hidden" name="i_price" value="<?php echo $product->price; ?>">
												<input type="hidden" name="i_seller" value="<?php echo $product->seller; ?>">
												<input type="hidden" name="i_image" value="<?php echo $product->image; ?>">

											</form>
									</div>

	                            </div>

	                        </li>
	                        
	                    <?php endforeach;?>
                        
                    </ul>
              </div>                           
    	</div>      
	</div>         
</div>
