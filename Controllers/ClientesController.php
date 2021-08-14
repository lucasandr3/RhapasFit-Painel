<?php
namespace Controllers;

use \Core\Controller;
use \Models\Clientes;
use \Models\Usuarios;

class ClientesController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new Usuarios();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }

    public function index()
    {
        $data = array('user' => $this->user);
        $data['name'] = $this->user->getName();

        $data['title'] = 'Clientes';
        $data['menu']    = 'cliente';
        
        $c = new Clientes();
        $data['list'] = $c->getAll();

        $this->loadTemplate('clientes/clientes', $data);
    }

    public function add()
    {
        $data = array('user' => $this->user);
        $data['name'] = $this->user->getName();

        $data['title'] = 'Clientes';
        $data['menu']    = 'clienteadd';

        $this->loadTemplate('clientes/clientes_add', $data);
    }

    public function add_action()
    {
        $c = new Clientes();
        if(isset($_POST['nome_cliente']) && !empty($_POST['nome_cliente'])) {
            
            $nome_cliente = addslashes(trim($_POST['nome_cliente']));
            $ie           = addslashes(trim($_POST['ie']));
            $doc          = addslashes(trim($_POST['doc']));
            $cep          = addslashes(trim($_POST['cep']));
            $endereco     = addslashes(trim($_POST['endereco']));
            $numero       = addslashes(trim($_POST['numero']));
            $bairro       = addslashes(trim($_POST['bairro']));
            $complemento  = addslashes(trim($_POST['complemento']));
            $cidade       = addslashes(trim($_POST['cidade']));
            $estado       = addslashes(trim($_POST['estado']));
            $email        = addslashes(trim($_POST['email']));
            $tel          = addslashes(trim($_POST['tel']));
            $status       = addslashes(trim($_POST['status']));
            $score        = addslashes(trim($_POST['score']));
                    
            $c->saveCliente($nome_cliente, $ie, $doc, $cep, $endereco, $numero, $bairro,
            $complemento, $cidade, $estado, $email, $tel, $status, $score);
            header('Location: '.BASE_URL.'clientes');
            exit;
        }
    }

    public function edit($id_cliente)
    {
        $c = new Clientes();
        $data = array('user' => $this->user);
        $data['name'] = $this->user->getName();
        $data['title'] = 'Clientes';
        $data['menu']    = 'clienteedit';
        $data['cliente'] = $c->getClienteId($id_cliente);
        $this->loadTemplate('clientes/clientes_edit', $data);
    }

    public function edit_action()
    {
        $c = new Clientes();
        if(isset($_POST['nome_cliente']) && !empty($_POST['nome_cliente'])) {

            $nome_cliente = addslashes(trim($_POST['nome_cliente']));
            $doc          = addslashes(trim($_POST['doc']));
            $cep          = addslashes(trim($_POST['cep']));
            $endereco     = addslashes(trim($_POST['endereco']));
            $numero       = addslashes(trim($_POST['numero']));
            $bairro       = addslashes(trim($_POST['bairro']));
            $complemento  = addslashes(trim($_POST['complemento']));
            $cidade       = addslashes(trim($_POST['cidade']));
            $estado       = addslashes(trim($_POST['estado']));
            $email        = addslashes(trim($_POST['email']));
            $tel          = addslashes(trim($_POST['tel']));
            $status       = addslashes(trim($_POST['status']));
            $score        = addslashes(trim($_POST['score']));
            $id_cliente   = addslashes(trim($_POST['id_cliente']));

            $c->editCliente($nome_cliente, $doc, $cep, $endereco, $numero, $bairro,
            $complemento, $cidade, $estado, $email, $tel, $status, $score, $id_cliente);
            header('Location: '.BASE_URL.'clientes');
            exit;
        }
    }

    public function inativos()
    {
        $data = array('user' => $this->user);
        $data['name'] = $this->user->getName();

        $data['title'] = 'Clientes';
        $data['menu']    = 'clienteinative';
        
    	$c = new Clientes();
        $data['list'] = $c->getAll();

    	$this->loadTemplate('clientes/clientes_inativos', $data);
    }

    public function ver($id_cliente)
    {
        $c = new Clientes();
        $data = array('user' => $this->user);
        $data['name'] = $this->user->getName();
        $data['title'] = 'Clientes';
        $data['menu']    = 'clienteperfil';
        $data['cliente'] = $c->getClienteId($id_cliente);
        $this->loadTemplate('clientes/clientesPerfil', $data);
    }

    public function indisponivel($id_cliente)
    {
        $c = new Clientes();
        $c->toggleStatus($id_cliente);
        header('Location: '.BASE_URL.'clientes');
        exit;
    }
}    