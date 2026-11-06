# ☕ KopiNyantuy - Sistem Self-Service & Order Online

Proyek Tugas Akhir Pemrograman Web / Antar Muka Komputer untuk sistem pemesanan online kafe "KopiNyantuy" terintegrasi dengan database MySQL dan WhatsApp.

---

### 📚 Informasi Akademik

**Mata Kuliah:** Antar Muka Komputer  
**Kelompok:** 2  

| No. | Nama Anggota | NIM |
| :---: | :--- | :---: |
| 1 | **Cahya Heryana** | 2503321094 |
| 2 | **Ghaisan Adiend Fathan Al adli** | 2503321067 |
| 3 | **Muhammad Rahsya Erlangga** | 2503321084 |

---

### ✨ Fitur Utama Sistem

* 🛒 **Katalog & Keranjang Real-time**: Pelanggan dapat memilih menu kopi, non-kopi, serta snack secara mudah.
* 💳 **Checkout Transaksi**: Pemilihan lokasi meja (Indoor/Outdoor/Takeaway) dan metode pembayaran.
* 💾 **Integrasi MySQL Backend**: Pesanan otomatis tersimpan ke tabel `pesanan` database MySQL Laragon via API fetch `simpan_pesanan.php`.
* 📱 **Notifikasi WhatsApp Kasir**: Otomatis meneruskan rincian pesanan ke WhatsApp kasir sebagai bukti konfirmasi.
* 🧑‍💻 **Dashboard Admin / Kasir**: Halaman `admin.php` untuk memantau statistik pendapatan, pesanan hari ini, filter pencarian, serta pembaruan status pesanan.

---

### 🛠️ Teknologi & Environment

* **Frontend**: HTML5, JavaScript (ES6 Fetch API), Tailwind CSS CDN, Font Space Grotesk & Plus Jakarta Sans.
* **Backend**: PHP (Native).
* **Database**: MySQL / MariaDB (Laragon Local Server).

---

### 🗄️ Struktur Database (`db_kopinyantuy`)

Tabel `pesanan` dibuat menggunakan struktur berikut:

```sql
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `kode_order` VARCHAR(20) NOT NULL,
  `nomor_meja` VARCHAR(50) NOT NULL,
  `metode_bayar` VARCHAR(50) NOT NULL,
  `rincian_menu` TEXT NOT NULL,
  `total_harga` INT(11) NOT NULL,
  `status` ENUM('Pending','Diproses','Selesai','Dibatalkan') DEFAULT 'Pending',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
