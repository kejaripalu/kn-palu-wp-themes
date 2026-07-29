<?php
/**
 * Custom search form
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label>
    <span class="screen-reader-text">Cari untuk:</span>
    <input type="search" class="search-field" placeholder="Cari berita, pengumuman..." value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <button type="submit" class="btn-outline">Cari</button>
</form>

<style>
  .search-form { display:flex; gap:.5rem; align-items:center; }
  .search-field { padding:.6rem .75rem; border:1px solid var(--gray-200); border-radius:.6rem; min-width:220px; }
  .search-field:focus { outline:none; border-color:var(--navy); }
  @media (max-width:480px){ .search-form{flex-direction:column;align-items:stretch}.search-field{width:100%} }
</style>
