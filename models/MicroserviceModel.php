<?php

require_once 'Database.php';

class MicroserviceModel extends Database
{
    // ANCHOR Afficher l'en-tête de la table
    public function getTableHeader()
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='" . DB_DATABASE . "' AND TABLE_NAME = 'ms_posts' ORDER BY ORDINAL_POSITION";
            $req = $connexion->query($sql);
            $rows = $req->fetchAll();
            $db->close();
            return $rows;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // ANCHOR READ Afficher tous les utilisateurs
    public function getAllMicroservices()
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "SELECT * FROM ms_posts ORDER BY microservice_id DESC";
            $req = $connexion->query($sql);
            $rows = $req->fetchAll();
            $db->close();

            return $rows;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
    // ANCHOR READ Afficher tous les utilisateurs avec les détails de l'utilisateur
    public function getMicroservicesWithUserDetails()
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "SELECT microservice_id, Titre, Contenu, Prix, Image, Prénom, Nom, Rôle, ms_posts.user_id FROM ms_posts INNER JOIN ms_users ON ms_posts.user_id = ms_users.user_id ORDER BY microservice_id DESC";
            $req = $connexion->query($sql);
            $rows = $req->fetchAll();
            $db->close();

            return $rows;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    // ANCHOR READ Afficher
    public function getMicroserviceById($id)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "SELECT * FROM ms_posts WHERE microservice_id = :id";
            $req = $connexion->prepare($sql);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $row = $req->fetch();
            $db->close();

            return $row;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // ANCHOR READ Afficher pour l'utilisateur
    public function getMicroserviceByUserId($id)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "SELECT ms_posts.microservice_id, Titre, Contenu, Prix, Image, Prénom, Nom, Rôle, ms_posts.user_id FROM ms_posts INNER JOIN ms_users ON ms_posts.user_id = ms_users.user_id WHERE ms_users.user_id = :id ORDER BY ms_posts.microservice_id DESC";
            $req = $connexion->prepare($sql);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $row = $req->fetchAll();
            $db->close();

            return $row;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // ANCHOR CREATE Créer
    public function createMicroservice($titre, $contenu, $prix, $image, $userID)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "INSERT INTO ms_posts (Titre, Contenu, Prix, Image, user_id) VALUES (:titre, :contenu, :prix, :image, :userID)";
            $req = $connexion->prepare($sql);
            $req->bindParam(':titre', $titre, PDO::PARAM_STR);
            $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $req->bindParam(':prix', $prix, PDO::PARAM_INT);
            $req->bindParam(':image', $image, PDO::PARAM_STR);
            $req->bindParam(':userID', $userID, PDO::PARAM_INT);
            $req->execute();
            $db->close();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }

    // ANCHOR UPDATE Modifier
    public function updateMicroservice($id, $titre, $contenu, $prix, $image, $userID)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            if (!empty($image)) {
                $sql = "UPDATE ms_posts SET Titre = :titre, Contenu = :contenu, Prix = :prix, Image = :image, user_id = :userID WHERE microservice_id = :id ";
                $req = $connexion->prepare($sql);
                $req->bindParam(':titre', $titre, PDO::PARAM_STR);
                $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
                $req->bindParam(':prix', $prix, PDO::PARAM_INT);
                $req->bindParam(':image', $image, PDO::PARAM_STR);
                $req->bindParam(':userID', $userID, PDO::PARAM_INT);
                $req->bindParam(':id', $id, PDO::PARAM_INT);
                $req->execute();
                $db->close();
            } else {
                $sql = "UPDATE ms_posts SET Titre = :titre, Contenu = :contenu, Prix = :prix, user_id = :userID WHERE microservice_id = :id ";
                $req = $connexion->prepare($sql);
                $req->bindParam(':titre', $titre, PDO::PARAM_STR);
                $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
                $req->bindParam(':prix', $prix, PDO::PARAM_INT);
                $req->bindParam(':userID', $userID, PDO::PARAM_INT);
                $req->bindParam(':id', $id, PDO::PARAM_INT);
                $req->execute();
                $db->close();
            }
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }


    // ANCHOR DELETE Supprimer

    public function deleteMicroservice($id)
    {
        try {
            $db = new Database();
            $connexion = $db->getPDO();
            $sql = "DELETE FROM ms_posts WHERE microservice_id = :id";
            $req = $connexion->prepare($sql);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $db->close();
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }


    public function uploadImage($image, $oldImage)
    {
        if (isset($image) and $image['error'] == 0) {

            // echo "====> Fichier reçu 👍<br>";
            // Vérifiez si l'ancienne image est définie et non vide
            if (!empty($oldImage)) {
                $old_image_path = 'uploads/images/' . $oldImage;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            // Testons si le fichier n'est pas trop gros
            if ($image['size'] <= 5000000) {
                // echo "====> Taille Fichier < 5Mo 👍<br>";

                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($image['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

                if (in_array($extension_upload, $extensions_autorisees)) {
                    // echo "====> Extension Autorisée 👍<br>";

                    // On peut valider le fichier et le stocker définitivement

                    $uniqueName = uniqid() . '.' . $extension_upload;
                    move_uploaded_file($image['tmp_name'], 'uploads/images/' . $uniqueName);
                    //  FIXME Attention la même image peut pas être téléversée 2 fois
                    // echo "====> Téléversement de <strong>" . $uniqueName . "</strong> terminé 👍<br>";
                    return $uniqueName;
                }
            }
        }
    }


    // ANCHOR SECURITY

    public function sanitizeInput($data)
    {
        // var_dump($data);
        $data = $data ?? ""; // Si $data est null alors $data = ""
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
