<?php include 'partials/header.php'; ?> <div class="container my-5"> <h2 class="text-center mb-4">Contact Us</h2> <!-- Alert Messages --> <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
php-template
Copy
Edit
<div class="alert alert-success">Thank you! Your message has been sent.</div>
<?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
cpp
Copy
Edit
<div class="alert alert-danger">Oops! Something went wrong. Please try again.</div>
<?php endif; ?> <div class="row g-4"> <!-- Contact Info --> <div class="col-md-5"> <div class="bg-light p-4 rounded shadow-sm"> <h4 class="mb-3">Get in Touch</h4> <p><i class="bi bi-geo-alt-fill text-primary me-2"></i>123 Flavor Street, Mumbai, India</p> <p><i class="bi bi-telephone-fill text-primary me-2"></i>+91 98765 43210</p> <p><i class="bi bi-envelope-fill text-primary me-2"></i>info@deliziarestaurant.com</p> <p><i class="bi bi-clock-fill text-primary me-2"></i>Mon - Sun: 11:00 AM – 11:00 PM</p>
php-template
Copy
Edit
    <h5 class="mt-4">Follow Us</h5>
    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-facebook fs-4 text-secondary"></i></a>
    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-instagram fs-4 text-secondary"></i></a>
    <a href="#" class="text-decoration-none"><i class="bi bi-twitter fs-4 text-secondary"></i></a>
  </div>
</div>

<!-- Contact Form -->
<div class="col-md-7">
  <div class="p-4 bg-white rounded shadow-sm">
    <h4 class="mb-3">Send a Message</h4>
    <form action="process_contact.php" method="POST" class="needs-validation" novalidate>
      <div class="mb-3">
        <label class="form-label">Full Name *</label>
        <input type="text" name="name" class="form-control" required>
        <div class="invalid-feedback">Please enter your name.</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Email Address *</label>
        <input type="email" name="email" class="form-control" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Message *</label>
        <textarea name="message" class="form-control" rows="5" required></textarea>
        <div class="invalid-feedback">Please enter your message.</div>
      </div>
      <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
  </div>
</div>
</div> <!-- Google Map --> <div class="mt-5"> <h4 class="mb-3">Find Us on Map</h4> <div class="ratio ratio-16x9 rounded shadow-sm"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.11609828357!2d72.7410999972014!3d19.082197839875996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63e1f429f47%3A0xf109c8df1e960d26!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1615554119479!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy"> </iframe> </div> </div> </div> <script> (() => { 'use strict' const forms = document.querySelectorAll('.needs-validation') Array.from(forms).forEach(form => { form.addEventListener('submit', event => { if (!form.checkValidity()) { event.preventDefault() event.stopPropagation() } form.classList.add('was-validated') }, false) }) })() </script> <?php include 'partials/footer.php'; ?>
