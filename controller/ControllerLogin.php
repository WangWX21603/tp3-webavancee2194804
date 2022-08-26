<?php

RequirePage::requireModel('CRUD');
RequirePage::requireModel('Usager');
RequirePage::requireLibrary('Validation');


    class ControllerLogin {
    
        public function index(){
            return Twig::render('login-index.php');
        }

        // authentifie les info d'utilisateur et donne-leur la permission d'ajouter, de supprimer et de modifier des articles si c'est correct
        public function authentication(){
            
            extract($_POST);
            $usager = new ModelUsager();

            $checkUsager = $usager->checkUsager($nom, $motPasse);
            
            return Twig::render('login-index.php', ['errors' => $checkUsager]);
        }

        public function logout(){
            session_destroy();
            RequirePage::redirect('login');
        }

    }


?>