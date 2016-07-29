<!DOCTYPE html>
<html>
<head>
<title><?php write($xlang['ver_form_gen']); ?></title>
<meta charset="UTF8">
<style type="text/css">
body {
    background-color: white;
}
#tt {
    font-family: Calibri;
    color: #999999;
}
#tt2 {
    font-family: Calibri;
    color: #999999;
    font-size: 18px;
}
</style>
</head>
<body>

<h3 id="tt"><i><?php write($xlang['ver_form_info'].': app/generated/forms/'.Session::get('created_form_path')); ?></i></h3>

<table>
    <tr id="tt2">
        <td><b><i>Código</i></b></td>
        <td><b><i>Vista Previa</i></b></td>
    </tr>
    <tr>
        <td style="color: blue;"><?php highlight_file('../app/generated/forms/'.Session::get('created_form_path')); ?></td>
        <td><?php require_once '../app/generated/forms/'.Session::get('created_form_path'); ?></td>
    </tr>
</table>

<?php Session::delete('created_form'); ?>

</body>
</html>