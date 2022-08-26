{{ include ('header.php', {title:'article-list'})}}


{% for article in articles %}

    <div class="article wrapper">
        <div class="title-wrapper">
            <h2>{{ article.titre }}</h2>

            {% if  session.privilege_id == 1 %}
            <div class="button-wrapper">
                <a href="{{path}}article/edit/{{article.id}}">Modifier</a>  
                <form action="{{path}}article/delete" method="post">
                    <input type="hidden" name="id" value="{{ article.id }}"> 
                    <input type="submit" value="Effacer">  
                </form>
            </div>
            {% endif %}
            
        </div>
        <div class="text-wrapper">
            {{ article.texte }}
        </div>
    </div>

{% endfor %}

{% if  session.privilege_id == 1 %}
    <a href="{{path}}article/create" class="btn-a wrapper">Créer un article</a>
{% endif %}            
            
            
{{ include ('footer.php')}}
