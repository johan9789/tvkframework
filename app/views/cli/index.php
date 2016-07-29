<h3 align="center">Insertar Datos en Cliente</h3>

<?php echo Form::open('cli/create'); ?>
    <table align="center">
        <tr>
            <td>Nombre:</td>
            <td><?php echo Form::text('nombre'); ?></td>
        </tr>
        <tr>
            <td>Apellidos:</td>
            <td><?php echo Form::text('apellidos'); ?></td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr>
            <td colspan="2" align="right">
                <?php echo Form::extra('reset', '', 'Limpiar'); ?>
                <?php echo Form::submit('Insertar'); ?>
            </td>
        </tr>
    </table>
<?php echo Form::close(); ?>

<br>

<table class="table" align="center" style="width: 300px;">
    <tr>
        <th>Id_cliente</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th colspan="2" align="center">Opcion</th>
    </tr>
    <?php foreach($data_cliente as $data): ?>
    <tr>
        <td><?php echo $data->id_cliente; ?></td>
        <td><?php echo $data->nombre; ?></td>
        <td><?php echo $data->apellidos; ?></td>
        <td><?php echo HTML::link('cli/edit/'.$data->id_cliente, 'Modificar'); ?></td>
        <td><?php echo HTML::link('cli/remove/'.$data->id_cliente, 'Eliminar'); ?></td>
    </tr>
    <?php endforeach; ?>
</table>