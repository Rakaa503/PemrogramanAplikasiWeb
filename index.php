<?php
require_once __DIR__ . '/functions.php';
render_header('Home', 'home');
?>

<main>
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge text-bg-primary rounded-pill px-3 py-2 mb-3">Bootstrap 5</span>
                    <h1 class="display-5 fw-bold mb-3">Buat website Anda tampil lebih profesional.</h1>
                    <p class="lead text-secondary mb-4">
                        Kami membantu bisnis, brand, dan personal website berkembang dengan desain modern,
                        cepat, dan mudah diakses di semua perangkat.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#features" class="btn btn-primary btn-lg px-4">Lihat fitur</a>
                        <a href="contact.php" class="btn btn-outline-primary btn-lg px-4">Hubungi kami</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80" class="img-fluid rounded-4 shadow-lg hero-image" alt="Tim kerja sedang berdiskusi">
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kenapa memilih kami?</h2>
                <p class="text-secondary">Semua yang Anda butuhkan untuk mulai online</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3">⚡</div>
                            <h5 class="card-title">Fast & Responsive</h5>
                            <p class="card-text text-secondary">Tampilan yang cepat dan rapi di desktop, tablet, maupun smartphone.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3">🎨</div>
                            <h5 class="card-title">Modern Design</h5>
                            <p class="card-text text-secondary">Desain yang elegan sehingga brand Anda tampil lebih menarik dan terpercaya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="feature-icon mb-3">📈</div>
                            <h5 class="card-title">Growth Focused</h5>
                            <p class="card-text text-secondary">Dirancang untuk membantu Anda menarik lebih banyak pelanggan dan konversi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80" class="img-fluid rounded-4 shadow-sm" alt="Presentasi bisnis">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Tampilan profesional untuk bisnis Anda</h2>
                    <p class="text-secondary mb-4">
                        Dengan desain yang sederhana tapi kuat, website Anda akan lebih mudah dipahami pengunjung
                        dan meningkatkan rasa percaya terhadap produk atau layanan yang ditawarkan.
                    </p>
                    <ul class="list-unstyled feature-list">
                        <li>✓ Mudah navigasi</li>
                        <li>✓ Layout modern & clean</li>
                        <li>✓ Mobile friendly</li>
                        <li>✓ Cocok untuk landing page dan portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php render_footer(); ?>
