<?php
namespace Controllers;

use \Core\Controller;
use \Models\Store;
use \Models\Usuarios;

class StoreController extends Controller {

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
        $data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

        $store = new Store();

        $data['title'] = 'Informações da Loja';
        $data['menu'] = 'store';

        $data['data_store'] = $store->getData(getUser()->id_company);

        $this->loadTemplate('store/store', $data);
    }

    public function editLojaAction()
    {
        $store = new Store();
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome     = trim($_POST['nome']);
            $rua      = addslashes(trim($_POST['rua']));	
            $bairro   = addslashes(trim($_POST['bairro']));
            $cidade   = addslashes(trim($_POST['cidade']));
            $numero   = addslashes(trim($_POST['numero']));
            $telefone = addslashes(trim($_POST['telefone']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = url('assets/portal/img/stores/profile/'.md5(time().rand(0,999)).'.png');
         
                    $arquivo = 'assets/portal/img/stores/profile/'.substr($img,67);
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo);

                }
            }
            
            if (isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['cover']['type'], $permitidos)) {
                    
                    $cover = url('assets/portal/img/stores/profile/'.md5(time().rand(0,999)).'.png');
         
                    $arquivo_cover = 'assets/portal/img/stores/profile/'.substr($cover,67);
                    move_uploaded_file($_FILES['cover']['tmp_name'], $arquivo_cover);

                }
            }
            

            $store->editStore($nome, $rua, $bairro, $cidade, $numero, $telefone, $img, $cover, getUser()->id_company);
            header('Location: '.BASE_URL.'store');
            exit;
        }
    }

    public function layout()
    {
        $store = new Store();
        $selected = $_POST['layout'];

        $store->editLayout($selected, getUser()->id_company);
        redirect('store');

    }

    public function theme()
    {
        $store = new Store();
        $selected = $_POST['layout'];

        $store->editTheme($selected, getUser()->id_company);
        redirect('store');

    }

    public function closeStore($status)
    {
        $store = new Store();
        if ($store->closeStore($status, getUser()->id_company) == true) {
            $resposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        } else {
            $resposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        }
    }

    public function openStore($status)
    {
        $store = new Store();
        if ($store->openStore($status, getUser()->id_company) == true) {
            $resposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        } else {
            $resposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        }
    }
}