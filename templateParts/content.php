<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <header class="mb-3">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
        <div class="entry-meta text-muted">
            <?php my_custom_theme_posted_on(); ?>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-3">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer mt-3">
        <?php my_custom_theme_entry_footer(); ?>
    </footer>
</article>
