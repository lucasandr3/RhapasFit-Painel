<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?=$viewData['title']?></title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=url('assets/portal/favicon.ico')?>">
    <link rel="icon" href="<?=url('assets/portal/favicon.ico')?>" type="image/x-icon">

    <!-- Morris Charts CSS -->
    <link href="<?=url('assets/portal/vendors/morris.js/morris.css')?>" rel="stylesheet" type="text/css" />

    <!-- Toastr CSS -->
    <link href="<?=url('assets/portal/vendors/jquery-toast-plugin/dist/jquery.toast.min.css')?>" rel="stylesheet" type="text/css">

    <?php if($viewData['title'] === 'Categorias'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Cardápio'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Adicionais'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Item Adicional'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Pedidos Finalizados'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Pedidos Cancelados'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Pedidos Antigos'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === 'Clientes'): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if($viewData['title'] === getStore()->name_company): ?>
        <link href="<?=url('assets/portal/vendors/datatables.net-dt/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=url('assets/portal/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <!-- select2 CSS -->
    <link href="<?=url('assets/portal/vendors/select2/dist/css/select2.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="<?=url('assets/portal/vendors/jquery-toggles/css/toggles.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=url('assets/portal/vendors/jquery-toggles/css/themes/toggles-light.css')?>" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?=url('assets/portal/dist/css/style.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

</head>

<body>
<!-- HK Wrapper -->
<div class="hk-wrapper hk-alt-nav hk-icon-nav">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
        <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
        <a class="navbar-brand text-red" href="<?=url('')?>">
          <img src="<?=url('assets/raphas.jpg')?>" style="width: 47px;height: auto;">
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapseAlt">
            <ul class="navbar-nav">
                <li class="nav-item dropdown show-on-hover active">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestão do Cardápio
                    </a>
                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item <?=($viewData['menu'] == 'cardapio')?'active':''?>" href="<?=url('cardapio')?>">Cardápio</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'categoria')?'active':''?>" href="<?=url('cardapio/categoria')?>">Categoria de Prato</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'novoprato')?'active':''?>" href="<?=url('cardapio/novo')?>">Novo Prato</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'novopratoedit')?'active':''?>" href="<?=url('cardapio/editar')?>">Editar Prato</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'adicional')?'active':''?>" href="<?=url('cardapio/adicional')?>">Adicionais de Prato</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'item')?'active':''?>" href="<?=url('cardapio/itens')?>">Itens Adicionais</a>
                    </div>
                </li>
                <li class="nav-item dropdown show-on-hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pedidos
                    </a>
                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item <?=($viewData['menu'] == 'pedidof')?'active':''?>" href="<?=url('pedido/finalizados')?>">Pedidos Finalizados</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'pedidoc')?'active':''?>" href="<?=url('pedido/cancelados')?>">Pedidos Cancelados</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'pedidoan')?'active':''?>" href="<?=url('pedido/antigos')?>">Pedidos Antigos</a>
                    </div>
                </li>
                <li class="nav-item dropdown show-on-hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                    </a>
                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item <?=($viewData['menu'] == 'cliente')?'active':''?>" href="<?=url('clientes')?>">Ver Clientes</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'clienteadd')?'active':''?>" href="<?=url('clientes/add')?>">Novo Cliente</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'clienteinative')?'active':''?>" href="<?=url('clientes/inativos')?>">Clientes Inativos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=url('taxas_entrega')?>" role="button" aria-haspopup="true" aria-expanded="false">
                        Taxa de Entrega
                    </a>
                </li>
                <li class="nav-item dropdown show-on-hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Financeiro
                    </a>
                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item <?=($viewData['menu'] == 'contapa')?'active':''?>" href="javascript:void(0)">Contas a Pagar</a>
                        <a class="dropdown-item <?=($viewData['menu'] == 'contare')?'active':''?>" href="javascript:void(0)">Conta a Receber</a>
                    </div>
                </li>
                <li class="nav-item dropdown show-on-hover">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Relátorios
                    </a>
                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <!-- <a class="dropdown-item" href="<?=url('relatorios/diario')?>">Caixa do Dia</a> -->
                        <a class="dropdown-item" href="<?=url('pedido/cancelados')?>">Pedidos Cancelados</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=url('configuracoes')?>" >Configurações</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?=url('modulos')?>" >Módulos</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="https://raphasfit.com.br/cardapio" target="_blank">Cardápio <i class="zmdi zmdi-arrow-right"></i></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#" target="_blank">Venda de Balcão <i class="zmdi zmdi-arrow-right"></i></a>
                </li> -->
            </ul>
        </div>
        <ul class="navbar-nav hk-navbar-content">
            <li class="nav-item dropdown dropdown-notifications">
                <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge-wrap"><span class="badge badge-success badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a></h6>
                    <div class="notifications-nicescroll-bar">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-sm">
                                        <img src="dist/img/avatar1.jpg" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <div class="notifications-text"><span class="text-dark text-capitalize">Evie Ono</span> accepted your invitation to join the team</div>
                                        <div class="notifications-time">12m</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-sm">
                                        <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <div class="notifications-text">New message received from <span class="text-dark text-capitalize">Misuko Heid</span></div>
                                        <div class="notifications-time">1h</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-primary rounded-circle">
													<span class="initial-wrap"><span><i class="zmdi zmdi-account font-18"></i></span></span>
                                            </span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <div class="notifications-text">You have a follow up with<span class="text-dark text-capitalize"> Scrooge head</span> on <span class="text-dark text-capitalize">friday, dec 19</span> at <span class="text-dark">10.00 am</span></div>
                                        <div class="notifications-time">2d</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-success rounded-circle">
													<span class="initial-wrap"><span>A</span></span>
                                            </span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <div class="notifications-text">Application of <span class="text-dark text-capitalize">Sarah Williams</span> is waiting for your approval</div>
                                        <div class="notifications-time">1w</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-warning rounded-circle">
													<span class="initial-wrap"><span><i class="zmdi zmdi-notifications font-18"></i></span></span>
                                            </span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <div class="notifications-text">Last 2 days left for the project</div>
                                        <div class="notifications-time">15d</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <?php if(getStore()->open_status === 'OPEN'): ?>
                <span class="badge badge-green badge-sm badge-pill ml-10" style="font-size: 14px;border-radius: 5px;letter-spacing: 1px;display: flex;align-items: center;"><span class="material-icons">meeting_room</span>Loja Aberta</span>
            <?php else: ?>
                <span class="badge badge-danger badge-sm badge-pill ml-10" style="font-size: 14px;border-radius: 5px;letter-spacing: 1px;display: flex;align-items: center;"><span class="material-icons">door_back</span>Loja Fechada</span>
            <?php endif; ?>
            <li class="nav-item dropdown dropdown-authentication">
                <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <div class="media-body">
                            <span><?=getUser()->nome_user?><i class="zmdi zmdi-chevron-down"></i></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <?php if(getStore()->open_status === 'OPEN'): ?>
                        <a class="dropdown-item" onclick="CloseStore('CLOSED')"><i class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span style="cursor:pointer;">Fechar Loja</span></a>
                    <?php else: ?>
                        <a class="dropdown-item" onclick="OpenStore('OPEN')"><i class="dropdown-icon zmdi zmdi-check text-success"></i><span style="cursor:pointer;">Abrir Loja</span></a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://descomplicazap.com/<?=getStore()->slug;?>" target="_blank"><i class="dropdown-icon zmdi zmdi-cutlery"></i><span>Ir para Cardápio</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=url('login/logout')?>"><i class="dropdown-icon zmdi zmdi-power"></i><span>Sair do sistema</span></a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /Top Navbar -->

    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <!-- Footer -->
        <div class="hk-footer-wrap container">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p><a href="#" class="text-dark" target="_blank">DescomplicaZap</a> © <?=date('Y')?></p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="d-inline-block">Versão 1.0.0</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->
    </div>
    <!-- /Main Content -->

</div>
<!-- /HK Wrapper -->
