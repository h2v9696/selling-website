<?php
    if(!isset($_SESSION['user_name'])) {
        ?>
        <section class="main-container">
            <div class="main-wrapper">
                <h2 align="center">Please write your information</h2>
                <form class="guest-payment-form" action="/final/index.php" method="post">
                    <input type="text" name="first" placeholder="Firstname">
                    <input type="text" name="last" placeholder="Lastname">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="telephone" placeholder="Phone number">
                    <input type="text" name="address" placeholder="Address">
                    <h1> Total Pay : $<?php echo $_SESSION['totalPayment'] ?></h1>
                    <div class="payment-choose">
                        <h3> Delivery Pay <input type="radio" class="radio-button" name="select_payment" value="deliver" checked> </h3>
                        <h3> Pay by card  <input type="radio" class="radio-button" name="select_payment" value="card"></h3>
                    </div>
                    <button type="submit" name="pay">Buy !</button>
                </form>
            </div>
        </section>
        <?php
    }
    else
    {
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2 align="center">Confirm your purcharse</h2>
        <form class="guest-payment-form" action="/final/index.php" method="post">
            <input type="text" name="telephone" placeholder="Phone number">
            <input type="text" name="address" placeholder="Address">
            <h1> Total Pay : $<?php echo $_SESSION['totalPayment']?></h1>
            <div class="payment-choose">
                <h3> Delivery Pay <input type="radio" class="radio-button" name="select_payment" value="deliver" checked> </h3>
                <h3> Pay by card  <input type="radio" class="radio-button" name="select_payment" value="card"></h3>
            </div>
            <button type="submit" name="pay">Buy !</button>
        </form>
    </div>
</section>
<?php
    }
?>