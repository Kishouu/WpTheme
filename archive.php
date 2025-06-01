<?php get_header(); ?>
<h1><?php the_archive_title(); ?></h1>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('parts/content', get_post_format());
    endwhile;
    the_posts_navigation();
else :
    get_template_part('parts/content', 'none');
endif;
?>
<?php get_footer(); ?>