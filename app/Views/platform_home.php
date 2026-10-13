<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB SEMUA — Platform Website Sekolah</title>
    <meta name="description" content="Platform website sekolah yang mudah dikelola, fleksibel, dan siap digunakan berbagai sekolah.">
    <style>
        :root { --navy:#163a70; --gold:#f4a62a; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:Inter,system-ui,-apple-system,"Segoe UI",sans-serif; color:#172033; line-height:1.65; }
        .container { width:min(1100px,calc(100% - 40px)); margin:auto; }
        header { border-bottom:1px solid #e7eaf0; }
        nav { min-height:76px; display:flex; justify-content:space-between; align-items:center; }
        .logo { color:var(--navy); font-weight:900; font-size:1.3rem; letter-spacing:-.04em; }
        .logo span { color:var(--gold); }
        .hero { background:linear-gradient(130deg,#102b53,var(--navy)); color:white; padding:80px 0; }
        .hero-grid { display:grid; grid-template-columns:1.2fr .8fr; align-items:center; gap:44px; }
        .label { display:inline-block; background:#ffffff1c; padding:7px 12px; border-radius:99px; font-size:.85rem; }
        h1 { font-size:clamp(2.5rem,5vw,4.6rem); line-height:1.06; letter-spacing:-.05em; margin:18px 0; }
        .hero p { color:#dce7f8; font-size:1.1rem; max-width:650px; }
        .cta { display:inline-block; padding:12px 18px; border-radius:10px; background:var(--gold); color:#1b2738; font-weight:800; margin-top:14px; }
        .preview { background:#fff; color:#172033; border-radius:20px; padding:22px; box-shadow:0 25px 80px #0004; transform:rotate(1deg); }
        .preview-bar { display:flex; gap:6px; padding-bottom:16px; border-bottom:1px solid #e8edf4; }
        .dot { width:9px; height:9px; border-radius:50%; background:#c8d1df; }
        .preview-banner { margin-top:18px; border-radius:14px; background:linear-gradient(120deg,#163a70,#487fc5); color:white; padding:26px 20px; }
        .preview-banner strong { font-size:1.45rem; display:block; line-height:1.2; }
        .preview-cards { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; margin-top:12px; }
        .preview-cards span { background:#f0f4fa; border-radius:8px; height:56px; }
        section { padding:68px 0; }
        h2 { color:var(--navy); font-size:clamp(1.8rem,3vw,2.5rem); line-height:1.2; margin:0 0 12px; }
        .muted { color:#667085; }
        .features { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-top:28px; }
        .feature { border:1px solid #e6eaf0; padding:22px; border-radius:16px; }
        .icon { font-size:1.6rem; }
        footer { background:#111c30; color:#cbd5e1; padding:28px 0; }
        @media(max-width:760px) { .hero-grid { grid-template-columns:1fr; } .hero { padding:55px 0; } .features { grid-template-columns:1fr; } nav { min-height:64px; } }
    </style>
</head>
<body>
<header><nav class="container"><a class="logo" href="<?= site_url('/') ?>">WEB <span>SEMUA</span></a><span class="muted">Platform Website Sekolah</span></nav></header>
<main>
    <section class="hero"><div class="container hero-grid">
        <div><span class="label">Satu platform · Banyak sekolah</span><h1>Website sekolah, mudah dikelola siapa saja.</h1>
            <p>Kelola identitas, foto, berita, program, warna, video, dan informasi sekolah melalui satu panel admin—tanpa perlu mengubah kode website.</p>
            <a class="cta" href="#fitur">Jelajahi fitur ↓</a>
        </div>
        <div class="preview" aria-label="Ilustrasi tampilan website sekolah">
            <div class="preview-bar"><i class="dot"></i><i class="dot"></i><i class="dot"></i></div>
            <div class="preview-banner"><small>WEBSITE RESMI SEKOLAH</small><strong>Belajar, Bertumbuh, Berprestasi.</strong><p style="font-size:.85rem;color:#e3eaf5">Identitas dan konten dapat disesuaikan admin.</p></div>
            <div class="preview-cards"><span></span><span></span><span></span></div>
        </div>
    </div></section>
    <section id="fitur"><div class="container">
        <h2>Semua kebutuhan website sekolah</h2><p class="muted">Dibangun agar tiap sekolah memiliki website dengan identitasnya sendiri.</p>
        <div class="features">
            <article class="feature"><div class="icon">🎨</div><h3>Identitas fleksibel</h3><p class="muted">Atur logo, warna, nama, slogan, alamat, kontak, dan tautan media sosial.</p></article>
            <article class="feature"><div class="icon">🖼️</div><h3>Konten dan media</h3><p class="muted">Kelola foto, galeri, video, program unggulan, berita, dan pengumuman.</p></article>
            <article class="feature"><div class="icon">🏫</div><h3>Multi-sekolah</h3><p class="muted">Setiap sekolah memiliki akun admin serta konten yang terpisah dari sekolah lain.</p></article>
        </div>
    </div></section>
</main>
<footer><div class="container">© <?= date('Y') ?> WEB SEMUA · Platform Website Sekolah</div></footer>
</body>
</html>
