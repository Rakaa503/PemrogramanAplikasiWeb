<?php
    $nama = "Rakha Avilla";
    $nim = "2441078";
    $kampus = "STT Mandala";
    $prodi = "Teknik Informatika";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $nama; ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        nav {
            background: white;
            border-bottom: 1px solid #ddd;
            padding: 18px 10%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav h2 {
            color: #1d5fa7;
            font-size: 20px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        nav a {
            color: #444;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #1d5fa7;
        }

        .container {
            width: 80%;
            max-width: 1000px;
            margin: auto;
        }

        .hero {
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-text h1 {
            color: #1d3557;
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            color: #1d5fa7;
        }

        .hero-text p {
            color: #666;
            font-size: 16px;
            line-height: 1.8;
            max-width: 550px;
        }

        .info {
            margin-top: 25px;
        }

        .info p {
            margin-bottom: 8px;
            color: #444;
        }

        .foto {
            width: 300px;
            height: 360px;
            overflow: hidden;
            border-radius: 12px;
            background: #ddd;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
            animation: muncul 1s ease;
        }

        .foto img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .section {
            background: white;
            padding: 70px 0;
            border-top: 1px solid #e5e5e5;
        }

        .section h2 {
            color: #1d3557;
            margin-bottom: 15px;
        }

        .section > .container > p {
            color: #666;
            line-height: 1.8;
        }

        .data {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .data-item {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fafafa;
            transition: 0.3s;
        }

        .data-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .data-item strong {
            display: block;
            color: #1d5fa7;
            margin-bottom: 7px;
        }

        footer {
            background: #1d3557;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 14px;
        }

        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 700px) {

            nav {
                padding: 18px 5%;
            }

            nav ul {
                display: none;
            }

            .container {
                width: 90%;
            }

            .hero {
                min-height: auto;
                padding: 60px 0;
                flex-direction: column-reverse;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 38px;
            }

            .foto {
                width: 250px;
                height: 300px;
            }

            .data {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <nav>
        <h2>Rakha Avilla</h2>

        <ul>
            <li>
                <a href="#home">Home</a>
            </li>

            <li>
                <a href="#data">Data Diri</a>
            </li>

            <li>
                <a href="#tentang">Tentang</a>
            </li>
        </ul>
    </nav>


    <main>

        <section class="hero container" id="home">

            <div class="hero-text">

                <h1>
                    Halo, saya<br>
                    <span><?= $nama; ?></span>
                </h1>

                <p>
                    Saya mahasiswa <?= $prodi; ?> di <?= $kampus; ?>.
                    Website ini dibuat sebagai tugas mata kuliah
                    Pemrograman Web.
                </p>

                <div class="info">

                    <p>
                        <strong>NIM:</strong>
                        <?= $nim; ?>
                    </p>

                    <p>
                        <strong>Program Studi:</strong>
                        <?= $prodi; ?>
                    </p>

                    <p>
                        <strong>Kampus:</strong>
                        <?= $kampus; ?>
                    </p>

                </div>

            </div>


            <div class="foto">

                <img
                    src="avidev.jpeg"
                    alt="Foto <?= $nama; ?>"
                >

            </div>

        </section>


        <section class="section" id="data">

            <div class="container">

                <h2>Data Diri</h2>

                <p>
                    Berikut adalah data singkat saya sebagai
                    mahasiswa Teknik Informatika.
                </p>

                <div class="data">

                    <div class="data-item">
                        <strong>Nama</strong>
                        <?= $nama; ?>
                    </div>

                    <div class="data-item">
                        <strong>NIM</strong>
                        <?= $nim; ?>
                    </div>

                    <div class="data-item">
                        <strong>Kampus</strong>
                        <?= $kampus; ?>
                    </div>

                    <div class="data-item">
                        <strong>Program Studi</strong>
                        <?= $prodi; ?>
                    </div>

                </div>

            </div>

        </section>


        <section class="section" id="tentang">

            <div class="container">

                <h2>Tentang Website</h2>

                <p>
                    Website ini dibuat untuk tugas Pemrograman Web.
                    HTML digunakan untuk struktur halaman, CSS untuk
                    tampilan, dan PHP untuk menampilkan data secara
                    dinamis.
                </p>

            </div>

        </section>

    </main>


    <footer>

        &copy; 2026 <?= $nama; ?> -
        <?= $kampus; ?>

    </footer>

</body>
</html>