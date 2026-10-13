<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan Al Firdaus Purwodadi — WEB SEMUA</title>
    <meta name="description" content="Satu portal yayasan untuk mengenal unit pendidikan KBIT, RAIT, SDIT, dan SMPIT Al Firdaus Purwodadi.">
    <style>
        :root{--navy:#163a70;--deep:#0c2345;--gold:#f4a62a;--ink:#172033;--muted:#68758a;--line:#e5eaf2;--paper:#f5f8fd}
        *{box-sizing:border-box}html{scroll-behavior:smooth;scroll-padding-top:90px}body{margin:0;color:var(--ink);font-family:Inter,system-ui,-apple-system,"Segoe UI",sans-serif;line-height:1.65}a{color:inherit;text-decoration:none}.container{width:min(1120px,calc(100% - 40px));margin:auto}
        header{position:sticky;top:0;z-index:20;background:#ffffffed;backdrop-filter:blur(14px);border-bottom:1px solid var(--line)}nav{min-height:76px;display:flex;align-items:center;justify-content:space-between;gap:20px}.logo{font-weight:900;font-size:1.3rem;letter-spacing:-.04em;color:var(--navy)}.logo span{color:var(--gold)}.nav-note{font-size:.9rem;color:var(--muted)}
        .hero{position:relative;overflow:hidden;color:#fff;background:radial-gradient(ellipse at 86% 8%,#3869a7 0,transparent 35%),linear-gradient(125deg,var(--deep),var(--navy));padding:86px 0 104px}.hero:after{content:"";position:absolute;width:480px;height:480px;border:1px solid #ffffff1c;border-radius:50%;right:-150px;top:-240px;box-shadow:0 0 0 45px #ffffff08,0 0 0 90px #ffffff05;pointer-events:none}.hero-grid{position:relative;z-index:1;display:grid;grid-template-columns:1.1fr .9fr;align-items:center;gap:56px}.label{display:inline-block;background:#ffffff18;border:1px solid #ffffff24;padding:7px 13px;border-radius:99px;font-size:.85rem}.hero h1{font-size:clamp(2.65rem,5.4vw,4.8rem);line-height:1.04;letter-spacing:-.055em;margin:22px 0 18px;max-width:720px}.hero p{color:#dce7f8;font-size:1.08rem;max-width:650px}.cta{display:inline-flex;align-items:center;gap:8px;padding:13px 19px;border-radius:12px;background:var(--gold);color:#1b2738;font-weight:850;margin-top:14px;box-shadow:0 5px 0 #9c6714,0 15px 28px #0002;transition:transform .2s}.cta:hover{transform:translateY(-3px)}
        .preview{background:#fff;color:var(--ink);border-radius:22px;padding:20px;box-shadow:0 35px 80px #0005;transform:perspective(1000px) rotateY(-5deg) rotateX(2deg);border:1px solid #ffffffb0}.preview-bar{display:flex;gap:6px;padding-bottom:15px;border-bottom:1px solid #e8edf4}.dot{width:9px;height:9px;border-radius:50%;background:#c8d1df}.preview-banner{margin-top:17px;border-radius:15px;background:linear-gradient(120deg,#163a70,#487fc5);color:white;padding:25px 20px}.preview-banner small{font-size:.75rem;letter-spacing:.08em}.preview-banner strong{font-size:1.5rem;display:block;line-height:1.2;margin-top:7px}.preview-schools{display:grid;grid-template-columns:repeat(4,1fr);gap:7px;margin-top:12px}.preview-schools span{display:grid;place-items:center;min-height:58px;background:#f0f4fa;border-radius:9px;font-size:.7rem;font-weight:850;color:var(--navy)}
        section{padding:76px 0}.section-head{max-width:720px;margin-bottom:30px}.kicker{display:block;text-transform:uppercase;letter-spacing:.13em;color:var(--navy);font-size:.76rem;font-weight:900;margin-bottom:9px}h2{color:var(--navy);font-size:clamp(1.9rem,3.5vw,2.8rem);line-height:1.15;letter-spacing:-.04em;margin:0 0 12px}.muted{color:var(--muted)}.section-head p{margin:0;color:var(--muted)}
        .schools-section{background:var(--paper)}.school-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}.school-card{position:relative;display:flex;flex-direction:column;min-width:0;min-height:265px;padding:23px 20px;background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 6px 0 #e9eef6,0 16px 28px -24px #152d50a0;transition:transform .25s,box-shadow .25s;overflow:hidden}.school-card:before{content:"";position:absolute;right:-35px;top:-42px;width:120px;height:120px;border-radius:50%;background:color-mix(in srgb,var(--school-accent,var(--gold)) 16%,white)}.school-card:hover{transform:translateY(-7px);box-shadow:0 2px 0 #e9eef6,0 28px 38px -25px #152d50a0}.school-logo{position:relative;display:grid;place-items:center;width:58px;height:58px;margin-bottom:18px;border-radius:17px;background:color-mix(in srgb,var(--school-color,var(--navy)) 9%,white);color:var(--school-color,var(--navy));font-size:1.3rem;font-weight:900;overflow:hidden}.school-logo img{width:100%;height:100%;object-fit:contain;background:#fff}.school-card h3{position:relative;color:var(--navy);font-size:1.12rem;line-height:1.35;margin:0 0 8px;overflow-wrap:anywhere}.school-card p{position:relative;color:var(--muted);font-size:.88rem;margin:0 0 18px}.school-link{position:relative;margin-top:auto;display:inline-flex;align-items:center;gap:8px;color:var(--navy);font-size:.9rem;font-weight:850}.school-link span{transition:transform .2s}.school-link:hover span{transform:translateX(4px)}.empty-state{padding:28px;border:1px dashed #c8d4e5;background:#fff;border-radius:16px;color:var(--muted)}
        .features{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:28px}.feature{border:1px solid var(--line);padding:24px;border-radius:18px;background:#fff;box-shadow:0 5px 0 #f0f3f8}.icon{font-size:1.7rem}.feature h3{margin:12px 0 6px;color:var(--navy)}.feature p{margin:0;color:var(--muted);font-size:.94rem}footer{background:#101e34;color:#cbd5e1;padding:28px 0}.footer-row{display:flex;justify-content:space-between;gap:18px;flex-wrap:wrap;font-size:.88rem}
        @media(max-width:900px){.school-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.hero-grid{gap:32px}.hero{padding:66px 0 88px}}@media(max-width:680px){.container{width:calc(100% - 30px)}nav{min-height:66px}.nav-note{font-size:.76rem}.hero-grid{grid-template-columns:1fr}.hero{padding:54px 0 76px}.hero h1{font-size:clamp(2.5rem,12vw,3.5rem)}.preview{transform:none}.preview-schools span{font-size:.62rem}.school-grid,.features{grid-template-columns:1fr}.school-card{min-height:220px}section{padding:60px 0}}@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}*,*:before,*:after{transition:none!important}}
    </style>
</head>
<body>
<header><nav class="container"><a class="logo" href="<?= site_url('/') ?>">WEB <span>SEMUA</span></a><span class="nav-note">Portal Yayasan · Al Firdaus Purwodadi</span></nav></header>
<main>
    <section class="hero"><div class="container hero-grid">
        <div><span class="label">Satu yayasan · Empat unit pendidikan</span><h1>Mendampingi setiap langkah tumbuh dan belajar.</h1>
            <p>Kenali unit pendidikan di bawah naungan Yayasan Al Firdaus Purwodadi. Setiap sekolah memiliki informasi, program, berita, dan identitasnya sendiri dalam satu platform.</p>
            <a class="cta" href="#sekolah">Jelajahi sekolah <span aria-hidden="true">↓</span></a>
        </div>
        <div class="preview" aria-label="Ilustrasi portal yayasan dengan empat sekolah">
            <div class="preview-bar"><i class="dot"></i><i class="dot"></i><i class="dot"></i></div>
            <div class="preview-banner"><small>PORTAL RESMI YAYASAN</small><strong>Belajar, Bertumbuh, Berprestasi.</strong><p style="font-size:.85rem;color:#e3eaf5;margin-bottom:0">Empat unit pendidikan, satu pintu informasi.</p></div>
            <div class="preview-schools"><span>KBIT</span><span>RAIT</span><span>SDIT</span><span>SMPIT</span></div>
        </div>
    </div></section>
    <section id="sekolah" class="schools-section"><div class="container">
        <div class="section-head"><span class="kicker">Unit pendidikan</span><h2>Pilih sekolah yang ingin kamu kenali</h2><p>Buka website masing-masing unit untuk melihat profil, visi-misi, program unggulan, berita, galeri, dan informasi pendaftaran.</p></div>
        <?php if (! empty($schools)): ?>
            <div class="school-grid">
                <?php foreach ($schools as $school): ?>
                    <article class="school-card" style="--school-color:<?= esc($school['primary_color'] ?: '#163A70') ?>;--school-accent:<?= esc($school['secondary_color'] ?: '#F4A62A') ?>">
                        <div class="school-logo">
                            <?php if (! empty($school['logo_path'])): ?><img src="<?= base_url(esc($school['logo_path'])) ?>" alt="Logo <?= esc($school['name']) ?>"><?php else: ?><?= esc(mb_strtoupper(mb_substr($school['name'], 0, 1))) ?><?php endif ?>
                        </div>
                        <h3><?= esc($school['name']) ?></h3>
                        <p><?= esc($school['tagline'] ?: 'Informasi profil, program, dan kegiatan sekolah.') ?></p>
                        <a class="school-link" href="<?= site_url('sekolah/' . $school['slug']) ?>">Kunjungi website <span aria-hidden="true">→</span></a>
                    </article>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="empty-state">Website sekolah belum ditambahkan. Admin yayasan dapat menambahkan unit sekolah melalui pengelolaan data sekolah, lalu sekolah akan tampil otomatis di halaman ini.</div>
        <?php endif ?>
    </div></section>
    <section id="fitur"><div class="container">
        <div class="section-head"><span class="kicker">Satu sistem terintegrasi</span><h2>Setiap sekolah punya ruangnya sendiri</h2><p>Pengelolaan terpusat dengan konten dan identitas yang tetap terpisah untuk tiap unit pendidikan.</p></div>
        <div class="features">
            <article class="feature"><div class="icon">🎨</div><h3>Identitas masing-masing</h3><p>Logo, warna, slogan, foto utama, alamat, kontak, dan media sosial dapat disesuaikan untuk tiap sekolah.</p></article>
            <article class="feature"><div class="icon">📰</div><h3>Konten terpisah</h3><p>Program unggulan, berita, pengumuman, galeri, dan video dikelola sesuai sekolah masing-masing.</p></article>
            <article class="feature"><div class="icon">🔐</div><h3>Pengelolaan admin</h3><p>Struktur platform mendukung pengelolaan sekolah melalui panel admin tanpa perlu mengubah kode tampilan.</p></article>
        </div>
    </div></section>
</main>
<footer><div class="container footer-row"><span>© <?= date('Y') ?> Yayasan Al Firdaus Purwodadi</span><span>Didukung WEB SEMUA · Platform Website Sekolah</span></div></footer>
</body>
</html>
