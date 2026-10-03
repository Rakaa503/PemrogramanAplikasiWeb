<?php
require_once __DIR__ . '/config.php';

function render_header(string $pageTitle, string $currentPage = 'home'): void
{
    global $site;

    $menu = [
        'home' => ['label' => 'Home', 'href' => 'index.php'],
        'about' => ['label' => 'About', 'href' => 'about.php'],
        'contact' => ['label' => 'Contact', 'href' => 'contact.php'],
    ];

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>{$pageTitle} | {$site['title']}</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
    <nav class='navbar navbar-expand-lg navbar-dark bg-primary shadow-sm'>
        <div class='container'>
            <a class='navbar-brand fw-bold' href='index.php'>{$site['title']}</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#mainNav'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='mainNav'>
                <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                    ";

                    foreach ($menu as $key => $item) {
                        $activeClass = $key === $currentPage ? 'active' : '';
                        echo "<li class='nav-item'>
                                <a class='nav-link {$activeClass}' href='{$item['href']}'>{$item['label']}</a>
                            </li>";
                    }

    echo "</ul>
            </div>
        </div>
    </nav>
    ";
}

function render_footer(): void
{
    global $site;

    echo "
    <footer class='bg-dark text-light py-4 mt-5'>
        <div class='container'>
            <div class='row g-4 align-items-center'>
                <div class='col-md-6'>
                    <h5 class='mb-1'>{$site['title']}</h5>
                    <p class='mb-0 text-light-emphasis'>{$site['tagline']}</p>
                </div>
                <div class='col-md-6 text-md-end'>
                    <p class='mb-1'>{$site['email']}</p>
                    <p class='mb-0'>{$site['phone']}</p>
                </div>
            </div>
        </div>
    </footer>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
    </body>
    </html>
    ";
}
