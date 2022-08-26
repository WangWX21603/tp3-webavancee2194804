<?php

class ModelUsager extends CRUD{
    protected $table = "usager";
    protected $primaryKey = "id";

    protected $fillable = ['nom', 'motPasse', 'courriel', 'privilege_id'];

    // vérifier l'utilisateur et le mot de passe
    public function checkUsager($nom, $motPasse){

     $sql = "SELECT * FROM $this->table WHERE nom = ?";
     $stmt = $this->prepare($sql);
     $stmt->execute(array($nom));

     $count=$stmt->rowCount();

     if($count==1){
         $usager_info = $stmt->fetch();
         $dbmotPasse = $usager_info["motPasse"];
         if(password_verify($motPasse, $dbmotPasse)){
        
             session_regenerate_id();
             $_SESSION['usager_id'] = $usager_info['id'];
             $_SESSION['privilege_id'] = $usager_info['privilege_id'];
             $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
             
             RequirePage::redirect('article');

         }else{
             echo "Le mot de passe n'est pas correct";
         }
     } else {
         echo "Le nom de l'utilisateur n'est pas correct";
     }
    }
    

}