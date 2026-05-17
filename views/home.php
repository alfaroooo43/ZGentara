<?php
$data = (isset($data) && is_array($data)) ? $data : [];
$assetBase = $data['asset_base'] ?? '../assets';
$jastrip = (isset($data['jastrip']) && is_array($data['jastrip'])) ? $data['jastrip'] : [];
$testimoni = (isset($data['testimoni']) && is_array($data['testimoni'])) ? $data['testimoni'] : [];
$tentang = (isset($data['tentang']) && is_array($data['tentang'])) ? $data['tentang'] : ['deskripsi' => '', 'tim' => []];
$tim = (isset($tentang['tim']) && is_array($tentang['tim'])) ? $tentang['tim'] : [];
$aktifVibe = $data['aktif_vibe'] ?? 'all';
$aktifSearch = $data['aktif_search'] ?? '';
$is_show_all = isset($_GET['show_all']) && $_GET['show_all'] === 'true';
$destinasi_tampil = $is_show_all ? $jastrip : array_slice($jastrip, 0, 4);
#CONTOH TESTIMONI
#CONTOH Data tambahan ini menjaga testimoni tetap banyak tanpa menghapus data dari model.
$defaultTestimonials = [
    [
        'nama' => 'Aulia Rahma',
        'wisata' => 'Kawah Ijen',
        'rating' => 5,
        'ulasan' => 'Trip ke Kawah Ijen terasa rapi dari awal. Guide sabar, briefing jelas, dan sunrise-nya benar-benar berkesan.'
    ],
    [
        'nama' => 'Rizky Pratama',
        'wisata' => 'Blue Fire',
        'rating' => 5,
        'ulasan' => 'Pengalaman melihat Blue Fire sangat aman dan nyaman. Tim ZGentara Trip sigap membantu dari start sampai turun.'
    ],
    [
        'nama' => 'Nabila Putri',
        'wisata' => 'Gunung Raung',
        'rating' => 5,
        'ulasan' => 'Pendakian Gunung Raung jadi lebih tenang karena guide sangat paham jalur. Seru, menantang, tapi tetap terarah.'
    ],
    [
        'nama' => 'Fajar Mahendra',
        'wisata' => 'Kawah Wurung',
        'rating' => 5,
        'ulasan' => 'Kawah Wurung cocok banget untuk healing. Jadwal santai, dokumentasi bagus, dan suasananya dibuat nyaman.'
    ],
    [
        'nama' => 'Salsa Kirana',
        'wisata' => 'Bukit Teletubbies',
        'rating' => 5,
        'ulasan' => 'Bukit Teletubbies cantik sekali untuk foto. Paketnya simpel, komunikasinya cepat, dan timnya ramah.'
    ],
    [
        'nama' => 'Dimas Aditya',
        'wisata' => 'Air Terjun Tancak Kembar',
        'rating' => 5,
        'ulasan' => 'Rute air terjun dipandu dengan aman. Tempatnya segar, bersih, dan cocok untuk trip singkat bareng teman.'
    ],
    [
        'nama' => 'Maya Lestari',
        'wisata' => 'Gunung Piramida',
        'rating' => 5,
        'ulasan' => 'Jalurnya cukup menantang, tapi guide memberi arahan yang jelas. Saya merasa didampingi dengan baik.'
    ],
    [
        'nama' => 'Bagas Saputra',
        'wisata' => 'Niagara Mini',
        'rating' => 5,
        'ulasan' => 'Trip keluarga ke Niagara Mini berjalan lancar. Anak-anak senang, itinerary tidak terburu-buru, dan fotonya bagus.'
    ],
    [
        'nama' => 'Intan Permata',
        'wisata' => 'Bukit Megasari',
        'rating' => 5,
        'ulasan' => 'Pemandangan Bukit Megasari indah banget saat sore. Pelayanan terasa premium tapi tetap hangat.'
    ],
    [
        'nama' => 'Hendra Wijaya',
        'wisata' => 'Gunung Rante',
        'rating' => 5,
        'ulasan' => 'Gunung Rante punya view luar biasa. Semua kebutuhan trip dijelaskan dari awal, jadi tidak bingung saat berangkat.'
    ],
    [
        'nama' => 'Laras Anindya',
        'wisata' => 'Kawah Ijen',
        'rating' => 5,
        'ulasan' => 'Perjalanan ke Kawah Ijen terasa premium dan tertata. Waktu istirahat pas, guide informatif, dan view paginya luar biasa.'
    ],
    [
        'nama' => 'Arga Nugroho',
        'wisata' => 'Blue Fire',
        'rating' => 5,
        'ulasan' => 'Blue Fire jadi pengalaman paling berkesan. Semua diarahkan dengan tenang, dari persiapan alat sampai titik foto terbaik.'
    ],
    [
        'nama' => 'Citra Wulandari',
        'wisata' => 'Kawah Wurung',
        'rating' => 5,
        'ulasan' => 'Kawah Wurung indah dan tenang. Cocok untuk perjalanan santai, dan tim ZGentara Trip membuat suasananya sangat nyaman.'
    ],
    [
        'nama' => 'Yoga Firmansyah',
        'wisata' => 'Air Terjun Tancak Kembar',
        'rating' => 5,
        'ulasan' => 'Air terjunnya segar, rutenya aman, dan guide membantu menentukan spot foto yang bagus tanpa membuat trip terasa terburu-buru.'
    ],
    [
        'nama' => 'Putri Maharani',
        'wisata' => 'Bukit Teletubbies',
        'rating' => 5,
        'ulasan' => 'Trip singkat yang rapi dan menyenangkan. Bukit Teletubbies cocok untuk healing, apalagi saat langit cerah.'
    ],
    [
        'nama' => 'Rama Prakoso',
        'wisata' => 'Gunung Raung',
        'rating' => 5,
        'ulasan' => 'Pendakian terasa lebih percaya diri karena guide memahami medan. Arahan teknisnya jelas dan ritme jalannya pas.'
    ],
    [
        'nama' => 'Dea Kartika',
        'wisata' => 'Bukit Megasari',
        'rating' => 5,
        'ulasan' => 'Sore di Bukit Megasari cantik sekali. Layanannya responsif, itinerary jelas, dan hasil dokumentasinya memuaskan.'
    ],
    [
        'nama' => 'Ilham Maulana',
        'wisata' => 'Niagara Mini',
        'rating' => 5,
        'ulasan' => 'Niagara Mini ternyata cocok untuk trip santai. Semua kebutuhan dasar sudah dipikirkan, jadi tinggal menikmati perjalanan.'
    ],
    [
        'nama' => 'Nadya Safitri',
        'wisata' => 'Gunung Piramida',
        'rating' => 5,
        'ulasan' => 'Gunung Piramida menantang, tapi pengalaman tetap aman. Guide sabar menjelaskan jalur dan menjaga tempo rombongan.'
    ],
    [
        'nama' => 'Reza Andhika',
        'wisata' => 'Gunung Rante',
        'rating' => 5,
        'ulasan' => 'Paketnya jelas, komunikasi cepat, dan perjalanan ke Gunung Rante terasa matang. Cocok untuk yang ingin adventure serius.'
    ]
];
$testimoni = array_merge($defaultTestimonials, $testimoni);
$testimoni = array_slice($testimoni, 0, 20);
$batasTestimoniAwal = 5;
$destinationImageMap = [
    'Gunung Raung' => 'GunungRaung.png',
    'Gunung Piramida' => 'GunungPiramidaBondowoso.png',
    'Gunung Rante' => 'GunungRante.png',
    'Kawah Wurung' => 'KawahWurung.png',
    'Bukit Teletubbies' => 'BukitTeletubbies.png',
    'Air Terjun Tancak Kembar' => 'AirTerjunTancakKembar.png',
    'Niagara Mini' => 'NiagaraMiniBondowoso.png',
    'Kawah Ijen' => 'BlueFireIjenBondowoso.png',
    'Blue Fire Ijen' => 'BlueFireIjenBondowoso.png',
    'Bukit Megasari' => 'BukitMegasariParalayang.png'
];
$destinationFallbackImages = [
    'BukitTeletubbies.png',
    "BatuSo'onBondowoso.png",
    'NiagaraMiniBondowoso.png',
    'KawahWurung.png',
    'GunungRaung.png',
    'GunungRante.png',
    'GunungPiramidaBondowoso.png',
    'BukitMegasariParalayang.png',
    'AirTerjunTancakKembar.png',
    'BlueFireIjenBondowoso.png'
];
$teamImages = ['foto1.png', 'foto2.png', 'foto3.png', 'foto4.png', 'foto5.png'];
$bookingGuides = [
    [
        'id' => 'guide-1',
        'name' => 'ALFARO',
        'role' => 'Mountain Guide',
        'phone' => '6287781896510',
        'photo' => 'foto1.png',
        'trips' => ['Kawah Ijen', 'Gunung Raung'],
        'fullDates' => ['2026-05-01', '2026-05-09', '2026-05-19', '2026-05-23', '2026-05-30', '2026-06-07', '2026-06-14', '2026-06-21']
    ],
    [
        'id' => 'guide-2',
        'name' => 'IHSAN',
        'role' => 'Adventure Guide',
        'phone' => '6285854655200',
        'photo' => 'foto2.png',
        'trips' => ['Blue Fire Ijen', 'Gunung Piramida'],
        'fullDates' => ['2026-05-05', '2026-05-12', '2026-05-18', '2026-05-22', '2026-05-29', '2026-06-03', '2026-06-17', '2026-06-26']
    ],
    [
        'id' => 'guide-3',
        'name' => 'MAHSUM',
        'role' => 'Nature Explorer',
        'phone' => '6282237774608',
        'photo' => 'foto3.png',
        'trips' => ['Gunung Rante', 'Kawah Wurung'],
        'fullDates' => ['2026-05-07', '2026-05-15', '2026-05-21', '2026-05-28', '2026-06-04', '2026-06-15', '2026-06-24']
    ],
    [
        'id' => 'guide-4',
        'name' => 'DARA',
        'role' => 'Trip Navigator',
        'phone' => '6285707035170',
        'photo' => 'foto4.png',
        'trips' => ['Bukit Teletubbies', 'Niagara Mini'],
        'fullDates' => ['2026-05-11', '2026-05-19', '2026-05-22', '2026-06-08', '2026-06-18', '2026-06-29']
    ],
    [
        'id' => 'guide-5',
        'name' => 'REGITA',
        'role' => 'Camping Specialist',
        'phone' => '6285731348852',
        'photo' => 'foto5.png',
        'trips' => ['Air Terjun Tancak Kembar', 'Bukit Megasari'],
        'fullDates' => ['2026-05-03', '2026-05-17', '2026-05-24', '2026-05-31', '2026-06-06', '2026-06-20', '2026-06-27']
    ]
];
$bookingTrips = array_values(array_unique(array_merge(...array_column($bookingGuides, 'trips'))));
$bookingPackages = [
    ['id' => 'basic', 'name' => 'Basic', 'price' => 150000, 'label' => 'Basic - 150K'],
    ['id' => 'premium', 'name' => 'Premium', 'price' => 350000, 'label' => 'Premium - 350K'],
    ['id' => 'vip', 'name' => 'VIP', 'price' => 700000, 'label' => 'VIP - 700K']
];
?>

