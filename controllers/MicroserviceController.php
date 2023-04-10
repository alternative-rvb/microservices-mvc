<?php
require_once ROOT_PATH.'/models/variables.php';
require_once ROOT_PATH . '/models/MicroserviceModel.php';
class MicroserviceController
{
    private $MicroserviceModel;
    public function __construct()
    {
        $this->MicroserviceModel = new MicroserviceModel();
    }
    public function displayAllMicroservices()
    {
        $rows = $this->MicroserviceModel->getAllMicroservices();
        require ROOT_PATH . '/views/posts-view.php';
    }
    public function displayMicroservicesWithUserDetails()
    {
        $rows = $this->MicroserviceModel->getMicroservicesWithUserDetails();
        require ROOT_PATH . '/views/posts-view.php';
    }
    public function displayMicroservice()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : NULL;
        $row = $this->MicroserviceModel->getMicroserviceById($id);
        if (!empty($id)) {
            $action = "UPDATE";
            $libelle = "Mettre a jour";
        } else {
            $action = "CREATE";
            $libelle = "Créer";
        }
        require ROOT_PATH.'/views/single-view.php';
    }
    public function displayDashboard()
    {
        if (empty($_SESSION)) {
            header('Location: ' . BROWSER_PATH . '/index.php');
        } else {
            if ($_SESSION['user_role'] === 0) {
                $rows = $this->MicroserviceModel->getMicroservicesWithUserDetails();
                require ROOT_PATH . '/views/dashboard-view.php';
            } else if ($_SESSION['user_role'] === 1) {
                $rows = $this->MicroserviceModel->getMicroserviceByUserId($_SESSION['currentUser_id']);
                require ROOT_PATH . '/views/dashboard-view.php';
            } else {
                header('Location: ' . BROWSER_PATH . '/index.php');
            }
        }
    }

    // public function displayMicroserviceByUser()
    // {
    //     $id = isset($_GET["id"]) ? $_GET["id"] : NULL;
    //     $rows = $this->MicroserviceModel->getMicroserviceByUserId($id);
    //     require 'views/posts-view.php';
    // }

    public function handlePostFormSubmission()
    {
        // var_dump($_SESSION);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            $id = $_SESSION['postID'] = $_POST['id'];
            if ($action != 'DELETE') {
                $titre = $_SESSION['titre'] = (string)$this->sanitizeMicroserviceInput($_POST['titre']);
                $contenu = $_SESSION['contenu'] = (string)$this->sanitizeMicroserviceInput($_POST['contenu']);
                $prix = $_SESSION['prix'] = (float)$this->sanitizeMicroserviceInput($_POST['prix']);

                // Validation de la longueur du titre
                if (strlen($titre) < 5 || strlen($titre) > 100) {
                    $_SESSION['Message'] = '<p class="alert alert-warning" role="alert">Le titre doit contenir entre 5 et 100 caractères.</p>';
                    header("Location: " . $_SERVER['PHP_SELF'] . '?id=' . $id);
                    exit();
                }

                // Validation du prix
                if ($prix <= 0) {
                    $_SESSION['Message'] = '<p class="alert alert-warning" role="alert">Le prix doit être supérieur à 0.</p>';
                    header("Location: " . $_SERVER['PHP_SELF'] . '?id=' . $id);
                    exit();
                }

                $image = $_SESSION['image'] = (string)$this->sanitizeMicroserviceInput($this->uploadMicroserviceimage($_FILES['image'], $_POST['old_image']));

                $userID = $_SESSION['userID'] =  (int) $this->sanitizeMicroserviceInput($_POST['userID']);
                unset($_SESSION['titre'], $_SESSION['contenu'], $_SESSION['prix'], $_SESSION['image'], $_SESSION['postID']);
                // $_SESSION['Message'] = '<p class="alert alert-success" role="alert">Le microservice a été enregistré avec succès.</p>';
            }

            switch ($action):
                case 'CREATE':
                    $this->createNewMicroservice($titre, $contenu, $prix, $image, $userID);
                    break;
                case 'UPDATE':
                    $this->updateExistingMicroservice($id, $titre, $contenu, $prix, $image, $userID);
                    break;
                case 'DELETE':
                    $this->deleteSelectedMicroservice($id);
                    break;
                default:
                    echo '<p>⚠ un problême est survenu</p>';
                    break;
            endswitch;

            // Redirection vers la page d'accueil
            header('Location: '.BROWSER_PATH.'/dashboard/');
            exit();
        }

        $id = isset($_GET["id"]) ? $_GET["id"] : NULL;
        if (!empty($id)) {
            $row = $this->MicroserviceModel->getMicroserviceById($id);
            $action = "UPDATE";
            $libelle = '<i class="bi bi-arrow-down-up"></i> Mettre à jour';
        } else {
            $row = NULL;
            $action = "CREATE";
            $libelle = '<i class="bi bi-plus-square"></i> Créer';
        }
        require ROOT_PATH.'/views/post-form-view.php';
    }


    public function getMicroserviceById($id)
    {
        return $this->MicroserviceModel->getMicroserviceById($id);
    }
    public function createNewMicroservice($titre, $contenu, $prix, $image, $userID)
    {
        return $this->MicroserviceModel->createMicroservice($titre, $contenu, $prix, $image, $userID);
    }
    public function updateExistingMicroservice($id, $titre, $contenu, $prix, $image, $userID)
    {
        return $this->MicroserviceModel->updateMicroservice($id, $titre, $contenu, $prix, $image, $userID);
    }
    public function deleteSelectedMicroservice($id)
    {
        return $this->MicroserviceModel->deleteMicroservice($id);
    }
    public function uploadMicroserviceimage($image, $oldimage)
    {
        return $this->MicroserviceModel->uploadimage($image, $oldimage);
    }
    public function sanitizeMicroserviceInput($data)
    {
        return $this->MicroserviceModel->sanitizeInput($data);
    }
}
