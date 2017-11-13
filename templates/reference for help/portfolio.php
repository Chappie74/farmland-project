
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<div class="panel panel-info">
  			<div class="panel-heading text-center" >
    			<h3 class="panel-title">User information</h3>
  			</div>
  			<div class="panel-body">
  				<span>&nbsp&nbsp<img src="../public/img/user.png">&nbsp&nbspHi there user!</span><br><br>
  				<div class="row">
  					<div class="col-sm-0"></div>
    				<div class="col-sm-8"><span><img src="../public/img/cash.png" />&nbsp&nbsp$<?php echo $cash ?></span></div>
    				<div class="col-sm-4">
    					<a href="../public/deposit.php" class="btn btn-success btn-sm">
    						<span class="glyphicon glyphicon-plus"></span>Add more!
    					</a>
    				</div>
    			</div>
  			</div>
		</div>
	</div>
	<div class="col-md-6">
		<table class="table  table-bordered table-responsive text-center" >
		    <thead >
		      <tr class="text-center success">
		        <th class="text-center" >Symbol</th>
		        <th class="text-center">Shares</th>
		        <th class="text-center">Price</th>
		      </tr>
		    </thead>
		    <tbody>		    	    	
		      	<?php foreach($results as $result): ?>      	
		      		<tr>
		        		<td "><?= $result["symbol"] ?></td>
		       			<td><?= $result["shares"] ?></td>
		        		<td>$<?=$result['price'] ?></td>
		        		<td><a href="sell.php?symbol=<?php echo $result["symbol"]?>&shares=<?php echo $result["shares"]?>">Sell</a>
		      		</tr>     	
		        <?php endforeach ?>
		    </tbody>
		 </table>
		 <div >
			<?php if(count($results) == 0): ?>
				<p>You current do not own any shares. Consider <a href="../public/buy.php">buying</a> some.</p>
			<?php endif;?>
		</div>
	 </div>
	 <div class="col-md-1">	 </div>
