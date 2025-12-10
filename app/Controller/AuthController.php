<?php
namespace App\Controller;

use App\Model\UtilisateurModel;

class AuthController extends BaseController
{
    public function loginForm(): void
    {
        $this->render('auth/login');
    }

    public function login(): void
    {
        $email    = trim($_POST['email']    ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            $this->setFlash('danger', 'Email ou mot de passe manquant.');
            $this->redirect('/login');
        }

        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$user || $user['password'] !== $password) {
            $this->setFlash('danger', 'Identifiants incorrects.');
            $this->redirect('/login');
        }

        $_SESSION['user'] = [
            'id'       => $user['id'],
            'nom'      => $user['nom'],
            'prenom'   => $user['prenom'],
            'role'     => $user['role'],
            'is_admin' => (int)($user['is_admin'] ?? 0),
        ];

        $this->setFlash('success', 'Connexion réussie.');

        if ((int)$_SESSION['user']['is_admin'] === 1 || $_SESSION['user']['role'] === 'admin') {
            $this->redirect('/admin');
        } else {
            $this->redirect('/');
        }
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->setFlash('success', 'Vous êtes déconnecté.');
        $this->redirect('/');
    }
}
