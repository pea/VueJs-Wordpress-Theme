<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>vue-theme-browserify</title>
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/dist/build.css">
</head>
<body>
    <div id="app"></div>
    <noscript>
        <?php include('views/'.$route['pageType'].'-fallback.php'); ?>
    </noscript>
    <script src="<?= get_template_directory_uri() ?>/dist/build.js"></script>
</body>
</html>