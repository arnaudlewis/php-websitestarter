
<div class="blog-post col-12" <?= the_wio_attributes() ?>>

    <h2 class="blog-post-title">
        <a href="<?php the_permalink(); ?>"><?= the_title(); ?></a>
    </h2>

    <p class="blog-post-summary">
        <?= the_post_summary() ?>
    </p>

    <p class="blog-post-meta">
        <?= the_post_metas() ?>
    </p>

</div>

<hr class="blog-post-separator" />
