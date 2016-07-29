{% extends "layouts/twig.php" %}

{% block content %}
<div>
    <h4>{{ descripcion }}</h4>
    <ul>
        {% for version in versiones %}
        <li><a><h4>{{ version.nombre }}</h4></a></li>
        {% endfor %}
    </ul>
</div>
{% endblock %}