<?php
include 'dbAphrodite.php';
if (!session_id())
{
    session_start();
}
//$_SESSION["user"]="login";
//var_dump($_SESSION);
//unset($_SESSION["user"]);
$user = (isset($_SESSION["user"])) ? true : false;

$name = '';
if (isset($_SESSION["user"])) {
    $name = $_SESSION["user"]["email"];

}
$cart = "";
if (isset($_SESSION['cart']))
{
    $cart = count($_SESSION['cart']);
}
/*$sql = "CREATE TABLE IF NOT EXISTS `products` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	`desc` text NOT NULL,
	`price` decimal(7,2) NOT NULL,
	`rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
	`quantity` int(11) NOT NULL,
	`img` text NOT NULL,
	`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;";

if ($conn->query($sql) === TRUE) {
    $insert = "INSERT INTO `products` (`name`, `desc`, `price`, `rrp`, `quantity`, `img`) VALUES
('Jaiman Earrings', '', '10.99', '', '10', 'jp3.jpg'),
('Royal Blue', '', '45.99', '', '12', 'bs2.jfif'),
('Björg Jewellery', '', '11.99', '', '15', 'bb4.jfif'),
('Beading Pattern', '', '4.99', '', '14', 'Bdd4.jfif'),
('Dairy', '', '6.99', '', '11', 'bm8.jfif'),
('Blues', '', '16.99', '', '12', 'ee2.jfif'),
('Bron', '', '6.99', '', '8', 'mm.jfif'),
('Colon', '', '26.99', '', '9', 'jw3.jfif'),
('Tealworld', '', '12.99', '', '11', 'tf3.jfif'),
('Whitee', '', '5.99', '', '10', 'tt.jfif'),
('Jammy', '', '99.99', '', '18', 'ww.jfif'),
('Roomy', '', '56.99', '', '11', 'rr1.jfif'),
('Beyonce', '', '50.99', '', '7', 'ff.jfif');";
    //(4, 'Digital Camera', '', '69.99', '0.00', 7, 'camera.jpg', '')
    if ($conn->query($insert) === TRUE) {
        echo 'data inserted';

    }
} else {
    echo "Error creating table: " . $conn->error;
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aphrodite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Aphrodite.css">
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <img src="images/aphroditeHppix.jpeg" class="img-fluid" alt="Responsive image" width="100%" height="300px">

    </div>
</div>
<nav class="navbar navbar-inverse fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Aphrodite</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="aphroditeProduct.php">Products</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="aphroditeAboutUs.php">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                    <?php if ($user) { ?>
                <li><a href="signout.php"><span class="glyphicon glyphicon-user"></span> Signout</a></li>
                    <?php } else { ?>
                <li><a href="loginAphrodite.php"><span class="glyphicon glyphicon-user"></span> Signin</a</li>
                <li><a href="signUpAphrodite.php"><span class="glyphicon glyphicon-user"></span> Signup</a</li>
                <?php
                    } ?>
                <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <?php echo $cart;?></a></li>
            </ul>

        </div>
    </div>
</nav>


<?php ?>
<div class="container">

