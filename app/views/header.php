<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= single_post_title() ?> <?= site_title() ?></title>
    <link rel="alternate" type="application/rss+xml" title="<?= site_title() ?>'s Feed" href="/feed" />
    <link rel="stylesheet" href="/assets/reset.css">
    <link rel="stylesheet" href="/assets/common.css">
    <link rel="stylesheet" href="/assets/main.css">
    <link rel="stylesheet" href="/assets/blog.css">
        <link rel="stylesheet" href="/assets/font.css">
    <link rel="stylesheet" href="/assets/social.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="/assets/vendor/jquery-1.11.2.min.js"></script>


    <?php include('prismic.php') ?>

    <?php include('skin/blog.php') ?>

</head>

<body>

    <div id="right-panel">
        <?php get_sidebar() ?>
    </div>

    <div class="main" <?= the_wio_attributes(); ?>>
        <a id="menu-hamburger" href="#right-panel"></a>
