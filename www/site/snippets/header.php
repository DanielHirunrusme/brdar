<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <link rel="stylesheet" href="https://use.typekit.net/xxn0uoo.css">
  <?php echo liveCSS('assets/builds/bundle.css') ?>
</head>
<body>



<header class="site-header" role="banner">
  <?php snippet('icon-accords-logo') ?>
</header>

<aside>
  <p><?= $site->description()->html() ?></p>
</aside>