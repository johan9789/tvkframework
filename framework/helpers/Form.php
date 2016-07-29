<?php
/**
 * TvK Framework
 * 
 * Framework de código abierto (o tal vez no), lo cree por motivos de aprendizaje.
 * Open source framework (or maybe not), I created it by learning reasons.
 * 
 * @author Johan Pineda <jmpv567@gmail.com>
 * @copyright Copyright(c) 2014, Johan Pineda
 * @license http://www.tvkframework.com/user_guide/license.html
 * @link http://www.tvkframework.com/
 * @since 1.0
 * @version 1.0
 * 
 */

/**
 * Clase para la creación de formularios y sus elementos correspondientes.<br><br>
 * Class for creating forms and their corresponding elements.
 */
class Form {
    
    /**
     * Devuelve la apertura de un <form>, recibiendo la url para el 'action', el método por defecto es 'post'. 
     * Si se desea usar el 'enctype' conocido para la subida de archivos, debes completar el parámetro $method 
     * y luego escribir lo que se desea para 'enctype'(que podría ser 'multipart/form-data').
     * El último parámetro es para añadir otros atributos extras al <form>.<br><br>
     * Returns opening a <form> receiving the url for the 'action', the default method is 'post'. 
     * If you want to use the 'enctype' known uploading files, you should complete the $method parameter 
     * and then write what you wish for 'enctype'(which could be 'multipart/form-data'). 
     * The last parameter is to add extra attributes to other <form>.
     * @param string $action Url que recibe los datos.<br>Url that receives data.
     * @param string $method Tipo de método.<br> Method type.
     * @param string $enctype Tipo de 'enctype'.<br>Enctype.
     * @param array $other Otros atributos.<br>Other attributes.
     * @param boolean $base_url Solo poner false si enviará datos a otra página externa.<br>Only write false if you'll send data to another external website.
     * @return string La etiqueta <form> y atributos.<br>The <form> tag and attributes.
     */
    public static function open($action, $method = 'post', array $other = null, $base_url = true){
        $form_open = "\n";
        $form_open.= '<form ';
        if($base_url == true){
            // $form_open.= 'action="'.base_url($action).'" ';
            $form_open.= 'action="'.App::base($action).'" ';
        } elseif($base_url == false){
            $form_open.= 'action="'.$action.'" ';
        }
        $form_open.= 'method="'.$method.'"';        
        if(is_null($other)){
            $form_open.= '';
        } else {
            foreach($other as $attr => $value){
                $form_open.= ' '.$attr.'="'.$value.'"';
            }
        }
        $form_open.= '>';
        $form_open.= "\n";
        return $form_open;
    }
    
    public static function upload($action, $method = 'post', array $other = null, $base_url = true){
        $form_open = "\n";
        $form_open.= '<form ';
        if($base_url == true){
            // $form_open.= 'action="'.base_url($action).'" ';
            $form_open.= 'action="'.App::base($action).'" ';
        } elseif($base_url == false){
            $form_open.= 'action="'.$action.'" ';
        }
        $form_open.= 'method="'.$method.'"';        
        $form_open.= ' enctype="multipart/form-data"';        
        if(is_null($other)){
            $form_open.= '';
        } else {
            foreach($other as $attr => $value){
                $form_open.= ' '.$attr.'="'.$value.'"';
            }
        }
        $form_open.= '>';
        $form_open.= "\n";
        return $form_open;
    }

        /**
     * Devuelve el cierre de la etiqueta <form>.<br><br>
     * Returns the <form> tag closed.
     * @return string La etiqueta </form>.<br>The </form> tag.
     */
    public static function close(){
        $form_close = "\n";
        $form_close.= '</form>';
        $form_close.= "\n";
        return $form_close;
    }
    
