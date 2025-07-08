<?php
// This is the content for the home page.
// It will be injected into the $contentForLayout variable in layouts/main.php
?>

<div class="jumbotron mt-5"> <?php // In Bootstrap 5, jumbotron class is removed, use bg-light p-5 rounded for similar effect ?>
    <div class="bg-light p-5 rounded">
        <h1 class="display-4">
            <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'صفحه اصلی'; ?>
        </h1>
        <p class="lead">
            <?php echo isset($welcomeMessage) ? htmlspecialchars($welcomeMessage) : 'این یک واحد قهرمان ساده است، یک جزء ساده به سبک جامبوترون برای جلب توجه بیشتر به محتوای ویژه یا اطلاعات.'; ?>
        </p>
        <hr class="my-4">
        <p>این پلتفرم از کلاس‌های کاربردی برای تایپوگرافی و فاصله‌گذاری برای ایجاد فضای مناسب بین محتوا در کانتینر بزرگتر استفاده می‌کند.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">بیشتر بدانید</a> <!-- TODO: Update link -->
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-4">
        <h2>جستجوی پزشکان</h2>
        <p>به راحتی پزشکان را بر اساس تخصص، موقعیت مکانی، بیمه و موارد دیگر جستجو کنید. پروفایل‌های دقیق و نظرات بیماران را مشاهده کنید تا تصمیمات آگاهانه‌ای بگیرید.</p>
        <p><a class="btn btn-secondary" href="#" role="button">جستجوی پزشکان &raquo;</a></p> <!-- TODO: Update link -->
    </div>
    <div class="col-md-4">
        <h2>رزرو نوبت</h2>
        <p>دسترسی بی‌درنگ پزشکان را بررسی کرده و نوبت‌های خود را به صورت آنلاین با تأیید فوری رزرو کنید. یادآوری‌هایی برای ویزیت‌های آینده خود دریافت کنید.</p>
        <p><a class="btn btn-secondary" href="#" role="button">هم‌اکنون رزرو کنید &raquo;</a></p> <!-- TODO: Update link -->
    </div>
    <div class="col-md-4">
        <h2>یکپارچه‌سازی با بیمه</h2>
        <p>پوشش بیمه خود را تأیید کرده و مزایای آن را درک کنید. پلتفرم ما با هدف ساده‌سازی جنبه‌های مالی مراقبت‌های بهداشتی ایجاد شده است.</p>
        <p><a class="btn btn-secondary" href="#" role="button">بیشتر بدانید &raquo;</a></p> <!-- TODO: Update link -->
    </div>
</div>
