{% extends "layouts/temp.php" %}

{% block contenido %}
<div>
    {{ haha }}
    <ul>
        {% for alimento in al %}
        <li><a>{{ alimento.nombre }}</a></li>
        {% endfor %}
    </ul>
</div>

{% endblock %}