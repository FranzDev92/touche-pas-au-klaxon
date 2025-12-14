<?php
namespace App\Controller;

use PDO;

class BaseController
{
    protected PDO $pdo;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // getPDO() est défini dans config/database.php en global
        $this->pdo = \getPDO();
    }

    protected function render(string $view, array $params = []): void
    {
        // variables de la vue
        extract($params);

        // flash
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        require __DIR__ . '/../View/layout/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/layout/footer.php';
    }

    protected function setFlash(string $type, string $message): void
    {
        $_SESSION['flash'] = [
            'type'    => $type,
            'message' => $message,
        ];
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    // Utilisateur simplement connecté 
    protected function requireLogin(): void
    {
        if (empty($_SESSION['user'])) {
            $this->setFlash('warning', 'Veuillez vous connecter pour accéder à cette page.');
            $this->redirect('/login');
        }
    }

    // Réservé aux admins
    protected function requireAdmin(): void
    {
        if (empty($_SESSION['user']) || empty($_SESSION['user']['is_admin'])) {
            $this->setFlash('danger', 'Accès réservé aux administrateurs.');
            $this->redirect('/login');
        }
    }
}
