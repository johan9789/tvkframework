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
 * Clase para el manejo de etiquetas HTML importantes.
 * Class for handling HTML important tags.
 */
class HTML {
    
    /**
     * Devuelve la etiqueta <link> lista para escribir solo la ruta de los estilos css.<br><br>
     * Returns <link> tag ready for write only the styles css path.
     * @param string $href La ruta de la hoja de estilos.<br>The stylesheet path.
     * @param boolean $assets_url Solo poner 'false' si serán llamados estilos de otra página.<br>Only write 'false' if you'll include styles from other page.
     * @return string La etiqueta <link> terminada.<br>The finished <link> tag.
     */
    public static function style($href, $assets_url = true){
        $style = '<link type="text/css" ';
        if($assets_url == true){
            // $style.= 'href="'.assets_url($href).'" ';
            $style.= 'href="'.App::assets($href).'" ';
        } elseif($assets_url == false){
            $style.= 'href="'.$href.'" ';
        }
        $style.= 'rel="stylesheet" media="all">';
        $style.= "\n";
        return $style;
    }
    
    /**
     * Devuelve la etiqueta <script> lista para escribir solo la ruta de los archivos javascript.<br><br>
     * Returns the <script> tag ready for write only the javascript file path.
     * @param string $src La ruta del script.<br>The script path.
     * @param boolean $assets_url Solo poner 'false' si serán llamados scripts de otra página.<br>Only write 'false' if you'll include scripts from another page.
     * @return string La etiqueta <script> terminada.<br>The finished <script> tag.
     */
    public static function script($src, $assets_url = true){
        $script = '<script type="text/javascript" ';
        if($assets_url == true){
            //$script.= 'src="'.assets_url($src).'">';
            $script.= 'src="'.App::assets($src).'">';
        } elseif($assets_url == false){
            $script.= 'src="'.$src.'">';
        }
        $script.= '</script>';
        $script.= "\n";
        return $script;
    }
    
    /**
     * Devuelve la etiqueta <a> lista para escribir solo la ruta y un texto para referenciar el link.<br><br>
     * Returns the <a> tag ready to write only the path and text to reference the link.
     * @param string $href Link a visitar.<br>Link to visit.
     * @param type $text Texto referencial.<br>Reference text.
     * @param type $other Otros atributos para la etiqueta.<br>Other attributes to tag.
     * @param string $base_url Sólo poner false si se dirigirá a otra página externa.<br>Only write false if redirect to another external page.
     * @return string La etiqueta <a> terminada.<br>The finished <a> tag.
     */
    public static function link($href, $text, array $other = null, $base_url = true){
        if($base_url == true){
            // $href = base_url($href);
            $href = App::base($href);
        }
        $link = '<a href="'.$href.'"';
        if(is_null($other)){
            $link.= '';
        } else {
            foreach($other as $attr => $value){                
                $link.= ' '.$attr.'="'.$value.'"';
            }
        }
        $link.= '>';
        $link.= $text;
        $link.= '</a>';
        return $link;
    }
    
    /**
     * Devuelve la etiqueta <img> lista para escribir solo la ruta y otros atributos necesarios.<br><br>
     * Returns <img> tag ready to write only the path and other necesary attributes.     
     * @param string $src La ruta de la imagen.<br>The image path.
     * @param array $other Otros atributos para la etiqueta.<br>Other attributes to tag.
     * @return string La etiqueta <img> terminada.<br>The finished <img> tag.
     */
    public static function image($src = '', array $other = null){
        $image = '<img src="'.$src.'"';
        if(is_null($other)){
            $image.= '';
        } else {
            foreach($other as $attr => $value){
                $image.= ' '.$attr.'="'.$value.'"';
            }
        }
        $image.= '>';
        return $image;
    }

    /**
     * Devuelve un <head> listo solo para:
     * - 1 título para la página
     * - 1 href para estilos css
     * - 1 src para archivos javascript<br>
     * Puede usarse en páginas pequeñas que sólo requieran una referencia para
     * estilos y javascript, en las paginas que se requieran más referencias usar
     * las otras funciones disponibles previamente teniendo usted ya armado su <head>.<br><br>
     * Returns a <head> tag ready to:
     * - 1 title to page.
     * - 1 href to css styles.
     * - 1 src to javascript files.
     * Can use in small pages that only require one reference to styles and javascript, in page that
     * require more reference, use other available functions. You should have a <head>.
     * @param string $title El título de la pagina.<br>Web page title.
     * @param string $css_href La ruta del css de la página<br>The stylesheet path.
     * @param string $script_src La ruta del script de la página.<br>The script path.
     * @return string La etiqueta <head> terminada.<br>The finished <head> tag.
     */
    public static function head($title = '', $css_href = '', $script_src = ''){
        $head = '<head>'."\n";
        $head.= '<meta charset="UTF-8">'."\n";
        $head.= '<title>'.$title.'</title>'."\n";
        $head.= '<link type="text/css" href="'.$css_href.'" rel="stylesheet" media="all">'."\n";
        $head.= '<script type="text/javascript" src="'.$script_src.'"></script>'."\n";
        $head.= '</head>';
        $head.= "\n";
        return $head;
    }
    
}