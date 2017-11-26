<div id="invoice_header">

	<h3>Sales</h3>

	<input id="filter_box" type="text" class="form-control" onkeyup="filterTable('filter_box','sale_table')" placeholder="Filter By Item,Client,Date">

</div>



<div class="panel panel-default">

	<table class="table" id="sale_table">

		<thead class="thead-inverse">

			<tr>

				<th>#</th>

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
				<th scope="row"> <?= $position["salenumber"] ?></th>

				<td><?= $position["product"] ?></td>

				<td> <?= $position[""] ?> item description</td>

				<td> <?= $position[""] ?> Client Name</td>

				<td> <?= $position["date"] ?> </td>

				<td> <?= $position["units"] ?></td>

				<td> $<?= $position["total"] ?></td>

			</tr>

		 <?php endforeach ?> 

			

		</tbody>

	</table>

   <!-- <div id="list" class="panel-body">

  		

		<div class="col-sm-1">01</div>

		<div class="col-sm-2">Potato</div>

		<div class="col-sm-3">something about this potato they are spoiled and they are used to make food for jukiees across town</div>

		<div class="col-sm-2">Seefan efSieffefeeggwgh</div>

		<div class="col-sm-1">11/20/1017</div>

		<div class="col-sm-1">45</div>

		<div class="col-sm-1">$3245</div>

  

  </div>

   <div id="list" class="panel-body">

  		

		<div class="col-sm-1">01</div>

		<div class="col-sm-2">Potato</div>

		<div class="col-sm-3">something about this potato they are spoiled and they are used to make food for jukiees across town</div>

		<div class="col-sm-2">Sean Singh</div>

		<div class="col-sm-1">11/20/1017</div>

		<div class="col-sm-1">45</div>

		<div class="col-sm-1">$3245</div>

  

  </div>
 -->
</div>









