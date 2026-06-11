<?php
/**
 * Homepage Template — Kejari Palu
 */
get_header(); ?>

<!-- ═══ HERO ═══ -->
<section class="hero">
  <div class="container">
    <div class="hero-inner">
      <div class="fade-in">
        <div class="hero-badge">
          <span></span> Portal Resmi Kejaksaan Negeri Palu
        </div>
        <h1>Melayani dengan <em>Sepenuh Hati</em></h1>
        <p class="hero-desc"><?php echo esc_html(kejari_get('tagline', 'Kami berkomitmen memberikan pelayanan publik yang transparan, akuntabel, dan berorientasi kepada masyarakat Indonesia.')); ?></p>
        <div class="hero-actions">
          <a href="<?php echo home_url('/layanan'); ?>" class="btn-gold">Akses Layanan Publik</a>
          <a href="<?php echo home_url('/profil'); ?>" class="btn-glass">Tentang Kami</a>
        </div>
        <div class="hero-stats">
          <div><div class="hero-stat-num">7</div><div class="hero-stat-label">Seksi / Bidang</div></div>
          <div><div class="hero-stat-num">34+</div><div class="hero-stat-label">Jaksa Aktif</div></div>
          <div><div class="hero-stat-num">Palu</div><div class="hero-stat-label">Wilayah Hukum</div></div>
        </div>
      </div>
      <!-- Hero Card Berita -->
      <div class="hero-card">
        <div class="hero-card-inner">
          <div class="hero-card-title">📢 Berita Terkini</div>
          <?php
          $hero_posts = new WP_Query(['posts_per_page' => 3, 'post_status' => 'publish']);
          while ($hero_posts->have_posts()) : $hero_posts->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="hero-card-item">
            <div class="hero-card-date"><?php echo get_the_date('d F Y'); ?></div>
            <div class="hero-card-text"><?php the_title(); ?></div>
          </a>
          <?php endwhile; wp_reset_postdata(); ?>
          <a href="<?php echo home_url('/berita'); ?>" class="hero-card-more">
            Lihat semua berita
            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ LAYANAN ═══ -->
<section class="layanan-section">
  <div class="container">
    <div style="text-align:center;margin-bottom:3.5rem;">
      <p class="section-label">Apa yang Kami Tawarkan</p>
      <h2 class="section-title gold-line-center">Layanan Publik Unggulan</h2>
      <p class="section-desc" style="margin:1.5rem auto 0;">Berbagai layanan yang dapat diakses dengan mudah, cepat, dan transparan.</p>
    </div>
    <div class="layanan-grid">
      <a href="<?php echo home_url('/layanan/skbmh'); ?>" class="layanan-card">
        <div class="layanan-icon" style="background:#fdfbf3;color:#b8890f;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <h3>SKBMH</h3>
        <p>Surat Keterangan Bebas Masalah Hukum untuk keperluan administrasi.</p>
      </a>
      <a href="<?php echo home_url('/layanan/pengaduan'); ?>" class="layanan-card">
        <div class="layanan-icon" style="background:#f0f3f9;color:#364f88;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        </div>
        <h3>Pengaduan Masyarakat</h3>
        <p>Sampaikan laporan dugaan tindak pidana atau keluhan layanan.</p>
      </a>
      <a href="<?php echo home_url('/layanan/penyuluhan'); ?>" class="layanan-card">
        <div class="layanan-icon" style="background:#f0fdf4;color:#16a34a;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <h3>Penyuluhan Hukum</h3>
        <p>Program penyuluhan hukum gratis kepada masyarakat dan instansi.</p>
      </a>
      <a href="<?php echo home_url('/ppid'); ?>" class="layanan-card">
        <div class="layanan-icon" style="background:#faf5ff;color:#7c3aed;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3>Informasi Publik (PPID)</h3>
        <p>Akses dokumen dan informasi publik sesuai UU Keterbukaan Informasi.</p>
      </a>
    </div>
  </div>
</section>

