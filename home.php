<?php get_header(); ?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('template-parts/content', get_post_format());
    endwhile;
else :
    get_template_part('template-parts/content', 'none');
endif;

<main class="container py-5">
    <h1><?php bloginfo('name'); ?></h1>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content');
        endwhile;
        the_posts_navigation();
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
</main>
<?php get_footer(); ?>
