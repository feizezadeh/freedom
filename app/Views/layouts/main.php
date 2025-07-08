<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - ' . APP_NAME : APP_NAME; ?></title>

    <!-- Bootstrap CSS -->
    <link href="<?php echo APP_URL; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS (if any) -->
    <!-- <link href="<?php echo APP_URL; ?>css/style.css" rel="stylesheet"> -->

    <!-- TODO: Add any other global head elements, like favicons, custom fonts, etc. -->
</head>
<body>

    <?php
        // Include header partial
        // Ensure VIEWS_PATH is defined in config or this path is adjusted
        $headerPath = VIEWS_PATH . '/partials/header.php';
        if (file_exists($headerPath)) {
            require $headerPath;
        } else {
            echo "<!-- Header partial not found at {$headerPath} -->";
        }
    ?>

    <main class="container mt-4">
        <?php
            // This is where the content from the specific view will be injected
            // The Controller's render method should prepare a variable, e.g., $contentForLayout
            if (isset($contentForLayout)) {
                echo $contentForLayout;
            } else {
                echo "<p>Content placeholder - \$contentForLayout not set.</p>";
            }
        ?>
    </main>

    <?php
        // Include footer partial
        $footerPath = VIEWS_PATH . '/partials/footer.php';
        if (file_exists($footerPath)) {
            require $footerPath;
        } else {
            echo "<!-- Footer partial not found at {$footerPath} -->";
        }
    ?>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="<?php echo APP_URL; ?>js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS (if any) -->
    <!-- <script src="<?php echo APP_URL; ?>js/main.js"></script> -->

    <!-- TODO: Add any other global body end scripts -->
</body>
</html>
