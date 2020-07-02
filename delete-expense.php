<?php
include ("db.php");
if (isset($_POST['expense_id'])) {
	$expense_id = $_POST['expense_id'];
	$DELETE = mysqli_query($conn, "DELETE FROM expenses WHERE id = '$expense_id' ") or die(mysqli_error($conn));
	$SQL = mysqli_query($conn, "SELECT *, SUM(expense_amount) AS all_expense FROM expenses");
	$row = mysqli_fetch_array($SQL);
	$all_expense = $row['all_expense'];
	$UPDATE = mysqli_query($conn, "UPDATE expenses SET total_expenses = '$all_expense' ");

	// we update the balance in the income table 
	$QUERY = mysqli_query($conn, "SELECT *, SUM(income) AS total_income FROM income");
	$row = mysqli_fetch_assoc($QUERY);
	$total_income = $row['total_income'];
	$balance = $total_income - $all_expense;
	$UPDATE = mysqli_query($conn, "UPDATE income SET income_balance = '$balance'");
}