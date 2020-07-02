<!DOCTYPE html>
<html>
<head>
	<title>Personal Finance</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-3.3.7.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
	<!-- JavaScript and dependencies -->
</head>
<body>
	<div class="container">
		<h4 class="h1 text-center">Expense Monitor</h4><hr>
		<div class="row">
			<div class="col-md-12">
				<div class="results"></div>
			</div>
			<div class="col-md-6">
				<h4 class="text-center">Income</h4>
				<div class="income-form">
					<form method="post" id="pform">
						<div class="form-group">
							<label>Income Source</label>
							<input type="text" name="income_source" id="income_source" class="form-input form-control" required placeholder="e.g. Salary, Cash...">
							<input type="hidden" name="currency" id="currency" value="$">
						</div>
						<div class="form-group">
							<label>Income Amount</label>
							<input type="text" name="income" id="income" class="form-input form-control" required placeholder="500.00">
						</div>
						<div class="form-input">
							<button class="btn btn-success" id="submit-btn" type="submit">Submit Income</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<h4 class="text-center"> Expenses </h4>
				<div class="expense-form">
					<form id="ExpenditureForm" method="post">
						<div class="form-group">
							<label>Name of Expense</label>
							<input type="text" name="expense_name" id="expense_name" class="form-control" required placeholder="e.g. Rent, Tuition...">
						</div>
						<div class="form-group exp">
							<label>Expense Amount</label>
							<input type="text" name="expense" id="expense" class="form-input form-control" required placeholder="50.00">
						</div>
						<div class="form-input">
							<button class="btn btn-danger" id="calculate" type="submit">Add Expense</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="create-pdf">
					<p></p>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="js/script.js"></script>
</html>














<!-- 
indiequery.com
build a question and answers for developers
no blocking of answers.
no complicated code.
put a simple code editor. 
 -->