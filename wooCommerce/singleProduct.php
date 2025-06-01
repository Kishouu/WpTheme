<?php
defined('ABSPATH') || exit;

get_header(); ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php
            while ( have_posts() ) :
                the_post(); 
            ?>
                <div class="single-product-wrapper shadow-sm p-4 bg-white rounded">
                    <?php wc_get_template_part( 'content', 'single-product' ); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
