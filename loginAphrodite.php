
<?php include 'aphroditehead.php';
include 'dbAphrodite.php';
$name= "select * FROM aphrodite"; 
//var_dump($conn->query($name));
if (!empty($_POST) && isset($_POST['email']) && isset($_POST['psw'])){
  $email= $_POST['email'];
$psw= $_POST['psw'];

$sql = "SELECT * FROM aphrodite WHERE email='$email' AND psw='$psw'";
//$sql="select * FROM aphrodite WHERE email='$email' AND psw='$psw'";
$result = $conn->query($sql);
//var_dump($result);
if($result->num_rows > 0) {
  $row = $result->fetch_assoc();
    echo "<pre>".print_r($row, true);
    $_SESSION["user"] = $row;
    header("Location: /phpProject/aphroditeHome.php");
    exit();
}
else
{
    echo "ERROR: " .$sql. "<br>" . $conn->error;
}
$conn->close();
}


?>

<link rel="stylesheet" type="text/css" href="loginAphrodite.css">
<div class="container">
  <form action="" method="post">
    <div class="row">
      <h2 style="text-align:center">Login with Social Media or Manually</h2>
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
        <a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
        <a href="#" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>
        </div>

        <input type="text" name="email" placeholder="Username" required>
        <input type="password" name="psw" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">
      </div>
      
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="#" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>
<?php include 'aphroditefooter.php' ?>