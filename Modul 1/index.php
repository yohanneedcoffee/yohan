<?php
// Data produk
$products = [
    ["nama" => "Monitor 24 Inch",     "kategori" => "Monitor",   "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop Productivity", "kategori" => "Laptop",    "harga" => 8500000, "stok" => 3],
    ["nama" => "Webcam HD",           "kategori" => "Aksesoris", "harga" => 1000000, "stok" => 5],
    ["nama" => "Headset Gaming",      "kategori" => "Audio",     "harga" => 750000,  "stok" => 7],
    ["nama" => "Keyboard Mechanical", "kategori" => "Aksesoris", "harga" => 450000,  "stok" => 0],
    ["nama" => "Mouse Wireless",      "kategori" => "Aksesoris", "harga" => 150000,  "stok" => 12],
];

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #fafafa; color: #222; }
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }

       header { background: #000; border-bottom: 1px solid #000; padding: 16px 0; }
       header .container { display: flex; justify-content: space-between; align-items: center; }
       header a { margin-left: 16px; color: #ccc; text-decoration: none; font-size: 14px; }
       header a:hover { color: #fff; }
       .logo { font-weight: bold; font-size: 18px; color: #fff; margin: 0; }

        .hero { padding: 60px 0 40px; }
        .hero h1 { font-size: 36px; margin-bottom: 8px; }
        .hero p { color: #666; }

        .info { margin-bottom: 20px; color: #666; }

        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; padding-bottom: 50px; }
        .card { background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; }
        .kategori { font-size: 13px; color: #888; }
        .card h3 { margin: 4px 0 12px; }
        .harga-lama { font-size: 13px; color: #888; text-decoration: line-through; }
        .diskon { font-size: 13px; color: #c0392b; }
        .harga { font-size: 20px; font-weight: bold; margin-bottom: 12px; }
        .stok { font-size: 14px; color: #555; margin-bottom: 12px; }
        .habis { color: #c0392b; }
        .ada { color: #27ae60; }
        button { width: 100%; padding: 10px; border: none; border-radius: 6px; background: #222; color: #fff; cursor: pointer; }
        button:disabled { background: #ccc; cursor: not-allowed; }

        footer { border-top: 1px solid #ddd; padding: 20px 0; text-align: center; font-size: 14px; color: #888; }

        @media (max-width: 900px) { .grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <span class="logo">Cia Store</span>
            <nav>
                <a href="#">Home</a>
                <a href="#produk">Products</a>
                <a href="#footer">About</a>
            </nav>
        </div>
    </header>

    <section class="hero container">
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
    </section>

    <main class="container" id="produk">
        <h2>Katalog Produk</h2>
        <p class="info">Total Produk: <?= count($products); ?></p>

        <div class="grid">
            <?php foreach ($products as $p) : ?>
                <div class="card">
                    <p class="kategori"><?= $p["kategori"]; ?></p>
                    <h3><?= $p["nama"]; ?></h3>

                    <?php if ($p["harga"] >= 1000000) : ?>
                        <?php $hargaAkhir = $p["harga"] - ($p["harga"] * 10 / 100); ?>
                        <p class="harga-lama"><?= rupiah($p["harga"]); ?></p>
                        <p class="diskon">Diskon 10%</p>
                        <p class="harga"><?= rupiah($hargaAkhir); ?></p>
                    <?php else : ?>
                        <p class="harga"><?= rupiah($p["harga"]); ?></p>
                    <?php endif; ?>

                    <?php if ($p["stok"] > 0) : ?>
                        <p class="stok">Stok: <?= $p["stok"]; ?> - <span class="ada">Tersedia</span></p>
                        <button>Beli Sekarang</button>
                    <?php else : ?>
                        <p class="stok">Stok: 0 - <span class="habis">Stok Habis</span></p>
                        <button disabled>Beli Sekarang</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer id="footer">
        <p>&copy; <?= date("Y"); ?> Cia Store</p>
    </footer>

</body>
</html>