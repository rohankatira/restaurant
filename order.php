<?php
session_start();
include 'db.php';
include 'partials/header.php';

// Handle quantity update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_qty'])) {
        $item_id = $_POST['item_id'];
        $new_qty = max(1, intval($_POST['quantity']));
        $_SESSION['cart'][$item_id] = $new_qty;
    }

    if (isset($_POST['remove_item'])) {
        $item_id = $_POST['item_id'];
        unset($_SESSION['cart'][$item_id]);
    }

    header('Location: order.php');
    exit;
}
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Your Order</h2>

    <?php
    if (empty($_SESSION['cart'])) {
        echo "<p class='text-center'>Your cart is empty.</p>";
    } else {
        $total = 0;
    ?>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Dish</th>
                        <th>Description</th>
                        <th>Price (₹)</th>
                        <th>Quantity</th>
                        <th>Subtotal (₹)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $item_id => $quantity) {
                        $query = "SELECT * FROM menu WHERE id = $item_id";
                        $result = mysqli_query($conn, $query);
                        $item = mysqli_fetch_assoc($result);

                        $subtotal = $item['price'] * $quantity;
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><strong><?= $item['name'] ?></strong></td>
                            <td><?= $item['description'] ?></td>
                            <td><?= number_format($item['price'], 2) ?></td>
                            <td>
                                <form method="POST" class="d-flex justify-content-center align-items-center">
                                    <input type="hidden" name="item_id" value="<?= $item_id ?>">
                                    <div class="input-group" style="width: 120px;">
                                        <button type="submit" name="update_qty" value="1" class="btn btn-outline-secondary btn-sm" onclick="this.parentElement.querySelector('input[name=quantity]').stepDown();">-</button>
                                        <input type="number" name="quantity" value="<?= $quantity ?>" min="1" class="form-control text-center form-control-sm">
                                        <button type="submit" name="update_qty" value="1" class="btn btn-outline-secondary btn-sm" onclick="this.parentElement.querySelector('input[name=quantity]').stepUp();">+</button>
                                    </div>
                                </form>
                            </td>
                            <td><?= number_format($subtotal, 2) ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?= $item_id ?>">
                                    <button type="submit" name="remove_item" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr class="table-light fw-bold">
                        <td colspan="4" class="text-end">Total:</td>
                        <td>₹<?= number_format($total, 2) ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>

<footer class="bg-dark text-white pt-1 fixed-bottom">
  <div class="container text-center">
   <h4 class="fw-bold mb-2">Steak <span class="text-warning">In</span> Restaurant</h4>
        <p>123 Flavor Street, Mumbai, India</p>
        <p>Email: info@deliziarestaurant.com | Phone: +91 98765 43210</p>
     <div class="mt-3">
      <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
      <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
    </div>
    <p class="mt-1 mb-0">&copy; <?php echo date('Y'); ?> Steak In. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

