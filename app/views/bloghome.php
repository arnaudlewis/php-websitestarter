<!DOCTYPE html>
<!--[if lte IE 9 ]> <html class="ie"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class=""> <!--<![endif]-->
<head>
    <title><?= single_post_title() ?> <?= site_title() ?></title>
    
    <link rel="alternate" type="application/rss+xml" title="<?= site_title() ?>'s Feed" href="/feed" />
    <link rel="stylesheet" href="/node_modules/virtuoso/dist/virtuoso.min.css">
    <!--[if (gt IE 9)|!(IE)]><!--> 
        <link rel="stylesheet" href="/node_modules/virtuoso/dist/virtuoso_ie9.min.css">
    <!--<![endif]-->
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

<body class="bloghome container-fluid">
  <?php get_sidebar() ?>


  <div class="wrapper col-8-sm-pt col-5" <?= blog_home_background_illustration() ? 'style="background-image: url(\''. blog_home_background_illustration() .'\')"' : ''?> >
    <div class="text-wrapper">
        <h1 class="blog-title"><?= blog_home_title() ?></h1>
        <p><?= blog_home_description() ?></p>
    </div>
  </div>

</div>

<div class="container col-8-sm-pt col-7">

<?php rewind_posts(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php render_include('content'); ?>

<?php endwhile; else : ?>

    <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>
<!-- Handle footer -->
<script src="/assets/blog.js"></script>

</div>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script src="/assets/vendor/mailgun-validator.min.js"></script>

<!-- Hamburger menu -->
<script src="/assets/vendor/jquery.panelslider.js"></script>
</body>
</html>
