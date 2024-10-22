<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
	
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>NVIDIA</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
				$getLastesNvidia = $product->getLastesNvidia4();
				if($getLastesNvidia){
					while($resultnvidia=$getLastesNvidia->fetch_assoc()){



				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $resultnvidia['image'] ?>" alt="" /></a>
					 <h2><?php echo $resultnvidia['productName']  ?> </h2>
					 <p><?php echo $resultnvidia['product_desc']  ?></p>
					 <p><span class="price"><?php echo $resultnvidia['price'].""."$"  ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultnvidia['product_Id'] ?>" class="details">Details</a></span></div>
				</div>
				 <?php 
			   }
			   }
			    ?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Intel</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
			    	$getLastesIntel = $product->getLastesIntel4();
				if($getLastesIntel){
					while($resultintel=$getLastesIntel->fetch_assoc()){
			     ?>		
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $resultintel['image'] ?>" alt="" /></a>
					 <h2><?php echo $resultintel['productName']  ?> </h2>
					 <p><?php echo $resultintel['product_desc']  ?></p>
					 <p><span class="price"><?php echo $resultintel['price'].""."$"  ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultintel['product_Id'] ?>" class="details">Details</a></span></div>
				</div>
				 <?php 
			   }
			   }
			    ?>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>ASUS</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				$getLastesAsus = $product->getLastesAsus4();
				if($getLastesAsus){
					while($resultasus=$getLastesAsus->fetch_assoc()){
				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $resultasus['image'] ?>" alt="" /></a>
					  <h2><?php echo $resultasus['productName']  ?> </h2>
					 <p><?php echo $resultasus['product_desc']  ?></p>
					 <p><span class="price"><?php echo $resultasus['price'].""."$"  ?></span></p>
				    
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultasus['product_Id'] ?>" class="details">Details</a></span></div>
				</div>
			 <?php 
			   }
			   }
			    ?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>KINGSTON</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
				$getLastesKingston = $product->getLastesKingston4();
				if($getLastesKingston){
					while($resultkingston=$getLastesKingston->fetch_assoc()){



				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $resultkingston['image'] ?>" alt="" /></a>
					  <h2><?php echo $resultkingston['productName']  ?> </h2>
					 <p><?php echo $resultkingston['product_desc']  ?></p>
					 <p><span class="price"><?php echo $resultkingston['price'].""."$"  ?></span></p>
				    
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultkingston['product_Id'] ?>" class="details">Details</a></span></div>
				</div>
			 <?php 
			   }
			   }
			    ?>
			</div>
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
	
 ?>

