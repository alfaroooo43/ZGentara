<?php
/*
|--------------------------------------------------------------------------
| FOOTER VIEW DATA
|--------------------------------------------------------------------------
| Menyiapkan path asset untuk logo footer tanpa mengubah struktur konten.
|
*/
$assetBase = $data['asset_base'] ?? '../assets';
?>
<!-- ==============================
     MAIN CONTENT END
     Penutup area konten utama sebelum footer global.
================================== -->
</main>

<?php #CONTOH FOOTER SECTION ?>
<!-- ==============================
     FOOTER WEBSITE
     Berisi identitas brand, menu ringkas, kontak, dan legal links.
================================== -->
<footer class="site-footer">
    <div class="footer-container">
        <!-- Identitas brand footer: dua logo dan deskripsi singkat ZGentara Trip. -->
        <div class="footer-brand-col">
            <h3>
                <span class="footer-brand-logos" aria-hidden="true">
                    <img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt="" class="footer-logo-img">
                    <img src="<?= htmlspecialchars($assetBase); ?>/icons/LambangBondowoso.png" alt="" class="footer-logo-img footer-logo-bondowoso">
                </span>
                <span>ZGentara Trip</span>
            </h3>
            <p>Menyediakan pengalaman perjalanan terbaik untuk menjelajahi keindahan Indonesia.</p>
        </div>

        <!-- Menu footer dibuat ringkas agar navigasi bawah tetap clean. -->
        <div class="footer-col">
            <h4>MENU</h4>
            <ul>
                <li><a href="#hero">Beranda</a></li>
                <li><a href="#jastrip">Booking</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
            </ul>
        </div>

        <?php #CONTOH FOOTER KONTAK ?>
        <!-- Informasi kontak utama yang dipakai pengunjung untuk menghubungi admin. -->
        <div class="footer-col contact-col">
            <h4>KONTAK</h4>
            <p>&#9993; zgentaratrip@gmail.com</p>
            <p class="contact-address">
                <span>&#9873;</span>
                <span>Bondowoso<br>Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur</span>
            </p>
        </div>
    </div>

    <!-- Bar copyright dan link legal berada di bagian paling bawah footer. -->
    <div class="footer-copyright">
        <p>&copy; 2026 ZGentara Trip. All rights reserved.</p>
        <div class="legal-links">
            <a href="#">Kebijakan Privasi</a> | <a href="#">Syarat & Ketentuan</a>
        </div>
    </div>
</footer>

</body>
</html>
