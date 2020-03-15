<?php
require("connection.php");


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$conpassword = $_POST['conpassword'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$gender = $_POST['gender'];
$submit = $_POST['submit'];

if($submit == 'submit'){

	if(!empty($firstname) && !empty($lastname) && !empty($email)){
		
		if($password == $conpassword){

			$qry = "INSERT INTO user(first_name,last_name,email,password,phone_no,service,gender) VALUES ('$firstname','$lastname','$email','$password','$phone','$service','$gender')";

			$result = mysqli_query($con,$qry);

			if($result){
				header('location:index.php?success=true');
			}
			else{
				echo "error goes here..";
			}
		}
		else{
			header('location:index.php?password=false');
			//echo "Password not match";
		}

	} //empty validation
	else{
		echo "Not Empty";
	}

}

if($submit == 'update' && isset($_POST['user_id']))
{
	$user_id = $_POST['user_id'];
	
	$qry = "UPDATE user SET first_name = '$firstname',last_name = '$lastname',email='$email',password='$password',phone_no='$phone',service='$service',gender='$gender' WHERE user_id=$user_id";

	$result = mysqli_query($con,$qry);

	if($result){

		header("location:index.php?update=true");
	}
}





 ?>