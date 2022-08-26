<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{path}}css/style.css">
</head>
<body>

    <div class="page-container">
        <header>

            <!--logo & navigation bar-->                
            <div class="header__container wrapper">
                <a href="{{path}}" class="logo">VOYAGER BLOG</a>                

                <ul class="header__navigation">
                    
                    <li><a href="{{path}}article" class="header__link">Articles</a></li>
                    <li><a href="{{path}}usager" class="header__link">Usager</a></li>
                    {% if guest %}
                    <li><a href="{{path}}login"  class="header__link">Login</a></li>
                    {% else %}
                    <li><a href="{{path}}dashboard" class="header__link">Journal de Bord</a></li>
                    <li><a href="{{path}}login/logout"  class="header__link">Logout</a></li>
                    {% endif %} 

                </ul>
            </div>


        </header>

        <main>