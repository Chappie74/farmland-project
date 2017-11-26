<div id="invoice_header">

	<h3>Invoices</h3>

	<input id="filter_box" type="text" class="form-control" onkeyup="filterTable('filter_box','invoice_table')" placeholder="Filter by Item,Client,Date">

</div>



<div class="panel panel-default">

	<table class="table" id="invoice_table">

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
				<td scope="row"> <?= $position["invoicenumber"] ?></td>

				<td><?= $position["product"] ?></td>

				<td> <?= $position[""] ?> item description</td>

				<td> <?= $position[""] ?> Client Name</td>

				<td> <?= $position["date"] ?> </td>

				<td> <?= $position["units"] ?></td>

				<td> $<?= $position["total"] ?></td>

			</tr>

		 <?php endforeach ?> 

			<tr>
				<td scope="row">2</td>

				<td>Mangoes</td>

				<td> red mangoes</td>

				<td>  Daryl</td>

				<td>  2017-11-26</td>

				<td> 4</td>

				<td> $23.45</td>
			</tr>

		</tbody>

	</table>

  




