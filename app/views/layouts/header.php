<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo (isset($title)) ? $title : ''; ?></title>
<?php echo HTML::style('css/metro-bootstrap-gen.css'); ?>
<?php echo HTML::script('js/jquery.min.js'); ?>
<?php echo HTML::script('js/default.js'); ?>
</head>
<body>       
    
<div class="navbar navbar-default navbar-static-top bsnavbar" style="background-color: red;">
    <div class="container">
        <div class="navbar-header">
            <?php echo HTML::link('', "<h1>TvK Framework 1.0.1</h1>", ['class' => 'navbar-brand']); ?>
        </div>
        <div class="collapse navbar-collapse"></div>
    </div>
</div>
    
<div id="container bs-docs-container">