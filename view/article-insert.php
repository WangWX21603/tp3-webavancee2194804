{{ include ('header.php', {title:'article-insert'})}}

    <div class="wrapper">

        <h1 class="title">Créer un nouveau article</h1>
        <div class="wrapper">
        {% if errors is defined %}
            <span class="error">{{ errors|raw }}</span>
        {% endif %}
        </div>

        <form action="{{path}}article/store" method="post" class="form-article wrapper">
            Titre: <input type="text" name="titre" value="{{ article.titre }}" class="titre"/>
            Texte : <textarea type="text" name="texte" rows="25" cols="100" class="text">{{ article.texte }}</textarea>
            <input type="submit" value="Sauvegarder" class="btn"/><br>
        </form>

        <div class="wrapper">
            <p>
                <a href="{{path}}" class="btn-a">Retourne à l'accueil</a>
            </p>
        </div>
    </div>

{{ include ('footer.php') }}
            