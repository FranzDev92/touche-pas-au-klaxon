<?php
namespace App\Controller;

use PDO;

// IMPORTANT : on charge la fonction getPDO() définie dans config/database.php
require_once __DIR__ . '/../../config/database.php';

abstract class BaseController
{
    protected PDO $pdo;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // fonction globale définie dans config/database.php
        $this->pdo = \getPDO();
    }

    protected function render(string $view, array $params = []): void
    {
        // variables disponibles dans la vue
        extract($params);

        // messages flash
        $flash = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']);

        // header + vue + footer
        require __DIR__ . '/../View/layout/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/layout/footer.php';
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    protected function setFlash(string $type, string $message): void
    {
        $_SESSION['flash'][] = [
            'type'    => $type,
            'message' => $message,
        ];
    }

    protected function requireLogin(): void
    {
        if (empty($_SESSION['user'])) {
            $this->setFlash('danger', 'Vous devez être connecté pour accéder à cette page.');
            $this->redirect('/login');
        }
    }

    protected function requireAdmin(): void
    {
        $this->requireLogin();

        $user = $_SESSION['user'] ?? null;

        if (
            !$user
            || (
                (int)($user['is_admin'] ?? 0) !== 1
                && ($user['role'] ?? 'user') !== 'admin'
            )
        ) {
            $this->setFlash('danger', 'Accès réservé aux administrateurs.');
            $this->redirect('/');
        }
    }
}
