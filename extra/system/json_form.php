<?php
require_once 'classes/FormX.php';
require_once '../config.php';
require_once 'lang.php';

$formx = new FormX();
echo json_encode($formx->get_options());