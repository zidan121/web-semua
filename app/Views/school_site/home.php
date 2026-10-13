<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($school['name']) ?></title>
    <meta name="description" content="<?= esc($school['tagline'] ?: $school['hero_description'] ?: 'Website resmi ' . $school['name']) ?>">
    <?php if (! empty($school['favicon_path'])): ?>
        <link rel="icon" href="<?= base_url(esc($school['favicon_path'])) ?>">
    <?php endif ?>
    <style>
        :root {
            --primary: <?= esc($school['primary_color'] ?: '#163A70') ?>;
            --accent: <?= esc($school['secondary_color'] ?: '#F4A62A') ?>;
            --ink: #17243b; --muted: #68758a; --paper: #f6f8fc; --line: #e7ebf2;
            --radius: 22px; --shadow: 0 18px 48px rgba(20, 39, 72, .09);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 90px; }
        body { margin: 0; color: var(--ink); background: #fff; font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif; line-height: 1.7; }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; }
        .container { width: min(1160px, calc(100% - 44px)); margin: auto; }
        .site-header { position: sticky; top: 0; z-index: 20; background: rgba(255,255,255,.94); backdrop-filter: blur(14px); border-bottom: 1px solid rgba(226,232,241,.9); }
        .nav { min-height: 82px; display: flex; align-items: center; justify-content: space-between; gap: 24px; }
        .brand { display: flex; align-items: center; gap: 12px; min-width: 0; color: var(--primary); font-weight: 850; line-height: 1.25; }
        .brand img { width: 52px; height: 52px; flex: 0 0 52px; object-fit: contain; border-radius: 14px; }
        .brand-name { display: block; max-width: 300px; overflow-wrap: anywhere; }
        .brand small { display: block; margin-top: 5px; color: var(--muted); font-size: .76rem; font-weight: 550; }
        .nav-right { display: flex; align-items: center; gap: 28px; }
        .nav-links { display: flex; align-items: center; gap: 24px; font-size: .91rem; font-weight: 650; color: #48556b; }
        .nav-links a:hover { color: var(--primary); }
        .btn { display: inline-flex; justify-content: center; align-items: center; gap: 9px; padding: 13px 19px; border-radius: 12px; font-weight: 800; font-size: .92rem; transition: transform .2s, box-shadow .2s, background .2s; }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary { background: var(--accent); color: #172033; box-shadow: 0 8px 22px color-mix(in srgb, var(--accent) 28%, transparent); }
        .btn-outline { color: white; border: 1px solid rgba(255,255,255,.4); background: rgba(255,255,255,.08); }
        .hero { position: relative; isolation: isolate; overflow: hidden; color: #fff; background: radial-gradient(ellipse at 85% 12%, color-mix(in srgb, var(--primary) 55%, #76a8ef), transparent 38%), linear-gradient(120deg, color-mix(in srgb, var(--primary) 94%, #07152a), var(--primary)); }
        .hero:before { content: ""; position: absolute; z-index: -1; width: 560px; height: 560px; border: 1px solid #ffffff17; border-radius: 50%; right: -170px; top: -270px; box-shadow: 0 0 0 55px #ffffff08, 0 0 0 110px #ffffff05; }
        .hero-inner { min-height: 550px; padding: 76px 0 92px; display: grid; grid-template-columns: 1.08fr .92fr; align-items: center; gap: clamp(30px, 5vw, 72px); }
        .eyebrow { display: inline-flex; align-items: center; gap: 9px; border: 1px solid #ffffff30; background: #ffffff12; border-radius: 99px; padding: 8px 13px; font-size: .82rem; font-weight: 700; color: #f2f6ff; }
        .eyebrow:before { content: ""; width: 7px; height: 7px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 0 4px #ffffff12; }
        h1 { font-size: clamp(2.55rem, 5.1vw, 4.6rem); line-height: 1.06; letter-spacing: -.055em; margin: 22px 0 18px; max-width: 720px; }
        .hero-copy { max-width: 620px; color: #e0e9f7; font-size: clamp(1rem, 1.4vw, 1.12rem); }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px; }
        .hero-note { margin-top: 24px; color: #d4e0f1; font-size: .86rem; }
        .hero-visual { position: relative; min-width: 0; }
        .hero-image { display: block; width: 100%; height: 390px; object-fit: cover; border-radius: 28px; border: 1px solid #ffffff55; box-shadow: 0 32px 85px #06152b66; }
        .hero-placeholder { display: grid; place-items: center; min-height: 330px; border: 1px solid #ffffff38; border-radius: 28px; background: linear-gradient(145deg,#ffffff20,#ffffff05); font-size: 6rem; }
        .image-caption { position: absolute; left: 18px; right: 18px; bottom: 18px; border: 1px solid #ffffff3d; background: rgba(14,34,65,.78); backdrop-filter: blur(12px); color: #fff; padding: 15px 18px; border-radius: 16px; }
        .image-caption strong { display: block; font-size: 1rem; }
        .image-caption span { color: #d8e4f5; font-size: .83rem; }
        .trust-strip { position: relative; z-index: 2; margin-top: -32px; }
        .trust-inner { display: grid; grid-template-columns: repeat(3,1fr); background: white; border: 1px solid var(--line); box-shadow: var(--shadow); border-radius: 20px; padding: 24px 30px; }
        .trust-item { padding: 4px 24px; border-right: 1px solid var(--line); }
        .trust-item:first-child { padding-left: 4px; }
        .trust-item:last-child { border-right: 0; }
        .trust-item strong { display: block; color: var(--primary); font-size: 1rem; }
        .trust-item span { color: var(--muted); font-size: .84rem; }
        section { padding: 88px 0; }
        .section-head { max-width: 720px; margin-bottom: 34px; }
        .kicker { display: inline-block; color: var(--primary); text-transform: uppercase; letter-spacing: .13em; font-size: .76rem; font-weight: 850; margin-bottom: 10px; }
        .section-title { color: var(--ink); font-size: clamp(1.9rem, 3.5vw, 2.8rem); line-height: 1.16; letter-spacing: -.04em; margin: 0 0 13px; }
        .muted { color: var(--muted); }
        .section-copy { margin: 0; color: var(--muted); }
        .profile-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px; }
        .profile-card { padding: 28px; border: 1px solid var(--line); border-radius: var(--radius); background: white; }
        .profile-card h3 { margin: 0 0 10px; color: var(--primary); font-size: 1.15rem; }
        .profile-card p { margin: 0; color: var(--muted); white-space: normal; }
        .profile-mark { display: grid; place-items: center; width: 46px; height: 46px; border-radius: 14px; background: color-mix(in srgb, var(--primary) 9%, white); color: var(--primary); font-size: 1.3rem; margin-bottom: 18px; }
        .soft-section { background: var(--paper); }
        .cards { display: grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap: 20px; margin-top: 30px; }
        .card { min-width: 0; overflow: hidden; background: white; border: 1px solid var(--line); border-radius: 19px; transition: transform .22s, box-shadow .22s; }
        .card:hover { transform: translateY(-5px); box-shadow: var(--shadow); }
        .card-body { padding: 23px; }
        .card img { display: block; width: 100%; height: 210px; object-fit: cover; }
        .card h3 { color: var(--primary); font-size: 1.12rem; line-height: 1.35; margin: 0 0 10px; }
        .card p { color: var(--muted); margin: 0 0 12px; }
        .card-link { display: inline-flex; gap: 7px; align-items: center; margin-top: 5px; color: var(--primary); font-size: .9rem; font-weight: 800; }
        .card-link:hover { text-decoration: underline; }
        .empty-image { height: 145px; display: grid; place-items: center; color: var(--primary); background: linear-gradient(135deg,color-mix(in srgb, var(--primary) 10%, white),color-mix(in srgb, var(--accent) 20%, white)); font-size: 2.2rem; }
        .video-panel { display: grid; grid-template-columns: 1fr auto; align-items: center; gap: 26px; padding: 34px; border-radius: 24px; color: white; background: linear-gradient(115deg,var(--primary),color-mix(in srgb, var(--primary) 72%, #4d84c6)); }
        .video-panel h2 { margin: 0 0 8px; font-size: clamp(1.5rem, 3vw, 2.2rem); line-height: 1.2; }
        .video-panel p { color: #dce8f7; margin: 0; }
        .video-panel .btn { white-space: nowrap; }
        footer { background: #0e1c32; color: #d5dfed; padding: 56px 0 24px; }
        .footer-grid { display: grid; grid-template-columns: 1.2fr .8fr; gap: 40px; }
        .footer-brand { font-size: 1.25rem; font-weight: 850; color: white; }
        .footer-copy { max-width: 540px; color: #aebdd2; }
        .contact-list { display: grid; gap: 10px; color: #d5dfed; font-size: .92rem; }
        .contact-list a:hover, .socials a:hover { color: var(--accent); }
        .socials { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 18px; }
        .socials a { border: 1px solid #ffffff24; border-radius: 99px; padding: 7px 12px; font-size: .83rem; }
        .copyright { border-top: 1px solid #ffffff1a; margin-top: 38px; padding-top: 20px; color: #91a2bb; font-size: .82rem; }

        /* Depth / 3D treatment */
        .hero { perspective: 1200px; }
        .hero-visual { perspective: 1000px; transform-style: preserve-3d; }
        .hero-visual:before { content: ""; position: absolute; z-index: -1; inset: 20px -14px -14px 20px; border-radius: 32px; background: linear-gradient(135deg, var(--accent), #ffffff30 55%, #68a0ee); opacity: .72; transform: rotate(4deg) translateZ(-25px); filter: blur(.2px); }
        .hero-visual:after { content: ""; position: absolute; z-index: -2; width: 130px; height: 130px; right: -28px; top: -28px; border-radius: 30px; border: 1px solid #ffffff65; background: linear-gradient(145deg,#ffffff30,#ffffff05); box-shadow: inset 0 1px 1px #ffffff65, 0 20px 45px #071a3b30; transform: rotate(12deg) translateZ(-50px); }
        .hero-image, .hero-placeholder { transform: rotateY(-5deg) rotateX(2deg) translateZ(18px); transform-origin: center; box-shadow: 0 38px 55px -25px #031128a6, 0 18px 35px #03112845, inset 0 1px 0 #ffffff80; transition: transform .45s ease, box-shadow .45s ease; }
        .hero-visual:hover .hero-image, .hero-visual:hover .hero-placeholder { transform: rotateY(-1deg) rotateX(0) translateY(-5px) translateZ(28px); box-shadow: 0 45px 65px -25px #031128b8, 0 24px 45px #03112850; }
        .image-caption { transform: translateZ(55px); box-shadow: 0 16px 35px #06152b45, inset 0 1px 0 #ffffff38; }
        .trust-inner { transform: translateY(0) translateZ(18px); box-shadow: 0 28px 60px -35px rgba(14,35,68,.42), 0 12px 24px rgba(14,35,68,.07), inset 0 1px 0 #fff; }
        .trust-item strong { text-shadow: 0 1px 0 #ffffff; }
        .profile-card { position: relative; overflow: hidden; box-shadow: 0 12px 0 color-mix(in srgb, var(--primary) 5%, white), 0 20px 35px -25px rgba(20,39,72,.32), inset 0 1px 0 #fff; transition: transform .28s ease, box-shadow .28s ease; }
        .profile-card:after { content: ""; position: absolute; width: 140px; height: 140px; right: -55px; top: -65px; border-radius: 50%; background: radial-gradient(circle, color-mix(in srgb, var(--accent) 17%, transparent), transparent 70%); pointer-events: none; }
        .profile-card:hover { transform: translateY(-7px) rotateX(2deg); box-shadow: 0 7px 0 color-mix(in srgb, var(--primary) 6%, white), 0 28px 42px -24px rgba(20,39,72,.42), inset 0 1px 0 #fff; }
        .profile-mark { box-shadow: 0 6px 0 color-mix(in srgb, var(--primary) 13%, white), 0 12px 20px color-mix(in srgb, var(--primary) 12%, transparent), inset 0 1px 0 #ffffff; }
        .card { position: relative; transform: perspective(1000px) translateY(0) rotateX(0); box-shadow: 0 5px 0 #e9edf4, 0 12px 25px -20px rgba(20,39,72,.42), inset 0 1px 0 #fff; }
        .card:hover { transform: perspective(1000px) translateY(-8px) rotateX(2deg); box-shadow: 0 2px 0 color-mix(in srgb, var(--primary) 12%, white), 0 30px 40px -22px rgba(20,39,72,.38), inset 0 1px 0 #fff; }
        .card img { transition: transform .45s ease, filter .45s ease; }
        .card:hover img { transform: scale(1.035); filter: saturate(1.08); }
        .card > img { width: calc(100% - 16px); margin: 8px 8px 0; border-radius: 13px; }
        .empty-image { margin: 8px 8px 0; border-radius: 13px; box-shadow: inset 0 1px 0 #ffffffa6; }
        .video-panel { position: relative; overflow: hidden; box-shadow: 0 9px 0 color-mix(in srgb, var(--primary) 18%, #0c2446), 0 28px 50px -28px rgba(9,30,64,.55), inset 0 1px 0 #ffffff40; }
        .video-panel:after { content: ""; position: absolute; width: 250px; height: 250px; right: 8%; top: -155px; border-radius: 50%; border: 1px solid #ffffff35; box-shadow: 0 0 0 22px #ffffff0c, 0 0 0 48px #ffffff08; pointer-events: none; }
        .btn-primary { box-shadow: 0 5px 0 color-mix(in srgb, var(--accent) 68%, #8a5b0c), 0 12px 22px color-mix(in srgb, var(--accent) 30%, transparent), inset 0 1px 0 #ffffff90; }
        .btn-primary:hover { box-shadow: 0 3px 0 color-mix(in srgb, var(--accent) 68%, #8a5b0c), 0 16px 28px color-mix(in srgb, var(--accent) 34%, transparent), inset 0 1px 0 #ffffff90; }
        @media(max-width:680px) {
            .hero-visual:before { inset: 12px -7px -7px 12px; }
            .hero-visual:after { width: 82px; height: 82px; right: -10px; top: -16px; border-radius: 20px; }
            .hero-image, .hero-placeholder { transform: none; }
            .hero-visual:hover .hero-image, .hero-visual:hover .hero-placeholder { transform: translateY(-3px); }
            .trust-inner { transform: none; }
        }
        @media(prefers-reduced-motion:reduce) {
            .hero-image, .hero-placeholder, .profile-card, .card, .card img { transition: none !important; }
            .hero-visual:hover .hero-image, .hero-visual:hover .hero-placeholder, .profile-card:hover, .card:hover { transform: none; }
        }

        @media(max-width:900px) { .nav-right { gap: 16px; } .nav-links { gap: 14px; } .hero-inner { min-height: auto; padding: 60px 0 76px; gap: 34px; } .hero-image { height: 330px; } .cards { grid-template-columns: repeat(2,minmax(0,1fr)); } }
        @media(max-width:680px) {
            .container { width: min(100% - 30px, 1160px); }
            .nav { min-height: 72px; gap: 12px; } .brand img { width: 43px; height: 43px; flex-basis: 43px; } .brand-name { max-width: 210px; font-size: .9rem; } .brand small { font-size: .7rem; }
            .nav-right { gap: 0; } .nav-links { display: none; } .nav-right .btn { padding: 10px 12px; font-size: .82rem; }
            .hero-inner { grid-template-columns: 1fr; padding: 50px 0 64px; } h1 { font-size: clamp(2.45rem, 12vw, 3.5rem); } .hero-image { height: 290px; } .hero-placeholder { min-height: 240px; }
            .trust-strip { margin-top: -24px; } .trust-inner { grid-template-columns: 1fr; padding: 12px 20px; } .trust-item, .trust-item:first-child { padding: 13px 0; border-right: 0; border-bottom: 1px solid var(--line); } .trust-item:last-child { border-bottom: 0; }
            section { padding: 62px 0; } .profile-grid, .cards, .footer-grid { grid-template-columns: 1fr; } .card img { height: 220px; }
            .video-panel { grid-template-columns: 1fr; padding: 26px; } .video-panel .btn { justify-self: start; } .footer-grid { gap: 25px; }
        }
        @media(prefers-reduced-motion:reduce) { html { scroll-behavior: auto; } *,*:before,*:after { transition: none !important; } }
    </style>
</head>
<body>
<header class="site-header">
    <div class="container nav">
        <a class="brand" href="<?= current_url() ?>">
            <?php if (! empty($school['logo_path'])): ?><img src="<?= base_url(esc($school['logo_path'])) ?>" alt="Logo <?= esc($school['name']) ?>"><?php endif ?>
            <span class="brand-name"><?= esc($school['name']) ?><small><?= esc($school['tagline'] ?? '') ?></small></span>
        </a>
        <div class="nav-right">
            <nav class="nav-links" aria-label="Navigasi utama">
                <a href="#profil">Profil</a><a href="#program">Program</a><a href="#berita">Berita</a><a href="#kontak">Kontak</a>
            </nav>
            <?php if (! empty($school['whatsapp'])): ?><a class="btn btn-primary" href="https://wa.me/<?= esc(preg_replace('/\D+/', '', $school['whatsapp'])) ?>">Hubungi kami <span aria-hidden="true">↗</span></a><?php endif ?>
        </div>
    </div>
</header>
<main>
    <section class="hero">
        <div class="container hero-inner">
            <div>
                <span class="eyebrow">Website resmi sekolah</span>
                <h1><?= esc($school['hero_title'] ?: 'Selamat Datang di ' . $school['name']) ?></h1>
                <p class="hero-copy"><?= nl2br(esc($school['hero_description'] ?? 'Membangun generasi berilmu, berkarakter, dan siap menghadapi masa depan.')) ?></p>
                <div class="hero-actions">
                    <?php if (! empty($school['whatsapp'])): ?><a class="btn btn-primary" href="https://wa.me/<?= esc(preg_replace('/\D+/', '', $school['whatsapp'])) ?>">Hubungi sekolah <span aria-hidden="true">↗</span></a><?php endif ?>
                    <a class="btn btn-outline" href="#profil">Kenali sekolah <span aria-hidden="true">↓</span></a>
                </div>
                <div class="hero-note">Tempat tumbuh, belajar, dan menyiapkan masa depan.</div>
            </div>
            <div class="hero-visual">
                <?php if (! empty($school['hero_image_path'])): ?>
                    <img class="hero-image" src="<?= base_url(esc($school['hero_image_path'])) ?>" alt="Foto <?= esc($school['name']) ?>">
                <?php else: ?>
                    <div class="hero-placeholder" aria-hidden="true">🏫</div>
                <?php endif ?>
                <div class="image-caption"><strong><?= esc($school['name']) ?></strong><span><?= esc($school['tagline'] ?: 'Mendidik dengan hati, menginspirasi masa depan.') ?></span></div>
            </div>
        </div>
    </section>

    <div class="container trust-strip" aria-label="Informasi sekolah">
        <div class="trust-inner">
            <div class="trust-item"><strong>Profil &amp; Visi</strong><span>Kenali nilai dan arah pendidikan kami</span></div>
            <div class="trust-item"><strong>Program Unggulan</strong><span>Temukan potensi dan minat peserta didik</span></div>
            <div class="trust-item"><strong>Informasi Terbaru</strong><span>Berita, kegiatan, dan pengumuman sekolah</span></div>
        </div>
    </div>

    <?php if (! empty($school['welcome_title']) || ! empty($school['welcome_text']) || ! empty($school['vision']) || ! empty($school['mission'])): ?>
    <section id="profil">
        <div class="container">
            <div class="section-head">
                <span class="kicker">Tentang kami</span>
                <h2 class="section-title"><?= esc($school['welcome_title'] ?: 'Mengenal Lebih Dekat Sekolah Kami') ?></h2>
                <?php if (! empty($school['welcome_text'])): ?><p class="section-copy"><?= nl2br(esc($school['welcome_text'])) ?></p><?php endif ?>
            </div>
            <?php if (! empty($school['vision']) || ! empty($school['mission'])): ?>
            <div class="profile-grid">
                <?php if (! empty($school['vision'])): ?><article class="profile-card"><div class="profile-mark" aria-hidden="true">✦</div><h3>Visi Sekolah</h3><p><?= nl2br(esc($school['vision'])) ?></p></article><?php endif ?>
                <?php if (! empty($school['mission'])): ?><article class="profile-card"><div class="profile-mark" aria-hidden="true">◎</div><h3>Misi Sekolah</h3><p><?= nl2br(esc($school['mission'])) ?></p></article><?php endif ?>
            </div>
            <?php endif ?>
        </div>
    </section>
    <?php endif ?>

    <?php if (! empty($sections)): ?>
    <section id="program" class="soft-section">
        <div class="container">
            <div class="section-head"><span class="kicker">Jelajahi sekolah</span><h2 class="section-title">Program dan Informasi Sekolah</h2><p class="section-copy">Informasi kegiatan, program unggulan, dan berbagai hal menarik yang dikelola langsung oleh sekolah.</p></div>
            <div class="cards">
                <?php foreach ($sections as $section): ?>
                    <article class="card">
                        <?php if (! empty($section['image_path'])): ?><img src="<?= base_url(esc($section['image_path'])) ?>" alt="<?= esc($section['title'] ?? '') ?>"><?php else: ?><div class="empty-image" aria-hidden="true">✦</div><?php endif ?>
                        <div class="card-body">
                            <h3><?= esc($section['title'] ?: ucwords(str_replace('_', ' ', $section['section_key']))) ?></h3>
                            <?php if (! empty($section['body'])): ?><p><?= nl2br(esc($section['body'])) ?></p><?php endif ?>
                            <?php if (! empty($section['video_url'])): ?><a class="card-link" href="<?= esc($section['video_url']) ?>" target="_blank" rel="noopener noreferrer">Tonton video <span aria-hidden="true">↗</span></a><?php endif ?>
                            <?php if (! empty($section['button_label']) && ! empty($section['button_url'])): ?><a class="card-link" href="<?= esc($section['button_url']) ?>" target="_blank" rel="noopener noreferrer"><?= esc($section['button_label']) ?> <span aria-hidden="true">↗</span></a><?php endif ?>
                        </div>
                    </article>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <?php endif ?>

    <?php if (! empty($posts)): ?>
    <section id="berita">
        <div class="container">
            <div class="section-head"><span class="kicker">Kabar sekolah</span><h2 class="section-title">Berita dan Pengumuman</h2><p class="section-copy">Ikuti kabar terbaru, kegiatan, dan informasi penting dari sekolah.</p></div>
            <div class="cards">
                <?php foreach ($posts as $post): ?>
                    <article class="card">
                        <?php if (! empty($post['cover_image_path'])): ?><img src="<?= base_url(esc($post['cover_image_path'])) ?>" alt="<?= esc($post['title']) ?>"><?php else: ?><div class="empty-image" aria-hidden="true">▤</div><?php endif ?>
                        <div class="card-body"><h3><?= esc($post['title']) ?></h3><?php if (! empty($post['excerpt'])): ?><p><?= esc($post['excerpt']) ?></p><?php endif ?></div>
                    </article>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <?php endif ?>

    <?php if (! empty($school['hero_video_url'])): ?>
    <section class="soft-section">
        <div class="container">
            <div class="video-panel">
                <div><span class="kicker" style="color:var(--accent)">Lihat lebih dekat</span><h2>Kenali lingkungan dan kegiatan sekolah</h2><p>Saksikan cerita, aktivitas, dan suasana belajar di <?= esc($school['name']) ?>.</p></div>
                <a class="btn btn-primary" href="<?= esc($school['hero_video_url']) ?>" target="_blank" rel="noopener noreferrer">Tonton video <span aria-hidden="true">▶</span></a>
            </div>
        </div>
    </section>
    <?php endif ?>
</main>
<footer id="kontak">
    <div class="container">
        <div class="footer-grid">
            <div><div class="footer-brand"><?= esc($school['name']) ?></div><?php if (! empty($school['tagline'])): ?><p class="footer-copy"><?= esc($school['tagline']) ?></p><?php endif ?><p class="footer-copy">Membangun lingkungan belajar yang positif untuk menumbuhkan generasi berilmu, berkarakter, dan siap menghadapi masa depan.</p></div>
            <div><div class="footer-brand" style="font-size:1rem;margin-bottom:14px">Hubungi Kami</div><div class="contact-list">
                <?php if (! empty($school['address'])): ?><div>⌖ &nbsp;<?= nl2br(esc($school['address'])) ?></div><?php endif ?>
                <?php if (! empty($school['phone'])): ?><div>☎ &nbsp;<?= esc($school['phone']) ?></div><?php endif ?>
                <?php if (! empty($school['email'])): ?><div>✉ &nbsp;<a href="mailto:<?= esc($school['email']) ?>"><?= esc($school['email']) ?></a></div><?php endif ?>
                <?php if (! empty($school['whatsapp'])): ?><div>◉ &nbsp;<a href="https://wa.me/<?= esc(preg_replace('/\D+/', '', $school['whatsapp'])) ?>">WhatsApp sekolah</a></div><?php endif ?>
            </div>
            <div class="socials"><?php foreach (['instagram_url' => 'Instagram', 'facebook_url' => 'Facebook', 'tiktok_url' => 'TikTok', 'youtube_url' => 'YouTube'] as $field => $label): ?><?php if (! empty($school[$field])): ?><a href="<?= esc($school[$field]) ?>" target="_blank" rel="noopener noreferrer"><?= esc($label) ?> ↗</a><?php endif ?><?php endforeach ?></div></div>
        </div>
        <div class="copyright">© <?= date('Y') ?> <?= esc($school['name']) ?>. Dikelola melalui platform WEB SEMUA.</div>
    </div>
</footer>
</body>
</html>
