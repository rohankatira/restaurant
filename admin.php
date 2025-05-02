<?php 
include 'partials/header.php';
include 'db.php'; // Make sure $conn is defined here

// Handle new menu item submission
if (isset($_POST['add_item'])) {
    $item_name = trim($_POST['item_name']);
    $item_description = trim($_POST['item_description']);
    $item_price = floatval($_POST['item_price']);

    if (!isset($_FILES['item_image']) || $_FILES['item_image']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Please upload a valid image file.');</script>";
    } else {
        $item_image = $_FILES['item_image']['name'];
        $image_tmp = $_FILES['item_image']['tmp_name'];
        $upload_dir = 'uploads/';
        $upload_path = $upload_dir . basename($item_image);

        // Validate file type and size
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = mime_content_type($image_tmp);

        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Invalid image type. Only JPG, PNG, GIF allowed.');</script>";
        } elseif ($_FILES['item_image']['size'] > 2 * 1024 * 1024) { // 2 MB limit
            echo "<script>alert('Image size exceeds 2MB limit.');</script>";
        } else {
            // Move uploaded file
            if (move_uploaded_file($image_tmp, $upload_path)) {
                // Insert into DB
                $stmt = $conn->prepare("INSERT INTO menu (item_name, item_description, item_price, item_image) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssds", $item_name, $item_description, $item_price, $item_image);
                if ($stmt->execute()) {
                    $stmt->close();
                    header("Location: admin.php");
                    exit();
                } else {
                    echo "<script>alert('Failed to add item. Database error.');</script>";
                    $stmt->close();
                }
            } else {
                echo "<script>alert('Failed to upload image.');</script>";
            }
        }
    }
}

// Handle deletion request
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: admin.php");
            exit();
        } else {
            echo "<script>alert('Failed to delete item.');</script>";
            $stmt->close();
        }
    } else {
        echo "<script>alert('Invalid item ID to delete.');</script>";
    }
}

// Fetch menu items
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);
if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Admin Panel - Manage Menu</h2>

    <!-- Add New Item Form -->
    <form action="admin.php" method="POST" enctype="multipart/form-data" class="mb-5">
        <h4>Add New Menu Item</h4>
        <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="item_description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="item_price" class="form-control" step="0.01" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="item_image" accept="image/jpeg, image/png, image/gif" class="form-control" required>
        </div>

        <button type="submit" name="add_item" class="btn btn-success">Add Item</button>
    </form>
</div>

<?php 
include 'partials/footer.php'; 
?>