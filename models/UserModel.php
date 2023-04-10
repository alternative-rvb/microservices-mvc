<?php

require_once 'Database.php';

class UserModel extends Database
{
    // ANCHOR Afficher l'en-tête de la table
    public function createUser($nom, $prenom, $email, $password, $role)
    {
        try {
            // Hasher le mot de passe en utilisant la fonction password_hash()
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $db = new Database();
            $connexion = $db->getPDO();
            // Insérer l'utilisateur et le mot de passe hashé dans la base de données
            $req = $connexion->prepare("INSERT INTO ms_users (last_name, first_name, email,password, role) VALUES (:nom, :prenom, :email, :password, :role)");
            $req->bindParam(":nom", $nom, PDO::PARAM_STR);
            $req->bindParam(":prenom", $prenom, PDO::PARAM_STR);
            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->bindParam(":password", $hashed_password, PDO::PARAM_STR);
            $req->bindParam(":role", $role, PDO::PARAM_INT);
            $req->execute();
            $db->close();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    public function isEmailExists($email)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "SELECT COUNT(*) as total FROM ms_users WHERE email = :email";
            $req = $connexion->prepare($sql);
            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->execute();
            $row = $req->fetch(PDO::FETCH_ASSOC);
            $db->close();
            return $row['total'] > 0;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $req = $connexion->prepare("SELECT * FROM ms_users WHERE email = :email");
            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->execute();
            $user = $req->fetch(PDO::FETCH_ASSOC);
            $db->close();
            return $user;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}
