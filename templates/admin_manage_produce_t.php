<?php 
  
  if($_SESSION['info_update_success'] == 1)
  {   
    echo "<script type='text/javascript'>alert('You information has been updated successfully.');</script>";  
    $_SESSION['info_update_success'] = 0; 
  }
?>

<div class="container">

<div class="col-xs-12">

    <div class="page-header">

        <h3>manage all produce</h3>

    </div>
        
    <div class="carousel slide" id="myCarousel">

        <div class="carousel-inner">

            <div class="item active">

                    <ul class="thumbnails">

                    	<?php foreach ($products as $product): ?>

                    		<form accept="" method="post">

	                        <li id="card" class="col-sm-3">

	    						<div class="fff">

									<div class="thumbnail">

										<a href="#"><img src="<?php echo $product->image?>" alt=""></a>

									</div>

									<div class="caption">

											<p><input type="hidden" name="user_id" value="<?php echo $product->user_id; ?>"></p>

											<p><input type="hidden" name="product_category_id" value="<?php echo $product->category_id; ?>"></p>

											<p><input type="hidden" name="product_id" value="<?php echo $product->id; ?>"></p>
										
											<p><input type="text" name="product_name" value="<?php echo $product->name; ?>"></p>

											<p><input type="text" name="product_category" value="<?php echo $product->category; ?>"></p>

											<p><input type="text" name="product_units" value="<?php echo $product->units; ?>"></p>

											<p><input type="text" name="product_price" value="<?php echo $product->price; ?>"></p>

											<p>Date listed:<?php echo $product->date_listed; ?></p>

											<p>Sold By:<?php echo $product->seller; ?></p>

											
											<input class="btn btn-default " type="submit" value="Update">			
											
									</div>

	                            </div>

	                        </li>
	                       </form> 
	                    <?php endforeach;?>
                        
                    </ul>
              </div>                           
    	</div>      
	</div>         
</div>