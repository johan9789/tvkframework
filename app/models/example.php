<?php
/**
 * Clase modelo de ejemplo, esta clase asume que no estás usando una base de datos.<br><br>
 * Example model class, this class assumes you aren't using a database.
 */
class Example {
        
    /**
     * Lista de idiomas disponibles en la presentación del framework.<br><br>
     * List of available languages ​​in the presentation of the framework.
     * @return array
     */
    public function lang(){
        $lang['ES'] = 'ES'; // Español
        $lang['EN'] = 'EN'; // Inglés
        $lang['DE'] = 'DE'; // Alemán
        $lang['FR'] = 'FR'; // Francés
        $lang['IT'] = 'IT'; // Italiano
        $lang['POR'] = 'POR'; // Portugués
        $lang['中国'] = '中国'; // Chino
        $lang['日本'] = '日本'; // Japonés
        $lang['한국'] = '한국'; // Coreano
        return $lang;
    }  
    
    /**
     * :D
     * @return string :D
     */
    public function get_file(){
        $file = File::open('app/controllers/home.php');
        return $file;
    }

}