<?php
	$ngo_name = $_POST['ngo_name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
   $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into ngoregistration(ngo_name, username, email, phone_number, password, confirmpassword) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $ngo_name, $username, $email, $phone_number, $password, $confirmpassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>