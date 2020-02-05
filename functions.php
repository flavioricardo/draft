<?php

// Add TGM Plugin Activation
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

// Add WP Bootstrap Navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Add Theme Customizer Support
require_once get_template_directory() . '/inc/customizer.php';

if ( function_exists( 'add_theme_support' ) )
{
    // Enable Custom Header Support
    add_theme_support( 'custom-header', array('height' => 225, 'width' => 1920) );

    // Enable Custom Logo Support
    add_theme_support( 'custom-logo', array('height' => 180, 'width' => 280) );

    // Enable Custom Background Support
    add_theme_support( 'custom-background' );

    // Enable WordPress management for document title
    add_theme_support( 'title-tag' );

    // Enable Gutenberg Support
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style-editor.css' );

    // Enable Thumbnail Support
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'large', 700, '', true ); // Large Thumbnail
    add_image_size( 'medium', 250, '', true ); // Medium Thumbnail
    add_image_size( 'small', 120, '', true ); // Small Thumbnail
    add_image_size( 'custom-size', 640, '', true ); // Custom Thumbnail Size

    // Enables post and comment RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Enable support for Post Formats
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video'
    ) );

    // Enable Localisation Support
    load_theme_textdomain( 'draft', get_template_directory() . '/languages/' );

    // Switch default core markup for search form, comment form, and comments
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
}

// Create WP Nav Menus
register_nav_menus(
    array(
        'primary' => __( 'Primary Menu', 'draft' ),
        'header' => __( 'Header Links Menu', 'draft' ),
        'sidebar' => __( 'Sidebar Links Menu', 'draft' )
    )
);

if ( ! isset( $content_width ) ) $content_width = 730;

function draft_register_sidebar()
{
    // Define Sidebar 1
    register_sidebar( array(
        'name' => __( 'Sidebar 1', 'draft' ),
        'id' => 'sidebar-1',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ) );

    // Define Sidebar 2
    register_sidebar( array(
        'name' => __( 'Sidebar 2', 'draft' ),
        'id' => 'sidebar-2',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ) );
}

add_action( 'widgets_init', 'draft_register_sidebar' );

function draft_load_scripts()
{
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.min.css', array(), '5.10.0', 'all');
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3', 'all');
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '4.1.3', true);
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '4.1.3', true);
    wp_enqueue_script( 'darkmode', 'https://cdn.jsdelivr.net/npm/darkmode-js@1.5.4/lib/darkmode-js.min.js', array(), '1.5.4', true);

    wp_enqueue_style( 'style', get_bloginfo( 'stylesheet_url' ), array(), '1.0.0', 'all');
}

add_action( 'wp_enqueue_scripts', 'draft_load_scripts' );

function draft_banner()
{
    if ( get_theme_mod( 'set_banner_area' ) )
    {
        $banner = '<a href="' . esc_url( get_theme_mod( 'set_banner_url' ) ) . '"><img class="img-fluid" src="' . esc_url( get_theme_mod( 'set_banner_area' ) ) . '" alt="' . get_theme_mod( 'set_banner_desc' ) . '" /></a>';
        echo '<div class="mb-2">' . $banner . '</div>';
    }
}

add_action( 'draft_banner_area', 'draft_banner' );

function draft_social_media_icons()
{
    echo '<div class="col-lg-3 mt-2 mb-0 text-right share">
            <ul>
                <li class="facebook d-inline-block">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '" target="_blank">
                        <img src="' . get_template_directory_uri() . '/img/Facebook.png" alt="' . __( 'Share on Facebook', 'draft' ) .'" />
                    </a>
                </li>
                <li class="twitter d-inline-block">
                    <a href="http://twitter.com/home?status=' . get_the_title() . '%20' . get_the_permalink() . '" target="_blank">
                        <img src="' . get_template_directory_uri() . '/img/Twitter.png" alt="' . __( 'Share on Twitter', 'draft' ) .'" />
                    </a>
                </li>
                <li class="whatsapp d-inline-block d-lg-none">
                    <a href="whatsapp://send?text=' . get_the_title() . '%20' . get_the_permalink() . '">
                        <img src="' . get_template_directory_uri() . '/img/WhatsApp.png" alt="' . __( 'Share on WhatsApp', 'draft' ) .'" />
                    </a>
                </li>
            </ul>
        </div>';
}

add_action( 'after_article', 'draft_social_media_icons' );

function draft_related_posts($tags = null)
{
    $posts = new WP_Query(array( 'posts_per_page' => 3, 'tag_slug__in' => $tags, 'ignore_sticky_posts' => 1, 'orderby' => 'rand' )); ?>
    <div class="col-lg-12 mt-2 mb-4">
        <h3>Posts <strong>Recomendados</strong></h3>
        <div class="row">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <figure class="figure">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(640, 360), array( 'class' => 'figure-img img-fluid' )); ?></a>
                        <?php endif; ?>
                        <figcaption class="figure-caption"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></figcaption>
                    </figure>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php wp_reset_postdata();
}

add_action( 'after_article', 'draft_related_posts' );

function add_specific_menu_location_atts( $atts, $item, $args ) {
    if ( $args->theme_location == 'header' ) {
        $atts['class'] = 'nav-link p-2';

        if ( $item->post_title == 'Facebook' ) {
            $atts['class'] = 'nav-link p-2 fab fa-facebook';
        } else if ( $item->post_title == 'Instagram' ) {
            $atts['class'] = 'nav-link p-2 fab fa-instagram';
        } else if ( $item->post_title == 'Twitter' ) {
            $atts['class'] = 'nav-link p-2 fab fa-twitter';
        }

    }
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}

add_action('upload_mimes', 'add_file_types_to_uploads');

$post_type = "lancamentos";

function my_rest_prepare_post($data, $post, $request) {
    $_data = $data->data;
    $fields = get_fields($post->ID);
    foreach ($fields as $key => $value){
        $_data[$key] = get_field($key, $post->ID);
    }
    $data->data = $_data;
    return $data;
}

add_filter("rest_prepare_{$post_type}", 'my_rest_prepare_post', 10, 3);