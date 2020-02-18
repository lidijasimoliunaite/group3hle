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
<?php
include "Aphroditefooter.php";

?>