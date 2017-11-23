<div id="invoice_header">

	<h3>Invoices</h3>

	<input id="filter_box" type="text" class="form-control" onkeyup="filterTable('filter_box','invoice_table')" placeholder="Filter By Item">

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

			<!-- <?php foreach ($positions as $position): ?> -->

			<tr>
				<th scope="row"><!-- <?= $position[""] ?> -->invoice number</th>

				<td><!-- <?= $position[""] ?> -->item name</td>

				<td><!-- <?= $position[""] ?> -->item description</td>

				<td><!-- <?= $position[""] ?> -->Client Name</td>

				<td><!-- <?= $position[""] ?> -->Date</td>

				<td><!-- <?= $position[""] ?> -->units</td>

				<td><!-- <?= $position[""] ?> -->total cost</td>

			</tr>

		<!-- <?php endforeach ?> -->

			<tr>
				
				<th scope="row">1</th>
				
				<td>Carrot</td>

				<td>very nice Carrots </td>

				<td>Random</td>

				<td>12/25/2015</td>

				<td>34</td>

				<td>$671</td>

			</tr>

			<tr>
				<th scope="row">2</th>

				<td>Potatoes</td>

				<td>very nice potatoes </td>

				<td>Random</td>

				<td>12/25/2015</td>

				<td>34</td>

				<td>$235</td>

			</tr>

			<tr>
				<th scope="row">3</th>

				<td>Mangoes</td>

				<td>very nice mangoes </td>

				<td>that guy</td>

				<td>12/25/2015</td>

				<td>67</td>

				<td>$135</td>

			</tr>

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









