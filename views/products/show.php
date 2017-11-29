<div class="row">
    <div class="col-sm-11">
        <b><h1 class="product"><?php echo $product['product_name']; ?> </h1><hr></b>
        <div class="row">
            <div class="col-8 col-sm-6">
                <img src="<?php echo $product['image']; ?>" height="400" width="400" class="product">
            </div>
            <div class="col-4 col-sm-6">
                <h3 align="center"><?php echo $product['product_detail']; ?></h3> <hr>
                <h3 align="center">$<?php echo $product['price']; ?></h3>
                <div class="payment-container" align="center">
                    <a href="?controller=carts&action=addToCart&item=<?php echo $product['product_id']; ?>">
                        <button type="submit" name="addToCart">AddToCart</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



