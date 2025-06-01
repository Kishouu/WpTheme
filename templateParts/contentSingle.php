<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <header class="mb-4">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-meta text-muted">
            <?php my_custom_theme_posted_on(); ?>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-4">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>

    <footer class="entry-footer mt-4">
        <?php my_custom_theme_entry_footer(); ?>
    </footer>
</article>
