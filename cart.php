<?php
include 'aphroditehead.php';

if (!session_id())
{
    session_start();
}
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["cart"])) {
        foreach($_SESSION["cart"] as $key => $value) {
            if($_POST["id"] == $key){
                unset($_SESSION["cart"][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if(empty($_SESSION["cart"]))
                unset($_SESSION["cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
    foreach($_SESSION["cart"] as &$value){
        if($value['id'] === $_POST["id"]){
            $value['count'] = $_POST["count"];
            break; // Stop the loop after we've found the product
        }
    }

}

?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="cart.css">
    <div class="cart">
        <?php
        if(isset($_SESSION["cart"])){
            $total_price = 0;
            ?>
            <table class="table">
                <tbody>
                <tr>
                    <td></td>
                    <td>ITEM NAME</td>
                    <td>QUANTITY</td>
                    <td>UNIT PRICE</td>
                    <td>ITEMS TOTAL</td>
                </tr>
                <?php
                foreach ($_SESSION["cart"] as $product){
                    ?>
                    <tr>
                        <td>
                            <img src='<?php echo "images/". $product['img']; ?>' width="50" height="40" />
                        </td>
                        <td><?php echo $product["name"]; ?><br />
                            <form method='post' action=''>
                                <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                                <input type='hidden' name='action' value="remove" />
                                <button type='submit' class='remove'>Remove Item</button>
                            </form>
                        </td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                                <input type='hidden' name='action' value="change" />
                                <select name='count' class='quantity' onChange="this.form.submit()">
                                    <option <?php if($product["count"]==1) echo "selected";?>
                                        value="1">1</option>
                                    <option <?php if($product["count"]==2) echo "selected";?>
                                        value="2">2</option>
                                    <option <?php if($product["count"]==3) echo "selected";?>
                                        value="3">3</option>
                                    <option <?php if($product["count"]==4) echo "selected";?>
                                        value="4">4</option>
                                    <option <?php if($product["count"]==5) echo "selected";?>
                                        value="5">5</option>
                                </select>
                            </form>
                        </td>
                        <td><?php echo "€".$product["price"]; ?></td>
                        <td><?php echo "€".$product["price"]*$product["count"]; ?></td>
                    </tr>
                    <?php
                    $total_price += ($product["price"]*$product["count"]);
                }
                ?>
                <tr>
                    <td colspan="5" align="right">
                        <strong>TOTAL: <?php echo "€".$total_price; ?></strong>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php
        }else{
            echo "<h3>Your cart is empty!</h3>";
        }
        ?>
    </div>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
        <?php //echo $status; ?>
    </div

    <div class="col-50">
        <h3>Payment</h3>
        <label for="fname">Accepted Cards</label>
        <div class="icon-container">
            <i class="fa fa-cc-visa" style="color:navy;"></i>
            <i class="fa fa-cc-amex" style="color:blue;"></i>
            <i class="fa fa-cc-mastercard" style="color:red;"></i>
            <i class="fa fa-cc-discover" style="color:orange;"></i>
        </div>
        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname" placeholder="John More Doe">
        <label for="ccnum">Credit card number</label>
        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
        <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="expmonth" placeholder="September">
        <div class="row">
            <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
            </div>
            <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
            </div>
        </div>
    </div>

    </div>
    <label>
        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
    </label>
    <input type="submit" value="Continue to checkout" class="btn2">
    </form>
    </div>
    </div>



<?php
include "Aphroditefooter.php";

?>