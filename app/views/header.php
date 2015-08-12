<!DOCTYPE html>
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class=""> <!--<![endif]-->
<head>
    <title><?= html_doc_title() ?></title>
    
    <link rel="alternate" type="application/rss+xml" title="<?= site_title() ?>'s Feed" href="/feed" />
    <link rel="stylesheet" href="/node_modules/virtuoso/dist/virtuoso.min.css">
        <!--[if lte IE 9]>
        <link rel="stylesheet" href="/node_modules/virtuoso/dist/virtuoso_ie9.min.css"> 
        <![endif]-->
    <link rel="stylesheet" href="/assets/dist/main.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php while (have_posts()) : the_post(); ?>
    <?php include('social-meta.php'); ?>
    <?php endwhile; // end of the loop. ?>
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/virtuoso/dist/virtuoso.min.js"></script>

    <?php include('prismic.php') ?>

    <?php include('skin/page.php') ?>
    <?php include('skin/slices.php') ?>

</head>