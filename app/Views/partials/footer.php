<footer class="bg-light text-center text-lg-start mt-auto py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase"><?php echo APP_NAME; ?></h5>
        <p>
          Connecting patients with healthcare providers seamlessly.
          Find doctors, book appointments, and manage your health journey.
        </p>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Navigation</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="<?php echo APP_URL; ?>" class="text-dark">Home</a>
          </li>
          <li>
            <a href="#!" class="text-dark">About Us</a> <!-- TODO: Link to About page -->
          </li>
          <li>
            <a href="#!" class="text-dark">Contact</a> <!-- TODO: Link to Contact page -->
          </li>
          <li>
            <a href="#!" class="text-dark">FAQ</a> <!-- TODO: Link to FAQ page -->
          </li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Legal</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">Privacy Policy</a> <!-- TODO: Link to Privacy Policy -->
          </li>
          <li>
            <a href="#!" class="text-dark">Terms of Service</a> <!-- TODO: Link to Terms page -->
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © <?php echo date("Y"); ?> Copyright:
    <a class="text-dark" href="<?php echo APP_URL; ?>"><?php echo APP_NAME; ?></a>
  </div>
</footer>

<style>
/* Basic sticky footer approach if content is short */
/* body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
main.container {
    flex: 1;
} */
</style>
