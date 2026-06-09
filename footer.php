<?php
/**
 * Footer Template
 */
?>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <a href="<?php echo home_url(); ?>" class="site-logo" style="display:inline-flex;margin-bottom:1rem;">
          <?php if (has_custom_logo()) : ?>
            <div style="width:40px;height:40px;border-radius:50%;overflow:hidden;"><?php the_custom_logo(); ?></div>
          <?php else : ?>
            <div class="logo-icon" style="width:40px;height:40px;font-size:1rem;"><?php echo mb_substr(get_bloginfo('name'), 0, 1); ?></div>
          <?php endif; ?>
          <div class="logo-text">
            <span class="logo-title" style="color:#fff;"><?php bloginfo('name'); ?></span>
            <span class="logo-sub">Portal Resmi</span>
          </div>
        </a>
        <p><?php bloginfo('description'); ?></p>
        <div class="footer-social">
          <?php if ($fb = kejari_get('facebook')) : ?>
          <a href="<?php echo esc_url($fb); ?>" target="_blank" aria-label="Facebook">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
          <?php endif; ?>
          <?php if ($tw = kejari_get('twitter')) : ?>
          <a href="<?php echo esc_url($tw); ?>" target="_blank" aria-label="Twitter">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <?php endif; ?>
          <?php if ($ig = kejari_get('instagram')) : ?>
          <a href="<?php echo esc_url($ig); ?>" target="_blank" aria-label="Instagram">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
          </a>
          <?php endif; ?>
          <?php if ($yt = kejari_get('youtube')) : ?>
          <a href="<?php echo esc_url($yt); ?>" target="_blank" aria-label="YouTube">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Navigasi -->
      <div>
        <h4 class="footer-title">Navigasi</h4>
        <?php wp_nav_menu([
          'theme_location' => 'footer',
          'menu_class'     => 'footer-links',
          'container'      => false,
          'depth'          => 1,
          'fallback_cb'    => function() {
            echo '<ul class="footer-links">';
            $pages = ['/' => 'Beranda', '/profil' => 'Profil', '/berita' => 'Berita', '/layanan' => 'Layanan', '/kontak' => 'Kontak'];
            foreach ($pages as $url => $label) {
              echo '<li><a href="' . home_url($url) . '">' . $label . '</a></li>';
            }
            echo '</ul>';
          }
        ]); ?>
      </div>

      <!-- Layanan -->
      <div>
        <h4 class="footer-title">Layanan</h4>
        <ul class="footer-links">
          <li><a href="<?php echo home_url('/layanan/perizinan'); ?>">Perizinan Online</a></li>
          <li><a href="<?php echo home_url('/layanan/pengaduan'); ?>">Pengaduan Masyarakat</a></li>
          <li><a href="<?php echo home_url('/layanan/informasi'); ?>">Informasi Publik</a></li>
          <li><a href="<?php echo home_url('/layanan/bantuan'); ?>">Program Bantuan</a></li>
          <li><a href="<?php echo home_url('/ppid'); ?>">PPID</a></li>
          <li><a href="<?php echo home_url('/faq'); ?>">FAQ</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div>
        <h4 class="footer-title">Kontak</h4>
        <ul class="footer-links footer-contact" style="list-style:none;">
          <?php if ($addr = kejari_get('address')) : ?>
          <li>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <?php echo esc_html($addr); ?>
          </li>
          <?php endif; ?>
          <?php if ($phone = kejari_get('phone')) : ?>
          <li>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <a href="tel:<?php echo esc_attr($phone); ?>" style="color:#6888bc;"><?php echo esc_html($phone); ?></a>
          </li>
          <?php endif; ?>
          <?php if ($email = kejari_get('email')) : ?>
          <li>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <a href="mailto:<?php echo esc_attr($email); ?>" style="color:#6888bc;"><?php echo esc_html($email); ?></a>
          </li>
          <?php endif; ?>
        </ul>
      </div>

    </div><!-- .footer-grid -->
  </div><!-- .container -->

  <!-- Bottom Bar -->
  <div class="footer-bottom">
    <div class="container" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:.75rem;">
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Seluruh hak cipta dilindungi undang-undang.</span>
      <div class="footer-bottom-links">
        <a href="<?php echo home_url('/kebijakan-privasi'); ?>">Kebijakan Privasi</a>
        <a href="<?php echo home_url('/disclaimer'); ?>">Disclaimer</a>
        <a href="<?php echo home_url('/sitemap'); ?>">Sitemap</a>
      </div>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
