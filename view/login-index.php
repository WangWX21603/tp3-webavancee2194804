
{{ include ('header.php', {title:'login'})}}


    <div class="wrapper">
        <h1 class="title-secondary">Login</h1>
        <!-- affiche les erreurs  -->
        <div>
            {% if errors is defined %}
                <span class="error">{{ errors|raw }}</span>
            {% endif %}
        </div>

        <span class="error">{{ errors|raw }}</span>
        
        <form action="{{path}}/login/authentication" method="post" class="flex-column">
            <label> Nom
                <input type="text" name="nom" value="{{ usager.nom }}" class="flex-nom">
            </label>
            <label> Mot de Passe
                <input type="password" name="motPasse" value="{{ usager.motPasse }}">
            </label>
            <input type="submit" value="Connecter" class="btn">
        </form>

    </div>


        
{{ include ('footer.php')}}