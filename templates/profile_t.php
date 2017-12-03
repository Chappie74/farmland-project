<?php 
	
	if(isset($_SESSION["info_update_success"]))
	{	
		if($_SESSION["info_update_success"])
		{
			echo "<script type='text/javascript'>alert('You information has been updated successfully.');</script>";	
			$_SESSION['info_update_success'] = 0;
		}
			
	}
?>

<br>
<div class="row">
	<div class="col-md-3" >
	</div>

	<form action="../public/profile.php" method="POST">
		<div class="col-md-6" style="box-shadow: 1px 2px 20px 5px gray; padding-left: 50px;" >
			<!-- Personal information and contact section -->
			<div class="row">
				<h3>Personal and Contact Information</h3>	
				<hr/>			
			</div>
			
		
			<div class="row">
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="name">Name:</label>
						</div>
						
						<div class="col-md-9">     
							<div class="col-md-3">
								<input type="text" name="first_name" class="form-control" tabindex="1" value='<?php echo $first_name; ?>' required="required" placeholder="First Name" />
							</div>   
							<div class="col-md-3">
								<input type="text" name="last_name" class="form-control" tabindex="2" value='<?php echo $last_name; ?>' required="required" placeholder="Last Name" />
							</div> 
							<div class="col-md-3">
							</div> 		                
			          	</div>		
					</div>
				</div>
				<br>
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="email">Email:</label>
						</div>
						
						<div class="col-md-9">     
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" tabindex="3" value='<?php echo $email; ?>' required="required" placeholder="Email Address" />
							</div>	                
			          	</div>		
					</div>
				</div>	
				<br>				
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="phone">Phone Number:</label>
						</div>
						
						<div class="col-md-9">     
							<div class="col-md-3">
								<input type="text" name="phone" class="form-control" tabindex="4" value='<?php echo $phone; ?>' required="required" placeholder="XXX-XXX-XXXX" />
							</div>		                
			          	</div>		
					</div>
				</div>	
			</div>
			<br>

					<!--Address section-->
			<div class="row">
				<h3>Address Information</h3>
				<hr/>
			</div>
			
			<div class="row">
				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="lot_number">Lot Number:</label>
						</div>
							
						<div class="col-md-9">     
							<div class="col-md-3">
								<input type="text" name="lot_number" class="form-control" tabindex="5" value='<?php echo $lot_number; ?>' required="required" placeholder="Lot Number" />
							</div>		                
				          </div>		
					</div>
				</div>
				<br>

				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="street_address">Street Address:</label>
						</div>
							
						<div class="col-md-9">     
							<div class="col-md-6">
								<input type="text" name="address_line" class="form-control" tabindex="6" value='<?php echo $address_line; ?>' required="required" placeholder="Stree Address" />
							</div>		                
				          </div>		
					</div>
				</div>
				<br>

				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="town">Town:</label>
						</div>
							
						<div class="col-md-9">     
							<div class="col-md-4">
								<input type="text" name="town" class="form-control" tabindex="7" value='<?php echo $town; ?>' required="required" placeholder="Town" />
							</div>		                
				          </div>		
					</div>
				</div>
				<br>

				<div class="row">
					<div class="form-group">
						<div class="col-md-3">
							<label for="region">Region:</label>
						</div>

						<div class="col-md-9">
							<div class="col-md-3">
		                       <select class="form-control" name="region" tabindex="8" >
		                          <?php 
		                            for ($i=1; $i <= 10 ; $i++) { 
		                            	if($i == $region)
		                            		echo '<option selected="selected">'.$i.'</option>';	
		                            	else
		                              		echo '<option>'.$i.'</option>';
		                            }                            
		                          ?>
		                        </select> 
	                    	</div>
	                    </div>	
                    </div>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary">Update Information</button>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-3"><button type="button" class="btn btn-info btn-md" id="change_pass_btn" data-toggle="modal" data-target="#password_change">Change Password</button></div>			
			</div>
			<br>
		</div>
	</form>

	<div class="col-md-3" style="border-right:2px solid gray;">		
	</div>



		<!-- Change password Modal -->
	  <div class="modal fade" id="password_change" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center">Change Password</h4>
	        </div>
	        <div class="modal-body">
	          <form method="POST" action="../public/change-password.php" name="change_pass">
	          	<div class="form-group">
	          		<label>Current Password:</label>	          		
	          		<input type="password" class="form-control" name="password" required />
	          		<div class="row">	      
	          			<div class="col-md-8"></div> 			
	          			<label class="text-danger hidden col-md-4" id = "danger_incorrect"></label>
	          		</div>
	          	</div>	          	
	          	<div class="form-group">
	          		<label>New Password:</label>
	          		<input type="password" class="form-control" name="new_password" required />
	          	</div>
	          	<div class="form-group">
	          		<label>Confirm New Password:</label>
	          		<input type="password" class="form-control" name="con_password" required />
	          		<div class="row">	      
	          			<div class="col-md-7"></div> 			
	          			<label class="text-danger hidden col-md-5" id="conf_pass"></label>
	          		</div>
	          	</div>	      
	          	<button type="submit" class="btn btn-primary btn-sm">Update Password</button> 
	          	<label id="success" class="text-success">Hi</label>   	
	          </form>
	          
	        </div>
	        <div class="modal-footer">
	          
	        </div>
	      </div>
	      
	    </div>
	  </div>
</div>

<script type="text/javascript" src="../public/js/profile_t.js"></script>