<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
 ?>

<?php 
/**
 * 
 */
class cart 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function add_to_cart($quantity,$id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id	= mysqli_real_escape_string($this->db->link, $id);
		$sId=session_id();

		$query = "SELECT * FROM tbl_product Where product_Id = '$id'";
		$result = $this->db->select($query)->fetch_assoc();
		$image = $result["image"];
		$price = $result["price"];
		$productName = $result["productName"];

		// $check_cart= "SELECT * FROM tbl_cart Where product_Id = '$id' And sId ='$sId'";
		// if($check_cart){
		// 	$msg = "Product Already Added";
		// 	return $msg;
		// }else
		{

		$query_insert = "INSERT INTO tbl_cart(product_Id,quantity,sId,productName,price,image) VALUES('$id','$quantity','$sId','$productName','$price','$image')";
			$insert_cart = $this ->db ->insert($query_insert);
			if($result){
				header('location:cart.php');
			}else{
				
				header('location:404.php');
			}
		}
		}
		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT *FROM tbl_cart Where sId ='$sId'";
			$result = $this->db->select($query);
			return $result;

		}
		public function update_quantity_card($quantity,$cartId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$cartId	= mysqli_real_escape_string($this->db->link, $cartId);
		$query = "UPDATE tbl_cart SET
			quantity = '$quantity'
			Where cartId ='$cartId'";

		$result = $this->db->update($query);
		if($result){
			header('location:cart.php');
		}else{
			$msg ="<span class='error'>Product Quantiny Updated Not Successfully</span>";
			return $msg;
		}
		
		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link,$cartid);
			$query="DELETE FROM tbl_cart Where cartId='$cartid'";
			$result=$this->db->delete($query);
			if ($result) {
				header('location:cart.php');
				
		}else{
			$msg ="<span class='error'>Product Quantiny Deleted Not Successfully</span>";
			return $msg;
			}
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart Where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function check_order($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM tbl_order Where customer_id = '$customer_id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function del_all_data_cart(){
			$sId = session_id();
			$query = "DELETE  FROM tbl_cart Where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;

		}

		public function insertOrder($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart Where sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['product_Id'];
					$productName = $result['productName'];
					$quantity= $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id = $customer_id;
			$query_order = "INSERT INTO tbl_order(product_Id,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
			$insert_order = $this ->db ->insert($query_order);
			
				}
			}
		}

		public function getAmountPrice($customer_id){
			$query = "SELECT price FROM tbl_order Where customer_id = '$customer_id'
			";
			$get_price = $this->db->select($query);
			return $get_price;
		}

		public function get_cart_ordered($customer_id){
			$query = "SELECT * FROM tbl_order Where customer_id = '$customer_id'";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}

		public function get_inbox_cart(){
			$query = "SELECT * FROM tbl_order Order by date_order";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}

		public function shifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link, $id);
		$time	= mysqli_real_escape_string($this->db->link, $time);
		$price	= mysqli_real_escape_string($this->db->link, $price);
		$query = "UPDATE tbl_order SET
			status = '1'
			Where id ='$id' AND date_order='$time' AND price = '$price'";

		$result = $this->db->update($query);
		if($result){
			$msg ="<span class='success'>Order Updated  Successfully</span>";
			return $msg;
		}else{
			$msg ="<span class='error'>Order Updated Not Successfully</span>";
			return $msg;
		}
		}

		public function del_shifted($id,$time,$price){
				$id = mysqli_real_escape_string($this->db->link, $id);
		$time	= mysqli_real_escape_string($this->db->link, $time);
		$price	= mysqli_real_escape_string($this->db->link, $price);
		$query = "DELETE FROM tbl_order 
			Where id ='$id' AND date_order='$time' AND price = '$price'";

		$result = $this->db->update($query);
		if($result){
			$msg ="<span class='success'>Order Delete  Successfully</span>";
			return $msg;
		}else{
			$msg ="<span class='error'>Order Delete Not Successfully</span>";
			return $msg;
		}
		}

		public function shifted_confirm($id,$time,$price){
				$id = mysqli_real_escape_string($this->db->link, $id);
		$time	= mysqli_real_escape_string($this->db->link, $time);
		$price	= mysqli_real_escape_string($this->db->link, $price);
		$query = "UPDATE tbl_order SET
			status = '2'
			Where customer_id ='$id' AND date_order='$time' AND price = '$price'";

		$result = $this->db->update($query);
		return $result;
		}

}
?>