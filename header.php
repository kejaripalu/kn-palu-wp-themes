<?php get_header(); ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>
<?php wp_body_open(); ?>

<!-- Top Bar -->
<div class="top-bar">
  <div class="container" style="display:flex;justify-content:space-between;align-items:center;">

    <!-- Ticker running text — FIX: pakai CSS animation murni -->
    <div style="flex:1;overflow:hidden;margin-right:2rem;position:relative;">
      <div style="display:flex;align-items:center;gap:.75rem;">
        <span style="background:#d4a917;color:#fff;font-size:.65rem;font-weight:600;padding:.15rem .5rem;border-radius:3px;white-space:nowrap;flex-shrink:0;">TERKINI</span>
        <div style="overflow:hidden;flex:1;">
          <div id="ticker-track" style="display:flex;white-space:nowrap;animation:tickerRun 30s linear infinite;">
            <?php
            $ticker_posts = new WP_Query(['posts_per_page' => 5, 'post_status' => 'publish']);
            $ticker_html = '';
            if ($ticker_posts->have_posts()) :
              while ($ticker_posts->have_posts()) : $ticker_posts->the_post();
                $ticker_html .= '<a href="' . get_permalink() . '" style="color:rgba(255,255,255,.75);margin-right:3rem;font-size:.75rem;text-decoration:none;transition:color .2s;" onmouseover="this.style.color=\'#e4c53e\'" onmouseout="this.style.color=\'rgba(255,255,255,.75)\'">'
                  . '📢 ' . get_the_title()
                  . '</a>';
              endwhile;
              wp_reset_postdata();
            endif;
            // Duplikat untuk loop seamless
            echo $ticker_html . $ticker_html;
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Kanan: Bahasa & Cari -->
    <div style="display:flex;align-items:center;gap:.75rem;flex-shrink:0;font-size:.75rem;">
      <a href="#" style="color:rgba(255,255,255,.75);" onmouseover="this.style.color='#e4c53e'" onmouseout="this.style.color='rgba(255,255,255,.75)'">ID</a>
      <span style="opacity:.3;color:#fff;">|</span>
      <a href="#" style="color:rgba(255,255,255,.75);" onmouseover="this.style.color='#e4c53e'" onmouseout="this.style.color='rgba(255,255,255,.75)'">EN</a>
      <span style="opacity:.3;color:#fff;">|</span>
      <a href="<?php echo home_url('/?s='); ?>" style="color:rgba(255,255,255,.75);display:flex;align-items:center;gap:.3rem;" onmouseover="this.style.color='#e4c53e'" onmouseout="this.style.color='rgba(255,255,255,.75)'">
        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/></svg>
        Cari
      </a>
    </div>

  </div>
</div>

<!-- Inline CSS ticker — dijamin jalan -->
<style>
@keyframes tickerRun {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
#ticker-track { will-change: transform; }
#ticker-track:hover { animation-play-state: paused; }
</style>

<!-- Navigasi Utama -->
<nav id="main-nav">
  <div class="container">
    <div class="nav-inner">

      <!-- Logo -->
      <a href="<?php echo home_url(); ?>" class="site-logo">
        <?php if (has_custom_logo()) :
          the_custom_logo();
        else : ?>
          <div class="logo-icon"><?php echo mb_substr(get_bloginfo('name'), 0, 1); ?></div>
        <?php endif; ?>
        <div class="logo-text">
          <span class="logo-title"><?php bloginfo('name'); ?></span>
          <span class="logo-sub"><?php echo kejari_get('tagline', get_bloginfo('description')); ?></span>
        </div>
      </a>

      <!-- Menu Desktop -->
      <?php wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class'     => 'nav-menu',
        'container'      => false,
        'walker'         => new Kejari_Walker_Nav_Menu(),
        'fallback_cb'    => function() {
          $pages = [
            '/'        => 'Beranda',
            '/profil'  => 'Profil',
            '/berita'  => 'Berita',
            '/layanan' => 'Layanan',
            '/kontak'  => 'Kontak',
          ];
          echo '<ul class="nav-menu">';
          foreach ($pages as $url => $label) {
            echo '<li><a href="' . home_url($url) . '">' . $label . '</a></li>';
          }
          echo '</ul>';
        }
      ]); ?>

      <!-- CTA -->
      <div class="nav-cta">
        <a href="<?php echo home_url('/layanan'); ?>" class="btn-gold" style="padding:.55rem 1.2rem;font-size:.8rem;">
          Akses Layanan
        </a>
      </div>

      <!-- Tombol Hamburger -->
      <button class="menu-toggle" id="menu-toggle" aria-label="Buka Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div class="mobile-menu" id="mobile-menu">
    <div class="container">
      <?php wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'fallback_cb'    => function() {
          $pages = ['/' => 'Beranda', '/profil' => 'Profil', '/berita' => 'Berita', '/layanan' => 'Layanan', '/kontak' => 'Kontak'];
          echo '<ul>';
          foreach ($pages as $url => $label) {
            echo '<li><a href="' . home_url($url) . '">' . $label . '</a></li>';
          }
          echo '</ul>';
        }
      ]); ?>
      <a href="<?php echo home_url('/layanan'); ?>" class="btn-gold" style="margin:1rem 0;display:inline-flex;">Akses Layanan</a>
    </div>
  </div>
</nav>