<?php
/**
 * Archive / Berita List Template
 */
get_header(); ?>

<div class="page-header">
  <div class="container">
    <?php kejari_breadcrumb(); ?>
    <h1 style="color:#fff;">
      <?php
      if (is_category()) echo 'Kategori: ' . single_cat_title('', false);
      elseif (is_tag()) echo 'Tag: ' . single_tag_title('', false);
      elseif (is_search()) echo 'Hasil: "' . get_search_query() . '"';
      elseif (is_home()) echo 'Berita & Pengumuman';
      else the_archive_title();
      ?>
    </h1>
    <p style="color:#99b0d3;margin-top:.75rem;">Ikuti perkembangan terbaru kebijakan, program, dan kegiatan.</p>
  </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
  <div class="container">
    <a href="<?php echo home_url('/berita'); ?>" class="filter-btn <?php echo (!is_category()) ? 'active' : ''; ?>">Semua</a>
    <?php
    $cats = get_categories(['hide_empty' => true]);
    foreach ($cats as $cat) : ?>
    <a href="<?php echo get_category_link($cat->term_id); ?>"
       class="filter-btn <?php echo (is_category($cat->term_id)) ? 'active' : ''; ?>">
      <?php echo esc_html($cat->name); ?>
    </a>
    <?php endforeach; ?>
  </div>
</div>

<div style="background:linear-gradient(180deg,#fff 0%,#f8f7f4 100%);padding:3rem 0;">
  <div class="container">
    <div class="archive-layout">

      <!-- Daftar Artikel -->
      <div>
        <?php if (have_posts()) : ?>
        <div class="archive-posts">
          <?php while (have_posts()) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="archive-item">
            <div class="archive-item-thumb">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('berita-thumbnail', ['style' => 'width:100%;height:100%;object-fit:cover;']); ?>
              <?php else : ?>
                <svg width="36" height="36" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z"/></svg>
              <?php endif; ?>
            </div>
            <div class="archive-item-body">
              <span class="archive-item-cat"><?php echo kejari_first_category(); ?></span>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
              <span class="archive-item-more">
                Baca Selengkapnya
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
              </span>
            </div>
          </a>
          <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
          <p class="pagination-info">
            Halaman <?php echo get_query_var('paged') ?: 1; ?>
            dari <?php echo $wp_query->max_num_pages; ?>
          </p>
          <div class="pagination-links">
            <?php
            echo paginate_links([
              'prev_text' => '<svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>',
              'next_text' => '<svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>',
              'type'      => 'list',
            ]);
            ?>
          </div>
        </div>

        <?php else : ?>
        <div style="text-align:center;padding:4rem;background:#fff;border-radius:1rem;border:1px solid #f0f3f9;">
          <p style="color:#4868a4;">Tidak ada artikel ditemukan.</p>
          <a href="<?php echo home_url(); ?>" class="btn-gold" style="margin-top:1rem;display:inline-flex;">Kembali ke Beranda</a>
        </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <aside class="sidebar">
        <!-- Search -->
        <div class="widget">
          <h3 class="widget-title">Cari Berita</h3>
          <?php get_search_form(); ?>
        </div>
        <!-- Kategori -->
        <div class="widget">
          <h3 class="widget-title">Kategori</h3>
          <ul class="widget-list">
            <?php wp_list_categories(['title_li' => '', 'show_count' => 1]); ?>
          </ul>
        </div>
        <!-- Arsip -->
        <div class="widget">
          <h3 class="widget-title">Arsip</h3>
          <ul class="widget-list">
            <?php wp_get_archives(['type' => 'monthly', 'format' => 'custom', 'before' => '<li>', 'after' => '</li>', 'show_post_count' => true]); ?>
          </ul>
        </div>
        <!-- Kontak -->
        <div class="widget widget-contact">
          <h3 class="widget-title">Butuh Bantuan?</h3>
          <p>Tim kami siap membantu Anda.</p>
          <a href="<?php echo home_url('/kontak'); ?>" class="btn-gold" style="width:100%;justify-content:center;">Hubungi Kami</a>
        </div>
      </aside>

    </div>
  </div>
</div>

<?php get_footer();
