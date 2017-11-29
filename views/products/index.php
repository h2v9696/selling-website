<?php
if (!empty($products)) {
    ?>
    <div class="container">
    <h1 align="center">All products</h1>
    <hr>
    <?php
    if (isset($_GET['keyword'])) {
    ?>
        <div class="form-group">
            Sort by:

            <select class="form-control" onchange="sort('price', this.value)">
                <option value="ascending">Ascending</option>
                <option value="descending">Descending</option>
            </select>
        </div>

        <script>
            function sort(index,order){

                    $.ajax({
                        type: 'POST',
                        url: 'routes.php?keyword=<?php echo $_GET['keyword']; ?>',
                        data: 'index=' + index + '&order=' + order,
                        beforeSend: function (html) {
                            $('.loading-overlay').show();
                        },
                        success: function (html) {
                            $('.loading-overlay').hide();
                            $('#productData').html(html);
                        }
                    });
            }
        </script>
        <div class="loading-overlay" style="display: none;"><div class="overlay-content">Loading.....</div></div>

    <?php
    }
    ?>
    <div class="table-responsive">
        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product name</th>
                <th>Product detail</th>
                <th>Image</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody id = 'productData'>
            <?php
                foreach ($products as $product) {
                    ?>

                    <tr>
                        <td scope="row"><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['product_detail']; ?></td>
                        <td><img src="<?php echo $product['image']; ?>" height="100" width="100"></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td>
                            <div class="payment-container" align="center">
                                <a href="?controller=carts&action=addToCart&item=<?php echo $product['product_id']; ?>">
                                    <button type="submit" name="addToCart">AddToCart</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
} else
    {
        echo '<h1 align="center">No product found</h1>';
    }
?>
            </tbody>
        </table>
    </div>
</div>


