<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= esc($page_title) ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <?= $this->renderSection('css') ?>
</head>
<body>
    <?= $this->renderSection('main') ?>
    <?= $this->renderSection('js') ?>
    <?= $this->renderSection('custom_js') ?>
</body>
</html>