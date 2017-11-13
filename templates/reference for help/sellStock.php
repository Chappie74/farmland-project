<!-- <div class="row">
	<form action="../public/sell.php" method="POST">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<input type="hidden" name="symbol" value="<?= $symbol?>">
			<label>Symbol:<?=$symbol ?></label><br>
			<label>Currently have: <?= $shares ?></label><br>
			<input type="text" autofocus required="required" name="amount" placeholder="Amount to sell"><br>
			<input type="submit" name="submit" value="Sell">
		</div>
		<div class="col-md-3"></div>
		
	</form>
</div> -->

<div class="col-md-4"></div>
<div class="col-md-4">
	<form action="../public/sell.php" method="POST">
		<fieldset>
            <div class="form-group">
            	<input type="hidden" name="symbol" value="<?= $symbol?>">				
            </div>
            <label ><h4>Symbol: <?=$symbol ?></h4></label><br>
            <label><h4>Currently have: <span class="text-success"><?= $shares ?></span> shares in this company.</h4	></label><br>
            <div class="form-group">
                <input class="form-control" type="text" autofocus required="required" name="amount" placeholder="Amount to sell">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-default">Sell</button>
                    </div>
                    <div class="col-md-1"></div>
                </div> 
            </div>
        </fieldset>		
	</form>
</div>
<div class="col-md-4">