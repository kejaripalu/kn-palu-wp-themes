<?php
/**
 * Template Name: FAQ
 * Page template for Frequently Asked Questions (sample)
 */
get_header(); ?>

<div class="page-header">
  <div class="container">
    <h1 style="color:#fff;">FAQ</h1>
    <p style="color:#dfe8f6;max-width:720px;">Pertanyaan yang sering diajukan tentang layanan dan prosedur Kejaksaan Negeri.</p>
  </div>
</div>

<div style="padding:3rem 0;background:#fff;">
  <div class="container">
    <main class="faq-page">

      <!-- Tabs (kategori) -->
      <div class="faq-container">
      <nav class="faq-tabs" aria-label="FAQ categories" style="margin-bottom:2rem;">
        <ul style="display:flex;gap:.75rem;flex-wrap:wrap;list-style:none;padding:0;margin:0;">
          <li><button class="pill active" data-filter="all">Semua</button></li>
          <li><button class="pill" data-filter="umum">Umum</button></li>
          <li><button class="pill" data-filter="layanan">Layanan</button></li>
          <li><button class="pill" data-filter="hukum">Hukum & Pidana</button></li>
          <li><button class="pill" data-filter="pengaduan">Pengaduan</button></li>
          <li><button class="pill" data-filter="info">Informasi Publik</button></li>
        </ul>
      </nav>

      <section class="faq-list">

        <section class="faq-intro">
          <div style="width:44px;height:44px;border-radius:8px;background:var(--gold);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">i</div>
          <div>
            <h2 class="section-title">Umum</h2>
            <p style="color:#84a1c9;margin-top:.5rem;">Pertanyaan dasar mengenai tugas dan layanan Kejaksaan Negeri.</p>
          </div>
        </section>

        <details data-cat="umum">
          <summary><span>Apa itu Kejaksaan Negeri Palu?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Kejaksaan Negeri Palu adalah lembaga penegak hukum di tingkat kabupaten/kota yang bertugas melakukan penuntutan, memberikan pelayanan hukum, serta melaksanakan fungsi lain sesuai peraturan perundang-undangan.</p></div>
        </details>

        <details data-cat="umum">
          <summary><span>Di mana lokasi kantor Kejaksaan Negeri Palu?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Kantor Kejaksaan Negeri Palu beralamat di Jl. Moh. Yamin No. 97 Palu. Untuk informasi lebih lanjut, hubungi 0451-421750 atau email kejari.plw@gmail.com.</p></div>
        </details>

        <details data-cat="umum">
          <summary><span>Apa jam operasional Kejaksaan Negeri Palu?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Jam operasional kantor adalah Senin–Jumat pukul 08.00–16.00. Layanan khusus dapat berbeda, jadi sebaiknya cek pengumuman resmi atau hubungi layanan informasi.</p></div>
        </details>

        <div style="height:28px"></div>

        <section class="faq-intro" style="display:flex;gap:1rem;align-items:center;margin-top:1.5rem;margin-bottom:.5rem;">
          <div style="width:44px;height:44px;border-radius:8px;background:#213a5a;display:flex;align-items:center;justify-content:center;color:#fff;">📂</div>
          <div>
            <h2 class="section-title">Layanan</h2>
            <p style="color:#84a1c9;margin-top:.5rem;">Informasi mengenai prosedur layanan publik.</p>
          </div>
        </section>

        <details data-cat="layanan">
          <summary><span>Bagaimana cara mendapatkan Surat Keterangan Bebas Masalah Hukum (SKBMH)?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Pengajuan SKBMH dilakukan dengan datang ke loket pelayanan, mengisi formulir, dan melampirkan dokumen pendukung seperti KTP, pas foto, serta surat permohonan terkait.</p></div>
        </details>

        <details data-cat="layanan">
          <summary><span>Apakah Kejaksaan Negeri Palu menyediakan layanan penyuluhan hukum gratis?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Ya, Kejaksaan Negeri Palu dapat menyelenggarakan penyuluhan hukum bagi masyarakat secara gratis. Cek jadwal kegiatan atau hubungi bagian pelayanan untuk informasi pendaftaran.</p></div>
        </details>

        <details data-cat="layanan">
          <summary><span>Bagaimana cara mengajukan permohonan Diversi perkara anak?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Permohonan diversi diajukan melalui pengacara atau keluarga ke Kejaksaan Negeri setelah berkoordinasi dengan penyidik. Diversi bertujuan mengganti proses pidana dengan penyelesaian di luar pengadilan demi kepentingan anak.</p></div>
        </details>

        <div style="height:28px"></div>

        <section class="faq-intro" style="display:flex;gap:1rem;align-items:center;margin-top:1.5rem;margin-bottom:.5rem;">
          <div style="width:44px;height:44px;border-radius:8px;background:#bf2951;display:flex;align-items:center;justify-content:center;color:#fff;">⚖️</div>
          <div>
            <h2 class="section-title">Hukum & Pidana</h2>
            <p style="color:#84a1c9;margin-top:.5rem;">Pertanyaan terkait proses hukum, penuntutan, dan hak terdakwa.</p>
          </div>
        </section>

        <details data-cat="hukum">
          <summary><span>Bagaimana saya bisa mengetahui perkembangan perkara yang ditangani Kejaksaan?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Anda dapat menanyakan perkembangan perkara melalui layanan informasi Kejaksaan Negeri Palu, dengan menyebut nomor perkara atau identitas pihak terkait untuk memeriksa status resmi.</p></div>
        </details>

        <details data-cat="hukum">
          <summary><span>Apa perbedaan tugas Polisi, Kejaksaan, dan Pengadilan?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Polisi menyidik tindak pidana, Kejaksaan menuntut perkara di pengadilan, dan Pengadilan memutuskan perkara berdasarkan bukti dan tuntutan yang diajukan.</p></div>
        </details>

        <details data-cat="hukum">
          <summary><span>Apakah tersangka/terdakwa berhak didampingi penasihat hukum?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Ya, tersangka dan terdakwa berhak mendapatkan penasihat hukum. Jika tidak mampu, mereka dapat meminta bantuan hukum gratis sesuai ketentuan hukum yang berlaku.</p></div>
        </details>

        <div style="height:28px"></div>

        <section class="faq-intro" style="display:flex;gap:1rem;align-items:center;margin-top:1.5rem;margin-bottom:.5rem;">
          <div style="width:44px;height:44px;border-radius:8px;background:#1e4c8b;display:flex;align-items:center;justify-content:center;color:#fff;">🛡️</div>
          <div>
            <h2 class="section-title">Pengaduan</h2>
            <p style="color:#84a1c9;margin-top:.5rem;">Cara melaporkan perkara dan hak pelapor.</p>
          </div>
        </section>

        <details data-cat="pengaduan">
          <summary><span>Bagaimana cara melaporkan dugaan korupsi kepada Kejaksaan?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Dugaan korupsi dapat dilaporkan secara langsung ke kantor Kejaksaan Negeri, melalui email resmi, atau melalui saluran pelaporan yang tersedia dengan menyertakan bukti awal.</p></div>
        </details>

        <details data-cat="pengaduan">
          <summary><span>Apakah identitas pelapor dirahasiakan?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Ya, identitas pelapor akan dijaga kerahasiaannya sesuai ketentuan untuk melindungi keselamatan dan keamanan pelapor selama proses penanganan aduan.</p></div>
        </details>

        <div style="height:28px"></div>

        <section class="faq-intro" style="display:flex;gap:1rem;align-items:center;margin-top:1.5rem;margin-bottom:.5rem;">
          <div style="width:44px;height:44px;border-radius:8px;background:#1a8c4e;display:flex;align-items:center;justify-content:center;color:#fff;">📢</div>
          <div>
            <h2 class="section-title">Informasi Publik</h2>
            <p style="color:#84a1c9;margin-top:.5rem;">Ketentuan akses informasi dan permintaan data publik.</p>
          </div>
        </section>

        <details data-cat="info">
          <summary><span>Bagaimana cara mengajukan permohonan informasi publik?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Permohonan informasi publik dapat diajukan melalui formulir yang disediakan di kantor Kejaksaan atau melalui layanan resmi yang tersedia, dengan jelas menyebutkan jenis informasi yang diminta.</p></div>
        </details>

        <details data-cat="info">
          <summary><span>Apakah semua informasi Kejaksaan bisa diakses publik?</span><span class="chev">▾</span></summary>
          <div class="faq-body"><p>Tidak semua informasi dapat diakses publik; beberapa data bersifat rahasia atau terkait proses hukum. Informasi yang bersifat publik akan disediakan sesuai ketentuan UU KIP.</p></div>
        </details>

      </section>

      </div>

      <?php if ( current_user_can( 'edit_posts' ) ) : ?>
        <p style="margin-top:1.25rem;text-align:center;"><a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>">Tambah atau edit FAQ di admin</a></p>
      <?php endif; ?>

    </main>
  </div>
</div>

<script>
// Simple tab filtering for FAQ categories
document.addEventListener('DOMContentLoaded', function(){
  const pills = document.querySelectorAll('.faq-tabs .pill');
  const items = Array.from(document.querySelectorAll('.faq-list details'));

  function showFilter(filter){
    items.forEach(d => {
      if(filter === 'all') { d.style.display = ''; return; }
      d.style.display = (d.dataset.cat === filter) ? '' : 'none';
    });
  }

  pills.forEach(p => p.addEventListener('click', function(){
    pills.forEach(x=>x.classList.remove('active'));
    this.classList.add('active');
    showFilter(this.dataset.filter);
  }));

  // Open first visible item by default
  const first = items.find(d => d.style.display !== 'none');
  if(first) first.open = true;
});
</script>

<?php get_footer();
