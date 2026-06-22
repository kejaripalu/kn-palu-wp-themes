<?php
/**
 * Single Post Template
 */
get_header(); ?>

<div class="page-header">
  <div class="container">
    <?php kejari_breadcrumb(); ?>
    <div style="display:flex;flex-wrap:wrap;align-items:center;gap:.75rem;margin-bottom:1.25rem;">
      <span style="padding:.25rem .75rem;border-radius:99px;background:linear-gradient(135deg,#d4a917,#e4c53e);color:#fff;font-size:.75rem;font-weight:600;">
        <?php echo kejari_first_category(); ?>
      </span>
      <span style="color:#6888bc;font-size:.875rem;"><?php the_date('d F Y'); ?></span>
      <span style="color:#4868a4;font-size:.875rem;">&middot;</span>
      <span style="color:#6888bc;font-size:.875rem;"><?php echo kejari_reading_time(); ?> menit baca</span>
    </div>
    <h1 style="color:#fff;max-width:800px;"><?php the_title(); ?></h1>
    <?php if (has_excerpt()) : ?>
    <p style="color:#99b0d3;max-width:640px;margin-top:1rem;font-size:1.05rem;line-height:1.8;"><?php the_excerpt(); ?></p>
    <?php endif; ?>
  </div>
</div>

<div style="background:linear-gradient(180deg,#fff 0%,#f8f7f4 100%);padding:4rem 0;">
  <div class="container">
    <div class="single-layout">

      <!-- Konten Utama -->
      <article class="post-content">

        <?php if (has_post_thumbnail()) : ?>
        <div class="post-featured-img">
          <?php the_post_thumbnail('berita-hero', ['style' => 'width:100%;max-height:420px;object-fit:cover;']); ?>
        </div>
        <?php endif; ?>

        <!-- Tags & Kategori -->
        <?php $cats = get_the_category(); $tags = get_the_tags();
        if ($cats || $tags) : ?>
        <div style="display:flex;flex-wrap:wrap;gap:.5rem;margin-bottom:2rem;padding-bottom:2rem;border-bottom:1px solid #f0f3f9;">
          <?php foreach ((array)$cats as $cat) : ?>
          <a href="<?php echo get_category_link($cat->term_id); ?>" style="padding:.25rem .75rem;border-radius:99px;background:#f0f3f9;color:#2d3f6e;font-size:.75rem;"><?php echo esc_html($cat->name); ?></a>
          <?php endforeach; ?>
          <?php foreach ((array)$tags as $tag) : ?>
          <a href="<?php echo get_tag_link($tag->term_id); ?>" style="padding:.25rem .75rem;border-radius:99px;background:#fdfbf3;color:#b8890f;font-size:.75rem;">#<?php echo esc_html($tag->name); ?></a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Isi Artikel -->
        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <!-- Share & Nav -->
        <div class="post-footer">
          <div style="display:flex;align-items:center;gap:.75rem;">
            <span class="share-label">Bagikan:</span>
            <div class="share-buttons">
              <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="share-btn" title="Twitter/X">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              </a>
              <a href="https://wa.me/?text=<?php the_title(); ?>%20<?php the_permalink(); ?>" target="_blank" class="share-btn" title="WhatsApp">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share-btn" title="Facebook">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              </a>
            </div>
          </div>
          <div class="post-nav">
            <?php $prev = get_previous_post(); if ($prev) : ?>
            <a href="<?php echo get_permalink($prev); ?>">
              <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
              Sebelumnya
            </a>
            <?php endif; ?>
            <?php $next = get_next_post(); if ($next) : ?>
            <a href="<?php echo get_permalink($next); ?>">
              Berikutnya
              <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <?php endif; ?>
          </div>
        </div>

      </article>

      <!-- Sidebar -->
      <aside class="sidebar">
        <?php if (is_active_sidebar('sidebar-berita')) : ?>
          <?php dynamic_sidebar('sidebar-berita'); ?>
        <?php else : ?>

          <!-- Widget: Berita Terbaru -->
          <div class="widget">
            <h3 class="widget-title">Berita Terbaru</h3>
            <ul class="widget-recent" style="list-style:none;">
              <?php
              $recent = new WP_Query(['posts_per_page' => 5, 'post_status' => 'publish']);
              while ($recent->have_posts()) : $recent->the_post(); ?>
              <li>
                <div class="widget-recent-icon">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <span class="date"><?php the_date('d M Y'); ?></span>
                </div>
              </li>
              <?php endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>

          <!-- Widget: Kategori -->
          <div class="widget">
            <h3 class="widget-title">Kategori</h3>
            <ul class="widget-list">
              <?php
                // Ambil hanya kategori utama (parent = 0, tanpa sub-kategori)
                $main_cats = get_categories([
                  'parent'     => 0,
                  'hide_empty' => true,
                  'orderby'    => 'name',
                  'order'      => 'ASC',
                ]);
                foreach ( $main_cats as $cat ) : ?>
                <li>
                  <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
                    <?php echo esc_html( $cat->name ); ?>
                  </a>
                  <span><?php echo $cat->count; ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- Widget: Kontak -->
          <div class="widget widget-contact">
            <h3 class="widget-title">Butuh Bantuan?</h3>
            <p>Hubungi kami untuk informasi lebih lanjut.</p>
            <a href="<?php echo home_url('/kontak'); ?>" class="btn-gold" style="width:100%;justify-content:center;">Hubungi Kami</a>
          </div>

        <?php endif; ?>
      </aside>

    </div>
  </div>
</div>

<?php get_footer();
