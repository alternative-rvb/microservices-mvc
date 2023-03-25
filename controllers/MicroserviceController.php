<?php
// require_once '../models/functions.php';
require_once 'models/MicroserviceModel.php';
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
        require 'views/posts-view.php';
    }
    public function displayMicroservicesWithUserDetails()
    {
        $rows = $this->MicroserviceModel->getMicroservicesWithUserDetails();
        require 'views/posts-view.php';
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
        require 'views/single-view.php';
    }
    public function displayDashboard()
    {
        if (!isset($_SESSION)) {
            header('Location: ' . BROWSER_PATH . '/index.php');
        } else {
            if ($_SESSION['user_role'] === 0) {
                $rows = $this->MicroserviceModel->getMicroservicesWithUserDetails();
                require 'views/dashboard-view.php';
            } else if ($_SESSION['user_role'] === 1) {
                $rows = $this->MicroserviceModel->getMicroserviceByUserId($_SESSION['currentUser_id']);
                require 'views/dashboard-view.php';
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $action = $_POST['action'];
            $id = $_POST['id'];
            if ($action != 'DELETE') {
                $titre = (string)$this->sanitizeMicroserviceInput($_POST['titre']);
                $contenu = (string)$this->sanitizeMicroserviceInput($_POST['contenu']);
                $prix = (float)$this->sanitizeMicroserviceInput($_POST['prix']);
                $image = (string)$this->sanitizeMicroserviceInput($this->uploadMicroserviceImage($_FILES['image'], $_POST['old_image']));

                $userID = (int) $this->sanitizeMicroserviceInput($_POST['userID']);
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
            header('Location: dashboard.php');
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
        require 'views/post-form-view.php';
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
    public function uploadMicroserviceImage($image, $oldImage)
    {
        return $this->MicroserviceModel->uploadImage($image, $oldImage);
    }
    public function sanitizeMicroserviceInput($data)
    {
        return $this->MicroserviceModel->sanitizeInput($data);
    }
}
