<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?php echo APP_URL; ?>"><?php echo defined('APP_NAME_FA') ? APP_NAME_FA : APP_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="تغییر وضعیت ناوبری">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> <!-- ms-auto for RTL should push to left, check if me-auto is needed -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo APP_URL; ?>">صفحه اصلی</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">جستجوی پزشکان</a> <!-- TODO: Link to doctor search page -->
        </li>

        <?php // TODO: Add logic for user authentication to show different links ?>
        <!-- Example: If user is logged in -->
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            حساب کاربری من
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">داشبورد</a></li>
            <li><a class="dropdown-item" href="#">پروفایل</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">خروج</a></li>
          </ul>
        </li>
        -->

        <!-- Example: If user is not logged in -->
        <li class="nav-item">
          <a class="nav-link" href="#">ورود</a> <!-- TODO: Link to login page -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ثبت‌نام</a> <!-- TODO: Link to registration page -->
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- TODO: Add breadcrumbs or other navigation elements if needed below the main navbar -->
