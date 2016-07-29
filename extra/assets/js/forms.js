$(function(){
    var options = '';
    
    $.getJSON('json_form.php', function(get){
        $.each(get, function(index, value){
            options += '<option value="' + index + '">' + value + '</option>';
        });
    });        
    
    $('#add_val').click(function(){
        var name = $('#xlang_fm_name').attr('class');
        var type = $('#xlang_fm_type').attr('class');
        var optional = $('#xlang_optional').attr('class');
        $('h4:last').append('<h4>' + name + ': <input type="text" name="text_form[]"> ' + type + ': ' + 
            '<select name="select_form[]" style="font-size: 17px;">' + options + '</select> ' + 
            '<input type="text" name="options[]" placeholder="' + optional + '" style="width: 230px;" autocomplete="off"></h4>');
    });
    
});