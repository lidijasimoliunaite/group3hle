<?php include 'dbAphrodite.php' ;
$email= $_POST['email'];
$psw= $_POST['psw'];
$psw_repeat=$_POST['psw-repeat'];
if($psw === '' || $psw !== $psw_repeat){
    return;
}


$sql="insert into aphrodite (email, psw)
values('$email', '$psw')";
if($conn->query($sql) === TRUE) {
    echo "New record added";
}
else
{
    echo "ERROR: " .$sql. "<br>" . $conn->error;
}
$conn->close();

?>