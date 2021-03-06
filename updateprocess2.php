<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['country']) && isset($_POST['bod']) && isset($_POST['gender']) && isset($_POST['password']) && isset($_POST['department'])&& isset($_POST['dataval'])){

		$username = $user_fun->htmlvalidation($_POST['username']);
		$email = $user_fun->htmlvalidation($_POST['email']);
		$country = $user_fun->htmlvalidation($_POST['country']);
		$bod = $user_fun->htmlvalidation($_POST['bod']);
		$gender = $user_fun->htmlvalidation($_POST['gender']);
		$password = $user_fun->htmlvalidation($_POST['password']);
		$department = $user_fun->htmlvalidation($_POST['department']);
		$update_id = $user_fun->htmlvalidation($_POST['dataval']);

		if((!preg_match('/^[ ]*$/', $username)) && (!preg_match('/^[ ]*$/', $email)) && (!preg_match('/^[ ]*$/', $country)) && (!preg_match('/^[ ]*$/', $gender)) && (!preg_match('/^[ ]*$/', $password))&& (!preg_match('/^[ ]*$/', $department))&& ($bod != NULL)){

			$condition['u_id'] = $update_id;

			$field_val['u_name'] = $username;
			$field_val['u_email'] = $email;
			$field_val['u_gender'] = $gender;
			$field_val['u_country'] = $country;
			$field_val['u_country'] = $country;
			$field_val['u_password'] = $password;
			$field_val['u_department'] = $department;
			$field_val['u_bod'] = $bod;	

			$update = $user_fun->update("user", $field_val, $condition);

			if($update){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Updated";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Updated";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $username)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter Username";

			}
			if(preg_match('/^[ ]*$/', $email)){

				$json['status'] = 104;
				$json['msg'] = "Please Enter Email";

			}
			if(preg_match('/^[ ]*$/', $country)){

				$json['status'] = 105;
				$json['msg'] = "Please Select Country";

			}
			if(preg_match('/^[ ]*$/', $gender)){

				$json['status'] = 106;
				$json['msg'] = "Please Choice Gender";

			}
			if(preg_match('/^[ ]*$/', $password)){

				$json['status'] = 107;
				$json['msg'] = "Please Choice Password";

			}
			if(preg_match('/^[ ]*$/', $department)){

				$json['status'] = 108;
				$json['msg'] = "Please Choice Department";

			}
			if($bod == NULL){

				$json['status'] = 110;
				$json['msg'] = "Please Enter BOD";

			}

		}

	}
	else{

		$json['status'] = 111;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 112;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>