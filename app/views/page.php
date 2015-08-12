<?php get_header() ?>

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

<?php get_footer() ?>
