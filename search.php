<?php
/**
 * Search Results Template
 */
get_header(); ?>

<div class="page-header">
  <div class="container">
    <?php kejari_breadcrumb(); ?>
    <h1 style="color:#fff;">Hasil Pencarian: "<?php echo esc_html(get_search_query()); ?>"</h1>
    <p style="color:#99b0d3;margin-top:.75rem;">Menampilkan hasil yang relevan dari seluruh konten situs.</p>
  </div>
</div>

<div style="background:linear-gradient(180deg,#fff 0%,#f8f7f4 100%);padding:3rem 0;">
  <div class="container">
    <div class="archive-layout">

      <div>
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $search_args = [
          's' => get_search_query(),
          'post_type' => 'post',
          'posts_per_page' => 10,
          'paged' => $paged,
        ];
        $search_query = new WP_Query($search_args);

        if ( $search_query->have_posts() ) : ?>
        <div class="archive-posts">
          <?php while ( $search_query->have_posts() ) : $search_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="archive-item">
            <div class="archive-item-thumb">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('berita-thumbnail', ['style' => 'width:100%;height:100%;object-fit:cover;']); ?>
              <?php else : ?>
                <svg width="36" height="36" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z"/></svg>
              <?php endif; ?>
            </div>
            <div class="archive-item-body">
              <span class="archive-item-cat"><?php echo kejari_first_category(); ?></span>
              <div class="archive-item-meta"><span class="archive-item-date"><?php echo get_the_date('j F Y'); ?></span></div>
              <h2><?php the_title(); ?></h2>
              <p><?php echo wp_trim_words(get_the_excerpt(), 22); ?></p>
              <span class="archive-item-more">Baca Selengkapnya</span>
            </div>
          </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="pagination">
          <p class="pagination-info">Halaman <?php echo $paged; ?> dari <?php echo $search_query->max_num_pages; ?></p>
          <div class="pagination-links">
            <?php
            echo paginate_links([
              'prev_text' => '&laquo;',
              'next_text' => '&raquo;',
              'type'      => 'list',
              'total'     => $search_query->max_num_pages,
              'current'   => $paged,
            ]);
            ?>
          </div>
        </div>

        <?php else : ?>
        <div style="text-align:center;padding:4rem;background:#fff;border-radius:1rem;border:1px solid #f0f3f9;">
          <p style="color:#4868a4;">Tidak ada hasil untuk "<?php echo esc_html(get_search_query()); ?>".</p>
          <div style="margin-top:1rem;max-width:480px;margin-left:auto;margin-right:auto;">
            <?php get_search_form(); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <aside class="sidebar">
        <div class="widget">
          <h3 class="widget-title">Cari lagi</h3>
          <?php get_search_form(); ?>
        </div>
        <div class="widget">
          <h3 class="widget-title">Kategori</h3>
          <ul class="widget-list">
            <?php wp_list_categories(['title_li' => '', 'show_count' => 1, 'depth' => 1, 'hide_empty' => 1]); ?>
          </ul>
        </div>
        <!-- Arsip (dihapus) -->
      </aside>

    </div>
  </div>
</div>

<?php get_footer();
