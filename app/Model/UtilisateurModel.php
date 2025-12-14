<?php
namespace App\Model;

use PDO;

class UtilisateurModel extends BaseModel
{
    protected string $table = "utilisateur";


    /**
     * Trouver un utilisateur par son email (pour connexion)
     */
    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    /**
     * Retourne tous les utilisateurs (gestion admin)
     */
    public function findAllUsers(): array
    {
        $sql = "SELECT id, nom, prenom, email, role FROM {$this->table} ORDER BY nom ASC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un utilisateur par son ID
     */
    public function find(int $id): ?array
    {
        $sql = "SELECT id, nom, prenom, email, role FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    /**
     * Mettre à jour un utilisateur
     */
    public function updateUser(int $id, array $data): bool
    {
        $sql = "UPDATE {$this->table}
                SET nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    role = :role
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'role' => $data['role'],
        ]);
    }

    /**
     * Supprimer un utilisateur
     */
    public function deleteUser(int $id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}
