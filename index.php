<?php include 'partials/header.php'; ?>

<!-- Hero Section with Carousel -->
<section id="hero" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style="background: url('./IMAGES/body-image-d112011-All-about-Bin-Sougat-Centre.jpg') no-repeat center center/cover; height: 100vh;">
      <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="display-3 fw-bold text-white">Welcome to Steak In</h1>
        <p class="lead text-white">Experience the finest steaks and exquisite dining ambiance.</p>
        <a href="reservation.php" class="btn btn-lg btn-warning text-dark mt-3">Book a Table</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#hero" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#hero" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</section>

<!-- About Section -->
<section class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="images/restaurant-interior.jpg" class="img-fluid rounded" alt="Restaurant Interior">
      </div>
      <div class="col-md-6">
        <h2 class="mb-4">Our Story</h2>
        <p>At Steak In, we pride ourselves on delivering an unparalleled dining experience. Our chefs craft each dish with passion, ensuring every bite is a delight.</p>
        <a href="about.php" class="btn btn-outline-light mt-3">Learn More</a>
      </div>
    </div>
  </div>
</section>

<!-- Menu Highlights -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="mb-5">Signature Dishes</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
          <img src="images/dish1.jpg" class="card-img-top" alt="Dish 1">
          <div class="card-body">
            <h5 class="card-title">Butter Chicken</h5>
            <p class="card-text"> Tender chicken cooked in a rich, creamy tomato-based gravy with butter and aromatic spices.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
          <img src="images/dish2.jpg" class="card-img-top" alt="Dish 2">
          <div class="card-body">
            <h5 class="card-title">Paneer Butter Masala</h5>
            <p class="card-text">Cubes of paneer simmered in a velvety butter-tomato curry with Indian spices.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
          <img src="images/dish3.jpg" class="card-img-top" alt="Dish 3">
          <div class="card-body">
            <h5 class="card-title">Hyderabadi Biryani</h5>
            <p class="card-text">Fresh Atlantic salmon seared and served with lemon butter sauce.</p>
          </div>
        </div>
      </div>
    </div>
    <a href="menu.php" class="btn btn-warning text-dark mt-4">View Full Menu</a>
  </div>
</section>

<!-- Reservation Call to Action -->
<section class="py-5 bg-warning text-dark text-center">
  <div class="container">
    <h2 class="mb-3">Ready to Dine with Us?</h2>
    <p class="mb-4">Reserve your table now and enjoy an unforgettable culinary journey.</p>
    <a href="reservation.php" class="btn btn-dark btn-lg">Make a Reservation</a>
  </div>
</section>

<?php include 'partials/footer.php'; ?>
