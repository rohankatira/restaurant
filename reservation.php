<?php include 'partials/header.php'; ?>

<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "db";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- Hero Banner -->
<section class="text-white text-center py-5 hero-banner" style="background: url('https://via.placeholder.com/1200x500?text=Reserve+Now') no-repeat center center / cover;">
    <div class="container py-5">
        <h1 class="display-4 fw-bold text-dark">Reserve a Table</h1>
        <p class="lead text-black">We’ll make sure your table is ready when you arrive</p>
    </div>
</section>

<!-- Reservation Form -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg p-4 blur-card">
                <h2 class="text-center section-title mb-4">Book Your Spot</h2>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name   = htmlspecialchars($_POST['name']);
                    $email  = htmlspecialchars($_POST['email']);
                    $phone  = htmlspecialchars($_POST['phone']);
                    $date   = htmlspecialchars($_POST['date']);
                    $time   = htmlspecialchars($_POST['time']);
                    $guests = htmlspecialchars($_POST['guests']);

                    // Prepare and execute SQL insert
                    $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, date, time, guests) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssi", $name, $email, $phone, $date, $time, $guests);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success text-center fw-semibold'>✅ Thank you, <strong>$name</strong>! Your reservation for <strong>$guests</strong> guests on <strong>$date</strong> at <strong>$time</strong> has been received.</div>";
                    } else {
                        echo "<div class='alert alert-danger text-center fw-semibold'>❌ Sorry, something went wrong. Please try again later.</div>";
                    }

                    $stmt->close();
                }
                ?>

                <form method="POST" class="row g-4 mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="tel" name="phone" class="form-control" placeholder="+91 9876543210" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Guests</label>
                        <input type="number" name="guests" class="form-control" min="1" max="20" required>
                    </div>

                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary px-5 py-2 fs-5">Reserve Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close(); // Close connection
include 'partials/footer.php';
?>
