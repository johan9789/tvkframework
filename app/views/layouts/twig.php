<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{{ title }} | Ejemplo con Twig</title>
{{ style | raw }}
</head>
<body>       
    
<div class="navbar navbar-default navbar-static-top bsnavbar" style="background-color: red;">
    <div class="container">
        <div class="navbar-header">{{ link | raw }}</div>
        <div class="collapse navbar-collapse"></div>
    </div>
</div>
    
<div id="container bs-docs-container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9" role="main">
            <div class="bs-docs-section">
                <div class="page-header">
                    <h1>{{ title }}</h1>
                    <h3>Aquí usamos el motor de plantillas 'Twig' en el framework.</h3>
                </div>
                <h3 id="descripcion">
                    {% block content %}
                    {% endblock %}
                </h3>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<footer class="bs-footer" role="contentinfo">
    <div class="container">
        <h4 id="copyrigth">&copy; 2014 - Creado por Johan Pineda :D</h4>
    </div>
</footer>

</body>
</html>