<?php
// This is the content for the home page.
// It will be injected into the $contentForLayout variable in layouts/main.php
?>

<div class="jumbotron mt-5">
    <h1 class="display-4">
        <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Homepage'; ?>
    </h1>
    <p class="lead">
        <?php echo isset($welcomeMessage) ? htmlspecialchars($welcomeMessage) : 'This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.'; ?>
    </p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> <!-- TODO: Update link -->
</div>

<div class="row mt-5">
    <div class="col-md-4">
        <h2>Find Doctors</h2>
        <p>Easily search for doctors by specialty, location, insurance, and more. View detailed profiles and patient reviews to make informed decisions.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Search Doctors &raquo;</a></p> <!-- TODO: Update link -->
    </div>
    <div class="col-md-4">
        <h2>Book Appointments</h2>
        <p>Check real-time availability and book your appointments online with instant confirmation. Get reminders for your upcoming visits.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Book Now &raquo;</a></p> <!-- TODO: Update link -->
    </div>
    <div class="col-md-4">
        <h2>Insurance Integration</h2>
        <p>Verify your insurance coverage and understand your benefits. Our platform aims to simplify the financial aspects of healthcare.</p>
        <p><a class="btn btn-secondary" href="#" role="button">Learn More &raquo;</a></p> <!-- TODO: Update link -->
    </div>
</div>
