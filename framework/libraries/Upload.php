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
 * @since 1.0.2
 * @version 1.0.2
 * 
 */

/**
 * Clase para el manejo de subida de archivos.<br><br>
 * Class for handling file uploads.
 */
class Upload {
    /**
     * Archivo | File
     * @var $_FILES[(your file)] 
     */
    private $file;
    
    /**
     * Crea e inicializa el archivo.<br><br>
     * Creates and initializes the file.
     * @param string $file Nombre del archivo.<br>File name.
     */
    public function __construct($file){
        $this->file = $file;
    }
    
    /**
     * Devuelve el nombre temporal del archivo subido.<br><br>
     * Returns the temporary name of the uploaded file.
     * @return $_FILES[[your_file]]['tmp_name']
     */
    public function file(){
        return $this->file['tmp_name'];
    }
    
    /**
     * Devuelve el nombre del archivo subido.<br><br>
     * Returns the name of the uploaded file.
     * @return $_FILES[[your_file]]['name']
     */
    public function name(){
        return $this->file['name'];
    }
    
    /**
     * Devuelve el tamaño del archivo subido.<br><br>
     * Returns the size of the uploaded file.
     * @param boolean $kb
     * @return $_FILES[[your_file]]['size']
     */
    public function size($kb = true){
        if($kb){
            return $this->file['size'] / 1024;
        } else {
            return $this->file['size'];
        }
    }
    
    /**
     * Devuelve el tipo del archivo subido.<br><br>
     * Returns the type of the uploaded file.
     * @return $_FILES[[your_file]]['type']
     */
    public function type(){
        return $this->file['type'];
    }
    
    /**
     * Si existe un error al subir el archivo, devuelve el código de error.<br><br>
     * If there is an error uploading the file, it returns an error code.
     * @return $_FILES[[your_file]]['error']
     */
    public function error(){
        return $this->file['error'];
    }        
    
    /**
     * Valida si el tipo del archivo es el indicado aquí.<br><br>
     * Validates whether the file type is indicated here.
     * @param mixed $type Tamaño del archivo a comparar.<br>File size to compare.
     * @return boolean Si el tipo indicado es el del archivo, devuelve 'true'; si no 'false'.<br>If the type of file is indicated, returns 'true'; otherwise 'false'.
     */
    public function validate_type($type){
        return($this->type() == $type);
    }
    
    /**
     * Valida si el tamaño del archivo es el indicado aquí.<br><br>
     * Validates whether the file size is indicated here.
     * @param mixed $size Tamaño del archivo a comparar.<br>File size to compare.
     * @return booelan Si el tamaño indicado es el del archivo, devuelve 'true'; si no 'false'.<br>If the specified size is the file, it returns 'true', otherwise 'false'.
     */
    public function validate_size($size){
        $limit = $size * 1024;
        return($this->size() <= $limit);
    }
    
    /**
     * Mueve el archivo subido del directorio temporal del servidor a otro directorio.<br><br>
     * Move the uploaded file from the temporary directory to another directory server.
     * @param string $path Ruta donde se almacenará el archivo subido.<br>
     * @param mixed $file Archivo a mover.<br>File to move.
     * @param boolean $assets_url Si se moverá el archivo a la carpeta predefinida de los 'assets' o no.<br>If you move the file to the 'assets' default folder or not.
     * @return boolean Si hay éxíto al subir el archivo devuelve 'true', si no hay éxito devuelve 'false'.<br>If successful uploading the file returns 'true' if unsuccessful returns 'false'.
     */
    public function move($path, $file, $assets_url = true){
        if($assets_url){
            $final_path = 'assets/'.$path.$this->name();
        } else {
            $final_path = $path.$this->name();
        }
        return move_uploaded_file($file, $final_path);
    }
    
}