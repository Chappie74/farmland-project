

	
<div class="container" id="sales_container">

    <div class="row">   
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">

              <div class="panel-heading">

                <div class="row">

                  <div class="col col-xs-6">

                    <h3 class="panel-title">Sales</h3>

                  </div>
                  <div class="col col-xs-6">

                   	<input id="filter_box" type="text" class="form-control" onkeyup="filterTable('filter_box','sales_table')" placeholder="Filter by Item,Client,Date">


                  </div>


                </div>

              </div>

              <div class="panel-body">

                <table class="table table-striped table-bordered table-list" id="sales_table">

                  <thead>

                    <tr>

                        <th class="hidden-xs">ID</th>

                        <th>Item</th>

            						<th>Client</th>

            						<th>Date</th>

            						<th>Unit(s)</th>

            						<th>Total</th>

                    </tr> 

                  </thead>

                    <tbody>

              			<?php foreach ($positions as $position): ?>

						<tr>

							<td scope="row"> <?= $position["salenumber"] ?></td>

							<td><?= $position["product"] ?></td>

							<td> <?= $position["client"] ?></td>

							<td> <?= $position["date"] ?></td>

							<td> <?= $position["units"] ?></td>

							<td> $<?= $position["total"] ?></td>

						</tr>

						 <?php endforeach ?> 


                    </tbody>

                </table>
            
              </div>
              
            </div>

		</div>

	</div>

</div>

  




