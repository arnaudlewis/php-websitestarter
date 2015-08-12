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
    <script src="/assets/js/blog.js"></script>


    <?php include('prismic.php') ?>

    <?php include('skin/page.php') ?>
    <?php include('skin/slices.php') ?>

</head>

<body class="page <?= is_home() ? "home" : "" ?>">

        <?php get_sidebar() ?>

    <div class="main" <?= the_wio_attributes(); ?>>

        <div id="page-content">

            <?php rewind_posts(); ?>
            <?php while (have_posts()) : the_post(); ?>

            <?php the_content() ?>

            <?php include('social.php') ?>

        <?php endwhile; // end of the loop. ?>

        </div>

</div>

<footer class="blog-footer single">

    <?php if (previous_post_link_url()) : ?>

      <a href="<?=previous_post_link_url()?>" class="previous">

        <span class="label">Previous article</span>

        <p class="title"><?=previous_post_link_title()?></p>

      </a>

    <?php endif ?>

    <a class="menu" href="/blog">Home</a>

    <?php if (next_post_link_url()) : ?>

      <a href="<?=next_post_link_url()?>" class="next">

        <span class="label">Next article</span>

        <p class="title"><?=next_post_link_title()?></p>

      </a>

    <?php endif ?>

</footer>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script src="/assets/vendor/mailgun-validator.min.js"></script>

</body>
</html>
