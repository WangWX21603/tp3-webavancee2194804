{{ include ('header.php', {title:'article-edit'}) }}


    <div class="wrapper">
        <h1 class="title">Modifier l'article</h1>
        <div class="wrapper">
        {% if errors is defined %}
            <span class="error">{{ errors|raw }}</span>
        {% endif %}
        </div>


        <form action="{{path}}article/update" method="post" class="form-article wrapper">
            <input type="hidden" name="id" value="{{ article.id }}">
            Titre : 
            <input type="text" name="titre" value="{{ article.titre }}" class="titre"> 
    
            Texte :
            <textarea type="text" name="texte" rows="30" cols="100" class="text">{{ article.texte }}</textarea>
            <input type="submit" value="Mise a jour" class="btn"/>    
        </form>
        
        <div class="wrapper">
            <p>
                <a href="{{path}}" class="btn-a">Retourne à l'accueil</a>
            </p>
        </div>
    </div>

{{ include ('footer.php') }}
    