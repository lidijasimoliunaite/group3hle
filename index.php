<?php include 'aphroditehead.php';

$sql = "SELECT * FROM products LIMIT 6;";
//$sql="select * FROM aphrodite WHERE email='$email' AND psw='$psw'";
$result = $conn->query($sql);
//var_dump($result);
$data = "";
if($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    //echo "<pre>".print_r($rows, true);
    $count = 0;
    $data = "<div class='row'>";
    foreach ($rows as $row)
    {
        $id = $row['id'];
        $name = $row['name'];
        $img = "images/".$row['img'];
        $price = $row['price'];
        if ($count === 3){
            $data .= "</div><div class='row'>";
            $count = 0;
        }
        $data .= "<div class='col-sm-4'>
                    <div class='card'>
                        <img src='$img' alt='' style='width:100%'>
                        <h3>$name</h3>
                        <p class='price'>€$price</p>
                        <form method='post' action='aphroditeProduct.php'>
                            <input type='hidden' name='id' value='$id'/>
                            <button type='submit'>Add to Cart</button>
                        </form>
                    </div>
                </div>";
        $count = $count + 1;
    }
    $data .="</div>";
}
echo $data;

 include 'aphroditefooter.php' ?>;