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
 * @version 1.0.2
 * 
 */

/**
 * Clase creada para poder usar la base de datos NoSQL MongoDB.<br><br>
 * Created class for can use the NoSQL database MongoDB.
 */
class Document {
    /**
     * MongoConnection
     * @var mixed  MongoConnection
     */
    private $mongo;
    /**
     * Connection
     * @var mixed Connection
     */
    private $connection;
    /**
     * Variable que contiene la base de datos.<br><br>
     * This var contains the database.
     * @var object|mixed 
     */    
    private $database;

    /**
     * Realiza la conexión al servidor de MongoDB y selecciona la base datos.<br><br>
     * Realizes the connection to MongoDB server and chooses the database.
     */
    public function __construct(){
        $this->mongo = new MongoConnection();
        $this->connection = $this->mongo->connection();
        $this->database = $this->connection->selectDB(MONGO_DATABASE);
    }
    
    public function get_connection(){
        return $this->connection;
    }
    
    /**
     * Devuelve una base de datos.<br><br>
     * Returns a database.
     * @return object El objeto de la base de datos.<br>The database's object.
     */
    public function get_database(){
        return $this->database;
    }
    
    /**
     * Devuelve una colección.<br><br>
     * Returns a collection.
     * @param string $name El nombre de la colección.<br>The collection name.
     * @return object El objeto de la colección.<br>The collection's object.
     */
    public function get_collection($name){
        return $this->database->selectCollection($name);
    }        
    
    /**
     * Devuelve todos los documentos de la colección como un array.<br><br>
     * Returns all collection documents as array.
     * @param string $collection Nombre de la colección.<br>Collection name.
     * @return array Datos de la colección.<br>Collection data.
     */
    public function collection($name){
        $all = [];
        $col = $this->get_collection($name);
        $cursor = $col->find();
        while($cursor->hasNext()){
            $data = $cursor->getNext();
            $all[] = $data; 
        }
        return $all;
    }
    
    /**
     * Crea un nuevo documento dentro de la colección.<br><br>
     * Creates a new document into collection.
     * @param string $collection El nombre de la colección.<br>The collection name.
     * @param array $data Array de datos del nuevo documento.<br>Data array of new document.
     */
    public function insert_document($collection, array $data){
        $col = $this->database->selectCollection($collection);
        $col->insert($data);
    }
    
    /**
     * Elimina un documento de la colección.<br><br>
     * Removes a document from collection.
     * @param string $collection El nombre de la colección.<br>The collection name.
     * @param string $id El '_id' del documento a eliminar.<br>The document '_id' to remove.
     */
    public function delete_document($collection, $id){
        $col = $this->database->selectCollection($collection);
        $col->remove(['_id' => new MongoId($id)]);
    }
    
    /**
     * Actualiza un documento de la colección.<br><br>
     * Updates a document from collection.
     * @param type $collection El nombre de la colección.<br>The collection name.
     * @param type $id $id El '_id' del documento a actualizar.<br>The document '_id' to update.
     * @param array $data Array de datos a actualizar.<br>Data array to update.
     */
    public function update_document($collection, $id, array $data){
        $col = $this->database->selectCollection($collection);
        $col->update(['_id' => new MongoId($id)], $data);
    }
    
}