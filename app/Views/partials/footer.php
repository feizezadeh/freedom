<footer class="bg-light text-center text-lg-start mt-auto py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase"><?php echo defined('APP_NAME_FA') ? APP_NAME_FA : APP_NAME; ?></h5>
        <p>
          ارتباط بی‌وقفه بیماران با ارائه‌دهندگان خدمات درمانی.
          پزشکان را بیابید، نوبت رزرو کنید و مسیر سلامت خود را مدیریت نمایید.
        </p>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">دسترسی سریع</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="<?php echo APP_URL; ?>" class="text-dark">صفحه اصلی</a>
          </li>
          <li>
            <a href="#!" class="text-dark">درباره ما</a> <!-- TODO: Link to About page -->
          </li>
          <li>
            <a href="#!" class="text-dark">تماس با ما</a> <!-- TODO: Link to Contact page -->
          </li>
          <li>
            <a href="#!" class="text-dark">سوالات متداول</a> <!-- TODO: Link to FAQ page -->
          </li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">قوانین و مقررات</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-dark">سیاست حفظ حریم خصوصی</a> <!-- TODO: Link to Privacy Policy -->
          </li>
          <li>
            <a href="#!" class="text-dark">شرایط خدمات</a> <!-- TODO: Link to Terms page -->
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © <?php echo date("Y"); ?> تمامی حقوق محفوظ است:
    <a class="text-dark" href="<?php echo APP_URL; ?>"><?php echo defined('APP_NAME_FA') ? APP_NAME_FA : APP_NAME; ?></a>
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
