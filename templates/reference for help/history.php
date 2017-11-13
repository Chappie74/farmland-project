	<div class="col-md-3"></div>
	<div class="col-md-6">
		<table class="table  table-bordered table-responsive text-center" >
		    <thead >
		      <tr class="text-center success">
		        <th class="text-center">Action</th>
		        <th class="text-center">Symbol</th>
		        <th class="text-center">Shares</th>
		        <th class="text-center">Price</th>
		        <th class="text-center">Date/Time</th>
		        <th class="text-center">Total</th>
		      </tr>
		    </thead>
		    <tbody>		    	    	
		      	<?php foreach($rows as $row): ?>      	
		      		<tr>
		        		<td><?= $row["transaction_type"] ?></td>
		        		<td><?= $row["symbol"] ?></td>
		        		<td><?= number_format($row["shares"])?></td>
		        		<td>$<?= number_format($row["price"],2) ?></td>
		        		<td><?= $row["date_time"] ?></td>
		        		<td>$<?= number_format($row["shares"] * $row["price"], 2) ?></td>
		      		</tr>     	
		        <?php endforeach ?>
		    </tbody>
		 </table>

		 <?php if(count($rows) == 0): ?>
			<p>You have not conducted any transaction as yet. Consider <a href="../public/buy.php">buying</a> some shares.</p>
		<?php endif;?>
	 </div>

	 <div class="col-md-3"></div>

	

