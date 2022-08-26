<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Usager');
RequirePage::requireModel('Privilege');
RequirePage::requireLibrary('Validation');

class ControllerUsager{

    public function index(){
        return Twig::render('usager-index.php');
    }

    public function create(){
        $privileges = new ModelPrivilege;
        $select = $privileges->select('privilege');    
        return Twig::render('usager-create.php', ['privileges'=>$select]);
    }


    // stocke les données d'utilisateurs dans la DB
    public function store(){
        
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(100);
        $validation->name('motPasse')->value($motPasse)->max(30)->min(6)->required();
        $validation->name('courriel')->value($courriel)->pattern('email')->required();

        if($validation->isSuccess()){
            $options = [
                'cost' => 10,
            ];
            $hashPassword= password_hash($motPasse, PASSWORD_BCRYPT, $options);
    
            $usager = new ModelUsager;
            $_POST['nom'] = $nom;
            $_POST['courriel'] = $courriel;
            $_POST['motPasse'] = $hashPassword;

            $insert = $usager->insert($_POST);

            RequirePage::redirect('usager');

        }else{
            $errors =  $validation->displayErrors();
            return Twig::render('usager-create.php', ['errors' => $errors, 'usager' => $_POST]);
        }
    }
}