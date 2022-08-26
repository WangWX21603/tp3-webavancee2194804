<?php

   class ModelDashboard extends CRUD{
       protected $table = 'dashboard';
       protected $primaryKey = 'id';

       protected $fillable = ['data', 'adresseIP', 'nom', 'pages'];
   } 


?>