<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Article');
RequirePage::requireModel('Usager');
RequirePage::requireLibrary('Validation');

class ControllerArticle{

    public function index(){

        $article = new ModelArticle;
        $select = $article->select();
        $usager = new Modelusager;
        $usagers = $usager->select('nom');

        return Twig::render('article-list.php', ['articles' => $select, 'usagers' => $usagers]);
    }
  
    
    // affiche la page pour créer un article
    public function create(){
        $usagers = new ModelUsager;
        $usagers = $usagers->select('nom');

        return Twig::render('article-insert.php', ['usagers'=>$usagers]);
    }

    // stocke les articles dans la base de données
    public function store(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('titre')->value($titre)->pattern('alpha')->required()->max(200);
        $validation->name('texte')->value($texte)->pattern('text')->required();
        if($validation->isSuccess()){
          $article = new ModelArticle;
          $insert = $article->insert($_POST);
          RequirePage::redirect('article');   
        }else{
           $errors =  $validation->displayErrors();
           $usagers = new ModelUsager;
           $usagers = $usagers->select('nom');
          return Twig::render('article-insert.php', ['errors' => $errors, 'usagers'=> $usagers, 'article' => $_POST]);
        }
      }


    // affiche la page d'articles pour le modifier
    public function edit($value){
        $article = new ModelArticle;
        $selectId = $article->selectId($value);
        $usager = new Modelusager;
        $usagers = $usager->select('nom');
  
        return Twig::render('article-edit.php', ['article' => $selectId, 'usagers' => $usagers]);
  
      }

    // stocke les modifications d'article dans la base de données
    public function update(){

        $validation = new Validation;
        extract($_POST);
        $validation->name('titre')->value($titre)->pattern('words')->required()->max(200);
        $validation->name('texte')->value($texte)->pattern('text')->required();

        if($validation->isSuccess()){
            $article = new ModelArticle;
            $update = $article->update($_POST);
            RequirePage::redirect('article');   
        }else{
            $errors =  $validation->displayErrors();
            $usagers = new ModelUsager;
            $usagers = $usagers->select('nom');

           return Twig::render('article-edit.php', ['errors' => $errors, 'usagers'=> $usagers, 'article' => $_POST]);
        }
    }

      // supprimer les articles dans la base de données
      public function delete(){
        $article = new ModelArticle;
        $delete = $article->delete($_POST);
        RequirePage::redirect('article'); 
    }




}