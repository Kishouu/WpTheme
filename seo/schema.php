<?php
function custom_theme_add_schema_markup() {
    echo '<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Website",
        "name": "' . get_bloginfo('name') . '",
        "url": "' . home_url() . '"
    }
    </script>';
}
add_action('wp_head', 'custom_theme_add_schema_markup');
?>
