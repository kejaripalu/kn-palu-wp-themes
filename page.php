<?php
/**
 * Page Template
 */
get_header(); ?>

<div class="page-header">
  <div class="container">
    <?php if ( function_exists('kejari_breadcrumb') ) kejari_breadcrumb(); ?>
    <h1 style="color:#fff;"><?php the_title(); ?></h1>
    <p style="color:#99b0d3;margin-top:.75rem;"><?php echo get_the_excerpt() ?: ''; ?></p>
  </div>
</div>

<div style="background:linear-gradient(180deg,#fff 0%,#f8f7f4 100%);padding:3rem 0;">
  <div class="container">
    <div class="page-layout" style="max-width:980px;margin:0 auto;">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:#fff;border-radius:1rem;padding:2rem;border:1px solid var(--gray-100);box-shadow:0 6px 30px rgba(0,0,0,.04);">
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
        // Comments template if needed
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
        ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>

<?php get_footer();
