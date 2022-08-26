{{ include ('header.php', {title:'dashboard'}) }}


    <div class="wrapper">
        <h1 class="title">Dashboard</h1>
        <div class="wrapper">
        {% if errors is defined %}
            <span class="error">{{ errors|raw }}</span>
        {% endif %}
        </div>

        <ul>
            <li>Nom d'usager : {{ dashboard.nom }}</li>
            <li>address IP : {{ dashboard.adresseIP }}</li>
            <li>Date de login : {{ dashboard.data }}</li>

        </ul>
        
        <div class="wrapper">
            <p>
                <a href="{{path}}" class="btn-a">Retourne à l'accueil</a>
            </p>
        </div>
    </div>

{{ include ('footer.php') }}