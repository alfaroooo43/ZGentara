<?php
$pageTitle = $data['title'] ?? 'ZGentara Trip';
$assetBase = $data['asset_base'] ?? '../assets';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle); ?></title>
    <meta property="og:title" content="ZGentara Trip | Jelajahi Keindahan Indonesia">
    <meta property="og:description" content="Website travel premium untuk booking wisata alam, open trip, healing, dan adventure terbaik di Indonesia bersama ZGentara Trip.">
    <meta property="og:image" content="https://zgentara.vercel.app/assets/images/BagroundHeader.png">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://zgentara.vercel.app/">
    <link rel="icon" type="image/png" href="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png">
    <link rel="stylesheet" href="<?= htmlspecialchars($assetBase); ?>/css/style.css?v=20260524">
</head>
<body>

<header class="main-header">
    <div class="header-container">
        <a href="#hero" class="logo-container" aria-label="ZGentara Trip">
            <span class="brand-logos" aria-hidden="true">
                <img src="<?= htmlspecialchars($assetBase); ?>/icons/LogoZGentara.png" alt="" class="brand-logo-img">
                <img src="<?= htmlspecialchars($assetBase); ?>/icons/LambangBondowoso.png" alt="" class="brand-logo-img brand-logo-bondowoso">
            </span>
            <span class="brand-text">ZGentara Trip</span>
        </a>

        <nav class="navbar" aria-label="Navigasi utama">
            <ul class="nav-menu">
                <li><a href="#hero"><span class="nav-home">&#8962;</span> BERANDA</a></li>
                <li><a href="#booking-trip">BOOKING</a></li>
                <li><a href="#testimoni">TESTIMONI</a></li>
                <li><a href="#tentang">TENTANG</a></li>
            </ul>
        </nav>

        <div class="header-btn">
            <a href="#saran" class="btn-outline-framed">
                <span class="icon-phone">&#9742;</span> HUBUNGI KAMI
            </a>
        </div>
    </div>
</header>

<main>
