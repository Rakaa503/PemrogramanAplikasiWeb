<?php
declare(strict_types=1);

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/config.php';
require_once ROOT_PATH . '/core/Database.php';
require_once ROOT_PATH . '/core/Model.php';
require_once ROOT_PATH . '/core/Controller.php';
require_once ROOT_PATH . '/core/helpers.php';
require_once ROOT_PATH . '/core/App.php';

spl_autoload_register(function (string $class): void {
    $directories = [
        ROOT_PATH . '/app/Models/',
        ROOT_PATH . '/app/models/',
        ROOT_PATH . '/app/controllers/',
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class . '.php';

        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

new App();
