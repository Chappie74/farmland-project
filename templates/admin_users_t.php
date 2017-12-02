<?php 
  
  if($_SESSION['info_update_success'] == 1)
  {   
    echo "<script type='text/javascript'>alert('You information has been updated successfully.');</script>";  
    $_SESSION['info_update_success'] = 0; 
  }
?>


                <div class="container" id="admin_users_container">

    <div class="row">   
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">

              <div class="panel-heading">

                <div class="row">

                  <div class="col col-xs-6">

                    <h3 class="panel-title">Users</h3>

                  </div>
                  <div class="col col-xs-6">

                   	<input id="filter_box" type="text" class="form-control" onkeyup="filterTable('filter_box','admin_users_table')" placeholder="Filter by Username,First Name, LastName">


                  </div>


                </div>

              </div>

              <div class="panel-body">

                <table class="table table-striped table-bordered table-list" id="admin_users_table">

                  <thead>

                    <tr>
                        

                        

                        
                        <th>ID</th>

                        <th>Username</th>

                        <th>First Name</th>

            						<th>Last Name</th>

            						<th>Phone</th>

            						<th>Email</th>

            						<th>Town</th>

            						<th>Address Line</th>

            						<th>Lot Number</th>

                        <th>Region</th>

                        <th></th>
                        

                    </tr> 

                  </thead>

                    <tbody>

      			<?php foreach ($position as $position): ?>

            <form action="../public/admin_users.php" method="POST">

						<tr>
							  

							<td><input type="text" name="user_id" class="form-control" tabindex="1" value='<?php echo $position["user_id"]; ?>' required="required" placeholder="User ID" /></td>

							<td> <input type="text" name="username" class="form-control" tabindex="1" value='<?php echo $position["username"]; ?>' required="required" placeholder="Username" /></td>

							<td> <input type="text" name="first_name" class="form-control" tabindex="1" value='<?php echo $position["first_name"]; ?>' required="required" placeholder="First Name" /></td>

							<td> <input type="text" name="last_name" class="form-control" tabindex="2" value='<?php echo $position["last_name"]; ?>' required="required" placeholder="Last Name" /></td>

							<td> <input type="text" name="phone" class="form-control" tabindex="4" value='<?php echo $position["phone"]; ?>' required="required" placeholder="XXX-XXX-XXXX" /></td>

							<td> <input type="text" name="email" class="form-control" tabindex="3" value='<?php echo $position["email"]; ?>' required="required" placeholder="Email Address" /></td>

							<td> <input type="text" name="town" class="form-control" tabindex="7" value='<?php echo $position["town"]; ?>' required="required" placeholder="Town" /></td>

							<td> <input type="text" name="address_line" class="form-control" tabindex="6" value='<?php echo $position["address_line"]; ?>' required="required" placeholder="Stree Address" /></td>

							<td> <input type="text" name="lot_number" class="form-control" tabindex="5" value='<?php echo $position["lot_number"]; ?>' required="required" placeholder="Lot Number" /></td>

              <td> <input type="text" name="region" class="form-control" tabindex="7" value='<?php echo $position["region"]; ?>' required="required" placeholder="Region" /></td>

              <td><button type="submit"><span>Update</span></button></td>
              


						</tr>

            </form>

						 <?php endforeach ?> 

                    </tbody>

                </table>
            
              </div>
              
            </div>

		</div>

	</div>

</div>

  

