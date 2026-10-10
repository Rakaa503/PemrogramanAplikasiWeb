<?php

declare(strict_types=1);

class Controller
{
    /**
     * Render a view with optional data.
     */
    protected function view(string $view, array $data = []): void
    {
        $viewPath = ROOT_PATH . '/app/views/' . $view . '.php';

        if (!is_file($viewPath)) {
            throw new RuntimeException(
                "View tidak ditemukan: {$view}"
            );
        }

        extract($data, EXTR_SKIP);

        require $viewPath;
    }

    /**
     * Instantiate a model.
     */
    protected function model(string $model): object
    {
        if (!class_exists($model)) {
            throw new RuntimeException(
                "Model tidak ditemukan: {$model}"
            );
        }

        return new $model();
    }

    /**
     * Redirect to an application route.
     */
    protected function redirect(string $path): never
    {
        header(
            'Location: ' . BASEURL . '/' . ltrim($path, '/')
        );

        exit;
    }

    /**
     * Store a flash message in the session.
     */
    protected function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message,
        ];
    }
}
