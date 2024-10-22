<<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
	
 ?>
<?php 
if(!isset($_GET['catid']) || $_GET['catid']==NULL){
    echo "<script>window.location='404.php'</script>";
}else{
    $id=$_GET['catid'];
}
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
// $brandName = $_POST['brandName'];
// $updateBrand = $brand->update_brand($brandName,$id);

// }
 ?>
 <div class="main">
    <div class="content">
    	<?php 
						$getall_category = $cat->get_cart_product($id);	
						if($getall_category){
							while($result_allcat = $getall_category->fetch_assoc()){
						 
						 ?>
    	<div class="content_top">

    		<div class="heading">
    		<h3><?php echo $result_allcat['catName'] ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    <?php }} ?>
	      <div class="section group">
	      	<?php 
	      		$productbycat = $cat->get_product_cart($id);
	      		if($productbycat){
	      			while($result=$productbycat->fetch_assoc()){
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $result['image']  ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><?php echo $result['product_desc'] ?> </p>
					 <p><span class="price"><?php echo $result['price'].''.'$' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['product_Id']  ?>" class="details">Details</a></span></div>
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

