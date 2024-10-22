<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php 	$fm = new Format(); 
		$pd = new product();
		if(isset($_GET['productlid'])){
    $id=$_GET['productlid'];
    $delpro = $pd->del_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
        	<?php 
        	if(isset($depro)){
        		echo $delpro;
        	}
        	 ?>
        	
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Catategory</th>
					<th>Brand</th>
					<th>Product Image</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					<?php 
					$pd = new product();
				
					$pdlist = $pd ->show_product();
					if($pdlist){
						$i=0;
						while($result = $pdlist->fetch_assoc()){
							$i++;
					 ?>
					
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price'] ?></td>	
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="70"></td>
					<td><?php echo $fm->textShorten($result['product_desc'], 50 ) ?></td>
					<td><?php 
						if($result['type']==0){
							echo 'UnFeathered';
						}else{
							echo 'Feathered';
						}
					 ?></td>
					
					<td><a href="productedit.php?productid=<?php echo $result['product_Id'] ?>">Edit</a> || <a href="?productid=<?php echo $result['product_Id'] ?>">Delete</a></td>
				</tr>
				<?php 
					}
				}
				 ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
