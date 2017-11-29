<?php
?>
<div class='container'>
    <div class='cart-title'>
        <h1 align="center">Your cart   <img src="https://i.imgur.com/Wu13JTr.jpg" alt="Cart" width="100" height="100"></h1>
    </div>
    <div class='table-responsive'>
        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th> </th>
                <th>Item</th>
                <th>Quanlity</th>
                <th>Total Price</th>
            </tr>
            </thead>
            <tbody id='cartData'>
                <?php
                $totalPayment = 0;

                    for($i = 0; $i < $_SESSION['Cart']['CountItem']; $i++) {
                        if(isset($_SESSION['Cart']['List'][$i])) {
                        ?>
                        <tr>
                            <td><img src="<?php echo $_SESSION['Cart']['List'][$i]['Product_img']; ?>" height="100" width="100"></td>
                            <td><?php echo $_SESSION['Cart']['List'][$i]['Product_name']; ?></td>
                            <td><?php echo $_SESSION['Cart']['List'][$i]['Quanlity']; ?></td>
                            <td>$<?php echo $_SESSION['Cart']['List'][$i]['Product_price'] * $_SESSION['Cart']['List'][$i]['Quanlity'];
                                $totalPayment += $_SESSION['Cart']['List'][$i]['Product_price'] * $_SESSION['Cart']['List'][$i]['Quanlity'] ?></td>
                            <td>
                                <div class="cart-remove-button">
                                    <a href="?controller=carts&action=removeFromCart&item=<?php echo $_SESSION['Cart']['List'][$i]['Product_ID']; ?>">
                                        <button type="submit" name="remove">Remove</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

            </tbody>

        </table>
        <div class="payment-container" align="center">
            <h1> Total Pay : $<?php echo $totalPayment?></h1>
            <?php
                $_SESSION['totalPayment'] = $totalPayment;
                if($totalPayment != 0) {
                    ?>
                    <a href="?controller=payments&action=show_payment">
                        <button type="submit" id="buyButton" onclick="buyButtonClick()">Buy</button>
                    </a>
                    <?php
                }
                else
                {
            ?>
            <button type="submit" id="buyButton">Buy</button>
            <?php } ?>
        </div>
    </div>
</div>
