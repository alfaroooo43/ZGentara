<?php
$assetBase = $data['asset_base'] ?? '../assets';
?>
</main>

<?php #CONTOH FOOTER SECTION ?>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-brand-col">
            <h3>
                <span class="footer-brand-logos" aria-hidden="true">
                    <img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt="" class="footer-logo-img">
                    <img src="<?= htmlspecialchars($assetBase); ?>/icons/LambangBondowoso.png" alt="" class="footer-logo-img footer-logo-bondowoso">
                </span>
                <span>ZGentara Trip</span>
            </h3>
            <p>Menyediakan pengalaman perjalanan terbaik untuk menjelajahi keindahan Indonesia yang tak terlupakan.</p>
        </div>

        <div class="footer-col">
            <h4>MENU</h4>
            <ul>
                <li><a href="#hero">Beranda</a></li>
                <li><a href="#jastrip">Booking</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#tentang">Tentang Kami</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>LAYANAN</h4>
            <ul>
                <li><a href="#jastrip">Paket Wisata</a></li>
                <li><a href="#jastrip">Sewa Mobil</a></li>
                <li><a href="#jastrip">Tiket Pesawat</a></li>
                <li><a href="#jastrip">Hotel</a></li>
            </ul>
        </div>

        <?php #CONTOH FOOTER KONTAK ?>
        <div class="footer-col contact-col">
            <h4>KONTAK</h4>
            <p>&#9993; zgentaratrip@gmail.com</p>
            <p class="contact-address">
                <span>&#9873;</span>
                <span>Bondowoso<br>Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur</span>
            </p>
        </div>
    </div>

    <div class="footer-copyright">
        <p>&copy; 2026 ZGentara Trip. All rights reserved.</p>
        <div class="legal-links">
            <a href="#">Kebijakan Privasi</a> | <a href="#">Syarat & Ketentuan</a>
        </div>
    </div>
</footer>

</body>
</html>
