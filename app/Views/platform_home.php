<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= esc($siteSettings['site_name'] ?? 'Yayasan Bina Insani Grobogan') ?></title>
<meta name="description" content="Website Yayasan Bina Insani Grobogan: profil, unit pendidikan, berita dan kontak.">
<meta name="theme-color" content="#06264a">
<link rel="preconnect" href="https://images.unsplash.com">
<style>
:root{--navy:#06264a;--navy2:#0b3765;--gold:#ffc85c;--ink:#0b2b53;--muted:#536783;--paper:#f4f8fc;--line:#dce6f1;--shadow:0 16px 28px #09284b24}
*{box-sizing:border-box}html{scroll-behavior:smooth;scroll-padding-top:70px}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:var(--ink);background:#f6f9fc;line-height:1.45}a{text-decoration:none;color:inherit}.container{width:min(1320px,calc(100% - 48px));margin:auto}
header{height:60px;position:sticky;top:0;z-index:50;background:#052449f7;color:white;border-bottom:1px solid #ffffff22;backdrop-filter:blur(12px)}.nav{height:60px;display:flex;align-items:center;justify-content:space-between;gap:20px}.brand{display:flex;align-items:center;gap:10px;font-size:12px;font-weight:900;line-height:1.15;letter-spacing:.04em}.brand-logo{width:38px;height:42px;display:grid;place-items:center;color:var(--gold);font-size:34px;text-shadow:0 2px 0 #875f18} .brand-logo.uploaded-logo{object-fit:contain;display:block;background:#fff;border-radius:9px;padding:3px;text-shadow:none}.brand small{display:block;font-size:11px;letter-spacing:.035em}.nav-links{display:flex;align-items:center;gap:30px;font-size:11px;font-weight:700}.nav-links a{padding:21px 0;position:relative}.nav-links a:first-child:after{content:"";height:2px;background:var(--gold);position:absolute;bottom:8px;left:0;right:0}.nav-actions{display:flex;align-items:center;gap:12px}.search-btn{width:37px;height:37px;border-radius:50%;background:#104c86;border:1px solid #4c79a7;color:#fff;font-size:20px}.portal-btn{border:0;border-radius:24px;background:linear-gradient(#ffe4a0,#f6b93d);padding:11px 17px;font-size:11px;font-weight:800;color:#09274a;box-shadow:0 3px 0 #9e701f}
.hero{position:relative;isolation:isolate;min-height:320px;overflow:hidden;background:linear-gradient(90deg,#05264a 0%,#05264ae8 25%,#05264a45 52%,#05264a00 100%),var(--hero-photo,url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=2000&q=90')) center 48%/cover no-repeat;color:#fff}.hero:after{content:"";position:absolute;inset:0;z-index:-1;background:linear-gradient(0deg,#06264a28,transparent 35%)}.hero-grid{min-height:320px;display:grid;grid-template-columns:350px 1fr;align-items:center}.hero-copy{padding:25px 0 45px}.eyebrow{display:inline-block;padding:5px 13px;border-radius:20px;background:#ffffff22;border:1px solid #ffffff35;font-size:10px;color:#fff}.hero h1{font-family:Georgia,'Times New Roman',serif;font-size:clamp(38px,4.1vw,53px);line-height:.98;letter-spacing:-1.4px;margin:12px 0}.hero h1 em{font-style:normal;color:var(--gold)}.hero p{font-size:13px;max-width:300px;line-height:1.45;margin:13px 0}.hero-buttons{display:flex;gap:12px;align-items:center;margin-top:14px}.btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;border-radius:24px;padding:10px 18px;font-size:11px;font-weight:800;white-space:nowrap}.btn-gold{background:linear-gradient(#ffe49b,#f6b93d);color:#09284c;box-shadow:0 4px 0 #9f7021}.btn-outline{border:1px solid #ffffffb5;color:white;background:#08284b50}.hero-note{font-size:10px!important;color:#d8e6f7;margin-top:18px!important}
.stats-wrap{position:relative;z-index:3;margin-top:-28px}.stats{background:linear-gradient(110deg,#08294e,#0c3a6b);border:1px solid #4a7097;border-radius:20px;box-shadow:0 8px 0 #092343,0 20px 30px #08274b26;color:#fff;padding:16px 20px;display:grid;grid-template-columns:repeat(4,1fr)}.stat{display:flex;align-items:center;gap:14px;padding:0 18px;border-right:1px solid #ffffff17}.stat:last-child{border:0}.stat-icon{color:var(--gold);font-size:31px;text-shadow:0 3px 0 #8b611a}.stat strong{display:block;font-family:Georgia,serif;font-size:20px;line-height:1.1}.stat b{display:block;font-size:12px}.stat small{display:block;font-size:10px;color:#d4e1f0;margin-top:2px}
.section{padding:30px 0 5px;background:linear-gradient(#f7fafe,#f1f6fb)}.profile-grid{display:grid;grid-template-columns:1.08fr .92fr;gap:34px;align-items:center}.section-tag{font-size:9px;font-weight:900;letter-spacing:.16em;text-transform:uppercase;display:flex;align-items:center;gap:8px;margin-bottom:4px}.section-tag:before{content:"✥";color:#f4ad24;font-size:17px}.section h2{font-family:Georgia,'Times New Roman',serif;font-size:28px;line-height:1.1;margin:3px 0 7px;color:#082a53;letter-spacing:-.3px}.section p{font-size:12px;color:#273f61;margin:0 0 11px;max-width:610px}.profile-values{display:flex;gap:0;margin:12px 0}.profile-value{display:flex;align-items:center;gap:9px;padding:0 13px;border-right:1px solid #cad8e8;font-size:11px;font-weight:800;line-height:1.3}.profile-value:first-child{padding-left:0}.profile-value:last-child{border:0}.value-icon{width:39px;height:39px;flex:0 0 39px;border-radius:50%;display:grid;place-items:center;background:linear-gradient(#fff0bd,#f7c455);border:1px solid #e6b74e;box-shadow:0 3px 0 #d6a03a;color:#092b52;font-size:20px}.profile-more{background:linear-gradient(#104879,#05284d);color:#fff;box-shadow:0 4px 0 #041b34;padding:9px 18px}.profile-photo-wrap{height:194px;position:relative;border-radius:21px;box-shadow:0 8px 0 #d9e4ef,0 15px 25px #12345624}.profile-photo{width:100%;height:100%;object-fit:cover;border-radius:21px;display:block}.quote{position:absolute;left:12%;right:12%;bottom:10px;background:#092a4be8;color:#fff;border-radius:12px;padding:12px 15px;font-size:10px;box-shadow:0 5px 0 #061b34}.quote b{color:var(--gold);font-size:23px;vertical-align:middle;margin-right:5px}
.units-section{padding-top:22px}.section-head{display:flex;align-items:end;justify-content:space-between;gap:20px;margin-bottom:12px}.section-head p{margin-bottom:0}.small-outline{border:1px solid #f0b63c;background:#fff9e9;border-radius:22px;padding:8px 15px;font-size:10px;font-weight:800;white-space:nowrap;box-shadow:0 3px 0 #e6d6b8}
.units-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:13px}.unit-card{background:#fff;border:3px solid #fff;border-radius:19px;overflow:hidden;box-shadow:0 6px 0 #dce5ef,0 14px 22px #0d31531c;transition:transform .2s,box-shadow .2s;min-width:0}.unit-card:hover{transform:translateY(-5px);box-shadow:0 9px 0 #d3dfeb,0 18px 28px #0d315328}.unit-photo{height:88px;width:100%;object-fit:cover;display:block}.unit-inner{padding:0 13px 13px;text-align:center;background:linear-gradient(#fff,#f3f8fc)}.unit-badge{width:43px;height:43px;border:3px solid white;border-radius:50%;display:grid;place-items:center;margin:-23px auto 4px;position:relative;color:white;font-size:19px;box-shadow:0 3px 0 #d9e3ed}.unit-card:nth-child(1) .unit-badge{background:#00a783}.unit-card:nth-child(2) .unit-badge{background:#e99b00}.unit-card:nth-child(3) .unit-badge{background:#0876d8}.unit-card:nth-child(4) .unit-badge{background:#7026b8}.unit-card h3{font-family:Georgia,serif;font-size:13px;margin:3px 0;color:#082a53}.unit-subtitle{font-size:9px;color:#47617f;margin-bottom:8px}.unit-card p{font-size:10px;line-height:1.35;min-height:39px;margin:0 auto 10px;color:#2e4667}.unit-link{display:block;margin:auto;width:85%;padding:7px 8px;border-radius:20px;color:#fff;font-size:10px;font-weight:800;background:linear-gradient(#00b58b,#00876a);box-shadow:0 3px 0 #006a54}.unit-card:nth-child(2) .unit-link{background:linear-gradient(#f9b52b,#d58a00);box-shadow:0 3px 0 #a66a00}.unit-card:nth-child(3) .unit-link{background:linear-gradient(#1689f4,#0861bc);box-shadow:0 3px 0 #064a91}.unit-card:nth-child(4) .unit-link{background:linear-gradient(#9b4ce0,#6421a8);box-shadow:0 3px 0 #4b167e}
.news-section{padding-top:28px;padding-bottom:20px}.news-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:13px}.news-card{border:2px solid white;border-radius:15px;overflow:hidden;background:#fff;box-shadow:0 5px 0 #dce5ef,0 12px 20px #0d31531c;min-width:0}.news-cover{height:65px;overflow:hidden;background:#d7e7f5}.news-cover img{width:100%;height:100%;object-fit:cover;display:block}.news-body{padding:8px 10px 10px}.news-meta{display:flex;align-items:center;gap:8px;font-size:8px;color:#536783;margin-bottom:5px}.news-unit{border-radius:20px;padding:3px 8px;color:white;background:#6827ae;font-weight:800}.news-card:nth-child(2) .news-unit{background:#0676d7}.news-card:nth-child(3) .news-unit{background:#df9300}.news-card:nth-child(4) .news-unit{background:#00a783}.news-card h3{font-family:Georgia,serif;font-size:12px;line-height:1.25;margin:4px 0;color:#092a52}.news-card p{font-size:9px;line-height:1.4;color:#405875;margin:0}.news-link{display:flex;justify-content:space-between;align-items:center;margin-top:8px;font-size:9px;font-weight:800;color:#164c80}.news-empty{grid-column:1/-1;background:#fff;padding:20px;border-radius:14px;text-align:center;color:#536783}
.contact-section{background:#06264a;color:#fff;position:relative;overflow:hidden;padding:0}.contact-layout{display:grid;grid-template-columns:34% 1fr 23%;min-height:220px}.contact-photo{width:100%;height:100%;min-height:220px;object-fit:cover;display:block;mask-image:linear-gradient(90deg,#000 68%,transparent)}.contact-info{padding:23px 16px 20px 10px}.contact-info .section-tag{color:#fff}.contact-info .section-tag:before{color:var(--gold)}.contact-info h2{color:white;font-size:24px;margin:2px 0 6px}.contact-info>p{font-size:10px;color:#d4e3f4;max-width:430px;margin-bottom:10px}.contact-list{display:grid;grid-template-columns:1fr 1fr;gap:10px 14px}.contact-item{display:flex;align-items:flex-start;gap:9px;font-size:9px;color:#e2ebf5}.contact-symbol{width:29px;height:29px;flex:0 0 29px;border-radius:8px;display:grid;place-items:center;background:#14558d;color:#ffcf64;font-size:15px}.contact-item b{display:block;color:#fff;font-size:10px;margin-bottom:2px}.map-card{align-self:center;margin:16px 0;background:#fff;border-radius:15px;padding:7px;color:#082a53;box-shadow:0 5px 0 #041b34;overflow:hidden}.map-art{height:102px;border-radius:10px;position:relative;overflow:hidden;background-color:#e8edf0;background-image:linear-gradient(35deg,transparent 42%,#fff 43%,#fff 48%,transparent 49%),linear-gradient(115deg,transparent 38%,#fff 39%,#fff 45%,transparent 46%),linear-gradient(10deg,transparent 68%,#d0dce2 69%,#d0dce2 70%,transparent 71%),linear-gradient(80deg,transparent 23%,#d0dce2 24%,#d0dce2 25%,transparent 26%);display:grid;place-items:center}.map-pin{background:white;border-radius:7px;padding:7px 10px;box-shadow:0 3px 12px #102b5220;font-size:9px;font-weight:800}.map-pin:before{content:"📍";margin-right:4px}.map-btn{display:block;background:#0b3d6d;color:white;text-align:center;border-radius:20px;margin:7px 4px 1px;padding:8px;font-size:9px;font-weight:800}
footer{background:#041b35;color:#fff}.footer-main{min-height:50px;display:flex;align-items:center;justify-content:space-between;gap:20px;padding:12px 0}.footer-brand{display:flex;align-items:center;gap:9px;font-size:10px;font-weight:900}.footer-brand .brand-logo{font-size:28px;width:30px;height:32px}.footer-brand small{font-size:8px;color:#c7d5e5}.footer-links{display:flex;gap:22px;font-size:9px;color:#e1eaf4}.socials{display:flex;gap:8px}.socials span{width:23px;height:23px;border-radius:50%;display:grid;place-items:center;background:#174d83;font-size:10px}.copyright{border-top:1px solid #ffffff16;text-align:center;padding:8px;font-size:9px;color:#b5c7db}
@media(min-width:1400px){.hero,.hero-grid{min-height:350px}.hero-grid{grid-template-columns:380px 1fr}.unit-photo{height:100px}.profile-photo-wrap{height:205px}}
@media(max-width:900px){.nav-links{gap:14px}.nav-actions .search-btn{display:none}.hero-grid{grid-template-columns:300px 1fr}.stats{padding:13px 7px}.stat{padding:0 9px;gap:8px}.stat-icon{font-size:25px}.stat strong{font-size:17px}.profile-values{flex-wrap:wrap;gap:9px}.profile-value{padding:0 8px}.contact-layout{grid-template-columns:27% 1fr 23%}.contact-list{gap:8px}.footer-links{gap:12px}}
@media(max-width:650px){.container{width:min(100% - 28px,500px)}header,.nav{height:auto;min-height:58px}.nav{padding:8px 0}.brand{font-size:10px}.brand-logo{font-size:27px;width:30px}.brand small{font-size:9px}.nav-links{display:none}.portal-btn{padding:9px 12px}.hero{background-position:58% center}.hero-grid{grid-template-columns:1fr;min-height:390px}.hero-copy{padding:35px 0 55px;max-width:310px}.hero h1{font-size:46px}.hero:before{opacity:.4}.stats-wrap{margin-top:-22px}.stats{grid-template-columns:1fr 1fr;gap:14px 0;border-radius:16px;padding:14px 8px}.stat{border-right:1px solid #ffffff18;padding:3px 8px}.stat:nth-child(2){border:0}.stat:nth-child(3){border:0}.stat-icon{font-size:23px}.stat strong{font-size:16px}.stat b{font-size:10px}.stat small{font-size:9px}.section{padding-top:25px}.profile-grid{grid-template-columns:1fr;gap:16px}.section h2{font-size:25px}.profile-photo-wrap{height:190px;grid-row:1}.profile-copy{grid-row:2}.profile-values{justify-content:space-between}.profile-value{font-size:9px;gap:6px}.value-icon{width:32px;height:32px;flex-basis:32px;font-size:16px}.section-head{align-items:flex-start}.section-head .small-outline{display:none}.units-grid,.news-grid{grid-template-columns:1fr 1fr;gap:10px}.unit-photo{height:83px}.unit-inner{padding:0 8px 11px}.unit-card h3{font-size:11px}.unit-card p{font-size:9px;min-height:50px}.unit-subtitle{font-size:8px}.unit-link{font-size:9px;width:92%}.news-cover{height:72px}.news-body{padding:7px}.news-card h3{font-size:11px}.news-card p{font-size:9px}.contact-layout{grid-template-columns:1fr}.contact-photo{height:140px;min-height:140px;mask-image:linear-gradient(0deg,transparent,#000 20%)}.contact-info{padding:18px 0}.map-card{margin:0 0 18px}.map-art{height:130px}.footer-main{align-items:flex-start;flex-direction:column}.footer-links{flex-wrap:wrap;gap:12px}.socials{display:none}}

/* Responsive hardening: tablet, phone, landscape phone and small desktops */
img{max-width:100%}
.container{width:min(1320px,calc(100% - 48px))}
.hero-grid>div{min-width:0}
.nav-links a,.portal-btn,.btn{white-space:nowrap}
.units-grid,.news-grid,.stats,.profile-grid,.contact-layout{min-width:0}
.unit-card,.news-card,.stat,.profile-copy,.contact-info{min-width:0;overflow-wrap:anywhere}
.news-card h3,.unit-card h3{overflow-wrap:anywhere}
@media(max-width:1100px){
 .container{width:calc(100% - 36px)}
 .nav-links{gap:17px;font-size:10px}
 .brand{font-size:11px}
 .hero-grid{grid-template-columns:minmax(280px,.8fr) minmax(0,1.2fr);gap:20px}
 .hero h1{font-size:clamp(38px,4.5vw,52px)}
 .stats{padding:14px 8px}
 .stat{padding:0 10px;gap:9px}
 .stat strong{font-size:18px}
 .stat b{font-size:11px}
 .stat small{font-size:9px}
 .profile-grid{gap:22px}
 .profile-value{padding:0 8px;font-size:10px}
 .contact-layout{grid-template-columns:25% minmax(0,1fr) 24%}
 .contact-info{padding:20px 12px}
}
@media(max-width:760px){
 header{height:auto}
 .nav{gap:10px}
 .nav-links{display:none}
 .hero{background-position:60% center}
 .hero-grid{grid-template-columns:minmax(0,1fr);min-height:360px}
 .hero-copy{max-width:360px;padding:35px 0 50px}
 .hero-grid>div:last-child{display:none}
 .hero h1{font-size:clamp(40px,8vw,54px)}
 .hero p{font-size:12px}
 .stats{grid-template-columns:repeat(2,minmax(0,1fr));gap:14px 0}
 .stat{padding:5px 10px}
 .stat:nth-child(2){border-right:0}
 .stat:nth-child(3){border-right:1px solid #ffffff18}
 .stat:nth-child(4){border:0}
 .profile-grid{grid-template-columns:minmax(0,1fr);gap:18px}
 .profile-photo-wrap{grid-row:1;height:clamp(175px,42vw,260px)}
 .profile-copy{grid-row:2}
 .profile-values{justify-content:flex-start;flex-wrap:wrap;gap:10px}
 .profile-value{padding:0 10px}
 .profile-value:first-child{padding-left:0}
 .section-head{align-items:flex-start}
 .section-head .small-outline{display:inline-flex;font-size:9px;padding:7px 10px}
 .units-grid,.news-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
 .unit-photo{height:clamp(78px,18vw,125px)}
 .unit-card p{min-height:44px}
 .contact-layout{grid-template-columns:minmax(0,1fr)}
 .contact-photo{height:190px;min-height:190px;mask-image:linear-gradient(0deg,transparent,#000 12%)}
 .contact-info{padding:20px 0}
 .map-card{margin:0 0 20px}
 .map-art{height:145px}
 .footer-main{align-items:flex-start;flex-direction:column}
 .footer-links{flex-wrap:wrap;gap:14px}
}
@media(max-width:420px){
 .container{width:calc(100% - 26px)}
 .brand{gap:6px;font-size:9px}
 .brand-logo{width:28px;font-size:25px}
 .brand small{font-size:8px}
 .portal-btn{font-size:9px;padding:9px 10px}
 .search-btn{width:31px;height:31px}
 .hero-grid{min-height:355px}
 .hero-copy{padding:28px 0 44px}
 .hero h1{font-size:39px}
 .hero-buttons{align-items:flex-start;flex-wrap:wrap;gap:10px}
 .btn{font-size:10px;padding:9px 13px}
 .stats{gap:12px 0;padding:12px 5px}
 .stat{padding:3px 6px;gap:7px}
 .stat-icon{font-size:21px}
 .stat strong{font-size:15px}
 .stat b{font-size:9px}
 .stat small{font-size:8px}
 .section h2{font-size:23px}
 .section-head{gap:8px}
 .section-head .small-outline{font-size:8px;padding:7px 8px}
 .units-grid,.news-grid{gap:8px}
 .unit-card{border-width:2px}
 .unit-inner{padding:0 7px 10px}
 .unit-card h3{font-size:10px}
 .unit-card p{font-size:9px;min-height:58px}
 .unit-subtitle{min-height:24px}
 .unit-link{font-size:9px}
 .news-cover{height:76px}
 .news-card h3{font-size:10px}
 .news-card p{font-size:8px}
 .news-meta{gap:4px;flex-wrap:wrap}
 .contact-list{grid-template-columns:1fr}
 .copyright{font-size:8px}
}
@media(max-width:340px){
 .portal-btn{font-size:8px;padding:8px}
 .search-btn{display:none}
 .units-grid,.news-grid{grid-template-columns:minmax(0,1fr)}
 .unit-photo{height:140px}
 .unit-card p{min-height:0}
 .news-cover{height:110px}
 .section-head{display:block}
 .section-head .small-outline{margin-top:10px}
}

</style>
</head>
<body>
<header><div class="container nav">
<a class="brand" href="<?= site_url('/') ?>"><span class="brand-logo">♛</span><span>YAYASAN<small>BINA INSANI GROBOGAN</small></span></a>
<nav class="nav-links" aria-label="Navigasi utama"><a href="#beranda">Beranda</a><a href="#profil">Profil</a><a href="#unit">Unit Pendidikan</a><a href="#berita">Berita</a><a href="#kontak">Kontak</a></nav>
<div class="nav-actions"><button class="search-btn" type="button" aria-label="Cari" onclick="document.getElementById('berita').scrollIntoView({behavior:'smooth'})">⌕</button><a class="portal-btn" href="<?= site_url('admin/yayasan/login') ?>">♟ &nbsp; Portal Yayasan</a></div>
</div></header>
<main>
<?php $heroImage = $siteSettings['hero_image_url'] ?? ''; $heroImageUrl = $heroImage ? (preg_match('#^https?://#i',$heroImage) ? $heroImage : base_url($heroImage)) : ''; $profileImage = $siteSettings['profile_image_url'] ?? ''; $profileImageUrl = $profileImage ? (preg_match('#^https?://#i',$profileImage) ? $profileImage : base_url($profileImage)) : 'https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=1100&q=85'; ?>
<section class="hero" id="beranda" style="<?= $heroImageUrl ? '--hero-photo:url(' . esc($heroImageUrl) . ')' : '' ?>"><div class="container hero-grid"><div class="hero-copy">
<span class="eyebrow"><?= esc($siteSettings['tagline'] ?? 'Pendidikan Islam untuk Generasi Qur’ani') ?></span>
<h1><?= esc($siteSettings['hero_title'] ?? 'Yayasan Bina Insani Grobogan') ?></h1>
<p><?= esc($siteSettings['hero_description'] ?? 'Membina generasi berilmu, berakhlak, dan mandiri melalui pendidikan Islam yang berkualitas dan berkelanjutan.') ?></p>
<div class="hero-buttons"><a class="btn btn-gold" href="#profil">Tentang Kami&nbsp; →</a><a class="btn btn-outline" href="#unit">Lihat Unit Pendidikan</a></div>
<div class="hero-note">Satu yayasan · Empat unit pendidikan · Tumbuh bersama</div>
</div><div></div></div></section>
<div class="container stats-wrap"><div class="stats">
<div class="stat"><span class="stat-icon">♟</span><div><strong>4</strong><b>Unit Pendidikan</b><small>KBIT · RAIT · SDIT · SMPIT</small></div></div>
<div class="stat"><span class="stat-icon">🎓</span><div><strong>Ribuan</strong><b>Peserta Didik</b><small>Dalam Pembinaan</small></div></div>
<div class="stat"><span class="stat-icon">📖</span><div><b>Tenaga Pendidik</b><b>Profesional</b><small>Berpengalaman</small></div></div>
<div class="stat"><span class="stat-icon">♜</span><div><b>Lingkungan</b><b>Islami & Kondusif</b><small>Untuk Tumbuh Kembang</small></div></div>
</div></div>
<section class="section" id="profil" <?= ($siteSettings['show_profile'] ?? '1') !== '1' ? 'hidden' : '' ?>><div class="container profile-grid">
<div class="profile-copy"><div class="section-tag">Profil Yayasan</div><h2><?= esc($siteSettings['profile_title'] ?? 'Yayasan Bina Insani Grobogan') ?></h2><p><?= esc($siteSettings['profile_text'] ?? 'Yayasan Bina Insani Grobogan adalah lembaga pendidikan Islam yang berkomitmen menyelenggarakan pendidikan berkualitas untuk membangun generasi Qur’ani, berilmu, berakhlak mulia, dan siap menghadapi tantangan masa depan.') ?></p>
<div class="profile-values"><div class="profile-value"><span class="value-icon">♟</span><span><?= esc($siteSettings['value_one'] ?? 'Berlandaskan Nilai Islam') ?></span></div><div class="profile-value"><span class="value-icon">🎓</span><span><?= esc($siteSettings['value_two'] ?? 'Pendidikan Berkualitas') ?></span></div><div class="profile-value"><span class="value-icon">♟</span><span><?= esc($siteSettings['value_three'] ?? 'Membangun Generasi Unggul') ?></span></div></div>
<a class="btn profile-more" href="#kontak">Selengkapnya tentang Yayasan &nbsp; →</a>
</div><div class="profile-photo-wrap"><img class="profile-photo" src="<?= esc($profileImageUrl) ?>" alt="Siswa belajar bersama" loading="lazy"><div class="quote"><b>❝</b> Mencetak generasi yang berilmu, berakhlak, dan bermanfaat bagi umat.</div></div>
</div></section>
<section class="section units-section" id="unit" <?= ($siteSettings['show_units'] ?? '1') !== '1' ? 'hidden' : '' ?>><div class="container">
<div class="section-head"><div><div class="section-tag">Unit Pendidikan</div><h2>Empat Jenjang Pendidikan</h2><p>Yayasan Bina Insani Grobogan mengelola empat unit pendidikan yang terintegrasi dalam membina generasi Islam sejak usia dini hingga tingkat menengah.</p></div><a class="small-outline" href="#unit">Lihat Semua Unit &nbsp; →</a></div>
<div class="units-grid">
<?php if (! empty($schools)): ?>
<?php foreach ($schools as $index => $school): ?>
<article class="unit-card">
<?php
$unitPhotos = [
'https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=800&q=85',
'https://images.unsplash.com/photo-1560785496-3c9d27877182?auto=format&fit=crop&w=800&q=85',
'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=85',
'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=85'
];
?>
<?php $schoolPhoto = $school['hero_image_path'] ?? ''; $schoolPhotoUrl = $schoolPhoto ? (preg_match('#^https?://#i', $schoolPhoto) ? $schoolPhoto : base_url($schoolPhoto)) : $unitPhotos[$index % count($unitPhotos)]; ?><img class="unit-photo" src="<?= esc($schoolPhotoUrl) ?>" alt="Lingkungan <?= esc($school['name']) ?>" loading="lazy">
<div class="unit-inner"><div class="unit-badge"><?php if (! empty($school['logo_path'])): ?><img src="<?= base_url(esc($school['logo_path'])) ?>" alt="" style="width:100%;height:100%;object-fit:contain;border-radius:50%;background:white"><?php else: ?><?= ['♟','♙','🎓','▣'][$index % 4] ?><?php endif ?></div>
<h3><?= esc($school['name']) ?></h3><div class="unit-subtitle"><?= esc($school['tagline'] ?: ['Kelompok Bermain Islam Terpadu','Raudhatul Athfal Islam Terpadu','Sekolah Dasar Islam Terpadu','Sekolah Menengah Pertama Islam Terpadu'][$index % 4]) ?></div>
<p><?= esc($school['tagline'] ?: 'Membina generasi berilmu, berakhlak mulia dan mandiri melalui pembelajaran terpadu.') ?></p>
<a class="unit-link" href="<?= site_url('sekolah/' . $school['slug']) ?>">Lihat Profil &nbsp; →</a></div></article>
<?php endforeach ?>
<?php else: ?><div class="news-empty">Informasi unit pendidikan sedang disiapkan.</div><?php endif ?>
</div></div></section>
<section class="section news-section" id="berita" <?= ($siteSettings['show_news'] ?? '1') !== '1' ? 'hidden' : '' ?>><div class="container">
<div class="section-head"><div><div class="section-tag">Berita Terbaru</div><h2>Kegiatan dan Informasi Terkini</h2><p>Berita terbaru dari seluruh unit pendidikan Yayasan Bina Insani Grobogan.</p></div><a class="small-outline" href="#berita">Lihat Semua Berita &nbsp; →</a></div>
<div class="news-grid">
<?php if (! empty($latestNews)): ?>
<?php foreach ($latestNews as $news): ?><article class="news-card"><div class="news-cover">
<?php if (! empty($news['cover_image_path'])): ?><img src="<?= base_url(esc($news['cover_image_path'])) ?>" alt="<?= esc($news['title']) ?>" loading="lazy"><?php else: ?><img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80" alt="Kegiatan pendidikan" loading="lazy"><?php endif ?>
</div><div class="news-body"><div class="news-meta"><span class="news-unit"><?= esc($news['school_name']) ?></span><?php if (! empty($news['published_at'])): ?><span><?= esc(date('d M Y', strtotime($news['published_at']))) ?></span><?php endif ?></div>
<h3><?= esc($news['title']) ?></h3><p><?= esc($news['excerpt'] ?: 'Baca informasi selengkapnya di website unit pendidikan.') ?></p><a class="news-link" href="<?= site_url('sekolah/' . $news['school_slug'] . '#berita') ?>">Baca selengkapnya &nbsp; →</a></div></article><?php endforeach ?>
<?php else: ?><div class="news-empty"><b>Belum ada berita terbaru.</b><br>Berita yang telah diterbitkan oleh unit pendidikan akan muncul otomatis di sini.</div><?php endif ?>
</div></div></section>
<section class="contact-section" id="kontak" <?= ($siteSettings['show_contact'] ?? '1') !== '1' ? 'hidden' : '' ?>><div class="container contact-layout">
<img class="contact-photo" src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=900&q=85" alt="Gedung Yayasan Bina Insani Grobogan" loading="lazy">
<div class="contact-info"><div class="section-tag">Kontak Kami</div><h2>Alamat dan Kontak</h2><p>Silakan hubungi kami untuk informasi lebih lanjut terkait program pendidikan di Yayasan Bina Insani Grobogan.</p>
<div class="contact-list">
<?php
$contactSchools = array_values(array_filter($schools, static function ($item) { return ! empty($item['address']) || ! empty($item['phone']) || ! empty($item['whatsapp']) || ! empty($item['email']); }));
$primaryContact = $contactSchools[0] ?? [];
?>
<div class="contact-item"><span class="contact-symbol">⌖</span><div><b>Alamat</b><?= ! empty($primaryContact['address']) ? nl2br(esc($primaryContact['address'])) : 'Grobogan, Jawa Tengah' ?></div></div>
<div class="contact-item"><span class="contact-symbol">☎</span><div><b>Telepon</b><?php if (! empty($primaryContact['phone'])): ?><a href="tel:<?= esc(preg_replace('/[^0-9+]/','',$primaryContact['phone'])) ?>"><?= esc($primaryContact['phone']) ?></a><?php else: ?>Hubungi kantor yayasan<?php endif ?></div></div>
<div class="contact-item"><span class="contact-symbol">◉</span><div><b>WhatsApp</b><?php if (! empty($primaryContact['whatsapp'])): ?><a target="_blank" rel="noopener noreferrer" href="https://wa.me/<?= esc(preg_replace('/[^0-9]/','',$primaryContact['whatsapp'])) ?>"><?= esc($primaryContact['whatsapp']) ?></a><?php else: ?>Informasi melalui admin yayasan<?php endif ?></div></div>
<div class="contact-item"><span class="contact-symbol">✉</span><div><b>Email</b><?php if (! empty($primaryContact['email'])): ?><a href="mailto:<?= esc($primaryContact['email']) ?>"><?= esc($primaryContact['email']) ?></a><?php else: ?>Email yayasan<?php endif ?></div></div>
</div></div>
<div class="map-card"><div class="map-art"><div class="map-pin">Yayasan Bina Insani<br>Grobogan</div></div><a class="map-btn" href="https://www.google.com/maps/search/?api=1&query=Yayasan+Bina+Insani+Grobogan" target="_blank" rel="noopener noreferrer">Lihat di Google Maps &nbsp; →</a></div>
</div></section>
</main>
<footer><div class="container footer-main"><a class="footer-brand" href="<?= site_url('/') ?>"><span class="brand-logo">♛</span><span>YAYASAN BINA INSANI GROBOGAN<small>Pendidikan Islam untuk Generasi Qur’ani</small></span></a><nav class="footer-links"><a href="#beranda">Beranda</a><a href="#profil">Profil</a><a href="#unit">Unit Pendidikan</a><a href="#berita">Berita</a><a href="#kontak">Kontak</a></nav><div class="socials"><span>f</span><span>◎</span><span>▶</span><span>↑</span></div></div><div class="copyright">© <?= date('Y') ?> <?= esc($siteSettings['site_name'] ?? 'Yayasan Bina Insani Grobogan') ?>. All rights reserved.</div></footer>
</body></html>