<?php
    // Demarrage de la session
    session_start();

    use App\Controller\RolesController;
    use App\Controller\UserController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Functions.php';
    include './App/Model/Roles.php';
    include './App/Controller/RolesController.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);

    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    //instance des controllers
    $userController = new UserController();
    $roleController = new RolesController();

    //routeur
    switch ($path) {
        case '/projet_chocoblast/':
            include './App/Vue/home.php';
            break;
        case '/projet_chocoblast/userAdd':
            $userController->insertUser();
            break;
        case '/projet_chocoblast/rolesAdd':
            $roleController->insertRoles();
            break;
        case '/projet_chocoblast/connexion':
            $userController->connexionUser();
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
?>