<?php 
session_start();

define('LOCAL_SERVER', 'C:/laragon/www');
define('PROJECT_FOLDER', '/microservices-mvc');
define('ROOT_PATH', ($_SERVER['DOCUMENT_ROOT'] == LOCAL_SERVER) ? $_SERVER['DOCUMENT_ROOT'] . PROJECT_FOLDER : $_SERVER['DOCUMENT_ROOT']);
define('SQL_FILE_PATH', ROOT_PATH . '/.bdd/microservices_db.sql');
define('BROWSER_PATH', ($_SERVER['DOCUMENT_ROOT'] == LOCAL_SERVER) ? PROJECT_FOLDER :  '');



// var_dump('LOCAL_SERVER: ' . $_SERVER['DOCUMENT_ROOT']);
// var_dump('PROJECT_FOLDER: ' . PROJECT_FOLDER);
// var_dump('ROOT_PATH: ' . ROOT_PATH);
// var_dump('SQL_FILE_PATH: ' . SQL_FILE_PATH);
// var_dump('BROWSER_PATH: ' . BROWSER_PATH);

// echo '$_POST: ';
// var_dump($_POST);

// echo '$_SESSION: ';
// var_dump($_SESSION);
