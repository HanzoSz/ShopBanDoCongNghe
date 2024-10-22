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
 .box_left{
 	width: 50%;
 	border: 1px solid #666;
 	float: left;
 	padding: 10px;
 }
  .box_right{
 	width: 45%;
 	border: 1px solid #666;
 	float: right;
 	padding: 10px;
 }	
	a.a_order{
		background: red;
		padding: 7px 20px;
		color: #fff;
		font-size: 21px;
	}
 </style>
 <form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
	    		<h3>Offline Payment</h3>
	    		</div>
    			
    			<div class="clear"></div>	
    			<div class="box_left">
    			<div class="cartpage">
			    	
			    	<?php 
			    		if(isset($update_quantity_card)){
			    			echo $update_quantity_card;
			    		}
			    	 ?>
			    	 <?php 
			    		if(isset($delcart)){
			    			echo $delcart;
			    		}
			    	 ?>
						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="25%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								
							</tr>
							<?php 
							$subtotal = 0;
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$i=0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							 ?>
							
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].''.'$' ?></td>
								<td>
										<?php echo $result['quantity'] ?>
								</td>
								<td><?php $total = $result['price'] * $result['quantity'];
								echo $total.''.'$';
								 ?></td>
								
							</tr>
							<?php 
							$subtotal += $total;
						}
						}

							 ?>
						</table>
							<?php 
									$check_cart = $ct->check_cart();
									if($check_cart){
								
								
									 ?>
						<table style="float:right;text-align:left;margin: 5px;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php						
										echo $subtotal.''.'$';
										Session::set('sum',$subtotal);
								  ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10% (<?php echo $vat = $subtotal * 0.1.''.'$'?>)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php $vat=$subtotal * 0.1;
												$gtotal = $subtotal + $vat;
												echo $gtotal.''.'$' ?> </td>
							</tr>
					   </table>
					   <?php 
					   	}else{
					   		echo "Ur Cart is Empty";
					   	}
					    ?>
					</div>	
    			</div>
    			<div class="box_right">
    				<table class="tblone">
    			<?php 
    				$id = Session::get('customer_id');
    				$get_customers = $cs->show_customers($id);
    				if($get_customers){
    					while($result = $get_customers->fetch_assoc()){


    			 ?>
    			<tr>
    				<td>Name</td>
    				<td>:</td>
    				<td><?php echo $result['name'] ?></td>
    			</tr>
    			<tr>
    				<td>City</td>
    				<td>:</td>
    				<td><?php echo $result['city'] ?></td>
    			</tr>
    			<tr>
    				<td>Phone</td>
    				<td>:</td>
    				<td><?php echo $result['phone'] ?></td>
    			</tr>
    			<tr>
    				<td>Country</td>
    				<td>:</td>
    				<td><?php echo $result['country'] ?></td>
    			</tr>
    			<tr>
    				<td>Zipcode</td>
    				<td>:</td>
    				<td><?php echo $result['zipcode'] ?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['email'] ?></td>
    			</tr>
    			<tr>
    				<td>Address</td>
    				<td>:</td>
    				<td><?php echo $result['address'] ?></td>
    			</tr>
    			<tr>
    				<td colspan="3"><a href="editprofile.php">Update Profile </a></td>
    			</tr>
    		
    			
    			<?php 
    					}
    				}
    			 ?>
    		</table>
    			</div>

 		</div>

 	</div>
	 <center><a href="?orderid=order" class="a_order">Order Now</a></center><br>
 </div>
 </form>
<?php 
	include 'inc/footer.php';
	
	
 ?>


