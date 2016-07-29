<?php
class Cli extends MainController {

    public function __construct(){
        $this->load('Cliente');
    }

    public function index(){
        $data_cliente = Cliente::all();
        View::template('cli/index', compact('data_cliente'));
    }

    public function edit($id = null){
        if($id == null){
            Redirect::to('cli');
        }
        $data_cliente = Cliente::all();
        $data_cliente_edit = Cliente::findOne($id);
        if(count($data_cliente_edit) == 0){
            Redirect::to('cli');
        }
        View::template('cli/edit', compact('data_cliente', 'data_cliente_edit'));
    }

    public function create(){
        if(Input::all_not_empty()){
            $insert = Input::all();
            $cliente = new Cliente();
            $cliente->nombre = $insert['nombre'];
            $cliente->apellidos = $insert['apellidos'];
            $cliente->create();
            Redirect::to('cli');
        } else {
            Alert::redirect_back('Completa todos los campos.');
        }
    }

    public function save(){
        if(Input::all_not_empty()){
            $update = Input::all();
            $cliente = new Cliente();
            $cliente->nombre = $update['nombre'];
            $cliente->apellidos = $update['apellidos'];
            $cliente->save($update['id_cliente']);
            Redirect::to('cli');
        } else {
            Alert::redirect_back('Completa todos los campos.');
        }
    }

    public function remove($id){
        $cliente = new Cliente();
        $cliente->remove($id);
        Redirect::to('cli');
    }

}