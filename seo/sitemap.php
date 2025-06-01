<?php
function custom_theme_generate_sitemap() {
    $sitemap = home_url('/sitemap.xml');
    echo '<link rel="sitemap" type="application/xml" title="Sitemap" href="' . $sitemap . '" />';
}
add_action('wp_head', 'custom_theme_generate_sitemap');
?>
