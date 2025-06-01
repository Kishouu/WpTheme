<?php get_header(); ?>

<main class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('parts/content', get_post_type()); ?>
                <?php endwhile; ?>

                <div class="mt-4">
                    <?php the_posts_navigation(); ?>
                </div>
            <?php else : ?>
                <?php get_template_part('parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