<?php #CONTOH HERO SECTION ?>
<section id="hero" class="hero">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="hero-title">
            Menjelajah Lebih Dari Sekadar Tempat Tujuan,<br>
            Dan Menemukan Perjalanan Yang Penuh Makna
        </h1>
        <a href="#jastrip" class="btn-hero-dynamic">MULAI PERJALANAN <span>&#10095;</span></a>
    </div>

    <div class="hero-wave" aria-hidden="true">
        <svg viewBox="0 0 1440 110" preserveAspectRatio="none">
            <path d="M0,64 C240,112 480,0 720,52 C960,104 1200,28 1440,72 L1440,110 L0,110 Z"></path>
        </svg>
    </div>
</section>

<?php #CONTOH FITUR SECTION ?>
<section id="fitur" class="section-container">
    <div class="section-shell">
        <div class="section-header">
            <span class="leaf-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt=""></span>
            <h2 class="title-line">TEMUKAN PERJALANAN TERBAIK</h2>
            <p class="subtitle">Kami menyediakan berbagai pilihan perjalanan yang dirancang untuk memberikan pengalaman tak terlupakan bagi Anda.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon-circle">
                    <img src="assets/icons/IconGunung.png" alt="Gunung" class="feature-icon-img">
                </div>
                <h4>DESTINASI PILIHAN</h4>
                <p>Berbagai destinasi menarik dan eksotis di seluruh Indonesia</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon-circle">
                    <img src="assets/icons/IconKalender.png" alt="Kalender" class="feature-icon-img">
                </div>
                <h4>BOOKING MUDAH</h4>
                <p>Proses pemesanan cepat, aman, dan praktis</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon-circle">
                    <img src="assets/icons/IconPelindung.png" alt="Pelindung" class="feature-icon-img">
                </div>
                <h4>AMAN & TERPERCAYA</h4>
                <p>Keamanan dan kenyamanan Anda adalah prioritas kami</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon-circle">
                    <img src="assets/icons/IconHeadphone.png" alt="Headphone" class="feature-icon-img">
                </div>
                <h4>LAYANAN 24/7</h4>
                <p>Tim kami siap membantu Anda kapanpun dan dimanapun</p>
            </div>
        </div>
    </div>
