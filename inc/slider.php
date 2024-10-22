<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
				$getLastesNvidia = $product->getLastesNvidia();
				if($getLastesNvidia){
					while($resultnvidia=$getLastesNvidia->fetch_assoc()){



				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resultnvidia['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>NVIDIA</h2>
						<p><?php echo $resultnvidia['productName']  ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultnvidia['product_Id'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php 
			   }
			   }
			    ?>
			    <?php 
			    	$getLastesIntel = $product->getLastesIntel();
				if($getLastesIntel){
					while($resultintel=$getLastesIntel->fetch_assoc()){
			     ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resultintel['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Intel</h2>
						  <p><?php echo $resultintel['productName']  ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultintel['product_Id'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				 <?php 
			   }
			   }
			    ?>
			</div>
			<div class="section group">
				<?php 
				$getLastesAsus = $product->getLastesAsus();
				if($getLastesAsus){
					while($resultasus=$getLastesAsus->fetch_assoc()){



				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resultasus['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>ASUS</h2>
						<p><?php echo $resultasus['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultasus['product_Id'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   	 <?php 
			   }
			   }
			    ?>
			    <?php 
				$getLastesKingston = $product->getLastesKingston();
				if($getLastesKingston){
					while($resultkingston=$getLastesKingston->fetch_assoc()){



				 ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resultkingston['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>KingSton</h2>
						  <p><?php echo $resultkingston['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultkingston['product_Id'] ?>">Add to cart</a></span></div>
					</div>
				</div>
					 <?php 
			   }
			   }
			    ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides" >
						<?php 
						$get_slider = $product->show_slider();
						if($get_slider){
							while($result_slider = $get_slider->fetch_assoc()){

							
						 ?>
						
						<li><img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>"/></li>
						<?php 
							}
						}
						 ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	