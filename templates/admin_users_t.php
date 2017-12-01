


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
                        

                        <th class="hidden-xs">ID</th>

                        <th>Username</th>

                        <th>First Name</th>

            						<th>Last Name</th>

            						<th>Phone</th>

            						<th>Email</th>

            						<th>Town</th>

            						<th>Address Line</th>

            						<th>Lot Number</th>

                    </tr> 

                  </thead>

                    <tbody>

              			<?php foreach ($positions as $position): ?>

						<tr>
							
	                
							<td><?= $position["user_id"] ?></td>

							<td> <?= $position["username"] ?></td>

							<td> <?= $position["first_name"] ?></td>

							<td> <?= $position["last_name"] ?></td>

							<td> $<?= $position["phone"] ?></td>

							<td> $<?= $position["email"] ?></td>

							<td> $<?= $position["town"] ?></td>

							<td> $<?= $position["address_line"] ?></td>

							<td> $<?= $position["lot_number"] ?></td>

						</tr>

						 <?php endforeach ?> 

                    </tbody>

                </table>
            
              </div>
              
            </div>

		</div>

	</div>

</div>

  

