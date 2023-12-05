<?php

$pageTitle = 'Admin | Orders';

$orders = $data;

include_once 'app/views/admin/partials/header.php';

foreach ($orders as $ord) {
    $total = 0;
?>
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="display-one">Order No. <?php echo $ord->order_id ?> created on <?php echo date('F d, Y \a\t g:i a', strtotime($ord->created_at)) ?></h1>
            <p>Delivery address: <?php echo $ord->delivery_address ?></p>
            <?php
            if ($ord->status == 1) {
                echo '<p>Status: Realized</p>';
            } elseif ($ord->status == 0) {
                echo '<p>Status: Unrealized</p>';
                echo '<p><a href="' . Route::get('AdminOrder/realize', ['order_id' => $ord->order_id]) . '">Realize</a></p>';
            }
            ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                foreach ($ord->orderItems as $product) :
                    echo '<tr>';
                    echo "<td>" . $product->product_id . "</td>";
                    echo "<td>" . ucfirst($product->name) . "</td>";
                    echo "<td>" . $product->size . "</td>";
                    echo "<td>$" . $product->price . "</td>";
                    echo "<td>" . $product->quantity . "</td>";
                    $sum = $product->price * $product->quantity;
                    $sum = number_format($sum, 2, '.', '');
                    $total += $sum;
                    echo "<td>$" . $sum . "</td>";
                    echo '</tr>';
                endforeach;
                ?>
            </table>
            <p>Subtotal: <span class="text-decoration-underline">$<?php echo number_format($total, 2, '.', '') ?></span></p>
        </div>
    </div>
<?php
}
include_once 'app/views/admin/partials/footer.php';
?>
