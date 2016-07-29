<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php write((isset($title)) ? $title : ''); ?></title>
<?php write(HTML::style('css/metro-bootstrap-gen.css')); ?>
<?php write(HTML::script('js/jquery.min.js')); ?>
<?php write(HTML::script('js/default.js')); ?>
</head>
<body>       
    
<div class="navbar navbar-default navbar-static-top bsnavbar" style="background-color: red;">
    <div class="container">
        <div class="navbar-header">
            <?php write(HTML::link('', "<h1>TvK Framework 1.0.2</h1>", ['class' => 'navbar-brand'])); ?>
        </div>
        <div class="collapse navbar-collapse"></div>
    </div>
</div>
    
<div id="container bs-docs-container">