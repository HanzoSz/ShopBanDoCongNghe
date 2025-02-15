<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
 ?>

<?php 
/**
 * 
 */
class customer 
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_customer($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$city = mysqli_real_escape_string($this->db->link, $data['city']);
		$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		if($name ==""|| $city ==""|| $zipcode ==""|| $email ==""|| $address ==""|| $country =="" || $phone =="" || $password ==""){
			$alert = "<span class='error'>Fiels must be not empty</span>";
			return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email ='$email' LIMIT 1";
				$result_check_email = $this->db->select($check_email);
				if ($result_check_email) {
					$alert="<span class='error'>Email Already Existed</span>";
					return  $alert;
				}else{
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$password')";
			$result = $this ->db ->insert($query);
			if($result){
				$alert ="<span class='success'>Insert Customer Successfully</span>";
				return $alert;
			}else{
				$alert ="<span class='error'>Insert Customer Not Successfully</span>";
				return $alert;
			}
				}
			}

	}

	public function login_customer($data){
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		if($email ==""|| $password ==""){
			$alert = "<span class='error'>Pass n Email must be not empty</span>";
			return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email ='$email' AND password = '$password'";
				$result_check_login = $this->db->select($check_login);
				if ($result_check_login !=false){
					$value = $result_check_login->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id']);
					Session::set('customer_name',$value['name']);
					header('location:order.php');
				}else{
					$alert ="<span class='error'>Email n Pass doesnt match</span>";
						return $alert;
				}
			}


		}

	public function show_customers($id){
		$query = "SELECT * FROM tbl_customer WHERE id ='$id' ";
		$result = $this->db->select($query);
		return $result;

	}
	public function update_customers($data,$id){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		
		$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		
		if($name ==""||  $zipcode ==""|| $email ==""||  $address =="" || $phone =="" ){
			$alert = "<span class='error'>Fiels must be not empty</span>";
			return $alert;
			}else{				
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
			$result = $this ->db ->update($query);
			if($result){
				$alert ="<span class='success'>Update Customer Successfully</span>";
				return $alert;
			}else{
				$alert ="<span class='error'>Update Customer Not Successfully</span>";
				return $alert;
			}
				}
			}

	

}
?>