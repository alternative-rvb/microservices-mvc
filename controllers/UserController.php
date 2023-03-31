<?php
require_once ROOT_PATH.'/models/variables.php';
require_once ROOT_PATH.'/models/UserModel.php';
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
                $_SESSION['Message'] = "<p class='alert alert-danger'>L'email existe déjà</p>";
            } else {
                $this->UserModel->createUser($nom, $prenom, $email, $password, $role);
                $_SESSION['Message'] = "<p class='alert alert-success'>L'utilisateur $prenom $nom a été ajouté avec succès!</p>";
                header('Location: ' . BROWSER_PATH . '/pages/connexion.php');
                exit();
            }
        }
        require ROOT_PATH.'/views/signup-form-view.php';
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
                    header('Location: ' . BROWSER_PATH . '/dashboard/');
                } else {
                    $_SESSION['Message'] = "<p class='alert alert-danger'>Mot de passe incorrect</p>";
                }
            } else {
                $_SESSION['Message'] = "<p class='alert alert-warning'>L'email n'existe pas</p>";
            }
        }
        require ROOT_PATH.'/views/signin-form-view.php';
    }
    public function sanitizeSignInInput($data)
    {
        return $this->UserModel->sanitizeInput($data);
    }
}