<!-- ═══ BERITA ═══ -->
<section class="berita-section">
  <div class="container">
    <div class="berita-header">
      <div>
        <p class="section-label">Informasi Terbaru</p>
        <h2 class="section-title gold-line">Berita & Pengumuman</h2>
      </div>
      <a href="<?php echo home_url('/berita'); ?>" class="btn-outline">Semua Berita →</a>
    </div>
    <div class="berita-grid">
      <!-- Featured -->
      <?php
      $featured = new WP_Query(['posts_per_page' => 1, 'post_status' => 'publish']);
      if ($featured->have_posts()) : $featured->the_post(); ?>
      <div class="berita-featured card-hover">
        <div class="berita-featured-img">
          <?php if (has_post_thumbnail()) : the_post_thumbnail('berita-featured', ['style' => 'width:100%;height:100%;object-fit:cover;']); endif; ?>
          <span class="berita-featured-badge">Utama</span>
        </div>
        <div class="berita-featured-body">
          <div class="berita-featured-meta"><?php echo get_the_date('d F Y'); ?> · <?php echo kejari_first_category(); ?></div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
          <a href="<?php the_permalink(); ?>" class="read-more">Baca Selengkapnya →</a>
        </div>
      </div>
      <?php endif; wp_reset_postdata(); ?>

      <!-- Daftar -->
      <div class="berita-list">
        <?php
        $list = new WP_Query(['posts_per_page' => 4, 'offset' => 1, 'post_status' => 'publish']);
        while ($list->have_posts()) : $list->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="berita-item">
          <div class="berita-item-img">
            <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail', ['style' => 'width:100%;height:100%;object-fit:cover;']);
            else : ?>
              <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z"/></svg>
            <?php endif; ?>
          </div>
          <div>
            <div class="berita-item-meta"><?php echo get_the_date('d F Y'); ?> · <?php echo kejari_first_category(); ?></div>
            <h4><?php the_title(); ?></h4>
            <p><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
          </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══ STRUKTUR ORGANISASI ═══ -->
<section style="padding:6rem 0;background:#fff;">
  <div class="container">
    <div style="text-align:center;margin-bottom:1rem;">
      <p class="section-label">Kepemimpinan</p>
      <h2 class="section-title gold-line-center">Struktur Organisasi</h2>
    </div>

    <?php
    // ── Data pejabat diambil dari WordPress Customizer ──
    // Ubah via: Tampilan → Sesuaikan → 👤 Kepala Kejaksaan / 👤 Ka. Seksi ...
    $imgBase = get_template_directory_uri() . '/assets/images/';
    $kepala  = array_merge( kejari_get_kepala(), [ 'foto' => $imgBase . 'kepala.png' ] );

    $pejabat = [
      array_merge( kejari_get_pejabat('pembinaan'), [ 'foto' => $imgBase . 'pembinaan.png' ] ),
      array_merge( kejari_get_pejabat('intelijen'), [ 'foto' => $imgBase . 'intelijen.png' ] ),
      array_merge( kejari_get_pejabat('pidum'),     [ 'foto' => $imgBase . 'pidum.png'     ] ),
      array_merge( kejari_get_pejabat('pidsus'),    [ 'foto' => $imgBase . 'pidsus.png'    ] ),
      array_merge( kejari_get_pejabat('datun'),     [ 'foto' => $imgBase . 'datun.png'     ] ),
      array_merge( kejari_get_pejabat('bb'),        [ 'foto' => $imgBase . 'bb.png'        ] ),
    ];
    ?>

