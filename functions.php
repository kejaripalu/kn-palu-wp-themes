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

    // ── Section: Identitas Instansi ──────────────────────────────
    $wp_customize->add_section( 'kejari_identitas', [
        'title'       => __( 'Identitas Instansi', 'kejari-palu' ),
        'description' => __( 'Informasi umum instansi yang tampil di header, footer, dan halaman kontak.', 'kejari-palu' ),
        'priority'    => 30,
    ]);

    $identitas_fields = [
        'tagline'   => [ 'label' => 'Tagline / Motto',   'default' => 'Melayani Masyarakat dengan Sepenuh Hati' ],
        'address'   => [ 'label' => 'Alamat Kantor',     'default' => 'Jl. Moh. Yamin No. 97 Palu' ],
        'phone'     => [ 'label' => 'Nomor Telepon',     'default' => '0451-421750' ],
        'email'     => [ 'label' => 'Email',             'default' => 'kejari.plw@gmail.com' ],
        'facebook'  => [ 'label' => 'Facebook URL',      'default' => '' ],
        'twitter'   => [ 'label' => 'Twitter/X URL',     'default' => '' ],
        'instagram' => [ 'label' => 'Instagram URL',     'default' => '' ],
        'youtube'   => [ 'label' => 'YouTube URL',       'default' => '' ],
    ];

    foreach ( $identitas_fields as $key => $field ) {
        $wp_customize->add_setting( 'kejari_' . $key, [
            'default'           => $field['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ]);
        $wp_customize->add_control( 'kejari_' . $key, [
            'label'   => $field['label'],
            'section' => 'kejari_identitas',
            'type'    => 'text',
        ]);
    }

    // ── Section: Pejabat — Kepala ────────────────────────────────
    $wp_customize->add_section( 'kejari_kepala', [
        'title'       => __( '👤 Kepala Kejaksaan', 'kejari-palu' ),
        'description' => __( 'Data Kepala Kejaksaan Negeri Palu yang tampil di homepage.', 'kejari-palu' ),
        'priority'    => 35,
    ]);

    $kepala_fields = [
        'kepala_nama'    => [ 'label' => 'Nama Lengkap (beserta gelar)', 'default' => 'Mohamad Rohmadi, S.H., M.H.' ],
        'kepala_jabatan' => [ 'label' => 'Jabatan Resmi',                'default' => 'Kepala Kejaksaan Negeri Palu' ],
        'kepala_level'   => [ 'label' => 'Label Badge (huruf kapital)',  'default' => 'PIMPINAN TERTINGGI' ],
        'kepala_desc'    => [ 'label' => 'Deskripsi Tugas',              'default' => 'Memimpin, mengendalikan, dan bertanggung jawab atas pelaksanaan tugas, fungsi, dan kewenangan Kejaksaan di wilayah hukum Kejaksaan Negeri Palu.' ],
    ];

    foreach ( $kepala_fields as $key => $field ) {
        $wp_customize->add_setting( 'kejari_' . $key, [
            'default'           => $field['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ]);
        $wp_customize->add_control( 'kejari_' . $key, [
            'label'   => $field['label'],
            'section' => 'kejari_kepala',
            'type'    => ( $key === 'kepala_desc' ) ? 'textarea' : 'text',
        ]);
    }

    // ── Section: Pejabat — Struktural ───────────────────────────
    $pejabat_list = [
        'pembinaan' => [
            'title'   => '👤 Ka. Sub Bag Pembinaan',
            'jabatan' => 'Kepala Sub Bagian Pembinaan',
            'desc'    => 'Pengelola manajemen internal meliputi kepegawaian, keuangan, perlengkapan, operasional perkantoran, dan pelayanan teknis administrasi.',
        ],
        'intelijen' => [
            'title'   => '👤 Ka. Seksi Intelijen',
            'jabatan' => 'Kepala Seksi Intelijen',
            'desc'    => 'Pelaksana intelijen penegakan hukum, cegah dini, serta pengamanan kebijakan Kejaksaan.',
        ],
        'pidum' => [
            'title'   => '👤 Ka. Seksi Pidana Umum',
            'jabatan' => 'Kepala Seksi Pidana Umum',
            'desc'    => 'Melaksanakan pengendalian penuntutan, eksekusi putusan pengadilan, serta administrasi perkara tindak pidana umum.',
        ],
        'pidsus' => [
            'title'   => '👤 Ka. Seksi Pidana Khusus',
            'jabatan' => 'Kepala Seksi Pidana Khusus',
            'desc'    => 'Melaksanakan penanganan perkara tindak pidana khusus meliputi penyelidikan, penyidikan, penuntutan, dan eksekusi.',
        ],
        'datun' => [
            'title'   => '👤 Ka. Seksi Datun',
            'jabatan' => 'Kepala Seksi Perdata dan Tata Usaha Negara',
            'desc'    => 'Melaksanakan bantuan hukum, pertimbangan hukum, tindakan hukum lain, dan pelayanan hukum di bidang perdata dan tata usaha negara.',
        ],
        'bb' => [
            'title'   => '👤 Ka. Seksi Barang Bukti',
            'jabatan' => 'Kepala Seksi Barang Bukti dan Barang Rampasan',
            'desc'    => 'Melaksanakan pengelolaan barang bukti dan barang rampasan negara meliputi penerimaan, penyimpanan, pengamanan, pemeliharaan, dan penyelesaian.',
        ],
    ];

    $priority = 40;
    foreach ( $pejabat_list as $slug => $data ) {
        $wp_customize->add_section( 'kejari_pejabat_' . $slug, [
            'title'       => __( $data['title'], 'kejari-palu' ),
            'description' => __( 'Data pejabat yang tampil di section Struktur Organisasi homepage.', 'kejari-palu' ),
            'priority'    => $priority,
        ]);

        $fields = [
            $slug . '_nama'    => [ 'label' => 'Nama Lengkap',    'default' => 'Nama Pejabat' ],
            $slug . '_jabatan' => [ 'label' => 'Jabatan',         'default' => $data['jabatan'] ],
            $slug . '_desc'    => [ 'label' => 'Deskripsi Tugas', 'default' => $data['desc'] ],
        ];

        foreach ( $fields as $key => $field ) {
            $wp_customize->add_setting( 'kejari_' . $key, [
                'default'           => $field['default'],
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            ]);
            $wp_customize->add_control( 'kejari_' . $key, [
                'label'   => $field['label'],
                'section' => 'kejari_pejabat_' . $slug,
                'type'    => ( strpos( $key, '_desc' ) !== false ) ? 'textarea' : 'text',
            ]);
        }

        $priority += 5;
    }
}
add_action( 'customize_register', 'kejari_customize_register' );

// === HELPER: Ambil nilai dari Customizer ===
// Jika nilai di database kosong atau sama dengan nilai lama yang salah,
// kembalikan $default agar tampilan tetap benar.
function kejari_get( $key, $default = '' ) {
    $val = get_theme_mod( 'kejari_' . $key, '' );
    // Kembalikan default jika kosong
    return ( $val !== '' && $val !== false ) ? $val : $default;
}

// === HELPER: Ambil data pejabat dari Customizer ===
// Default per slug agar tetap tampil walau Customizer belum diisi
function kejari_get_pejabat( $slug ) {
    $defaults = [
        'pembinaan' => [
            'nama'    => 'Nama Pejabat',
            'jabatan' => 'Kepala Sub Bagian Pembinaan',
            'desc'    => 'Pengelola manajemen internal meliputi kepegawaian, keuangan, perlengkapan, operasional perkantoran, dan pelayanan teknis administrasi.',
        ],
        'intelijen' => [
            'nama'    => 'Nama Pejabat',
            'jabatan' => 'Kepala Seksi Intelijen',
            'desc'    => 'Pelaksana intelijen penegakan hukum, cegah dini, serta pengamanan kebijakan Kejaksaan.',
        ],
        'pidum' => [
            'nama'    => 'Nama Pejabat',
            'jabatan' => 'Kepala Seksi Pidana Umum',
            'desc'    => 'Melaksanakan pengendalian penuntutan, eksekusi putusan pengadilan, serta administrasi perkara tindak pidana umum.',
        ],
        'pidsus' => [
            'nama'    => 'Nama Pejabat',
            'jabatan' => 'Kepala Seksi Pidana Khusus',
            'desc'    => 'Melaksanakan penanganan perkara tindak pidana khusus meliputi penyelidikan, penyidikan, penuntutan, dan eksekusi sesuai ketentuan peraturan perundang-undangan.',
        ],
        'datun' => [
            'nama'    => 'Nama Pejabat',
            'jabatan' => 'Kepala Seksi Perdata dan Tata Usaha Negara',
            'desc'    => 'Melaksanakan bantuan hukum, pertimbangan hukum, tindakan hukum lain, dan pelayanan hukum di bidang perdata dan tata usaha negara.',
        ],
        'bb' => [
            'nama'    => 'Nama Pejabat',
            'jabatan' => 'Kepala Seksi Barang Bukti dan Barang Rampasan',
            'desc'    => 'Melaksanakan pengelolaan barang bukti dan barang rampasan negara meliputi penerimaan, penyimpanan, pengamanan, pemeliharaan, dan penyelesaian.',
        ],
    ];

    $d = $defaults[ $slug ] ?? [ 'nama' => 'Nama Pejabat', 'jabatan' => '', 'desc' => '' ];

    return [
        'nama'    => kejari_get( $slug . '_nama',    $d['nama'] ),
        'jabatan' => kejari_get( $slug . '_jabatan', $d['jabatan'] ),
        'desc'    => kejari_get( $slug . '_desc',    $d['desc'] ),
    ];
}

// === HELPER: Ambil data kepala dari Customizer ===
function kejari_get_kepala() {
    return [
        'nama'    => kejari_get( 'kepala_nama',    'Mohamad Rohmadi, S.H., M.H.' ),
        'jabatan' => kejari_get( 'kepala_jabatan', 'Kepala Kejaksaan Negeri Palu' ),
        'level'   => kejari_get( 'kepala_level',   'PIMPINAN TERTINGGI' ),
        'desc'    => kejari_get( 'kepala_desc',    'Memimpin, mengendalikan, dan bertanggung jawab atas pelaksanaan tugas, fungsi, dan kewenangan Kejaksaan di wilayah hukum Kejaksaan Negeri Palu.' ),
    ];
}