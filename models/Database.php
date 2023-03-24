<?php
require_once 'db_config.php';

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
        if (!$this->databaseExists() || !$this->tablesExist()) {
            $this->rebuildDatabase();
        } else {
            $this->selectDatabase();
        }
    }
    private function connect()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";charset=utf8", DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    private function selectDatabase()
    {
        try {
            $this->pdo->exec("USE " . DB_DATABASE);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la sélection de la base de données: " . $e->getMessage());
        }
    }
    private function databaseExists()
    {
        try {
            $result = $this->pdo->query("SHOW DATABASES LIKE '" . DB_DATABASE . "'");
            return (bool) $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la vérification de l'existence de la base de données: " . $e->getMessage());
        }
    }
    private function tablesExist()
    {
        try {
            $result = $this->pdo->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '" . DB_DATABASE . "'");
            $tableCount = (int) $result->fetchColumn();
            return $tableCount > 0;
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la vérification de l'existence des tables: " . $e->getMessage());
        }
    }

    private function rebuildDatabase()
    {
        try {
            // Créer la base de données
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_DATABASE);
            $this->pdo->exec("USE " . DB_DATABASE);

            // Tester si le fichier SQL existe

            if (!file_exists(SQL_FILE_PATH)) {
                throw new Exception("Le fichier SQL n'existe pas ou n'est pas présent dans le répertoire indiqué dans db_config.php, définissez le chemin dans la constante SQL_FILE_PATH dans db_config.php .");
            }

            // Importer le fichier SQL
            $sqlFile = file_get_contents(SQL_FILE_PATH);
            $this->pdo->exec($sqlFile);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la reconstruction de la base de données: " . $e->getMessage());
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    public function close()
    {
        $this->pdo = null;
    }
    public function isConnected()
    {
        $connected = false;
        try {
            if ($this->pdo) {
                $query = $this->pdo->query("SELECT 1");
                $connected = (bool)$query;
            }
        } catch (PDOException $e) {
            // Handle exception if needed
        }
        return $connected;
    }
}
