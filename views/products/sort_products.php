<?php
    //Change products html sorted
    use Product\Product;

    $index = $_POST['index'];
    $order = $_POST['order'];
    $keyword = $_GET['keyword'];

    if (!empty($keyword))
    {
        $products = Product::getProductBy($keyword);
        if ($index == 'price') {
            $products = Product::sortProducts($products, new \Sort\MultiNumberSort($index, $order));
        } else $products = Product::sortProducts($products, new \Sort\MultiAlphaSort($index, $order));

        if (count($products) != 0) {
            foreach ($products as $product) {
                echo '<tr>';
                echo '<td scope="row">'.$product['product_id'].'</td>';
                echo '<td>'.$product['product_name'].'</td>';
                echo '<td>'.$product['product_detail'].'</td>';
                echo '<td><img src="'.$product['image'].'" height="100" width="100"></td>';
                echo '<td>$'.$product['price'].'</td>';
                echo '<td>';
                echo '<div class="payment-container" align="center">';
                echo '<a href="?controller=carts&action=addToCart&item='.$product['product_id'].'">';
                            echo '<button type="submit" name="addToCart">AddToCart</button></a></div>';
                echo '</td>';
                echo '</tr>';
            }
        } else
        {
            echo '<h1 align="center">No product found</h1>';
        }
    } else
    {
    echo '<h1 align="center">No input</h1>';
    }
