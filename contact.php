<?php
require_once __DIR__ . '/functions.php';
render_header('Contact', 'contact');
?>

<main class="container py-5">
    <div class="row g-5">
        <div class="col-lg-5">
            <h1 class="fw-bold mb-3">Hubungi kami</h1>
            <p class="text-secondary">
                Jika Anda memiliki pertanyaan, kebutuhan website, atau ingin bekerja sama, kirimkan pesan Anda.
            </p>
            <ul class="list-unstyled">
                <li class="mb-3"><strong>Email:</strong> hello@technova.id</li>
                <li class="mb-3"><strong>Phone:</strong> +62 812-3456-7890</li>
                <li class="mb-3"><strong>Alamat:</strong> Jl. Merdeka No. 12, Bandung</li>
            </ul>
        </div>

        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="5" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php render_footer(); ?>
