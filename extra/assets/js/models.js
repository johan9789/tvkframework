$(function(){

    $('.show_model_act_rec').click(function(){
        var mensaje = $(this).attr('id');
        var table = $("input[name='adm_tb_name']:checked").val();  // también devuelve true :D
        apprise(mensaje, {'verify':true}, function(r){
            if(r){
                $.ajax({
                    url: $('#first_action').attr('class'),
                    type: 'POST',
                    data: 'table_crud=' + table,
                    dataType: 'html',
                    success: function(respuesta){
                        apprise(respuesta, {'animate':true});
                    },
                    error: function(respuesta){
                        apprise('Error: ' + respuesta);
                    }
                });
            }
        });
    });

    $('.show_model_rel').click(function(){
        var mensaje = $(this).attr('id');
        var table = $("input[name='adm_tb_name']:checked").val();  // también devuelve true :D
        apprise(mensaje, {'verify':true}, function(r){
            if(r){
                $.ajax({
                    url: $('#second_action').attr('class'),
                    type: 'POST',
                    data: 'table_crud=' + table,
                    dataType: 'html',
                    success: function(respuesta){
                        apprise(respuesta, {'animate':true});
                    },
                    error: function(respuesta){
                        apprise('Error: ' + respuesta);
                    }
                });
            }
        });
    });

});