</section>

<?php #CONTOH DESTINASI POPULER ?>
<section id="jastrip" class="section-container destination-section">
    <div class="section-shell">
        <div class="section-header">
            <span class="leaf-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt=""></span>
            <h2 class="title-line">DESTINASI POPULER</h2>
        </div>

        <form action="#jastrip" method="GET" class="search-filter-form">
            <div class="search-container">
                <input type="text" name="search" class="search-input" placeholder="Ketik pencarian (misal: Raung, Kopi)..." value="<?= htmlspecialchars($aktifSearch); ?>">
                <button type="submit" class="btn-search-submit">Cari</button>
            </div>

            <div class="filter-container">
                <button type="submit" name="vibe" value="all" class="filter-btn <?= ($aktifVibe === 'all') ? 'active' : ''; ?>">Semua Vibe</button>
                <button type="submit" name="vibe" value="Hardcore Adventure" class="filter-btn <?= ($aktifVibe === 'Hardcore Adventure') ? 'active' : ''; ?>">Hardcore Adventure</button>
                <button type="submit" name="vibe" value="Chill & Healing" class="filter-btn <?= ($aktifVibe === 'Chill & Healing') ? 'active' : ''; ?>">Chill & Healing</button>
                <button type="submit" name="vibe" value="Golden Hour Spot" class="filter-btn <?= ($aktifVibe === 'Golden Hour Spot') ? 'active' : ''; ?>">Golden Hour Spot</button>
            </div>
        </form>

        <div class="card-grid">
            <?php if (empty($destinasi_tampil)) : ?>
                <p class="empty-message">Destinasi tidak ditemukan. Coba kata kunci lain.</p>
            <?php else : ?>
                <?php foreach ($destinasi_tampil as $loopIndex => $trip) : ?>
                    <?php
                    $namaTrip = $trip['nama'] ?? 'Destinasi';
                    $fotoTrip = $destinationImageMap[$namaTrip] ?? ($trip['foto'] ?? '');
                    if ($fotoTrip === '' || !file_exists('assets/images/' . $fotoTrip)) {
                        $fotoTrip = $destinationFallbackImages[$loopIndex % count($destinationFallbackImages)] ?? 'KawahWurung.png';
                    }
                    $vibeTrip = $trip['vibe'] ?? 'Travel';
                    $deskripsiTrip = $trip['deskripsi'] ?? '';
                    ?>
                    <article class="card trip-card booking-trip-trigger" tabindex="0" role="button" aria-label="Booking <?= htmlspecialchars($namaTrip); ?>" data-trip="<?= htmlspecialchars($namaTrip); ?>" data-image="<?= htmlspecialchars($assetBase); ?>/images/<?= htmlspecialchars($fotoTrip); ?>">
                        <div class="card-img">
                            <img src="<?= htmlspecialchars($assetBase); ?>/images/<?= htmlspecialchars($fotoTrip); ?>" alt="<?= htmlspecialchars($namaTrip); ?>">
                        </div>
                        <div class="card-content">
                            <span class="vibe-tag"><?= htmlspecialchars($vibeTrip); ?></span>
                            <h3><?= htmlspecialchars($namaTrip); ?></h3>
                            <p><?= htmlspecialchars($deskripsiTrip); ?></p>
                            <div class="card-bottom">
                                <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                <span class="rating-num">4.9</span>
                                <span class="card-booking-chip">Booking</span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!$is_show_all && count($jastrip) > 4) : ?>
            <?php
            $params = $_GET;
            $params['show_all'] = 'true';
            $target_url = '?' . http_build_query($params) . '#jastrip';
            ?>
            <div class="action-center">
                <a href="<?= htmlspecialchars($target_url); ?>" class="btn-primary-green">LIHAT SEMUA DESTINASI <span>&#10095;</span></a>
            </div>
        <?php elseif ($is_show_all) : ?>
            <?php
            $params = $_GET;
            unset($params['show_all']);
            $target_url = '?' . http_build_query($params) . '#jastrip';
            ?>
            <div class="action-center">
                <a href="<?= htmlspecialchars($target_url); ?>" class="btn-primary-green">TAMPILKAN LEBIH SEDIKIT <span>&#10095;</span></a>
            </div>
        <?php endif; ?>
    </div>
