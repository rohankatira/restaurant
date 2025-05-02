<?php
session_start();
include 'db.php';
include 'partials/header.php';

// Handle Add to Cart action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$item_id])) {
        $_SESSION['cart'][$item_id] += $quantity;
    } else {
        $_SESSION['cart'][$item_id] = $quantity;
    }

    header('Location: order.php');
    exit;
}
?>

<div class="container my-5">
    <h2 class="text-center mb-5">Our Menu</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $query = "SELECT * FROM menu";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text text-muted"><?php echo $row['description']; ?></p>
                        <p class="text-success fw-bold">₹<?php echo $row['price']; ?></p>

                        <form method="post" class="mt-auto d-flex align-items-center justify-content-between">
                            <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                            <div class="input-group" style="width: 120px;">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decreaseQty(this)">-</button>
                                <input type="number" name="quantity" value="1" min="1" class="form-control form-control-sm text-center qty-input">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increaseQty(this)">+</button>
                            </div>
                            <button type="submit" name="add_to_cart" class="btn btn-primary btn-sm ms-2">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function increaseQty(button) {
        const input = button.parentElement.querySelector(".qty-input");
        input.value = parseInt(input.value) + 1;
    }

    function decreaseQty(button) {
        const input = button.parentElement.querySelector(".qty-input");
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

<?php include 'partials/footer.php'; ?>
