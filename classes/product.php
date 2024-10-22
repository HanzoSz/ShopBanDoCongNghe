<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
 ?>

<?php 
/**
 * 
 */
class product 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_product($data,$files){
		
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$brand	= mysqli_real_escape_string($this->db->link, $data['brand']);
		$category	= mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc	= mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price	= mysqli_real_escape_string($this->db->link, $data['price']);
		$type	= mysqli_real_escape_string($this->db->link, $data['type']);
		//kiem tra hinh anh va lay hinh anh
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10). '.' .$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
		if($productName ==""|| $brand ==""|| $category ==""|| $product_desc ==""|| $price ==""|| $type ==""|| $file_name ==""){
			$alert = "<span class='error'>Fiels must be not empty</span>";
			return $alert;
		}else{
			move_uploaded_file($file_temp,$uploaded_image);
			$query = "INSERT INTO tbl_product(productName,catId,brandId,product_desc,price,type,image) VALUES('$productName','$category','$brand','$product_desc','$price','$type','$unique_image')";
			$result = $this ->db ->insert($query);
			if($result){
				$alert ="<span class='success'>Insert Product Successfully</span>";
				return $alert;
			}else{
				$alert ="<span class='error'>Insert Product Not Successfully</span>";
				return $alert;
			}
			
		}
}
	public function insert_slider($data,$files){
		$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
		$type	= mysqli_real_escape_string($this->db->link, $data['type']);
		
		//kiem tra hinh anh va lay hinh anh
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10). '.' .$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
			if($sliderName ==""|| $type ==""){
			$alert = "<span class='error'>Fiels must be not empty</span>";
			return $alert;
		}else{
			if(!empty($file_name)){
				//Neu ng dung chon anh
			if($file_size > 1048567){
				$alert="<span class='error'>Image Size should be less then 20MB!</span>";
				return $alert;
			}
			elseif(in_array($file_ext,$permited)===false){
				// echo "<span class='error'> You can upload only:-"
				// .implode(',', $permited)."</span>";
				$alert="<span class='error'>You can upload only:-"
				.implode(',', $permited)."</span>";
				return $alert;
			}
			move_uploaded_file($file_temp,$uploaded_image);
			$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
			$result = $this ->db ->insert($query);
			if($result){
				$alert ="<span class='success'>Insert Slider Successfully</span>";
				return $alert;
			}else{
				$alert ="<span class='error'>Insert Slider Not Successfully</span>";
				return $alert;
			}
		}
			
		}
	}
	public function show_slider(){
		$query="SELECT * FROM tbl_slider WHERE type='1' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_list(){
		$query="SELECT * FROM tbl_slider order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_product(){
		$query = "SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_brand.brandId=tbl_product.brandId INNER JOIN tbl_category ON tbl_category.catId = tbl_product.catId
			 order by tbl_product.product_Id desc ";
			$result = $this ->db ->select($query);
			return $result;
	}
	public function  getproductbyId($id){
		$query = "SELECT * FROM tbl_product Where product_Id = '$id' ";
			$result = $this ->db ->select($query);
			return $result;
	}

	public function del_slider($id){
		$query = "DELETE FROM tbl_slider WHERE sliderId='$id'";
		$result=$this->db->delete($query);
		return $result;
	}

	public function update_type_slider($id,$type){
		$type = mysqli_real_escape_string($this->db->link, $type);
		$query = "UPDATE tbl_slider SET type ='$type' WHERE sliderId='$id'";
		$result=$this->db->update($query);
		if($result){
			$alert="<span class='success'>Slider Delete Successfully</span>";
			return $alert;
		}else{
			$alert="<span class='error'>Slider Delete NOT Successfully</span>";
			return $alert;
		}
	}

	public function update_product($data,$files,$id){
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$brand	= mysqli_real_escape_string($this->db->link, $data['brand']);
		$category	= mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc	= mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price	= mysqli_real_escape_string($this->db->link, $data['price']);
		$type	= mysqli_real_escape_string($this->db->link, $data['type']);
		//kiem tra hinh anh va lay hinh anh
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10). '.' .$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
			if($productName ==""|| $brand ==""|| $category ==""|| $product_desc ==""|| $price ==""|| $type ==""){
			$alert = "<span class='error'>Fiels must be not empty</span>";
			return $alert;
		}else{
			if(!empty($file_name)){
				//Neu ng dung chon anh
			if($file_size > 1048567){
				$alert="<span class='error'>Image Size should be less then 20MB!</span>";
				return $alert;
			}
			elseif(in_array($file_ext,$permited)===false){
				// echo "<span class='error'> You can upload only:-"
				// .implode(',', $permited)."</span>";
				$alert="<span class='error'>You can upload only:-"
				.implode(',', $permited)."</span>";
				return $alert;
			}
			move_uploaded_file($file_temp,$uploaded_image);
			$query = "UPDATE tbl_product SET 
			productName = '$productName',
			brandId = '$brand',
			catId = '$category',
			type = '$type',
			price = '$price',
			image = '$unique_image',
			product_desc = '$product_desc' 
			Where product_Id ='$id'";
		}else{
			//Neu ng dung ko chon anh
			$query = "UPDATE tbl_product SET
			productName = '$productName',
			brandId = '$brand',
			catId = '$category',
			type = '$type',
			price = '$price',
			
			product_desc = '$product_desc'
			Where product_Id ='$id'";
		}


		
			
			$result = $this ->db ->update($query);
			if($result){
				$alert ="<span class='success'>Update Product Successfully</span>";
				return $alert;
			}else{
				$alert ="<span class='error'>Update Product Not Successfully</span>";
				return $alert;
			}
			
		}
	}
	public function del_product($id){
		$query = "DELETE FROM tbl_product Where Product_Id = '$id' ";
			$result = $this ->db ->delete($query);
			if($result){
			$alert ="<span class='success'>Delete Product Successfully</span>";
				return $alert;
			}else{
				$alert ="<span class='error'>Delete Product Not Successfully</span>";
				return $alert;
			}

			}
			//End backend
	public function getproduct_featherd(){
		$query = "SELECT * FROM tbl_product Where type = '1'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproduct_new(){
		$query = "SELECT * FROM tbl_product order by product_Id desc LIMIT 4 ";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_details($id){
		$query = "SELECT tbl_product.*, tbl_category.catName,tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_brand.brandId=tbl_product.brandId INNER JOIN tbl_category ON tbl_category.catId = tbl_product.catId Where tbl_product.product_Id='$id'";


			$result = $this ->db ->select($query);
			return $result;
	}
	public function getLastesNvidia(){
		$query = "SELECT * FROM tbl_product Where brandId ='6'order by product_Id desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesIntel(){
		$query = "SELECT * FROM tbl_product Where brandId ='9'order by product_Id desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesAsus(){
		$query = "SELECT * FROM tbl_product Where brandId ='7'order by product_Id desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesKingston(){
		$query = "SELECT * FROM tbl_product Where brandId ='11'order by product_Id desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesNvidia4(){
		$query = "SELECT * FROM tbl_product Where brandId ='6'order by product_Id desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesIntel4(){
		$query = "SELECT * FROM tbl_product Where brandId ='9'order by product_Id desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesAsus4(){
		$query = "SELECT * FROM tbl_product Where brandId ='7'order by product_Id desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;		
	}

	public function getLastesKingston4(){
		$query = "SELECT * FROM tbl_product Where brandId ='11'order by product_Id desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;		
	}

}
 ?>