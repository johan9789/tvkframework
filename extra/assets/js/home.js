$(function(){
    $('#window-crud-act-rec').hide();
    $('#window-crud-rel').hide();
            
    $('.show_crud_act_rec').click(function(){
        $('#window-crud-act-rec').fadeToggle(800);
        $('#name_new_crud_act_rec').focus();
    });

    $('.show_crud_rel').click(function(){
        $('#window-crud-rel').fadeToggle(800);
        $('#name_new_crud_rel').focus();
    });
    
    $('#form_new_crud_act_rec').submit(function(e){
        e.preventDefault();
    });
    
    $('#form_new_crud_rel').submit(function(e){
        e.preventDefault();
    });

    $('#btn_new_crud_act_rec').click(function(){   
        var name = $('#name_new_crud_act_rec').val();
        var table = $("input[name='adm_tb_name']:checked").val();  // también devuelve true :D
        if(name !== ''){
            $.ajax({
                url: 'crud_act_rec.php',
                type: 'POST',
                data: 'name_crud=' + name + '&table_crud=' + table,
                dataType: 'html',
                success: function(respuesta){
                    $('#btn_new_crud_act_rec').blur();
                    $('#name_new_crud_act_rec').val('');
                    $('#window-crud-act-rec').fadeOut(1000);
                    apprise(respuesta, {'animate':true});
                },
                error: function(respuesta){
                    $('#btn_new_crud_act_rec').blur();
                    $('#name_new_crud_act_rec').val('');
                    $('#window-crud-act-rec').fadeOut(1000);
                    apprise(respuesta);
                }
            });
        } else {
            $('#btn_new_crud_act_rec').attr('disabled');
        }
    });        
    
});

function el_1(a){
    apprise('¿Está seguro que desea eliminar este archivo?', {'verify':true}, function(r){
        if(r){ 		
            var datos = 'filee_1=' + a + '&opc=eliminar_1';
            $.ajax({
                url: 'action/eliminar.php',
                data: datos,
                type: 'POST',
                success: function(respuesta){
                    apprise(respuesta, {'animate':true});
                    top.location.href="home.php";
                },
                error: function(respuesta){
                    apprise(respuesta);
                }
            });
        } else { 	
            apprise('ok ._.');   
        }
    });         
}