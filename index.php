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
          <span></span> Portal Resmi Pemerintah
        </div>
        <h1>Melayani dengan <em>Sepenuh Hati</em></h1>
        <p class="hero-desc"><?php echo esc_html(kejari_get('tagline', get_bloginfo('description'))); ?></p>
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
          <div class="hero-card-title">📢 Pengumuman Terkini</div>
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

<!-- ═══ STRUKTUR ORGANISASI ═══ -->
<section style="padding:6rem 0;background:#fff;">
  <div class="container">
    <div style="text-align:center;margin-bottom:1rem;">
      <p class="section-label">Kepemimpinan</p>
      <h2 class="section-title gold-line-center">Struktur Organisasi</h2>
    </div>

    <?php
    $imgBase = get_template_directory_uri() . '/assets/images/';

    // Data pimpinan
    $kepala = [
      'foto'    => $imgBase . 'kepala.png',
      'nama'    => 'Nama Kepala Kejari',
      'jabatan' => 'Kepala Kejaksaan Negeri Palu',
      'level'   => 'PIMPINAN TERTINGGI',
      'desc'    => 'Memimpin, mengendalikan, dan bertanggung jawab atas pelaksanaan tugas, fungsi, dan kewenangan Kejaksaan di wilayah hukum Kejaksaan Negeri Palu.',
    ];

    $pejabat = [
      [
        'foto'    => $imgBase . 'pembinaan.png',
        'nama'    => 'Nama Pejabat',
        'jabatan' => 'Kepala Sub Bagian Pembinaan',
        'desc'    => 'Pengelola manajemen internal meliputi kepegawaian, keuangan, perlengkapan, operasional perkantoran, dan pelayanan teknis administrasi.',
      ],
      [
        'foto'    => $imgBase . 'intelijen.png',
        'nama'    => 'Nama Pejabat',
        'jabatan' => 'Kepala Seksi Intelijen',
        'desc'    => 'Pelaksana intelijen penegakan hukum, cegah dini, serta pengamanan kebijakan Kejaksaan.',
      ],
      [
        'foto'    => $imgBase . 'pidum.png',
        'nama'    => 'Nama Pejabat',
        'jabatan' => 'Kepala Seksi Pidana Umum',
        'desc'    => 'Melaksanakan pengendalian penuntutan, eksekusi putusan pengadilan, serta administrasi perkara tindak pidana umum.',
      ],
      [
        'foto'    => $imgBase . 'pidsus.png',
        'nama'    => 'Nama Pejabat',
        'jabatan' => 'Kepala Seksi Pidana Khusus',
        'desc'    => 'Melaksanakan penanganan perkara tindak pidana khusus meliputi penyelidikan, penyidikan, penuntutan, dan eksekusi sesuai ketentuan peraturan perundang-undangan.',
      ],
      [
        'foto'    => $imgBase . 'datun.png',
        'nama'    => 'Nama Pejabat',
        'jabatan' => 'Kepala Seksi Perdata dan Tata Usaha Negara',
        'desc'    => 'Melaksanakan bantuan hukum, pertimbangan hukum, tindakan hukum lain, dan pelayanan hukum di bidang perdata dan tata usaha negara.',
      ],
      [
        'foto'    => $imgBase . 'bb.png',
        'nama'    => 'Nama Pejabat',
        'jabatan' => 'Kepala Seksi Barang Bukti dan Barang Rampasan',
        'desc'    => 'Melaksanakan pengelolaan barang bukti dan barang rampasan negara meliputi penerimaan, penyimpanan, pengamanan, pemeliharaan, dan penyelesaian.',
      ],
    ];
    ?>

    <!-- Kepala Kejari — Center Top -->
    <div style="display:flex;justify-content:center;margin-bottom:3rem;">
      <div style="text-align:center;max-width:320px;">
        <!-- Foto -->
        <div style="width:160px;height:200px;margin:0 auto 1.25rem;border-radius:.75rem;overflow:hidden;background:#f0ebe3;border:3px solid #e4c53e;box-shadow:0 8px 32px rgba(212,169,23,.2);">
          <img src="<?php echo esc_url($kepala['foto']); ?>" alt="<?php echo esc_attr($kepala['nama']); ?>"
               style="width:100%;height:100%;object-fit:cover;"/>
        </div>
        <div style="width:40px;height:2px;background:#d4a917;margin:0 auto .75rem;border-radius:2px;"></div>
        <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:#1a2540;margin-bottom:.35rem;"><?php echo esc_html($kepala['nama']); ?></h3>
        <p style="font-size:.7rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:#d4a917;margin-bottom:.75rem;"><?php echo esc_html($kepala['level']); ?></p>
        <p style="font-size:.78rem;color:#4868a4;line-height:1.7;margin:0;"><?php echo esc_html($kepala['desc']); ?></p>
      </div>
    </div>

    <!-- Garis pemisah -->
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:3rem;max-width:600px;margin-left:auto;margin-right:auto;">
      <div style="flex:1;height:1px;background:linear-gradient(90deg,transparent,#d4a917);"></div>
      <div style="width:8px;height:8px;border-radius:50%;background:#d4a917;"></div>
      <div style="flex:1;height:1px;background:linear-gradient(90deg,#d4a917,transparent);"></div>
    </div>

    <!-- Grid Pejabat -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2.5rem 2rem;max-width:960px;margin:0 auto;">
      <?php foreach ($pejabat as $p) : ?>
      <div style="text-align:center;" class="card-hover">
        <!-- Foto -->
        <div style="width:150px;height:185px;margin:0 auto 1rem;border-radius:.75rem;overflow:hidden;background:#f0ebe3;border:2px solid #e5e7eb;box-shadow:0 4px 16px rgba(0,0,0,.08);transition:border-color .3s;" onmouseover="this.style.borderColor='#d4a917'" onmouseout="this.style.borderColor='#e5e7eb'">
          <img src="<?php echo esc_url($p['foto']); ?>" alt="<?php echo esc_attr($p['nama']); ?>"
               style="width:100%;height:100%;object-fit:cover;"/>
        </div>
        <!-- Garis emas -->
        <div style="width:32px;height:2px;background:#d4a917;margin:0 auto .75rem;border-radius:2px;"></div>
        <!-- Nama -->
        <h4 style="font-family:'Cormorant Garamond',serif;font-size:1.1rem;color:#1a2540;margin-bottom:.35rem;line-height:1.2;"><?php echo esc_html($p['nama']); ?></h4>
        <!-- Jabatan -->
        <p style="font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#d4a917;margin-bottom:.75rem;line-height:1.4;"><?php echo esc_html($p['jabatan']); ?></p>
        <!-- Deskripsi -->
        <p style="font-size:.78rem;color:#4868a4;line-height:1.7;margin:0;"><?php echo esc_html($p['desc']); ?></p>
      </div>
      <?php endforeach; ?>
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