    /**
     * Devuelve <input type="text"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="text"> with main attributes and extra indicated attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="text" ...><br>The <input type="text" ...> tag.
     */
    public static function text($name, $value = null, $required = false, array $other = null){
        $text = '<input type="text" ';
        $text.= 'name="'.$name.'"';
        if(is_null($value)){
            $text.= '';
        } else {
            $text.= ' value="'.$value.'"';
        }
        if($required == false){
            $text.= '';
        } else {
            $text.= ' required="required"';
        }
        if(is_null($other)){
            $text.= '';
        } else {
            foreach($other as $attr => $XD){
                $text.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $text.= '>';
        return $text;
    }
    
    /**
     * Devuelve <input type="password"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="password"> with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="password" ...><br>The <input type="password" ...> tag.
     */
    public static function password($name, $value = null, $required = false, array $other = null){
        $password = '<input type="password" ';
        $password.= 'name="'.$name.'"';
        if(is_null($value)){
            $password.= '';
        } else {
            $password.= ' value="'.$value.'"';
        }
        if($required == false){
            $password.= '';
        } else {
            $password.= ' required="required"';
        }
        if(is_null($other)){
            $password.= '';
        } else {
            foreach($other as $attr => $XD){
                $password.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $password.= '>';
        return $password;
    }

    /**
     * Devuelve <input type="email"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="email"> with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="email" ...><br>The <input type="email" ...> tag.
     */
    public static function email($name, $value = null, $required = false, array $other = null){
        $email = '<input type="email" ';
        $email.= 'name="'.$name.'"';
        if(is_null($value)){
            $email.= '';
        } else {
            $email.= ' value="'.$value.'"';
        }
        if($required == false){
            $email.= '';
        } else {
            $email.= ' required="required"';
        }
        if(is_null($other)){
            $email.= '';
        } else {
            foreach($other as $attr => $XD){
                $email.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $email.= '>';
        return $email;
    }
    
    /**
     * Devuelve <input type="hidden"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="hidden"> with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="hidden" ...><br>The <input type="hidden" ...> tag.
     */
    public static function hidden($name, $value = null, $required = false, array $other = null){
        $hidden = '<input type="hidden" ';
        $hidden.= 'name="'.$name.'"';
        if(is_null($value)){
            $hidden.= '';
        } else {
            $hidden.= ' value="'.$value.'"';
        }
        if($required == false){
            $hidden.= '';
        } else {
            $hidden.= ' required="required"';
        }
        if(is_null($other)){
            $hidden.= '';
        } else {
            foreach($other as $attr => $XD){
                $hidden.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $hidden.= '>';
        return $hidden;
    }
    
    /**
     * Devuelve un textarea con sus atributos principales y extras indicados.<br><br>
     * Returns a textarea with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <textarea> y atributos.<br>The <textarea> tag and attributes.
     */
    public static function text_area($name, $value = null, $required = false, array $other = null){
        $text_area = '<textarea ';          
        $text_area.= 'name="'.$name.'"';
        if($required == false){
            $text_area.= '';
        } else {
            $text_area.= ' required="required"';
        }
        if(is_null($other)){
            $text_area.= '';
        } else {
            foreach($other as $attr => $XD){
                $text_area.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $text_area.= '>';
        if(is_null($value)){
            $text_area.= '';
        } else {
            $text_area.= ''.$value.'';
        }                
        $text_area.= '</textarea>';
        return $text_area;
    }
    
    /**
     * Devuelve <input type="file"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="file"> with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param boolean $required Si es obligatorio o no.<br>If this s required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="file" ...><br>The <input type="file" ...> tag.
     */
    public static function file($name, $required = false, array $other = null){
        $text = '<input type="file" ';
        $text.= 'name="'.$name.'"';        
        if($required == false){
            $text.= '';
        } else {
            $text.= ' required="required"';
        }
        if(is_null($other)){
            $text.= '';
        } else {
            foreach($other as $attr => $XD){
                $text.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $text.= '>';
        return $text;
    }
    
    /**
     * Devuelve <input type="checkbox"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="checkbox"> with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $checked Si está marcado o no.<br>If this is checked or not.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="checkbox" ...><br>The <input type="checkbox" ...> tag.
     */
    public static function checkbox($name, $value = null, $checked = false, $required = false, array $other = null){
        $checkbox = '<input type="checkbox" ';
        $checkbox.= 'name="'.$name.'"';
        if(is_null($value)){
            $checkbox.= '';
        } else {
            $checkbox.= ' value="'.$value.'"';
        }
        if(!$checked){
            $checkbox.= '';
        } else {
            $checkbox.= ' checked="checked"';
        }
        if(!$required){
            $checkbox.= '';
        } else {
            $checkbox.= ' required="required"';
        }
        if(is_null($other)){
            $checkbox.= '';
        } else {
            foreach($other as $attr => $XD){
                $checkbox.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $checkbox.= '>';
        return $checkbox;
    }
    
    /**
     * Devuelve <input type="radio"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="radio"> with main attributes and extra attributes.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $checked Si está marcado o no.<br>If this is checked or not.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="radio" ...><br>The <input type="radio" ...> tag.
     */
    public static function radio($name, $value = null, $checked = false, $required = false, array $other = null){
        $radio = '<input type="radio" ';
        $radio.= 'name="'.$name.'"';
        if(is_null($value)){
            $radio.= '';
        } else {
            $radio.= ' value="'.$value.'"';
        }
        if($checked == false){
            $radio.= '';
        } else {
            $radio.= ' checked="checked"';
        }
        if($required == false){
            $radio.= '';
        } else {
            $radio.= ' required="required"';
        }
        if(is_null($other)){
            $radio.= '';
        } else {
            foreach($other as $attr => $XD){
                $radio.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $radio.= '>';
        return $radio;
    }
    
    /**
     * Devuelve <input type="submit"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="submit"> with main attributes and extra attributes.
     * @param string $value Valor.<br>Value.
     * @param string $name Nombre.<br>Name.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="submit" ...><br>The <input type="submit" ...> tag.
     */
    public static function submit($value, $name = null, array $other = null){
        $submit = '<input type="submit" ';
        $submit.= 'value="'.$value.'"';
        if(is_null($name)){
            $submit.= '';
        } else {
            $submit.= ' name="'.$name.'"';
        }
        if(is_null($other)){
            $submit.= '';
        } else {
            foreach($other as $attr => $XD){
                $submit.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $submit.= '>';
        return $submit;
    }
    
    /**
     * Devuelve <input type="button"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="button"> with main attributes and extra attributes.
     * @param string $value Valor.<br>Value.
     * @param string $name Nombre.<br>Name.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="button" ...><br>The <input type="button" ...> tag.
     */
    public static function button($value, $name = null, array $other = null){
        $button = '<input type="button" ';
        $button.= 'value="'.$value.'"';
        if(is_null($name)){
            $button.= '';
        } else {
            $button.= ' name="'.$name.'"';
        }
        if(is_null($other)){
            $button.= '';
        } else {
            foreach($other as $attr => $XD){
                $button.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $button.= '>';
        return $button;
    }
    
    /**
     * Devuelve <input type="Debes especificar el input"> con sus atributos principales y extras indicados.<br><br>
     * Returns <input type="You should specify the input"> with main attributes and extra attributes.
     * @param string $type El tipo de input.<br>The input type.
     * @param string $name Nombre.<br>Name.
     * @param string $value Valor.<br>Value.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <input type="****" ...><br>The <input type="****" ...> tag.
     */
    public static function extra($type, $name, $value = null, $required = false, array $other = null){
        $other_input = '<input type="'.$type.'" ';
        $other_input.= 'name="'.$name.'"';
        if(is_null($value)){
            $other_input.= '';
        } else {
            $other_input.= ' value="'.$value.'"';
        }
        if($required == false){
            $other_input.= '';
        } else {
            $other_input.= ' required="required"';
        }
        if(is_null($other)){
            $other_input.= '';
        } else {
            foreach($other as $attr => $XD){
                $other_input.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $other_input.= '>';
        return $other_input;
    }
    
    /**
     * Devuelve una etiqueta <select> completa con las etiquetas <option> que usted quiera.<br><br>
     * Returns a <select> tag finished with the <option> tags which you want.
     * @param string $name Nombre.<br>Name.
     * @param array $options Conjunto de etiquetas <option> con sus respectivos valores.<br>Group of <option> tags with their own values.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other Otros atributos.<br>Other attributes.
     * @return string La etiqueta <select ...><option ...>...</option>...</select>.<br>The <select ...><option ...>...</option>...</select> tag.
     */
    public static function select($name, array $options = null, $required = false, array $other = null){
        $select = '<select name="'.$name.'"';
        if($required == false){
            $select.= '';
        } else {
            $select.= ' required="required"';
        }
        if(is_null($other)){
            $select.= '';
        } else {
            foreach($other as $attr => $XD){
                $select.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $select.= '>';
        $select.= "\n";
        if(is_null($options)){
            $select.= '';
        } else {
            foreach($options as $val_option => $text_option){
                $select.= '<option value="'.$val_option.'">'.$text_option.'</option>'."\n";
            }
        }
        $select.= '</select>';
        return $select;
    }
 
    /**
     * Devuelve la apertura de la etiqueta <select> con otros atributos indicados (si se desea).<br><br>
     * Returns the opening tag <select> with other attributes listed (if desired).
     * @param string $name Nombre.<br>Name.
     * @param boolean $required Si es obligatorio o no.<br>If this is required or not.
     * @param array $other
     * @return string
     */
    public static function select_open($name, $required = false, array $other = null){
        $select = '<select name="'.$name.'"';
        if($required == false){
            $select.= '';
        } else {
            $select.= ' required="required"';
        }
        if(is_null($other)){
            $select.= '';
        } else {
            foreach($other as $attr => $XD){
                $select.= ' '.$attr.'="'.$XD.'"';
            }
        }
        $select.= '>';
        $select.= "\n";
        return $select;
    }
    
    /**
     * Devuelve el cierre de la etiqueta <select>.<br><br>
     * Returns the closure of the <select> tag.
     * @return string
     */
    public static function select_close(){
        $select = '</select>';
        $select.= "\n";
        return $select;
    }
    
    /**
     * Devuelve una o varias etiquetas <option>.<br><br>
     * Returns one or more <option> tags.
     * @param array $options
     * @return string Las etiqueta(s) <option ...>.<br>The <option ...> tag(s).
     */
    public static function option(array $options){
        $option = '';
        foreach($options as $value => $text){
            $option.= '<option value="'.$value.'">'.$text.'</option>';
            $option.= "\n";
        }
        return $option;
    }
    
    /**
     * Devuelve uno o varios <optgroup> con sus etiquetas <option>. ¿Cómo usarlo? ejemplo:<br>
     * Definimos un array:
     * <pre>
     * $data = [
            'group 1' => [               // 'label' del primer <optgroup>
                'people' => 'people',    // <option> con su 'value' y texto
                'play' => 'play'         // <option> con su 'value' y texto
            ],
            'group 2' => [               // 'label' del segundo <optgroup>
                'hello' => 'hello',      // <option> con su 'value' y texto
                'bye' => 'bye'           // <option> con su 'value' y texto
            ]  // Y así con los <optgroups> que quieras.
        ];
     * </pre><br>
     * Returns one or more <optgroup> with their <option> tags. How to use? example:<br>
     * We define an array:
     * <pre>
     * $data = [
            'group 1' => [               // 'label' of the first <optgroup> tag
                'people' => 'people',    // <option> con su 'value' y texto
                'play' => 'play'         // <option> con su 'value' y texto
            ],
            'group 2' => [               // 'label' of the second <optgroup> tag
                'hello' => 'hello',      // <option> with its 'value' and text
                'bye' => 'bye'           // <option> with its 'value' and text
            ]  // And that with the <optgroups> that you want.
        ];
     * </pre>
     * @param array $data Uno o varios <optgroup ...>.<br>One or more <optgroup ...>.
     * @return string La etiqueta <optgroup ...> terminada.<br>The <optgroup ...> tag finished.
     */
    public static function optgroup(array $data){
        $optgroup = '';
        foreach($data as $opt => $values){
            $optgroup.= '<optgroup label="'.$opt.'">';
            $optgroup.= "\n";
            foreach($values as $value => $text){
                $optgroup.= '<option value="'.$value.'">'.$text.'</option>';
                $optgroup.= "\n";
            }
            $optgroup.= '</optgroup>';
            $optgroup.= "\n";
        }
        return $optgroup;
    }
    
}