<?php  
	require_once('../../functions.php'); 
	$api = new API;
?>
<h2>Editar Transação</h2>
<form>
	<fieldset>
		<label for="transDescription">Descrição:</label>
		<input type="text" name="description" id="transDescription" value="<?php echo $_GET['description']; ?>" />
	</fieldset>
	<fieldset>
		<label for="transAmount">Valor:</label>
		<input type="text" id="transAmount" name="amount" value="<?php $a =$_GET['amount']; if($a < 0) $a=$a*-1; echo moneyFormat($a); ?>" /> R$
	</fieldset>
	<fieldset>
		<label for="transType">Tipo:</label>
		<select id="transType" name="transType">
			<?php foreach($api->getTransactionTypes() as $type){ ?> 
				<option value="<?php echo $type->id ?>" <?php if(isset($_GET['type'])) if($_GET['type'] == $type->id) echo 'selected="selected"'; ?>><?php echo $type->name ?></option>
			<?php } ?>
		</select>
		<label for="dateSelect">Data:</label>
		<input type="text" id="dateSelect" name="date" class="fullCalendar" value="<?php echo dateFormat($_GET['date']); ?>" />
		<span class="calendarIco"></span>
	</fieldset>
	<fieldset>
		<label for="accountFrom">Conta:</label>
		<select id="accountFrom" name="accountFrom">
			<?php foreach($api->getAccounts() as $acc){ ?> 
				<option value="<?php echo $acc->id ?>" <?php if(isset($_GET['acc'])) if($_GET['acc'] == $acc->id) echo 'selected="selected"'; ?>><?php echo $acc->name ?></option>
			<?php } ?>
		</select>
		<span class="transferTo transfer"></span>
		<select id="accountTo" class="transfer" name="accountTo">
			<?php foreach($api->getAccounts() as $acc){ ?> 
				<option value="<?php echo $acc->id ?>" <?php if(isset($_GET['accto'])) if($_GET['accto'] == $acc->id) echo 'selected="selected"'; ?>><?php echo $acc->name ?></option>
			<?php } ?>
		</select>
	</fieldset>
	<fieldset>
		<label for="selectTags">Marcadores:</label>
		<input type="text" id="selectTags" name="tags" class="suggest tagSuggest" value="<?php echo $_GET['tags']; ?>" />
	</fieldset>
	<input type="hidden" name="transactionId" value="<?php echo $_GET['id'] ?>" />
</form>