<?php
require_once __DIR__ . '/functions.php';
render_header('About', 'about');
?>

<main class="container py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <h1 class="fw-bold mb-3">Tentang kami</h1>
            <p class="text-secondary">
                TechNova Studio adalah perusahaan digital yang fokus pada pembuatan website, branding,
                dan solusi online untuk bisnis kecil hingga menengah.
            </p>
            <p class="text-secondary">
                Kami percaya bahwa website yang baik tidak hanya indah, tetapi juga membantu bisnis tumbuh,
                menjangkau pelanggan lebih luas, dan meningkatkan kepercayaan merek.
            </p>
        </div>
        <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80" class="img-fluid rounded-4 shadow-sm" alt="Tim perusahaan">
        </div>
    </div>

    <div class="row text-center g-4 mt-2">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-primary">3+</h3>
                    <p class="mb-0 text-secondary">Tahun pengalaman</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-primary">120+</h3>
                    <p class="mb-0 text-secondary">Proyek selesai</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-primary">95%</h3>
                    <p class="mb-0 text-secondary">Kepuasan klien</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php render_footer(); ?>
