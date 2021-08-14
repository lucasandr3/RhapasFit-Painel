<?php
namespace Controllers;

use \Core\Controller;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class ImprimirController extends Controller {

	// private $user;

    // public function __construct()
    // {
    //     $this->user = new Usuarios();

    //     if (!$this->user->verifyLogin()) {
    //         header("Location: ".BASE_URL."login");
    //         exit;
	// 	}

	// 	// if (!$this->user->hasPermission('dashboard_view')) {
	// 	// 	$this->loadView('404/500');
    //     //     exit;
    //     // } 
    // }

	public function index()
	{	
		$this->loadView('teste/barcode');
	}

}