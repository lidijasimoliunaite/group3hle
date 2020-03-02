<?php include 'dbAphrodite.php' ;
if (!empty($_POST) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw-repeat']))
{
    $email= $_POST['email'];
    $psw= $_POST['psw'];
    $psw_repeat=$_POST['psw-repeat'];
    if($psw === '' || $psw !== $psw_repeat && strlen($psw) <= 6){
       // header("Location: signUpAphrodite.php");
        exit("password");

    }

    //var_dump(filter_var($email, FILTER_VALIDATE_EMAIL), $email);
    //if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL))
    if ($email === "") {

        //header("Location: signUpAphrodite.php");
        exit("email");
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
    header("Location: index.php");
}