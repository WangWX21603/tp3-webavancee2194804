<?php

RequirePage::requireModel('CRUD');
RequirePage::requireModel('Dashboard');
RequirePage::requireModel('Usager');


class ControllerDashboard {

    public function index(){

        $dashboard = new ModelDashboard;

        $_POST['adresseIP'] = $_SERVER['REMOTE_ADDR'];
        $_POST['data'] = date("Y/m/d");
        $_POST['pages'] = "none"; // n"arrive pas à le fonctionner

        $usager = new Modelusager;
        $selectID = $usager->selectId($_SESSION['usager_id']);
        $_POST['nom'] = $selectID['nom'];

        $insert = $dashboard->insert($_POST);

        return Twig::render('dashboard-index.php', ['dashboard' => $_POST]);
    }

}


?>