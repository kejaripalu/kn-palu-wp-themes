# Tema WordPress — Kejaksaan Negeri Palu

![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue?logo=wordpress)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple?logo=php)
![License](https://img.shields.io/badge/License-GPL%20v2-green)
![Version](https://img.shields.io/badge/Version-1.0.0-gold)

Tema WordPress resmi untuk website **Kejaksaan Negeri Palu** — elegan, modern, dan profesional dengan nuansa **navy** dan **emas**. Dibangun tanpa plugin tambahan, ringan, dan mudah dikustomisasi.

---

## Daftar Isi

- [Tampilan](#tampilan)
- [Fitur](#fitur)
- [Persyaratan](#persyaratan)
- [Instalasi](#instalasi)
- [Struktur File](#struktur-file)
- [Konfigurasi](#konfigurasi)
- [Mengganti Foto Pejabat](#mengganti-foto-pejabat)
- [Kustomisasi Warna & Font](#kustomisasi-warna--font)
- [Halaman yang Tersedia](#halaman-yang-tersedia)
- [Menu Navigasi](#menu-navigasi)
- [Widget & Sidebar](#widget--sidebar)
- [Git & Version Control](#git--version-control)
- [Troubleshooting](#troubleshooting)

---

## Tampilan

| Halaman | Deskripsi |
|---------|-----------|
| **Homepage** | Hero, Layanan, Struktur Organisasi, Berita, CTA |
| **Berita** | Grid artikel + sidebar + pagination + filter kategori |
| **Detail Artikel** | Konten lengkap + share + artikel terkait + sidebar |
| **Header** | Top bar ticker berita berjalan, navigasi dropdown, mobile menu |
| **Footer** | 4 kolom: brand, navigasi, layanan, kontak |

**Desain:**
- 🎨 Warna utama: **Navy** `#1a2540` + **Emas** `#d4a917`
- 🔤 Font heading: **Cormorant Garamond** (elegan, serif)
- 🔤 Font body: **Jost** (modern, ringan)
- 📱 Fully responsive — mobile, tablet, desktop

---

## Fitur

- ✅ Ticker berita berjalan otomatis di top bar
- ✅ Navigasi sticky dengan dropdown sub-menu
- ✅ Hamburger menu untuk mobile
- ✅ Struktur organisasi dengan foto pejabat
- ✅ Halaman berita dengan pagination & filter kategori
- ✅ Tombol share artikel (Twitter, WhatsApp, Facebook)
- ✅ Artikel terkait otomatis
- ✅ Sidebar dinamis (widget area)
- ✅ Kustomisasi via WordPress Customizer (Tampilan → Sesuaikan)
- ✅ Mendukung Featured Image (foto thumbnail artikel)
- ✅ SEO-friendly (title tag, meta description)
- ✅ Tanpa plugin wajib — ringan dan cepat

---

## Persyaratan

| Komponen | Versi Minimum |
|----------|---------------|
| WordPress | 6.0 |
| PHP | 8.0 |
| MySQL | 5.7 atau MariaDB 10.3 |
| Browser | Chrome 90+, Firefox 88+, Safari 14+, Edge 90+ |

---

## Instalasi

### Cara 1 — Upload via Dashboard WordPress (Direkomendasikan)

1. Login ke WordPress Admin → **Tampilan → Tema**
2. Klik tombol **Tambah Baru**
3. Klik **Unggah Tema**
4. Pilih file `kejari-palu.zip`
5. Klik **Pasang Sekarang**
6. Klik **Aktifkan**

### Cara 2 — Upload Manual via FTP/cPanel

1. Ekstrak folder `kejari-palu/`
2. Upload ke server via FTP atau File Manager cPanel:
   ```
   /wp-content/themes/kejari-palu/
   ```
3. Login WordPress Admin → **Tampilan → Tema**
4. Klik **Aktifkan** pada tema **Kejari Palu**

### Cara 3 — Clone via Git

```bash
cd /var/www/html/wp-content/themes/
git clone https://github.com/username/kejari-palu.git
```

> ⚠️ Setelah clone, foto pejabat **tidak ikut** karena ada di `.gitignore`.
> Upload foto secara manual ke `assets/images/` via FTP atau cPanel.

### Cara 4 — Langsung di Server (SSH)

```bash
cd /var/www/html/wp-content/themes/
unzip kejari-palu.zip
```

Lalu aktifkan via WP Admin atau WP-CLI:

```bash
wp theme activate kejari-palu
```

---

## Struktur File

```
kejari-palu/
│
├── .gitignore                 ← File & folder yang dikecualikan dari Git
├── README.md                  ← Dokumentasi ini
├── style.css                  ← Info tema & semua CSS styling
├── functions.php              ← Setup tema, enqueue script, helper functions
├── index.php                  ← Template homepage
├── single.php                 ← Template halaman detail artikel
├── archive.php                ← Template daftar berita / arsip
├── header.php                 ← Header: top bar ticker + navigasi
├── footer.php                 ← Footer: kolom info + bottom bar
│
└── assets/
    ├── js/
    │   └── main.js            ← JavaScript: menu, ticker, animasi
    └── images/
        ├── kepala.png         ← Foto Kepala Kejari (placeholder) *
        ├── pembinaan.png      ← Foto Ka. Sub Bag Pembinaan *
        ├── intelijen.png      ← Foto Ka. Seksi Intelijen *
        ├── pidum.png          ← Foto Ka. Seksi Pidana Umum *
        ├── pidsus.png         ← Foto Ka. Seksi Pidana Khusus *
        ├── datun.png          ← Foto Ka. Seksi Perdata & TUN *
        └── bb.png             ← Foto Ka. Seksi Barang Bukti *
```

> `*` File bertanda bintang **tidak di-track Git** (ada di `.gitignore`).
> Upload foto asli pejabat secara manual setelah clone/deploy.

---

## Konfigurasi

### Mengisi Identitas Instansi

Buka **Tampilan → Sesuaikan → Identitas Instansi**, lalu isi:

| Field | Contoh Isi |
|-------|-----------|
| **Tagline** | Melayani Masyarakat dengan Sepenuh Hati |
| **Alamat** | Jl. Moh. Yamin No. 97 Palu |
| **Telepon** | 0451-421750 |
| **Email** | kejari.plw@gmail.com |
| **Facebook URL** | https://facebook.com/kejari.palu |
| **Twitter URL** | https://twitter.com/kejaripalu |
| **Instagram URL** | https://instagram.com/kejaripalu |
| **YouTube URL** | https://youtube.com/@kejaripalu |

### Mengganti Logo

1. **Tampilan → Sesuaikan → Identitas Situs**
2. Klik **Pilih logo**
3. Upload file logo (PNG transparan, ukuran 200×200px direkomendasikan)
4. Klik **Simpan & Publikasikan**

### Mengatur Halaman Beranda Statis

Jika ingin homepage tetap menampilkan template ini (bukan daftar blog):

1. **Pengaturan → Membaca**
2. Pilih **Halaman statis**
3. Buat halaman kosong bernama "Beranda"
4. Pilih halaman tersebut sebagai **Halaman depan**

---

## Mengganti Foto Pejabat

> ⚠️ Foto pejabat **tidak disertakan di repository Git** karena alasan privasi.
> Upload foto secara manual ke server setelah clone atau deploy.

### Spesifikasi Foto yang Direkomendasikan

| Properti | Nilai |
|----------|-------|
| Format | PNG atau JPG |
| Ukuran | 200 × 240 pixel (portrait) |
| Rasio | 5:6 |
| Ukuran file | Maks 200 KB |
| Background | Polos putih atau abu-abu |

### Langkah Mengganti via FTP/cPanel

Upload ke path berikut dengan nama file **sama persis**:

```
wp-content/themes/kejari-palu/assets/images/
├── kepala.png       ← Foto Kepala Kejaksaan Negeri Palu
├── pembinaan.png    ← Foto Ka. Sub Bagian Pembinaan
├── intelijen.png    ← Foto Ka. Seksi Intelijen
├── pidum.png        ← Foto Ka. Seksi Pidana Umum
├── pidsus.png       ← Foto Ka. Seksi Pidana Khusus
├── datun.png        ← Foto Ka. Seksi Perdata & Tata Usaha Negara
└── bb.png           ← Foto Ka. Seksi Barang Bukti & Barang Rampasan
```

> 💡 Nama file harus **huruf kecil semua** dan **sama persis** agar langsung tampil tanpa mengubah kode.

### Mengubah Nama & Jabatan Pejabat

Buka file `index.php`, cari dan sesuaikan bagian berikut:

```php
$kepala = [
  'foto'    => $imgBase . 'kepala.png',
  'nama'    => 'Nama Kepala Kejari',       // ← ganti nama lengkap
  'jabatan' => 'Kepala Kejaksaan Negeri Palu',
  'level'   => 'PIMPINAN TERTINGGI',
  'desc'    => 'Deskripsi tugas...',       // ← ganti deskripsi
];

$pejabat = [
  [
    'foto'    => $imgBase . 'pembinaan.png',
    'nama'    => 'Nama Pejabat',           // ← ganti nama
    'jabatan' => 'Kepala Sub Bagian Pembinaan',
    'desc'    => 'Deskripsi tugas...',
  ],
  // ... pejabat lainnya
];
```

---

## Kustomisasi Warna & Font

### Mengubah Warna Utama

Buka `style.css`, ubah nilai variabel CSS di bagian `:root`:

```css
:root {
  --gold:       #d4a917;   /* Warna emas — aksen utama   */
  --gold-light: #e4c53e;   /* Emas terang untuk gradient */
  --navy:       #1a2540;   /* Navy gelap — warna dominan */
  --navy-mid:   #2d3f6e;   /* Navy sedang                */
  --navy-light: #364f88;   /* Navy terang                */
}
```

**Contoh ganti ke tema hijau:**
```css
:root {
  --gold:       #2d7a3a;
  --gold-light: #3da050;
  --navy:       #1a3a2a;
  --navy-mid:   #2a5a3a;
}
```

### Mengubah Font

Buka `functions.php`, ganti URL Google Fonts:

```php
wp_enqueue_style( 'kejari-fonts',
  'https://fonts.googleapis.com/css2?family=YOUR_FONT&display=swap',
  [], null
);
```

Lalu di `style.css` sesuaikan:

```css
h1, h2, h3, h4, h5, h6 {
  font-family: 'Font Heading Anda', serif;
}
body {
  font-family: 'Font Body Anda', sans-serif;
}
```

---

## Halaman yang Tersedia

Buat halaman berikut di **Halaman → Tambah Baru**:

| Judul Halaman | Slug | Keterangan |
|---------------|------|-----------|
| Beranda | `/` | Diatur di Pengaturan → Membaca |
| Profil | `/profil` | Tentang instansi |
| Berita | `/berita` | Otomatis dari arsip post |
| Layanan | `/layanan` | Halaman layanan publik |
| Kontak | `/kontak` | Informasi kontak |
| FAQ | `/faq` | Pertanyaan umum |
| Disclaimer | `/disclaimer` | Pernyataan penyangkalan |
| PPID | `/ppid` | Pejabat Pengelola Informasi |

---

## Menu Navigasi

1. Buka **Tampilan → Menu**
2. Buat menu baru, beri nama **"Menu Utama"**
3. Tambahkan halaman yang diinginkan
4. Di bagian **Lokasi Tampilan**, centang **Menu Utama**
5. Klik **Simpan Menu**

Untuk **menu footer**, buat menu baru dan centang **Menu Footer**.

> 💡 Tema mendukung **dropdown sub-menu** — hover pada item menu untuk melihat sub-menu.

---

## Widget & Sidebar

Tema menyediakan area widget **Sidebar Berita** yang muncul di halaman artikel.

1. Buka **Tampilan → Widget**
2. Tambahkan widget ke **Sidebar Berita**:
   - **Pencarian** — kotak pencarian
   - **Kategori** — daftar kategori
   - **Pos Terbaru** — artikel terbaru
   - **Arsip** — arsip bulanan

Jika sidebar tidak diisi widget, tema akan menampilkan sidebar default otomatis.

---

## Git & Version Control

### File yang Dikecualikan (.gitignore)

File `.gitignore` sudah dikonfigurasi untuk **tidak menyertakan**:

| Yang Dikecualikan | Alasan |
|-------------------|--------|
| `assets/images/kepala.png` | Privasi data pejabat |
| `assets/images/pembinaan.png` | Privasi data pejabat |
| `assets/images/intelijen.png` | Privasi data pejabat |
| `assets/images/pidum.png` | Privasi data pejabat |
| `assets/images/pidsus.png` | Privasi data pejabat |
| `assets/images/datun.png` | Privasi data pejabat |
| `assets/images/bb.png` | Privasi data pejabat |
| `wp-config.php` | Keamanan (password database) |
| `.env` | Konfigurasi sensitif |
| `node_modules/` | Dependencies (install ulang) |
| `vendor/` | Dependencies PHP |
| `*.log` | Log tidak perlu di-track |

### Workflow Deploy

```bash
# Clone repository
git clone https://github.com/username/kejari-palu.git

# Masuk folder tema
cd wp-content/themes/kejari-palu

# Upload foto pejabat secara manual via FTP ke:
# assets/images/kepala.png
# assets/images/pembinaan.png
# assets/images/intelijen.png
# assets/images/pidum.png
# assets/images/pidsus.png
# assets/images/datun.png
# assets/images/bb.png
```

### Update Tema via Git

```bash
cd /var/www/html/wp-content/themes/kejari-palu
git pull origin main
```

> ✅ Foto pejabat **aman** — tidak akan tertimpa saat `git pull` karena ada di `.gitignore`.

---

## Troubleshooting

### Ticker berita tidak berjalan
- Pastikan ada minimal 1 artikel yang sudah dipublikasikan
- Cek Console browser (F12) untuk error JavaScript
- Coba nonaktifkan plugin caching sementara

### Foto pejabat tidak muncul setelah clone
- Foto tidak ikut di Git — upload manual via FTP ke `assets/images/`
- Pastikan nama file **sama persis** (huruf kecil, ekstensi `.png`)
- Periksa permission folder: `chmod 755 assets/images/`
- Bersihkan cache browser dengan `Ctrl + Shift + R`

### Font tidak tampil
- Pastikan server memiliki akses internet untuk load Google Fonts
- Alternatif: download font dan host secara lokal

### Halaman 404 setelah aktivasi tema
- Buka **Pengaturan → Permalink**
- Klik **Simpan Perubahan** (tanpa mengubah apapun)
- Ini akan me-refresh `.htaccess`

### Menu tidak muncul
- Buka **Tampilan → Menu**
- Pastikan menu sudah di-assign ke lokasi **Menu Utama**

### Style tidak ter-load
- Pastikan file `style.css` ada di root folder tema
- Periksa baris pertama `style.css` berisi `Theme Name: Kejari Palu`

### Konflik setelah `git pull`
```bash
git status              # cek file yang konflik
git stash               # simpan perubahan lokal sementara
git pull origin main    # update dari remote
git stash pop           # kembalikan perubahan lokal
```

---

## Lisensi

Tema ini dirilis di bawah lisensi **GNU General Public License v2.0**.
Bebas digunakan, dimodifikasi, dan didistribusikan selama mengikuti ketentuan GPL.

---

## Informasi Kontak

Untuk pertanyaan teknis terkait tema ini:

- **Email:** kejari.plw@gmail.com
- **Website:** https://kejari-palu.kejaksaan.go.id
- **Alamat:** Jl. Moh. Yamin No. 97 Palu, Sulawesi Tengah

---

*Tema ini dikembangkan khusus untuk Kejaksaan Negeri Palu.*
*Versi 1.0.0 — © 2026 Kejaksaan Negeri Palu*