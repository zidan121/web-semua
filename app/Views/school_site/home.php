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
        :root { --primary: <?= esc($school['primary_color'] ?: '#163A70') ?>; --accent: <?= esc($school['secondary_color'] ?: '#F4A62A') ?>; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #172033; font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif; line-height: 1.65; }
        a { color: inherit; text-decoration: none; }
        .container { width: min(1120px, calc(100% - 40px)); margin: auto; }
        header { border-bottom: 1px solid #e7eaf0; background: white; }
        .nav { min-height: 78px; display:flex; align-items:center; justify-content:space-between; gap:20px; }
        .brand { display:flex; align-items:center; gap:12px; font-weight:800; color:var(--primary); }
        .brand img { width:48px; height:48px; object-fit:contain; }
        .nav-links { display:flex; gap:22px; flex-wrap:wrap; font-size:.94rem; }
        .hero { color:white; background:linear-gradient(115deg, color-mix(in srgb, var(--primary) 96%, black), color-mix(in srgb, var(--primary) 68%, #477fc7)); overflow:hidden; }
        .hero-inner { min-height:420px; padding:68px 0; display:grid; grid-template-columns:1.2fr .8fr; align-items:center; gap:42px; }
        .eyebrow { display:inline-block; background:rgba(255,255,255,.13); padding:7px 12px; border-radius:99px; font-size:.84rem; }
        h1 { font-size:clamp(2.2rem, 5vw, 4.2rem); line-height:1.08; margin:18px 0; letter-spacing:-.035em; }
        .hero p { max-width:640px; color:#e3eaf5; font-size:1.08rem; }
        .hero-image { width:100%; max-height:340px; object-fit:cover; border-radius:24px; border:1px solid rgba(255,255,255,.3); box-shadow:0 24px 70px #0003; }
        .button { display:inline-block; background:var(--accent); color:#1d2635; padding:12px 20px; border-radius:10px; font-weight:800; margin-top:14px; }
        section { padding:64px 0; }
        .section-heading { color:var(--primary); font-size:clamp(1.7rem,3vw,2.4rem); margin:0 0 12px; line-height:1.2; }
        .muted { color:#657087; }
        .cards { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:18px; margin-top:28px; }
        .card { border:1px solid #e7eaf0; border-radius:16px; padding:24px; background:white; }
        .card img { width:100%; max-height:210px; object-fit:cover; border-radius:12px; margin-bottom:14px; }
        .news-card h3 { color:var(--primary); margin:0 0 8px; }
        .media-frame { aspect-ratio:16/9; width:100%; border:0; border-radius:16px; background:#eef1f6; }
        footer { background:#111c30; color:#dbe3ef; padding:34px 0; }
        footer a { color:white; }
        .socials { display:flex; gap:14px; flex-wrap:wrap; margin-top:12px; }
        @media(max-width:760px) { .hero-inner { grid-template-columns:1fr; padding:48px 0; } .hero-image { max-height:260px; } .cards { grid-template-columns:1fr; } .nav { align-items:flex-start; padding:14px 0; flex-direction:column; } .nav-links { gap:12px; } section { padding:46px 0; } }
    </style>
</head>
<body>
<header>
    <div class="container nav">
        <a class="brand" href="<?= current_url() ?>">
            <?php if (! empty($school['logo_path'])): ?><img src="<?= base_url(esc($school['logo_path'])) ?>" alt="Logo <?= esc($school['name']) ?>"><?php endif ?>
            <span><?= esc($school['name']) ?><small style="display:block;font-weight:500;color:#657087"><?= esc($school['tagline'] ?? '') ?></small></span>
        </a>
        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="#profil">Profil</a><a href="#program">Program</a><a href="#berita">Berita</a><a href="#kontak">Kontak</a>
        </nav>
    </div>
</header>
<main>
    <div class="hero">
        <div class="container hero-inner">
            <div>
                <span class="eyebrow">Website resmi sekolah</span>
                <h1><?= esc($school['hero_title'] ?: 'Selamat Datang di ' . $school['name']) ?></h1>
                <p><?= nl2br(esc($school['hero_description'] ?? 'Membangun generasi berilmu, berkarakter, dan siap menghadapi masa depan.')) ?></p>
                <?php if (! empty($school['whatsapp'])): ?>
                    <a class="button" href="https://wa.me/<?= esc(preg_replace('/\D+/', '', $school['whatsapp'])) ?>">Hubungi sekolah ↗</a>
                <?php endif ?>
            </div>
            <?php if (! empty($school['hero_image_path'])): ?>
                <img class="hero-image" src="<?= base_url(esc($school['hero_image_path'])) ?>" alt="Foto <?= esc($school['name']) ?>">
            <?php else: ?>
                <div class="hero-image" style="min-height:220px;display:grid;place-items:center;background:linear-gradient(135deg,#ffffff22,#ffffff08);font-size:5rem" aria-hidden="true">🏫</div>
            <?php endif ?>
        </div>
    </div>

    <?php if (! empty($school['welcome_title']) || ! empty($school['welcome_text']) || ! empty($school['vision']) || ! empty($school['mission'])): ?>
    <section id="profil"><div class="container">
        <h2 class="section-heading"><?= esc($school['welcome_title'] ?: 'Profil Sekolah') ?></h2>
        <p class="muted"><?= nl2br(esc($school['welcome_text'] ?? '')) ?></p>
        <div class="cards">
            <?php if (! empty($school['vision'])): ?><article class="card"><h3>Visi</h3><p><?= nl2br(esc($school['vision'])) ?></p></article><?php endif ?>
            <?php if (! empty($school['mission'])): ?><article class="card"><h3>Misi</h3><p><?= nl2br(esc($school['mission'])) ?></p></article><?php endif ?>
        </div>
    </div></section>
    <?php endif ?>

    <?php if (! empty($sections)): ?>
    <section id="program" style="background:#f7f9fc"><div class="container">
        <h2 class="section-heading">Informasi Sekolah</h2>
        <p class="muted">Informasi yang ditampilkan dikelola oleh admin sekolah.</p>
        <div class="cards">
            <?php foreach ($sections as $section): ?>
                <article class="card">
                    <?php if (! empty($section['image_path'])): ?><img src="<?= base_url(esc($section['image_path'])) ?>" alt="<?= esc($section['title'] ?? '') ?>"><?php endif ?>
                    <h3><?= esc($section['title'] ?: ucwords(str_replace('_', ' ', $section['section_key']))) ?></h3>
                    <p class="muted"><?= nl2br(esc($section['body'] ?? '')) ?></p>
                    <?php if (! empty($section['video_url'])): ?><p><a href="<?= esc($section['video_url']) ?>" target="_blank" rel="noopener noreferrer">Tonton video ↗</a></p><?php endif ?>
                    <?php if (! empty($section['button_label']) && ! empty($section['button_url'])): ?><a class="button" href="<?= esc($section['button_url']) ?>" target="_blank" rel="noopener noreferrer"><?= esc($section['button_label']) ?></a><?php endif ?>
                </article>
            <?php endforeach ?>
        </div>
    </div></section>
    <?php endif ?>

    <?php if (! empty($posts)): ?>
    <section id="berita"><div class="container">
        <h2 class="section-heading">Berita dan Pengumuman</h2>
        <div class="cards">
            <?php foreach ($posts as $post): ?>
                <article class="card news-card">
                    <?php if (! empty($post['cover_image_path'])): ?><img src="<?= base_url(esc($post['cover_image_path'])) ?>" alt="<?= esc($post['title']) ?>"><?php endif ?>
                    <h3><?= esc($post['title']) ?></h3>
                    <p class="muted"><?= esc($post['excerpt'] ?? '') ?></p>
                </article>
            <?php endforeach ?>
        </div>
    </div></section>
    <?php endif ?>

    <?php if (! empty($school['hero_video_url'])): ?>
    <section style="background:#f7f9fc"><div class="container">
        <h2 class="section-heading">Video Sekolah</h2>
        <p class="muted">Kenali lebih dekat kegiatan dan lingkungan <?= esc($school['name']) ?>.</p>
        <p><a class="button" href="<?= esc($school['hero_video_url']) ?>" target="_blank" rel="noopener noreferrer">Tonton video sekolah ↗</a></p>
    </div></section>
    <?php endif ?>
</main>
<footer id="kontak"><div class="container">
    <strong><?= esc($school['name']) ?></strong>
    <?php if (! empty($school['address'])): ?><p><?= nl2br(esc($school['address'])) ?></p><?php endif ?>
    <p><?php if (! empty($school['phone'])): ?>Telepon: <?= esc($school['phone']) ?><?php endif ?> <?php if (! empty($school['email'])): ?> · Email: <a href="mailto:<?= esc($school['email']) ?>"><?= esc($school['email']) ?></a><?php endif ?></p>
    <div class="socials">
        <?php foreach (['instagram_url' => 'Instagram', 'facebook_url' => 'Facebook', 'tiktok_url' => 'TikTok', 'youtube_url' => 'YouTube'] as $field => $label): ?>
            <?php if (! empty($school[$field])): ?><a href="<?= esc($school[$field]) ?>" target="_blank" rel="noopener noreferrer"><?= esc($label) ?> ↗</a><?php endif ?>
        <?php endforeach ?>
    </div>
    <p style="font-size:.85rem;color:#9eabc0;margin-top:26px">Dikelola melalui platform WEB SEMUA.</p>
</div></footer>
</body>
</html>
