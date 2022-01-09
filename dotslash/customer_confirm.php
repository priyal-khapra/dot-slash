<?php
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(full_name, username, email, phone_number, address, password, confirm_password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $full_name, $username, $email, $phone_number, $address, $password, $confirm_password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>