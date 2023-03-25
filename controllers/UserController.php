<?php

require_once 'models/UserModel.php';
class UserController
{
    private $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function createNewUser($nom, $prenom, $email, $password, $role)
    {
        $this->UserModel->createUser($nom, $prenom, $email, $password, $role);
        echo "<p>L'utilisateur $prenom $nom a été ajouté avec succès!</p>";
    }

    public function handleSignUpFormSubmission()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $this->UserModel->sanitizeInput($_POST['nom']);
            $prenom = $this->UserModel->sanitizeInput($_POST['prenom']);
            $email = $this->UserModel->sanitizeInput($_POST['email']);
            $password = $this->UserModel->sanitizeInput($_POST['password']);
            $role = (int)$this->UserModel->sanitizeInput($_POST['role']);

            // Vérifier si l'email existe déjà
            if ($this->UserModel->isEmailExists($email)) {
                $_SESSION['Message'] = "L'email existe déjà.";
            } else {
                $this->UserModel->createUser($nom, $prenom, $email, $password, $role);
                $_SESSION['Message'] = "Votre compte a été créé avec succès. Veuillez vous connecter.";
                header('Location: ' . BROWSER_PATH . '/connexion.php');
                exit();
            }
        }
        require 'views/signup-form-view.php';
    }
    public function handleSignInFormSubmission()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $this->sanitizeSignInInput($_POST['email']);
            $password = $_POST['password'];
            $user = $this->UserModel->getUserByEmail($email);
            if ($user) {
                if ($password && $user['Password'] && password_verify($password, $user['Password']) ) {
                    session_unset();
                    $_SESSION['currentUser_id'] = $user['user_id'];
                    $_SESSION['user_lastname'] = $user['Prénom'];
                    $_SESSION['user_firstname'] = $user['Nom'];
                    $_SESSION['user_role'] = $user['Rôle'];
                    setcookie('status', 'connected', time() + 3600, '/', '', false, true);
                    header('Location: ' . BROWSER_PATH . '/dashboard.php');
                } else {
                    $_SESSION['Message'] = "Mot de passe incorrect ou compte interdit";
                }
            } else {
                $_SESSION['Message'] = "Email incorrect";
            }
        }
        require 'views/signin-form-view.php';
    }
    public function sanitizeSignInInput($data)
    {
        return $this->UserModel->sanitizeInput($data);
    }
}
