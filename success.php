<?php 
	include 'inc/header.php';

	
 ?>
<?php 
if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    $delCart = $ct->del_all_data_cart();
    header('Location:success.php');
}

 ?>
 <style>
 h2.success_order{
text-align: center;
color: green;

 }
p.success_note{
	text-align: center;
	padding: 8px;
	font-size: 17px;
}

 </style>
 <form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    			<h2 class="success_order">Success Order</h2>
    			<?php 
    			$customer_id = Session::get('customer_id');
    			$get_amount=$ct->getAmountPrice($customer_id);
    			if($get_amount){
    				$amount=0;
    				while($result=$get_amount->fetch_assoc()){
    					$price = $result['price'];
    					$amount += $price;
    				}
    				}
    			 ?>
    			<p class="success_note">Total Price You Have Bought From My Website: <?php $vat = $amount * 0.1; 
    					$total = $vat + $amount;
    					echo $total .''.'$';
    			  ?> </p>
    			<p class="success_note">We will contact as soon as possiable. Please see ur order delails here <a href="orderdetails.php">Click here</a></p>

 		</div>

 	</div>
	
 </div>
 </form>
<?php 
	include 'inc/footer.php';
	
	
 ?>


