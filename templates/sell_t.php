
	<div class="col-md-3" >
	</div>

	
		<div class="col-md-5">
			<form action="../public/sell.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="product_name">Product Name:</label>	
						<div class="dropdown">
							<input type="text" name="product_name" class="form-control dropdown-toggle" required tabindex="1" 
								placeholder="eg. Carrots, Calaloo, Tomatoes, Sweet Potatoe" data-toggle="dropdown" 
							/>
							<ul id="dropdown" class="dropdown-menu hidden">
						    </ul>
						</div>	
					</div>

					<div class="form-group col-md-6">
						<label for="category">Category:</label>	
						<select class="form-control" name="category" required tabindex="2" >
				                <?php 
				                 	echo '<option selected="selected" disabled="true">--Select A Category--</option>';
				                        foreach ($categories as $category)
				                        {     		                            		                            	
				                           echo '<option>'.$category["name"].'</option>';
				                        }                            
				                ?>
				        </select>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-3">
						<label for="amount">Amount for sale:</label>
						<input type="number" name="amount" class="form-control" required tabindex="3" placeholder="Units"  min="1" max="50000"/>				
					</div>	

					<div class="form-group col-md-3">
						<label for="price">Price:</label>	
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-dollar " aria-hidden="true"></i>
							</div>
							<input type="number" name="price" tabindex="4" required class="form-control"  placeholder="Price per Unit"  min="1.00" max="10000000000"/>						
						</div>						
					</div>	
				</div>

				

				<div class="form-group">
					<label for="img_file" class="btn btn-primary" tabindex="5"><i class="fa fa-upload" aria-hidden="true"></i> Upload an image</label>
					<input type="file" id ="img_file" name="product_image" required accept="image/*">
					<label id="status" class="text-warning">
						<i class="fa fa-times hidden" aria-hidden="true"></i>
						<span id ="message"> 1MB limit</span>
						<i class="fa fa-check hidden" aria-hidden="true"></i>
					</label>
				</div>						
				
				
				<div class=" text-warning">
					Fill out all fields to continue.
				</div>
				<br>
				<button type="submit" tabindex="6" class="btn btn-primary disabled">List for sale</button>
			</form>
		</div>
	<div class="col-md-3">
	</div>


<!-- <form action="../public/product_names.php" method="POST">
	<input type="text" name="product_name">
	<input type="submit" name="">
</form> -->