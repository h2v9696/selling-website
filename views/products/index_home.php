<?php
if (!empty($products)) {
    ?>
    <div class="container">
        <h3> Our products</h3>
        <div class="well well-sm text-right"> <strong>Show type: </strong>
            <div class="btn-group">
                <a href="" id="grid" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th"></span>Grid</a>
                <a href="" id="list" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th-list"> </span>List</a>
            </div>
        </div>
        <div id="products" class="row list-group">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="item  col-xs-3 col-lg-3 grid-group-item">

                    <div class="thumbnail"> <img class="group list-group-image" src="<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>" height="300" width="300">
                        <div class="caption">
                            <a href="?controller=products&action=show&id=<?php echo $product['product_id']; ?>"><h4 class="group inner grid-group-item-heading"><?php echo $product['product_name']; ?></h4></a>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">$<?php echo $product['price']; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6"> <a class="btn btn-success" href="?controller=carts&action=addToCart&item=<?php echo $product['product_id']; ?>">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
    </div>
                    <?php

} else
    {
        echo '<h1 align="center">No product found</h1>';
    }
?>
