<?php
/**
 * Kejari Palu - Functions
 */

// === SETUP TEMA ===
function kejari_setup() {
    load_theme_textdomain( 'kejari-palu', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_image_size( 'berita-thumbnail', 400, 280, true );
    add_image_size( 'berita-featured',  800, 500, true );
    add_image_size( 'berita-hero',      1200, 600, true );

    // Register nav menus
    register_nav_menus([
        'primary'   => __( 'Menu Utama', 'kejari-palu' ),
        'footer'    => __( 'Menu Footer', 'kejari-palu' ),
    ]);
}
add_action( 'after_setup_theme', 'kejari_setup' );

// === ENQUEUE STYLES & SCRIPTS ===
function kejari_scripts() {
    // Google Fonts
    wp_enqueue_style( 'kejari-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Jost:wght@200;300;400;500;600&display=swap',
        [], null
    );
    // Tailwind CDN (untuk utility classes)
    wp_enqueue_script( 'tailwind',
        'https://cdn.tailwindcss.com?plugins=typography',
        [], null, false
    );
    // Theme stylesheet
    wp_enqueue_style( 'kejari-style', get_stylesheet_uri(), ['kejari-fonts'], '1.0.0' );
    // Theme JS
    wp_enqueue_script( 'kejari-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [], '1.0.0', true
    );
    // Pass data ke JS
    wp_localize_script( 'kejari-main', 'kejariData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'kejari_nonce' ),
    ]);
}
add_action( 'wp_enqueue_scripts', 'kejari_scripts' );

// === WIDGET AREAS ===
function kejari_widgets_init() {
    register_sidebar([
        'name'          => __( 'Sidebar Berita', 'kejari-palu' ),
        'id'            => 'sidebar-berita',
        'description'   => __( 'Widget di sidebar halaman berita', 'kejari-palu' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __( 'Footer Kolom 1', 'kejari-palu' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action( 'widgets_init', 'kejari_widgets_init' );

// === EXCERPT ===
function kejari_excerpt_length() { return 25; }
add_filter( 'excerpt_length', 'kejari_excerpt_length' );

function kejari_excerpt_more() { return '...'; }
add_filter( 'excerpt_more', 'kejari_excerpt_more' );

// === CUSTOM WALKER MENU (Dropdown) ===
class Kejari_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="sub-menu">';
    }
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }
}

// === HELPER: Breadcrumb ===
function kejari_breadcrumb() {
    echo '<nav class="breadcrumb">';
    echo '<a href="' . home_url() . '">Beranda</a>';
    echo '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';
    if ( is_category() ) {
        echo '<a href="' . get_permalink( get_option('page_for_posts') ) . '">Berita</a>';
        echo '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';
        echo '<span>' . single_cat_title('', false) . '</span>';
    } elseif ( is_single() ) {
        echo '<a href="' . get_permalink( get_option('page_for_posts') ) . '">Berita</a>';
        echo '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';
        echo '<span>' . get_the_title() . '</span>';
    } elseif ( is_page() ) {
        echo '<span>' . get_the_title() . '</span>';
    } elseif ( is_search() ) {
        echo '<span>Hasil Pencarian</span>';
    }
    echo '</nav>';
}

// === HELPER: Reading Time ===
function kejari_reading_time() {
    $content   = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    return $reading_time;
}

// === HELPER: Kategori pertama ===
function kejari_first_category() {
    $cats = get_the_category();
    if ( $cats ) return esc_html( $cats[0]->name );
    return 'Berita';
}

// === AJAX SEARCH ===
function kejari_ajax_search() {
    check_ajax_referer( 'kejari_nonce', 'nonce' );
    $keyword = sanitize_text_field( $_POST['keyword'] ?? '' );
    if ( empty( $keyword ) ) { wp_die(); }

    $query = new WP_Query([
        's'              => $keyword,
        'posts_per_page' => 10,
        'post_status'    => 'publish',
    ]);

    $results = [];
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $results[] = [
                'title'   => get_the_title(),
                'url'     => get_permalink(),
                'date'    => get_the_date( 'd F Y' ),
                'excerpt' => wp_trim_words( get_the_excerpt(), 20 ),
                'cat'     => kejari_first_category(),
                'thumb'   => get_the_post_thumbnail_url( null, 'thumbnail' ),
            ];
        }
        wp_reset_postdata();
    }
    wp_send_json_success( $results );
}
add_action( 'wp_ajax_kejari_search',        'kejari_ajax_search' );
add_action( 'wp_ajax_nopriv_kejari_search', 'kejari_ajax_search' );

// === CUSTOMIZER ===
function kejari_customize_register( $wp_customize ) {
    // Section: Identitas
    $wp_customize->add_section( 'kejari_identitas', [
        'title'    => __( 'Identitas Instansi', 'kejari-palu' ),
        'priority' => 30,
    ]);
    $fields = [
        'tagline' => [ 'label' => 'Tagline', 'default' => 'Melayani Masyarakat dengan Sepenuh Hati' ],
        'address' => [ 'label' => 'Alamat',  'default' => 'Jl. Moh. Yamin No. 97 Palu' ],
        'phone'   => [ 'label' => 'Telepon', 'default' => '0451-421750' ],
        'email'   => [ 'label' => 'Email',   'default' => 'kejari.plw@gmail.com' ],
        'facebook'  => [ 'label' => 'Facebook URL',  'default' => '' ],
        'twitter'   => [ 'label' => 'Twitter URL',   'default' => '' ],
        'instagram' => [ 'label' => 'Instagram URL', 'default' => '' ],
        'youtube'   => [ 'label' => 'YouTube URL',   'default' => '' ],
    ];
    foreach ( $fields as $key => $field ) {
        $wp_customize->add_setting( 'kejari_' . $key, [ 'default' => $field['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( 'kejari_' . $key, [ 'label' => $field['label'], 'section' => 'kejari_identitas', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'kejari_customize_register' );

// Helper get customizer
function kejari_get( $key, $default = '' ) {
    return get_theme_mod( 'kejari_' . $key, $default );
}
