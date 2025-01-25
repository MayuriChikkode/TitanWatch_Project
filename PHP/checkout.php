<?php 
session_start();
include_once("header.php");
include('hms/include/config.php');
$grand_total=0;
$allItems="";
$items = array();
$test= array();
$ret=mysqli_query($con,"SELECT CONCAT (proname,'(',quantity,')') As ItemQty, total_price, cart_id from cart");
	
while($row=mysqli_fetch_array($ret))
{ 
$grand_total = $grand_total + $row['total_price'];
$items[] = $row['ItemQty'];
$test[] = $row['cart_id'];
}
$test1 =  implode(',', $test);
$allItems = implode(',', $items);
?>
<form method='post' id="placeOrder">
	<input type='hidden' name='products' value="<?php echo $allItems; ?>">
	<input type='hidden' name='grand_total' value="<?php echo $grand_total; ?>">
	<input type='hidden' name='testid' value="<?php echo $test1; ?>">
	<div class="form-group">
		<input type='text' name='name' class="form-control" placeholder="Enter name" required>
	</div>
	<div class="form-group">
		<input type='email' name='email' class="form-control" placeholder="Enter email" required>
	</div>
	<div class="form-group">
		<input type='tel' name='phone' class="form-control" placeholder="Enter phone" required>
	</div>
	<div class="form-group">
		<textarea name='address' class="form-control" rows="3" cols="10" placeholder="Enter address"></textarea>
	</div>
	<h6 class="text-center lead"> Select Payment Mode</h6>
	<div class="form-group">
		<select name="pmode" class="form-control">
			<option value="">Select payment</option>
			<option value="cod">Cash on Delivery</option>
		</select>
	</div>
	<div class="form-group">
		<input type='submit' name='submit' class="btn btn-danger btn-block" value="Place Order">
	</div>
</form>

 <div id="showOrder"></div>
 
 <script>
  $(document).ready(function(){
  	
	$('#placeOrder').submit(function(e){
		e.preventDefault();
		
		// Client-side validation for email and phone number
		let email = $("input[name='email']").val();
		let phone = $("input[name='phone']").val();
		
		// Email validation regex
		let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
		
		// Phone number validation (10 digits)
		let phonePattern = /^\d{10}$/;
		
		if (!emailPattern.test(email)) {
			alert("Please enter a valid email address.");
			return false;
		}
		
		if (!phonePattern.test(phone)) {
			alert("Please enter a valid 10-digit phone number.");
			return false;
		}

		// If validation passes, proceed with form submission
		$.ajax({
			url:'action.php',
			method:'post',
			data:$('form').serialize()+"&action=order",
			success:function(response){
				$("#showOrder").html(response);
			}
		});
	});
  });
</script>

  
<?php
include_once("footer.php");
 ?>