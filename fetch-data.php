<?php
include ("db.php");
if (isset($_POST['fetchData'])) {
	$QUERYONE = mysqli_query($conn, "SELECT * FROM income ORDER BY id DESC");
	$rows = mysqli_fetch_assoc($QUERYONE);
	$income_balance = $rows['income_balance'];
	$currency = $rows['currency'];
	$income_source = $rows['income_source'];
	$income = $rows['income'];

	if ($income_balance == "") {
		$income_balance = "0:00";
	}else{
		$income_balance = $rows['income_balance'];
	}

	// expenses query
	$QUERY = mysqli_query($conn, "SELECT * FROM expenses");
	$row = mysqli_fetch_array($QUERY);
	$total_expenses = $row['total_expenses'];
	if ($total_expenses == "") {
		$total_expenses = '0.00';
	}else{
		$total_expenses = $row['total_expenses'];
	}
	
	?>

	<div class="income-expense">
		<div class="text-center">
			<ul>
				<li>Income Balance <div class="income"> <?php echo $currency ." ". $income_balance?></div></li>
				<li>Total Expenses <div class="expenses"> <?php echo $currency." ". $total_expenses?></div></li>
			</ul>
		</div>
		<?php

			foreach ($QUERYONE as $key) {
				echo "<div class='income_source'>
						<b>".$key['income_source'].":<b> ".$key['currency'].$key['income']." <span class='pull-right'>".date("F", strtotime($key['income_date']))."</span>  
					</div>";
			}
		?>
	</div>

	<?php
	if(mysqli_num_rows($QUERY) > 0){
		echo '<h4 class="text-center">Expenses</h4>';
		foreach ($QUERY as $row) {?>
			<div class="expenses_div">
				<?php echo ucwords($row['expense_name'])?>:
				<?php echo $currency."".$row['expense_amount']?>
				<a href="" class="delete_expense btn btn-danger btn-xs pull-right" id="<?php echo $row['id']?>">&times;</a>
			</div>
		<?php
		}
	}
}
?>
