<?php include 'aphroditehead.php';
   /*<!-- <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img src="jp3.jpg" alt="" style="width:100%">
                <h3>Jaiman Earrings</h3>
                <p class="price">€10.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="bs2.jfif" alt="" style="width:100%">
                <h3>Royal Blue</h3>
                <p class="price">€45.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="card">
                    <img src="bb4.jfif" alt="" style="width:100%">
                    <h3>Björg Jewellery</h3>
                    <p class="price">$11.99</p>
                    <p>
                        <button>Add to Cart</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img src="Bdd4.jfif" alt="" style="width:100%">
                <h3>Beading Pattern</h3>
                <p class="price">€4.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="ff.jfif" alt="" style="width:100%">
                <h3>Beyonce</h3>
                <p class="price">€50.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="card">
                    <img src="ee2.jfif" alt="" style="width:100%">
                    <h3>Ponit earrings</h3>
                    <p class="price">€2.99</p>
                    <p>
                        <button>Add to Cart</button>
                    </p>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img src="zz2.jpg" alt="" style="width:100%">
                <h3>Onstand Necklace</h3>
                <p class="price">€40.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="tf3.jfif" alt="" style="width:100%">
                <h3>Feather Teal</h3>
                <p class="price">€12.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="card">
                    <img src="kk1.jfif" alt="" style="width:100%">
                    <h3>Gorgeous</h3>
                    <p class="price">€25.99</p>
                    <p>
                        <button>Add to Cart</button>
                    </p>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img src="ww.jfif" alt="" style="width:100%">
                <h3>Rolex</h3>
                <p class="price">€219.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="ccm2.jfif" alt="" style="width:100%">
                <h3>Combo</h3>
                <p class="price">€18.99</p>
                <p>
                    <button>Add to Cart</button>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="card">
                    <img src="ro3.jfif" alt="" style="width:100%">
                    <h3>Round Earrings</h3>
                    <p class="price">€5.99</p>
                    <p>
                        <button>Add to Cart</button>
                    </p>
                </div>
            </div>
        </div>
    </div><br>-->*/
if (isset($_POST['id']) && $_POST['id'] !== '')
{
   $id = $_POST['id'];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : array();
   if (isset($cart[$id])){
       $cart[$id]['count'] = $cart[$id]['count'] + 1;
   }else {
       $sql = "SELECT * FROM products WHERE id = '$id';";
       $result = $conn->query($sql);
       if($result->num_rows > 0) {
           $row = $result->fetch_assoc();
           //echo "<pre>".print_r($row, true);
           $row['count'] = 1;
           $cart[$id] = $row;
       }
   }
   $_SESSION['cart'] = $cart;
}
//echo "<pre>".print_r($_SESSION, true);
$sql = "SELECT * FROM products;";
//$sql="select * FROM aphrodite WHERE email='$email' AND psw='$psw'";
$result = $conn->query($sql);
//var_dump($result);
if($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    //echo "<pre>".print_r($rows, true);
    $count = 0;
    $data = "<div class='row'>";
    foreach ($rows as $row)
    {
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
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
                        <form method='post' action=''>
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

include 'aphroditefooter.php'; ?>