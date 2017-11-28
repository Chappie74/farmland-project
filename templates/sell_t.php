
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
				</div>
				

				<div class="form-group">
					<label for="img_file" class="btn btn-primary" tabindex="2"><i class="fa fa-upload" aria-hidden="true"></i> Upload an image</label>
					<input type="file" id ="img_file" name="product_image" required accept="image/*">
					<label id="status" class="text-warning">
						<i class="fa fa-times hidden" aria-hidden="true"></i>
						<span id ="message"> 1MB limit</span>
						<i class="fa fa-check hidden" aria-hidden="true"></i>
					</label>
				</div>		

				<div class="form-group">
					<label for="category">Category:</label>	
					<select class="form-control" name="category" required tabindex="3" >
			                          <?php 
			                          	echo '<option selected="selected" disabled="true">--Select A Category--</option>';
			                            foreach ($categories as $category)
			                            {     		                            		                            	
			                            	echo '<option>'.$category["name"].'</option>';
			                            }                            
			                          ?>
			        </select>
				</div>	
				
				<div class="form-group">
					<label for="amount">Amount for sale:</label>
					<input type="number" name="amount" class="form-control" required tabindex="4" placeholder="Units" />				
				</div>	

				<div class="form-group">
					<label for="price">Price:</label>	
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-dollar " aria-hidden="true"></i>
						</div>
						<input type="number" name="price" required class="form-control"  placeholder="Price per Unit" />						
					</div>						
				</div>	
				<div class=" text-warning">
					Fill out all fields to continue.
				</div>
				<br>
				<button type="submit" class="btn btn-primary disabled">List for sale</button>
			</form>
		</div>
	<div class="col-md-3">
	</div>


<!-- <form action="../public/product_names.php" method="POST">
	<input type="text" name="product_name">
	<input type="submit" name="">
</form> -->