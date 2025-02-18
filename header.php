<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E.C.Y japan | Tokyo Private Tour</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://use.typekit.net/tkt2ngz.css">
  <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  <link href="<?php echo get_theme_file_uri('css/splide-core.min.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo get_theme_file_uri('css/destyle.css'); ?>">
  <?php /*?>トップページの場合<?php */?>
  <?php if ( is_home() || is_front_page() ) : ?>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('css/style.css'); ?>">
  <?php endif; ?>
  <?php /*?>固定ページの場合<?php */?>
  <?php if ( is_page('contact') ): ?>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('css/contact.css'); ?>">
  <?php endif; ?>

  <title><?php echo bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo-container">
        <a href="./">
          <img class="logo" src="<?php echo get_theme_file_uri('images/logo.png'); ?>" alt="logo">
        </a>
      </div>
    </nav>
  </header>