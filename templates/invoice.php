

	
<div class="container" id="invoice_container">

    <div class="row">   
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">

              <div class="panel-heading">

                <div class="row">

                  <div class="col col-xs-6">

                    <h3 class="panel-title">Invoices</h3>

                  </div>
                  <div class="col col-xs-6">

                   	<input id="filter_box" type="text" class="form-control" onkeyup="filterTable('filter_box','invoice_table')" placeholder="Filter by Item,Client,Date">


                  </div>


                </div>

              </div>

              <div class="panel-body">

                <table class="table table-striped table-bordered table-list" id="invoice_table">

                  <thead>

                    <tr>
                        

                        <th class="hidden-xs">ID</th>

                        <th>Item</th>

						<th>Description</th>

						<th>Client</th>

						<th>Date</th>

						<th>Unit(s)</th>

						<th>Total</th>

                    </tr> 

                  </thead>

                    <tbody>

              			<?php foreach ($positions as $position): ?>

						<tr>
							
	                
							<td scope="row"> <?= $position["invoicenumber"] ?></td>

							<td><?= $position["product"] ?></td>

							<td> <?= $position[""] ?> item description</td>

							<td> <?= $position[""] ?> Client Name</td>

							<td> <?= $position["date"] ?></td>

							<td> <?= $position["units"] ?></td>

							<td> $<?= $position["total"] ?></td>

						</tr>

						 <?php endforeach ?> 

						<tr>

							<td align="center"><a class="btn btn-danger"><em class="fa fa-trash"></em></a></td>

							<td scope="row">2</td>

							<td>Mangoes</td>

							<td>red mangoes</td>

							<td>Daryl</td>

							<td>2017-11-26</td>

							<td>4</td>

							<td>$23.45</td>

						</tr>

                    </tbody>

                </table>
            
              </div>
              
            </div>

		</div>

	</div>

</div>

  




