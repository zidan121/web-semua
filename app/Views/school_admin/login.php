<!doctype html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login Admin Sekolah — WEB SEMUA</title>
<style>
*{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;background:linear-gradient(135deg,#102b53,#234f88);font-family:system-ui,-apple-system,"Segoe UI",sans-serif;color:#172033;padding:20px}.panel{width:min(420px,100%);background:#fff;border-radius:20px;padding:32px;box-shadow:0 24px 70px #0003}.brand{font-weight:900;color:#163a70;font-size:1.2rem}.brand span{color:#f4a62a}h1{font-size:1.8rem;margin:24px 0 6px}p{color:#667085}.field{display:block;font-weight:650;margin:18px 0 6px}input{width:100%;padding:12px;border:1px solid #d5dce7;border-radius:9px;font:inherit}button{width:100%;padding:13px;border:0;border-radius:9px;background:#163a70;color:white;font:inherit;font-weight:800;margin-top:22px;cursor:pointer}.error{background:#fff0f0;color:#a32020;padding:12px;border-radius:9px;font-size:.92rem}a{color:#163a70}
</style></head><body><main class="panel">
<a class="brand" href="<?= site_url('/') ?>">WEB <span>SEMUA</span></a><h1>Login admin sekolah</h1><p>Masuk untuk mengelola identitas dan konten website sekolah.</p>
<?php if (! empty($error)): ?><div class="error"><?= esc($error) ?></div><?php endif ?>
<form method="post" action="<?= site_url('admin/sekolah/login') ?>">
<?= csrf_field() ?>
<label class="field" for="email">Email admin</label><input id="email" name="email" type="email" autocomplete="username" required>
<label class="field" for="password">Kata sandi</label><input id="password" name="password" type="password" autocomplete="current-password" required>
<button type="submit">Masuk ke panel admin</button>
</form></main></body></html>
