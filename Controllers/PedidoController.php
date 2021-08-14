<?php
namespace Controllers;

use \Core\Controller;
use \Models\Pedido;
use \Models\Usuarios;
use \Models\Menu;

class PedidoController extends Controller {

	private $user;

    public function __construct()
    {
        $this->user = new Usuarios();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

		// if (!$this->user->hasPermission('dashboard_view')) {
		// 	$this->loadView('404/500');
        //     exit;
        // } 
    }

	public function index()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Pedidos em andamento';
		$data['menu']    = 'pedido';

		$pedido = new Pedido();
		$data['pedidos'] = $pedido->getAll();
      
		$this->loadTemplate('pedido/pedido_andamento', $data);
	}
	
	public function pdv()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Ponto de Venda';

		$pedido = new Pedido();
		$product = new Menu();

		$data['pedidos'] = $pedido->getAll();
		$data['bairros'] = $pedido->getAllNeigth();
		$data['produtos'] = $product->getAllCat();
      
		$this->loadView('pedido/pdv', $data);
	}

	public function finalizados()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Pedidos Finalizados';
		$data['menu']    = 'pedidof';

		$pedido = new Pedido();
		$status = 'FINALIZED';
		$data['pedidos'] = $pedido->getAllFinalizados($status, getUser()->id_company);

		$this->loadTemplate('pedido/pedido_finalizado', $data);
	}

	public function cancelados()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Pedidos Cancelados';
		$data['menu']    = 'pedidoc';

		$pedido = new Pedido();
        $status = 'CANCELED';
		$pedidos = $pedido->getAllCancelados($status, getUser()->id_company);
        if($pedidos) {
            $data['pedidos'] = $pedidos;
        } else {
            $data['pedidos'] = [];
        }
		$this->loadTemplate('pedido/pedido_cancelado', $data);
	}

	public function antigos()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Pedidos Antigos';
		$data['menu']    = 'pedidoan';

		$pedido = new Pedido();
		$pedidos = $pedido->getAllAntigos();

        if($pedidos) {
            $data['pedidos'] = $pedidos;
        } else {
            $data['pedidos'] = [];
        }

		$this->loadTemplate('pedido/pedido_antigos', $data);
	}

	public function detalhes($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Detalhes do Pedido - #'.$id;
		$data['menu']    = 'pedido';

		$pedido = new Pedido();

		$data['pedido'] = $pedido->getPedidoId($id, getUser()->id_company);


      
		$this->loadTemplate('pedido/detalhes', $data);
	}

	public function detalhesf($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Detalhes do Pedido - #'.$id;
		$data['menu']    = 'pedidof';
		$data['back'] = 'final';

		$pedido = new Pedido();

		$data['pedido'] = $pedido->getPedidoId($id, getUser()->id_company);
//        echo "<pre>";
//        print_r($data['pedido']);
//        exit;
      
		$this->loadTemplate('pedido/detalhes', $data);
	}

	public function detalhesc($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Detalhes do Pedido - #'.$id;
		$data['menu']    = 'pedidoc';
		$data['back'] = 'cancel';

		$pedido = new Pedido();

		$data['pedido'] = $pedido->getPedidoId($id, getUser()->id_company);
      
		$this->loadTemplate('pedido/detalhes', $data);
	}

	public function detalhes_antigo($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Detalhes do Pedido - #'.$id;
		$data['menu']    = 'pedido';

		$pedido = new Pedido();

		$data['pedido'] = $pedido->getPedidoIdAntigo($id);


      
		$this->loadTemplate('pedido/detalhes_antigo', $data);
	}

	public function pedidoid($id)
	{

		$pedido = new Pedido();

		if ($pedido = $pedido->getPedidoId($id)) {
			
			$resposta['code'] = 0;
			$resposta['pedido'] = $pedido;

		} else {
			
			$resposta['code'] = 1;
			$resposta['pedido'] = 'Pedido não encontrado.';	
		}
		
		echo json_encode($resposta);
		exit;
	}

	public function changeStatus($status, $id_order, $id_company)
	{
		$pedido = new Pedido();

		if ($status == 'CANCELED') {
			
			if ($pedido = $pedido->setCancelOrder($id_order, $status, $id_company)) {
		
				$resposta['code'] = 0;
				$resposta['msg'] = 'Pedido cancelado com sucesso.';
				echo json_encode($resposta);
				exit;
	
			} else {
				
				$resposta['code'] = 1;
				$resposta['pedido'] = 'Oops... algo deu errado, tente novamente.';
				echo json_encode($resposta);
				exit;	
			}

		} else {

			if ($pedido = $pedido->setStatusOrder($id_order, $status, $id_company)) {
		
				$resposta['code'] = 0;
				$resposta['msg'] = 'Pedido atualizado com sucesso.';
				echo json_encode($resposta);
				exit;
	
			} else {
				
				$resposta['code'] = 1;
				$resposta['msg'] = 'Oops... algo deu errado, tente novamente.';
				echo json_encode($resposta);
				exit;	
			}
		}
		
	}

	public function addAction()
	{
		$delivery = new Delivery();
		if (isset($_POST['nome_bairro']) && !empty($_POST['nome_bairro'])) {
			
			$bairro    = addslashes(trim($_POST['nome_bairro']));
			$taxa      = addslashes(trim($_POST['taxa_entrega']));
			$retirada  = addslashes(trim($_POST['retirada']));
		}

		$delivery->saveBairro($bairro, $taxa, $retirada);
		header('Location: '.BASE_URL.'delivery');
        exit;

	}

	public function edit($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Editar - (Taxa de entrega)';
		$data['menu']    = 'bairros';

		$delivery = new Delivery();

		$data['bairro'] = $delivery->getBairroId($id);
      
		$this->loadTemplate('delivery/bairro_edit', $data);
	}

	public function editAction()
	{
		$delivery = new Delivery();
		if (isset($_POST['nome_bairro']) && !empty($_POST['nome_bairro'])) {
			
			$bairro    = addslashes(trim($_POST['nome_bairro']));
			$taxa      = addslashes(trim($_POST['taxa_entrega']));
			$retirada  = addslashes(trim($_POST['retirada']));
			$id_bairro = addslashes(trim($_POST['id']));
		}

		$delivery->editBairro($bairro, $taxa, $retirada, $id_bairro);
		header('Location: '.BASE_URL.'delivery/edit/'.$id_bairro);
        exit;

	}

	public function del($id)
	{
		$delivery = new Delivery();
		$delivery->delBairro($id);
		header('Location: '.BASE_URL.'delivery');
        exit;
	}

	public function app_pedido()
	{
		
		echo "<pre>";
		print_r($_POST);
		exit;
	}

}