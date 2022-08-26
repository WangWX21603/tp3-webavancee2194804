
{{ include ('header.php', {title:'usager-create'}) }}

<div class="wrapper">
    <h1 class="title-secondary">Nouvel Usager</h1>
    {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
    {% endif %}

    <form action="{{path}}usager/store" method="post" class="flex-column">
        <label> Nom de Usager
            <input type="text" name="nom" value="{{ usager.nom }}">
        </label>
        <label> Mot de Passe
            <input type="password" name="motPasse" value="{{ usager.motPasse }}" class="flex-mp">
        </label>
        <label> Courriel
            <input type="email" name="courriel" value="{{ usager.courriel }}" class="flex-courriel">
        </label>
        <label> Privilege
            <select type="text" name="privilege_id" class="privilege">
            {% for privilege in privileges %}
                <option value='{{privilege.id}}'>{{privilege.privilege}}</option>
            {% endfor %}
            </select>
        </label>
        <input type="submit" value="Inscrire"  class="btn">
    </form>

</div>

{{ include ('footer.php')}}