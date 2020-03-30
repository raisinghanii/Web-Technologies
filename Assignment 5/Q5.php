<?php 
$fname = filter_input(INPUT_POST,'fname');
$lname = filter_input(INPUT_POST,'lname');
$age = filter_input(INPUT_POST,'age');
$email = filter_input(INPUT_POST,'email');
$mob = filter_input(INPUT_POST,'mob');
$type = filter_input(INPUT_POST,'type');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "db1";

$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

if($conn->connect_error) {
	die('Connection Failed : '.$conn->connect_error);
}
else
{
	$stmt = $conn->prepare("INSERT INTO data(FName,LName,Age,Email,Mob,Type) VALUES(?,?,?,?,?,?)");

	$stmt->bind_param("ssisis",$fname,$lname,$age,$email,$mob,$type);

	$stmt->execute();
	echo "Registered Succesfull...";
	$stmt->close();
	$conn->close();
}

?>
