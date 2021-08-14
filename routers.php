<?php
global $routes;
$routes = array();

/*
*   Rotas do APP 
*/

// rota home
$routes['/'] = '/home';

// rotas cardapio
$routes['/cardapio'] = '/menu';
$routes['/cardapio/categoria'] = '/categoria';
$routes['/cardapio/novo'] = '/menu/novo_prato';
$routes['/cardapio/editar'] = '/menu/editPrato';
$routes['/cardapio/adicional'] = '/adicional';
$routes['/cardapio/itens'] = '/itens';

// rota taxa de entrega
$routes['/taxas_entrega'] = '/delivery';

// clientes
$routes['/clientes'] = '/clientes';

// rota configuração
$routes['/configuracoes'] = '/store';

// rota soluções
$routes['/solucoes'] = '/works';

// rota contato
$routes['/contato'] = '/contact';

// rota imprimir
$routes['/imprimir'] = '/imprimir';


/*
*  Fim das rotas do app
*/


