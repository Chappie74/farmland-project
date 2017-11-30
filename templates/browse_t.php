<div class="col-md-1 " ></div>
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

