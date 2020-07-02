//we use Jquery and Ajax to process the data to php;
$(function(){
	$("#pform").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:"insert-data.php",
			method:"post",
			data:$(this).serialize(),
			beforeSend:function(){
				$("#submit-btn").attr("disabled", "disabled");
				$("#submit-btn").html("Loading...");
			},
			success:function(data){
				$(".results").html(data);
				$("#pform")[0].reset();
				$("#submit-btn").removeAttr("disabled");
				$("#submit-btn").html("Submit Income");
				fetchData();
			}
		})
	});

	// submitting expenses

	$("#ExpenditureForm").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:"insert-data.php",
			method:"post",
			data:$(this).serialize(),
			beforeSend:function(){
				$("#calculate").attr("disabled", "disabled");
				$("#calculate").html("Loading...");
			},
			success:function(data){
				$(".results").html(data);
				fetchData();
				$("#ExpenditureForm")[0].reset();
				$("#calculate").removeAttr("disabled", "disabled");
				$("#calculate").html("Calculate");
			}
		})
	});

	// delete added expenses 

	$(document).on("click", ".delete_expense", function(event){
		event.preventDefault();
		var expense_id = $(this).attr("id");
		$.ajax({
			url:"delete-expense.php",
			method:"post",
			data:{expense_id:expense_id},
			success:function(data){
				fetchData();
			}
		})
	})
});

function fetchData(){
	var fetchData = "fetchData";
	$.ajax({
		url:"fetch-data.php",
		method:"post",
		data:{fetchData:fetchData},
		success:function(data){
			$(".results").html(data);
		}
	})
}
fetchData();