</section>

<section id="booking-trip" class="booking-section" aria-hidden="true">
    <div class="booking-modal-backdrop" data-close-booking></div>
    <div class="booking-shell">
        <div class="booking-panel">
            <button type="button" class="booking-close" data-close-booking aria-label="Tutup booking">&times;</button>
            <div class="booking-heading">
                <span class="booking-kicker">Premium Trip Booking</span>
                <h2>Booking ZGentara Trip</h2>
                <p>Isi data booking untuk mengunci jadwal perjalanan kamu.</p>
                <button type="button" class="booking-price-btn" id="openPriceList">Lihat Price List</button>
            </div>

            <div class="booking-selected-card">
                <div class="booking-selected-image">
                    <img src="<?= htmlspecialchars($assetBase); ?>/images/BlueFireIjenBondowoso.png" alt="Wisata dipilih" id="bookingTripImage">
                </div>
                <div class="booking-selected-info">
                    <span>Wisata dipilih</span>
                    <h3 id="bookingTripTitle">Pilih Wisata</h3>
                    <p id="bookingTripGuide">Guide akan otomatis mengikuti wisata.</p>
                </div>
                <div class="booking-guide-mini">
                    <img src="<?= htmlspecialchars($assetBase); ?>/images/foto1.png" alt="Guide" id="bookingGuidePhoto">
                    <div>
                        <strong id="bookingGuideName">-</strong>
                        <small id="bookingGuidePhone">Nomor WhatsApp guide</small>
                    </div>
                </div>
            </div>

            <div class="booking-progress" aria-label="Progress booking">
                <span class="booking-progress-fill" id="bookingProgressFill"></span>
            </div>

            <form class="booking-form" id="bookingForm">
                <div class="booking-step active" data-step="1">
                    <h3>Data Diri</h3>
                    <div class="booking-field">
                        <label for="bookingName">Nama Lengkap</label>
                        <input type="text" id="bookingName" name="nama" autocomplete="name" required>
                    </div>
                    <div class="booking-field">
                        <label for="bookingCity">Domisili</label>
                        <select id="bookingCity" name="domisili" required>
                            <option value="">Pilih Domisili</option>
                            <option>Bangkalan</option>
                            <option>Banyuwangi</option>
                            <option>Batu</option>
                            <option>Blitar</option>
                            <option>Bojonegoro</option>
                            <option>Bondowoso</option>
                            <option>Gresik</option>
                            <option>Jember</option>
                            <option>Jombang</option>
                            <option>Kediri</option>
                            <option>Kota Blitar</option>
                            <option>Kota Kediri</option>
                            <option>Kota Madiun</option>
                            <option>Kota Malang</option>
                            <option>Kota Mojokerto</option>
                            <option>Kota Pasuruan</option>
                            <option>Kota Probolinggo</option>
                            <option>Lamongan</option>
                            <option>Lumajang</option>
                            <option>Madiun</option>
                            <option>Magetan</option>
                            <option>Malang</option>
                            <option>Mojokerto</option>
                            <option>Nganjuk</option>
                            <option>Ngawi</option>
                            <option>Pacitan</option>
                            <option>Pamekasan</option>
                            <option>Pasuruan</option>
                            <option>Ponorogo</option>
                            <option>Probolinggo</option>
                            <option>Sampang</option>
                            <option>Sidoarjo</option>
                            <option>Situbondo</option>
                            <option>Sumenep</option>
                            <option>Surabaya</option>
                            <option>Trenggalek</option>
                            <option>Tuban</option>
                            <option>Tulungagung</option>
                            <option>Luar Jawa Timur</option>
                        </select>
                    </div>
                    <div class="booking-field">
                        <label for="bookingAddress">Alamat</label>
                        <textarea id="bookingAddress" name="alamat" rows="4" required></textarea>
                    </div>
                    <div class="booking-field">
                        <label for="bookingWhatsapp">Nomor WhatsApp</label>
                        <input type="tel" id="bookingWhatsapp" name="whatsapp" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <button type="button" class="booking-next" data-next-step>Lanjut</button>
                </div>

                <div class="booking-step" data-step="2">
                    <h3>Detail Event</h3>
                    <div class="booking-field">
                        <label for="bookingTrip">Pilih Wisata</label>
                        <select id="bookingTrip" name="wisata" required>
                            <option value="">Pilih Wisata</option>
                            <?php foreach ($bookingTrips as $tripName) : ?>
                                <?php $tripOptionImage = $destinationImageMap[$tripName] ?? 'KawahWurung.png'; ?>
                                <option value="<?= htmlspecialchars($tripName); ?>" data-image="<?= htmlspecialchars($assetBase); ?>/images/<?= htmlspecialchars($tripOptionImage); ?>"><?= htmlspecialchars($tripName); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="booking-field">
                        <label for="bookingGuide">Guide Otomatis</label>
                        <select id="bookingGuide" name="guide" required>
                            <option value="">Pilih wisata terlebih dahulu</option>
                        </select>
                        <small id="bookingGuideNote">Guide akan muncul otomatis sesuai wisata yang dipilih.</small>
                    </div>
                    <div class="booking-field">
                        <label for="bookingPackage">Pilih Paket Trip</label>
                        <select id="bookingPackage" name="paket" required>
                            <?php foreach ($bookingPackages as $package) : ?>
                                <option value="<?= htmlspecialchars($package['id']); ?>" data-price="<?= (int) $package['price']; ?>"><?= htmlspecialchars($package['label']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="booking-actions">
                        <button type="button" class="booking-prev" data-prev-step>Kembali</button>
                        <button type="button" class="booking-next" data-next-step>Lanjut</button>
                    </div>
                </div>

                <div class="booking-step" data-step="3">
                    <h3>Jadwal</h3>
                    <div class="booking-date-controls">
                        <div class="booking-field">
                            <label for="bookingMonth">Pilih Bulan</label>
                            <select id="bookingMonth" name="bulan"></select>
                        </div>
                        <div class="booking-field">
                            <label for="bookingYear">Pilih Tahun</label>
                            <select id="bookingYear" name="tahun"></select>
                        </div>
                    </div>
                    <div class="booking-date-display" id="bookingDateDisplay">Pilih tanggal dari kalender</div>
                    <div class="booking-calendar" id="bookingCalendar" aria-label="Kalender booking"></div>
                    <div class="booking-legend">
                        <span><i class="legend-full"></i> Full</span>
                        <span><i class="legend-ready"></i> Tersedia</span>
                    </div>
                    <p class="booking-status" id="bookingStatus">Tanggal dengan outline merah sudah penuh dan tidak dapat dipilih.</p>
                    <div class="booking-actions">
                        <button type="button" class="booking-prev" data-prev-step>Kembali</button>
                        <button type="button" class="booking-next" data-next-step>Lanjut</button>
                    </div>
                </div>

                <div class="booking-step" data-step="4">
                    <h3>Konfirmasi Booking</h3>
                    <div class="booking-summary" id="bookingSummary"></div>
                    <div class="booking-actions">
                        <button type="button" class="booking-prev" data-prev-step>Kembali</button>
                        <a class="booking-whatsapp" id="bookingWhatsappLink" href="#" target="_blank" rel="noopener">Booking Sekarang</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="price-modal" id="priceModal" aria-hidden="true">
        <div class="price-modal-backdrop" data-close-price></div>
        <div class="price-modal-card" role="dialog" aria-modal="true" aria-labelledby="priceModalTitle">
            <button type="button" class="price-modal-close" data-close-price aria-label="Tutup price list">&times;</button>
            <span class="booking-kicker">Price List</span>
            <h3 id="priceModalTitle">Pilih Paket Trip</h3>
            <div class="price-grid">
                <article class="price-card">
                    <h4>Paket Basic</h4>
                    <strong>150K</strong>
                    <p>Trip hemat dengan guide, briefing rute, dan dokumentasi ringan.</p>
                </article>
                <article class="price-card featured">
                    <h4>Paket Premium</h4>
                    <strong>350K</strong>
                    <p>Paket favorit dengan itinerary lebih rapi, guide prioritas, dan dokumentasi.</p>
                </article>
                <article class="price-card">
                    <h4>Paket VIP</h4>
                    <strong>700K</strong>
                    <p>Pengalaman privat dengan jadwal fleksibel, support lengkap, dan service premium.</p>
                </article>
            </div>
        </div>
    </div>
</section>

<?php #CONTOH ALASAN MEMILIH ?>
<section class="why-section">
    <img src="<?= htmlspecialchars($assetBase); ?>/icons/daun.png" alt="" class="decor-leaf decor-leaf-left" aria-hidden="true">
    <img src="<?= htmlspecialchars($assetBase); ?>/icons/daun.png" alt="" class="decor-leaf decor-leaf-right" aria-hidden="true">
    <div class="section-shell">
        <div class="section-header">
            <span class="leaf-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt=""></span>
            <h2 class="title-line">MENGAPA MEMILIH KAMI?</h2>
        </div>

        <div class="reason-grid">
            <div class="reason-box">
                <div class="circle-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/IconPelindung.png" alt="" class="reason-icon-img"></div>
                <h4>Berpengalaman</h4>
                <p>Kami telah melayani ribuan pelanggan dengan pengalaman perjalanan terbaik.</p>
            </div>
            <div class="reason-box">
                <div class="circle-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/IconKalender.png" alt="" class="reason-icon-img"></div>
                <h4>Harga Terjangkau</h4>
                <p>Harga kompetitif dengan kualitas layanan dan fasilitas terbaik.</p>
            </div>
            <div class="reason-box">
                <div class="circle-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/IconGunung.png" alt="" class="reason-icon-img"></div>
                <h4>Paket Lengkap</h4>
                <p>Paket perjalanan lengkap mulai dari transportasi, akomodasi, hingga itinerary.</p>
            </div>
            <div class="reason-box">
                <div class="circle-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/IconHeadphone.png" alt="" class="reason-icon-img"></div>
                <h4>Tim Profesional</h4>
                <p>Didukung oleh tim profesional dan berpengalaman di bidang pariwisata.</p>
            </div>
        </div>

        <div class="promo-banner">
            <div class="promo-info">
                <h2>Jelajahi Keindahan Indonesia<br><span>Bersama ZGentara Trip</span></h2>
                <p>Dapatkan pengalaman perjalanan tak terlupakan dengan paket terbaik dan pelayanan istimewa.</p>
                <a href="#jastrip" class="btn-white">LIHAT PROMO <span>&#10095;</span></a>
            </div>
            <div class="promo-frame">
                <div class="foto-frame frame-1">
                    <img src="<?= htmlspecialchars($assetBase); ?>/images/KawahWurung.png" alt="Promo Kawah Wurung">
                </div>
                <div class="foto-frame frame-2">
                    <img src="<?= htmlspecialchars($assetBase); ?>/images/BlueFireIjenBondowoso.png" alt="Promo Blue Fire Ijen">
                </div>
            </div>
        </div>
    </div>
</section>

<?php #CONTOH TENTANG KAMI ?>
<section id="tentang" class="section-container about-section">
    <div class="section-shell">
        <div class="section-header">
            <span class="leaf-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt=""></span>
            <h2 class="title-line">TENTANG KAMI</h2>
        </div>
        <p class="about-text">
            <?= htmlspecialchars($tentang['deskripsi'] ?? ''); ?>
        </p>

        <div class="team-grid">
            <?php foreach ($bookingGuides as $guide) : ?>
                <article class="team-card">
                    <img src="<?= htmlspecialchars($assetBase); ?>/images/<?= htmlspecialchars($guide['photo']); ?>" alt="<?= htmlspecialchars($guide['name']); ?>">
                    <h4><?= htmlspecialchars($guide['name']); ?></h4>
                    <p class="jabatan"><?= htmlspecialchars($guide['role']); ?></p>
                    <p class="guide-trip-list"><?= htmlspecialchars(implode(' & ', $guide['trips'])); ?></p>
                    <a href="#jastrip" class="guide-trip-btn">Lihat Wisata</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php #CONTOH TESTIMONI ?>
<section id="testimoni" class="section-container testimonial-section">
    <div class="section-shell">
        <div class="section-header">
            <span class="leaf-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt=""></span>
            <h2 class="title-line">TESTIMONI PELANGGAN</h2>
        </div>

        <input type="checkbox" id="testimonialToggle" class="testimonial-toggle-checkbox" aria-label="Tampilkan semua testimoni">

        <div class="testi-grid" id="testimonialGrid">
            <?php if (empty($testimoni)) : ?>
                <p class="empty-message">Belum ada testimoni pelanggan.</p>
            <?php else : ?>
                <?php foreach ($testimoni as $testi) : ?>
                    <?php
                    #CONTOH TESTIMONI CARD
                    $ratingTesti = max(1, min(5, (int)($testi['rating'] ?? 5)));
                    $wisataTesti = $testi['wisata'] ?? 'ZGentara Trip';
                    ?>
                    <article class="testi-card">
                        <span class="quote-mark">&#10077;</span>
                        <p class="quote"><?= htmlspecialchars($testi['ulasan'] ?? ''); ?></p>
                        <span class="testi-trip"><?= htmlspecialchars($wisataTesti); ?></span>
                        <div class="client-info">
                            <div class="avatar">&#128100;</div>
                            <div>
                                <h4><?= htmlspecialchars($testi['nama'] ?? 'Pelanggan'); ?></h4>
                                <span>Pelanggan</span>
                            </div>
                            <span class="stars-right"><?= str_repeat('&#9733;', $ratingTesti); ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (count($testimoni) > $batasTestimoniAwal) : ?>
            <div class="action-center testimonial-action">
                <label for="testimonialToggle" class="btn-primary-green btn-testimonial-toggle">
                    <span class="toggle-label-more">LIHAT SEMUA TESTIMONI</span>
                    <span class="toggle-label-less">TAMPILKAN SEDIKIT</span>
                    <span>&#10095;</span>
                </label>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php #CONTOH SARAN DAN KRITIK ?>
<section id="saran" class="section-container form-section">
    <div class="section-shell">
        <div class="section-header">
            <span class="leaf-icon"><img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt=""></span>
            <h2 class="title-line">SARAN & KRITIK</h2>
            <p class="subtitle">Bagikan pengalaman, masukan, atau pertanyaan agar layanan ZGentara Trip semakin baik.</p>
        </div>
        <div class="form-card">
            <div class="form-container">
                <form action="" method="POST" id="saranForm">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                    <input type="email" name="email" placeholder="Alamat Email" required>
                    <textarea name="pesan" rows="5" placeholder="Tuliskan pengalaman atau saranmu untuk ZGentara Trip..." required></textarea>
                    <button type="submit">Kirim Masukan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php #CONTOH CTA FOOTER ATAS ?>
<section class="cta-banner">
    <div class="cta-inner">
        <div class="cta-text">
            <span class="headphone">&#127911;</span>
            <div>
                <h3>Siap untuk petualanganmu berikutnya?</h3>
                <p>Hubungi kami sekarang dan wujudkan perjalanan impianmu!</p>
            </div>
        </div>
        <a href="mailto:zgentaratrip@gmail.com" class="btn-gold-cta">&#9993; HUBUNGI KAMI SEKARANG</a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const bookingGuides = <?= json_encode($bookingGuides, JSON_UNESCAPED_UNICODE); ?>;
    const bookingPackages = <?= json_encode($bookingPackages, JSON_UNESCAPED_UNICODE); ?>;
    const assetBase = <?= json_encode($assetBase, JSON_UNESCAPED_UNICODE); ?>;
    const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const shortDays = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const steps = Array.from(document.querySelectorAll('.booking-step'));
    const bookingModal = document.getElementById('booking-trip');
    const closeBookingButtons = document.querySelectorAll('[data-close-booking]');
    const tripTriggers = document.querySelectorAll('.booking-trip-trigger');
    const progressFill = document.getElementById('bookingProgressFill');
    const tripSelect = document.getElementById('bookingTrip');
    const guideSelect = document.getElementById('bookingGuide');
    const guideNote = document.getElementById('bookingGuideNote');
    const packageSelect = document.getElementById('bookingPackage');
    const monthSelect = document.getElementById('bookingMonth');
    const yearSelect = document.getElementById('bookingYear');
    const calendar = document.getElementById('bookingCalendar');
    const dateDisplay = document.getElementById('bookingDateDisplay');
    const statusText = document.getElementById('bookingStatus');
    const summary = document.getElementById('bookingSummary');
    const whatsappLink = document.getElementById('bookingWhatsappLink');
    const tripImage = document.getElementById('bookingTripImage');
    const tripTitle = document.getElementById('bookingTripTitle');
    const tripGuide = document.getElementById('bookingTripGuide');
    const guidePhoto = document.getElementById('bookingGuidePhoto');
    const guideName = document.getElementById('bookingGuideName');
    const guidePhone = document.getElementById('bookingGuidePhone');
    const priceModal = document.getElementById('priceModal');
    const openPriceList = document.getElementById('openPriceList');
    const closePriceButtons = document.querySelectorAll('[data-close-price]');
    let activeStep = 1;
    let selectedDate = '';

    function pad(value) {
        return String(value).padStart(2, '0');
    }

    function toDateKey(year, month, day) {
        return year + '-' + pad(month + 1) + '-' + pad(day);
    }

    function formatDateId(dateKey) {
        if (!dateKey) {
            return 'Pilih tanggal dari kalender';
        }
        const parts = dateKey.split('-').map(Number);
        return parts[2] + ' ' + monthNames[parts[1] - 1] + ' ' + parts[0];
    }

    function formatRupiah(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(value);
    }

    function getSelectedGuide() {
        return bookingGuides.find(function (guide) {
            return guide.id === guideSelect.value;
        });
    }

    function getGuideByTrip(tripName) {
        return bookingGuides.find(function (guide) {
            return guide.trips.includes(tripName);
        });
    }

    function getSelectedPackage() {
        return bookingPackages.find(function (item) {
            return item.id === packageSelect.value;
        }) || bookingPackages[0];
    }

    function showStep(stepNumber) {
        activeStep = stepNumber;
        steps.forEach(function (step) {
            step.classList.toggle('active', Number(step.dataset.step) === activeStep);
        });
        progressFill.style.width = (activeStep * 25) + '%';
        if (activeStep === 3) {
            renderCalendar();
        }
        if (activeStep === 4) {
            renderSummary();
        }
    }

    function openBookingModal(tripName, imageUrl) {
        bookingModal.classList.add('active');
        bookingModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('booking-modal-open');
        if (tripName) {
            tripSelect.value = tripName;
            updateGuideOptions(imageUrl);
        }
        showStep(1);
    }

    function closeBookingModal() {
        bookingModal.classList.remove('active');
        bookingModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('booking-modal-open');
    }

    function validateStep(stepNumber) {
        const currentStep = document.querySelector('.booking-step[data-step="' + stepNumber + '"]');
        const fields = Array.from(currentStep.querySelectorAll('input, select, textarea'));
        for (const field of fields) {
            if (!field.checkValidity()) {
                field.reportValidity();
                return false;
            }
        }
        if (stepNumber === 3 && selectedDate === '') {
            statusText.textContent = 'Pilih satu tanggal tersedia sebelum melanjutkan.';
            statusText.classList.add('error');
            return false;
        }
        statusText.classList.remove('error');
        return true;
    }

    function updateSelectedPreview(imageOverride) {
        const selectedTrip = tripSelect.value;
        const selectedGuide = getSelectedGuide();
        const selectedOption = tripSelect.options[tripSelect.selectedIndex];
        const imageUrl = imageOverride || (selectedOption ? selectedOption.dataset.image : '');

        tripTitle.textContent = selectedTrip || 'Pilih Wisata';
        if (imageUrl) {
            tripImage.src = imageUrl;
            tripImage.alt = selectedTrip || 'Wisata dipilih';
        }

        if (selectedGuide) {
            tripGuide.textContent = selectedGuide.name + ' - ' + selectedGuide.role;
            guidePhoto.src = assetBase + '/images/' + selectedGuide.photo;
            guidePhoto.alt = selectedGuide.name;
            guideName.textContent = selectedGuide.name;
            guidePhone.textContent = selectedGuide.phone;
        } else {
            tripGuide.textContent = 'Guide akan otomatis mengikuti wisata.';
            guidePhoto.src = assetBase + '/images/foto1.png';
            guideName.textContent = '-';
            guidePhone.textContent = 'Nomor WhatsApp guide';
        }
    }

    function updateGuideOptions(imageOverride) {
        const selectedTrip = tripSelect.value;
        const selectedGuide = getGuideByTrip(selectedTrip);

        guideSelect.innerHTML = '';
        selectedDate = '';
        dateDisplay.textContent = formatDateId('');

        if (!selectedTrip || !selectedGuide) {
            guideSelect.innerHTML = '<option value="">Pilih wisata terlebih dahulu</option>';
            guideNote.textContent = 'Guide akan muncul otomatis sesuai wisata yang dipilih.';
            updateSelectedPreview(imageOverride);
            renderCalendar();
            return;
        }

        const option = document.createElement('option');
        option.value = selectedGuide.id;
        option.textContent = selectedGuide.name + ' - ' + selectedGuide.role;
        option.selected = true;
        guideSelect.appendChild(option);
        guideNote.textContent = selectedGuide.name + ' menangani ' + selectedGuide.trips.join(' dan ') + '.';
        updateSelectedPreview(imageOverride);
        renderCalendar();
    }

    function buildMonthYearOptions() {
        const currentMonth = today.getMonth();
        const currentYear = today.getFullYear();

        monthNames.forEach(function (month, index) {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = month;
            option.selected = index === currentMonth;
            monthSelect.appendChild(option);
        });

        for (let year = currentYear; year <= currentYear + 2; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            option.selected = year === currentYear;
            yearSelect.appendChild(option);
        }
    }

    function renderCalendar() {
        const year = Number(yearSelect.value || today.getFullYear());
        const month = Number(monthSelect.value || today.getMonth());
        const selectedGuide = getSelectedGuide();
        const fullDates = selectedGuide ? selectedGuide.fullDates : [];
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendar.innerHTML = '';
        shortDays.forEach(function (day) {
            const header = document.createElement('div');
            header.className = 'booking-calendar-day booking-calendar-head';
            header.textContent = day;
            calendar.appendChild(header);
        });

        for (let blank = 0; blank < firstDay; blank++) {
            const empty = document.createElement('div');
            empty.className = 'booking-calendar-day empty';
            calendar.appendChild(empty);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const key = toDateKey(year, month, day);
            const dateObject = new Date(year, month, day);
            const isFull = fullDates.includes(key);
            const isPast = dateObject < today;
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'booking-calendar-day booking-date';
            button.textContent = day;
            button.dataset.date = key;

            if (isFull) {
                button.classList.add('full');
                button.disabled = true;
                button.title = 'FULL';
            } else if (isPast) {
                button.classList.add('past');
                button.disabled = true;
                button.title = 'Tanggal sudah lewat';
            } else {
                button.classList.add('ready');
                button.title = 'TERSEDIA';
            }

            if (selectedDate === key) {
                button.classList.add('selected');
            }

            button.addEventListener('click', function () {
                selectedDate = key;
                dateDisplay.textContent = formatDateId(selectedDate);
                statusText.textContent = 'Tanggal ' + formatDateId(selectedDate) + ' tersedia untuk ' + (selectedGuide ? selectedGuide.name : 'guide pilihan') + '.';
                statusText.classList.remove('error');
                renderCalendar();
            });

            calendar.appendChild(button);
        }
    }

    function renderSummary() {
        const selectedGuide = getSelectedGuide();
        const selectedPackage = getSelectedPackage();
        const values = {
            nama: document.getElementById('bookingName').value.trim(),
            domisili: document.getElementById('bookingCity').value,
            alamat: document.getElementById('bookingAddress').value.trim(),
            whatsapp: document.getElementById('bookingWhatsapp').value.trim(),
            wisata: tripSelect.value,
            guide: selectedGuide ? selectedGuide.name + ' - ' + selectedGuide.role : '-',
            paket: selectedPackage.name,
            tanggal: formatDateId(selectedDate),
            total: formatRupiah(selectedPackage.price)
        };

        const summaryRows = [
            ['Nama', values.nama],
            ['Domisili', values.domisili],
            ['WhatsApp', values.whatsapp],
            ['Wisata', values.wisata],
            ['Guide', values.guide],
            ['Nomor Guide', selectedGuide ? selectedGuide.phone : '-'],
            ['Tanggal Booking', values.tanggal],
            ['Paket Trip', values.paket],
            ['Total Harga', values.total]
        ];
        summary.innerHTML = '';
        summaryRows.forEach(function (row) {
            const item = document.createElement('div');
            const label = document.createElement('span');
            const value = document.createElement('strong');
            label.textContent = row[0];
            value.textContent = row[1];
            item.appendChild(label);
            item.appendChild(value);
            summary.appendChild(item);
        });

        const message = [
            'Halo Guide ' + (selectedGuide ? selectedGuide.name : ''),
            '',
            'Saya ingin melakukan booking trip.',
            '',
            'Data Booking:',
            '- Nama: ' + values.nama,
            '- Domisili: ' + values.domisili,
            '- Nomor WhatsApp: ' + values.whatsapp,
            '- Wisata: ' + values.wisata,
            '- Paket: ' + values.paket,
            '- Tanggal Booking: ' + values.tanggal,
            '',
            'Mohon informasi lebih lanjut 🙌'
        ].join('\n');
        whatsappLink.href = 'https://wa.me/' + (selectedGuide ? selectedGuide.phone : '') + '?text=' + encodeURIComponent(message);
    }

    document.querySelectorAll('[data-next-step]').forEach(function (button) {
        button.addEventListener('click', function () {
            if (validateStep(activeStep)) {
                showStep(Math.min(activeStep + 1, 4));
            }
        });
    });

    document.querySelectorAll('[data-prev-step]').forEach(function (button) {
        button.addEventListener('click', function () {
            showStep(Math.max(activeStep - 1, 1));
        });
    });

    tripTriggers.forEach(function (card) {
        card.addEventListener('click', function () {
            openBookingModal(card.dataset.trip, card.dataset.image);
        });
        card.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openBookingModal(card.dataset.trip, card.dataset.image);
            }
        });
    });

    document.querySelectorAll('a[href="#booking-trip"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            openBookingModal(tripSelect.value || 'Kawah Ijen');
        });
    });

    closeBookingButtons.forEach(function (button) {
        button.addEventListener('click', closeBookingModal);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeBookingModal();
            priceModal.classList.remove('active');
            priceModal.setAttribute('aria-hidden', 'true');
        }
    });

    tripSelect.addEventListener('change', function () {
        updateGuideOptions();
    });
    guideSelect.addEventListener('change', function () {
        selectedDate = '';
        dateDisplay.textContent = formatDateId('');
        updateSelectedPreview();
        renderCalendar();
    });
    monthSelect.addEventListener('change', function () {
        selectedDate = '';
        dateDisplay.textContent = formatDateId('');
        renderCalendar();
    });
    yearSelect.addEventListener('change', function () {
        selectedDate = '';
        dateDisplay.textContent = formatDateId('');
        renderCalendar();
    });

    openPriceList.addEventListener('click', function () {
        priceModal.classList.add('active');
        priceModal.setAttribute('aria-hidden', 'false');
    });

    closePriceButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            priceModal.classList.remove('active');
            priceModal.setAttribute('aria-hidden', 'true');
        });
    });

    buildMonthYearOptions();
    updateGuideOptions();
    showStep(1);
});
</script>
