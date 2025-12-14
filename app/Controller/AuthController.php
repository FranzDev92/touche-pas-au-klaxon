<?php
namespace App\Controller;

class AuthController extends BaseController
{
    public function loginForm(): void
    {
        // affiche juste le formulaire de connexion
        $this->render('auth/login');
    }

    public function login(): void
    {
        // 1) Récupération des champs du formulaire
        $email    = trim($_POST['email']    ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            $this->setFlash('danger','Email ou mot de passe manquant.');
            $this->redirect('/login');
        }

        // 2) Récupérer l’utilisateur par email
        //    (table: utilisateur, colonne: email)
        $sql = 'SELECT id, nom, prenom, email, telephone, role, password, is_admin
                FROM utilisateur
                WHERE email = :email
                LIMIT 1';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // 3) Vérification du mot de passe 
        if (!$user || $user['password'] !== $password) {
            $this->setFlash('danger','Identifiants incorrects.');
            $this->redirect('/login');
        }

        // 4) Stockage en session
        $_SESSION['user'] = [
            'id'       => (int)$user['id'],
            'nom'      => $user['nom'],
            'prenom'   => $user['prenom'],
            'email'    => $user['email'],
            'telephone'=> $user['telephone'],
            'role'     => $user['role'],              
            'is_admin' => (int)($user['is_admin'] ?? 0)
        ];

        $this->setFlash('success','Connexion réussie.');

        // 5) Redirection selon le rôle
        if ($_SESSION['user']['is_admin'] === 1 || $_SESSION['user']['role'] === 'admin') {
            $this->redirect('/admin/trajets');
        } else {
            $this->redirect('/');
        }
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->setFlash('success','Vous êtes déconnecté.');
        $this->redirect('/');
    }
}
