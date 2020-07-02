<?php
include ("db.php");
if (isset($_POST['income'])) {
	$income = mysqli_real_escape_string($conn, $_POST['income']);
	$currency = mysqli_real_escape_string($conn, $_POST['currency']);
	$income_source = mysqli_real_escape_string($conn, $_POST['income_source']);
	// verification 
	if ($currency == "") {
		echo "Currency field cannot be empty";
		exit();
	}

	if ($income == "") {
		echo "Income field cannot be empty";
		exit();
	}

	if (!preg_match("/^[+0-9.]*$/", $income)) {
        echo "Amount cannot contain anything apart from numbers";
      	exit();
    }

	$SQL = mysqli_query($conn, "INSERT INTO income (`currency`, `income_source`, `income`) VALUES ('$currency', '$income_source', '$income') ") or die(mysqli_error($conn));

	$QUERY = mysqli_query($conn, "SELECT *, SUM(income) AS total_income FROM income");
	$row = mysqli_fetch_assoc($QUERY);
	$total_income = $row['total_income'];

	$QUERY_EXPENSE = mysqli_query($conn, "SELECT * FROM expenses");
	$row_expense = mysqli_fetch_array($QUERY_EXPENSE);
	$total_expenses = $row_expense['total_expenses'];
	// We find the income balance by subsctracting the total-income with total-expenses
	$income_balance = $total_income - $total_expenses;

	$UPDATE = mysqli_query($conn, "UPDATE income SET income_balance = '$income_balance' ");
}


// posting expenses

if (isset($_POST['expense'])) {
	$expense_name = mysqli_real_escape_string($conn, $_POST['expense_name']);
	$expense = mysqli_real_escape_string($conn, $_POST['expense']);
	// verification 
	if ($expense_name == "") {
		echo "Expense name field cannot be empty";
		exit();
	}

	if ($expense == "") {
		echo "Expense Amount field cannot be empty";
		exit();
	}

	if (!preg_match("/^[+0-9.]*$/", $expense)) {
        echo "Amount cannot contain anything apart from numbers";
      	exit();
    }

	$SQL = mysqli_query($conn, "INSERT INTO expenses (`expense_name`, `expense_amount`) VALUES ('$expense_name', '$expense') ") or die(mysqli_error($conn));

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
?>