<!-- Kepala Kejari — Center Top -->
    <!-- ── Kepala Kejaksaan (Center Top) ── -->
    <div style="display:flex;justify-content:center;margin-bottom:3.5rem;">
      <div style="text-align:center;max-width:340px;background:#fff;border-radius:1.25rem;padding:2rem 1.5rem;border:1px solid #f0ebe3;box-shadow:0 8px 40px rgba(212,169,23,.12);">
        <!-- Foto -->
        <div style="width:160px;height:200px;margin:0 auto 1.25rem;border-radius:.75rem;overflow:hidden;background:#f0ebe3;border:3px solid #e4c53e;box-shadow:0 8px 24px rgba(212,169,23,.25);">
          <img src="<?php echo esc_url($kepala['foto']); ?>"
               alt="<?php echo esc_attr($kepala['nama']); ?>"
               style="width:100%;height:100%;object-fit:cover;"/>
        </div>
        <!-- Garis emas -->
        <div style="width:44px;height:2px;background:#d4a917;margin:0 auto 1rem;border-radius:2px;"></div>
        <!-- Nama -->
        <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-weight:600;color:#1a2540;margin-bottom:.75rem;line-height:1.2;">
          <?php echo esc_html($kepala['nama']); ?>
        </h3>
        <!-- Label badge level -->
        <span style="display:inline-block;padding:.2rem .85rem;background:linear-gradient(135deg,#d4a917,#e4c53e);color:#fff;font-size:.62rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;border-radius:99px;margin-bottom:1rem;">
          <?php echo esc_html($kepala['level']); ?>
        </span>
        <!-- Garis tipis -->
        <div style="height:1px;background:#f0ebe3;margin-bottom:1rem;"></div>
        <!-- Deskripsi -->
        <p style="font-size:.82rem;color:#4868a4;line-height:1.75;margin:0;">
          <?php echo esc_html($kepala['desc']); ?>
        </p>
      </div>
    </div>

    <!-- Garis pemisah -->
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:3rem;max-width:640px;margin-left:auto;margin-right:auto;">
      <div style="flex:1;height:1px;background:linear-gradient(90deg,transparent,#d4a917);"></div>
      <span style="font-size:.65rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:#d4a917;white-space:nowrap;">Pejabat Struktural</span>
      <div style="flex:1;height:1px;background:linear-gradient(90deg,#d4a917,transparent);"></div>
    </div>

    <!-- ── Grid Pejabat Struktural ── -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.75rem;max-width:1000px;margin:0 auto;">
      <?php foreach ($pejabat as $p) : ?>
      <div class="card-hover" style="text-align:center;background:#fff;border-radius:1rem;padding:1.75rem 1.25rem;border:1px solid #f0f3f9;box-shadow:0 2px 16px rgba(0,0,0,.05);">

        <!-- Foto -->
        <div style="width:140px;height:175px;margin:0 auto 1rem;border-radius:.75rem;overflow:hidden;background:#f0ebe3;border:2px solid #e5e7eb;box-shadow:0 4px 12px rgba(0,0,0,.08);transition:border-color .25s,box-shadow .25s;"
             onmouseover="this.style.borderColor='#d4a917';this.style.boxShadow='0 6px 20px rgba(212,169,23,.2)'"
             onmouseout="this.style.borderColor='#e5e7eb';this.style.boxShadow='0 4px 12px rgba(0,0,0,.08)'">
          <img src="<?php echo esc_url($p['foto']); ?>"
               alt="<?php echo esc_attr($p['nama']); ?>"
               style="width:100%;height:100%;object-fit:cover;"/>
        </div>

        <!-- Garis emas -->
        <div style="width:32px;height:2px;background:#d4a917;margin:0 auto .85rem;border-radius:2px;"></div>

        <!-- Nama -->
        <h4 style="font-family:'Cormorant Garamond',serif;font-size:0.95rem;font-weight:600;color:#1a2540;margin-bottom:.35rem;line-height:1.25;">
          <?php echo esc_html($p['nama']); ?>
        </h4>

        <!-- Jabatan -->
        <p style="font-size:.63rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#d4a917;margin-bottom:.85rem;line-height:1.5;">
          <?php echo esc_html($p['jabatan']); ?>
        </p>

        <!-- Garis tipis -->
        <div style="height:1px;background:#f0f3f9;margin-bottom:.85rem;"></div>

        <!-- Deskripsi -->
        <p style="font-size:.78rem;color:#4868a4;line-height:1.75;margin:0;text-align:left;">
          <?php echo esc_html($p['desc']); ?>
        </p>

      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="cta-banner">
  <div class="container">
    <h2>Ada yang Bisa Kami Bantu?</h2>
    <p>Tim kami siap membantu Anda. Hubungi kami melalui berbagai saluran yang tersedia.</p>
    <div class="cta-actions">
      <a href="<?php echo home_url('/kontak'); ?>" class="btn-gold">Hubungi Kami</a>
      <a href="<?php echo home_url('/faq'); ?>" class="btn-glass">Lihat FAQ</a>
    </div>
  </div>
</section>

<?php get_footer();