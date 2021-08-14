<!-- <meta HTTP-EQUIV='refresh' CONTENT='10'>  -->
<!-- Container -->
<div class="container mt-xl-50 mt-sm-30 mt-15">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Olá, <?=getStore()->name_company?></h2>
            <p>Aqui você acompanha todos os pedidos</p>
            <p id="status-webs"></p>
        </div>
<!--        <div class="d-flex">-->
<!--            <button class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span class="icon-label"><i class="fa fa-envelope-o"></i> </span><span class="btn-text">Email </span></button>-->
<!--            <button class="btn btn-sm btn-outline-light btn-wth-icon icon-wthot-bg mr-15 mb-15"><span class="icon-label"><i class="fa fa-print"></i> </span><span class="btn-text">Print </span></button>-->
<!--            <button class="btn btn-sm btn-danger btn-wth-icon icon-wthot-bg mb-15"><span class="icon-label"><i class="fa fa-download"></i> </span><span class="btn-text">Export </span></button>-->
<!--        </div>-->

    </div>
    
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="hk-row">
                <div class="col-lg-12">
<!--                    <div class="hk-row">-->
<!--                        <div class="col-lg-4">-->
<!--                            <div class="card card-sm">-->
<!--                                <div class="card-body pa-0">-->
<!--                                    <div class="pa-15 mb-10">-->
<!--                                        <span class="d-block font-14 font-weight-500 text-dark">New Users</span>-->
<!--                                        <div class="d-flex align-items-center justify-content-between">-->
<!--                                            <div class="display-5 font-weight-400 text-dark">12M</div>-->
<!--                                            <div class="font-13 font-weight-500">-->
<!--                                                <span>-28.12%</span>-->
<!--                                                <i class="ion ion-md-arrow-down text-danger ml-5"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="sparkline_1"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-4">-->
<!--                            <div class="card card-sm">-->
<!--                                <div class="card-body pa-0">-->
<!--                                    <div class="pa-15 mb-10">-->
<!--                                        <span class="d-block font-14 font-weight-500 text-dark">New Sessions</span>-->
<!--                                        <div class="d-flex align-items-center justify-content-between">-->
<!--                                            <div class="display-5 font-weight-400 text-dark">76.4%</div>-->
<!--                                            <div class="font-13 font-weight-500">-->
<!--                                                <span>2.12%</span>-->
<!--                                                <i class="ion ion-md-arrow-up text-success ml-5"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="sparkline_2"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-4">-->
<!--                            <div class="card card-sm">-->
<!--                                <div class="card-body pa-0">-->
<!--                                    <div class="pa-15 mb-10">-->
<!--                                        <span class="d-block font-14 font-weight-500 text-dark">Time on Site</span>-->
<!--                                        <div class="d-flex align-items-center justify-content-between">-->
<!--                                            <div class="display-5 font-weight-400 text-dark">2m 15s</div>-->
<!--                                            <div class="font-13 font-weight-500">-->
<!--                                                <span>39.15%</span>-->
<!--                                                <i class="ion ion-md-arrow-up text-success ml-5"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="sparkline_3"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <button style="display:none;" id="btn-noty"></button>
                    <!-- Seção de Pedidos Novos -->
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Novos Pedidos</h5>
                        <p class="mb-40">Aqui estão pedidos novos, que ainda não foram aceitos.</p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap mb-30">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Status</th>
                                                <th>Hora do Pedido</th>
                                                <th>Data do Pedido</th>
                                                <th>Hora da Entrega</th>
                                                <th>Total</th>
                                                <th>Entrega</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($new_orders)): foreach($new_orders as $order): ?>
                                            <tr>
                                                <td><a href="javascript:void(0)" style="text-transform: capitalize;"><?=json_decode($order['client_object'])->name?></a></td>
                                                <td>
                                                    <div class="badge badge-soft-purple"><?=($order['order_status'] === 'WAITING')? 'Confirmar Pedido':''?></div>
                                                </td>
                                                <td><span class="text-muted"><i class="icon-clock font-13"></i> <?=$order['our_order']?> hs</span> </td>
                                                <td><span class="text-muted"><?=$order['date_order']?></span> </td>
                                                <td><span class="text-muted"><?=$order['date_order']?></span> </td>
                                                <td><?=real($order['total_order'])?></td>
                                                <td>
                                                    <?php $endereco = ['address' => $order['order_address']]; ?>
                                                    <?php if(isset(json_decode($endereco['address'])->retirada)) : ?>
                                                        <p>Retirada</p>
                                                    <?php else : ?>
                                                        <p><?=real($order['delivery'])?></p>
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="modal" data-target="#modalStatusOne<?=$order['id']?>" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">mode_edit</span></button>
                                                        <!-- <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">receipt</span></a> -->
                                                        <button data-toggle="modal" data-target="#modalOneImprimir<?=$order['id']?>" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">print</span></button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalStatusOne<?=$order['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="md-loading d-none" id="div-m-loading<?=$order['id']?>">
                                                                    <i class="fa fa-spinner fa-pulse fa-spin fa-3x" style="color:#fff;"></i>
                                                                    <span style="color:#fff;font-size: 15px;margin-left: 15px;">Aguarde...</span>
                                                                </div>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Cadastro de Categoria</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div id="msg-m-status<?=$order['id']?>" class="d-none">
                                                                            <p class="alert alert-info">Você precisa escolhar um status.</p>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Status do Pedido - #<?=$order['id']?></label>
                                                                            <select name="status" class="form-control" onchange="auxStatus(this.value)">
                                                                                <option value="">Escolha um status</option>
                                                                                <option value="PROGRESS">Em Preparo...</option>
                                                                                <option value="CANCELED">Cancelar</option>
                                                                            </select>
                                                                        </div>

                                                                        <input type="hidden" value="<?=getUser()->id_company?>" name="company">
                                                                        <input type="hidden" value="<?=$order['id']?>" name="id_order">

                                                                </div>
                                                                <div class="modal-footer" style="justify-content: start;">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                                                                    <button class="btn btn-primary btn-sm" onclick="changeStatusOrder('<?=$order['id']?>','<?=getUser()->id_company?>')">Confirmar</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalOneImprimir<?=$order['id']?>" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Mudar Status do Pedido #<?=$order['id']?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                    <div style="display: flex;justify-content: center;margin:10px 0;">
                                                    <?php if($order['delivery'] != "0.00"): ?>
                                                            <span><h2>Entrega</h2></span>
                                                        <?php else: ?>
                                                            <span><h2>Retirada</h2></span>
                                                        <?php endif; ?> 
                                                    </div>
                                                    <div class="modal-body" id="m-b-print">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <p style="margin-bottom: 0;"><strong>Nome do comerciante:</strong> <?=getStore()->name_company?></p>
                                                            <p style="margin-bottom: 0;"><strong>Telefone:</strong> <?=frPhone(getStore()->phone)?></p>
                                                            <p style="margin-bottom: 0;"><strong>Endereço:</strong> <?=getStore()->street;?> - <?=getStore()->neighborhood;?>, <?=getStore()->number;?></p>
                                                        </div>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">

                                                        <div style="display: flex;flex-direction: column;">
                                                            <p style="margin-bottom: 0;"><strong>Nº do pedido:</strong> #<?=$order['id']?></p>
                                                            <p style="margin-bottom: 0;"><strong>Data do pedido:</strong> <?=$order['date_order']?></p>
                                                            <?php if($order['delivery'] != "0.00"): ?>
                                                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> <?=json_decode($order['order_address'])->rua?> - <?=explode(',',json_decode($order['order_address'])->bairro)[0]?>, <?=json_decode($order['order_address'])->numero?></p>
                                                            <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> <?=(json_decode($order['order_address'])->referencia)?json_decode($order['order_address'])->referencia:'*****'?></p>
                                                            <?php else: ?>
                                                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> Retirada no Local</p>
                                                            <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> *****</p>
                                                            <?php endif; ?>        
                                                            <p style="margin-bottom: 0;text-transform:capitalize;"><strong>Nome do Cliente:</strong> Lucas Vieira</p>
                                                            <p style="margin-bottom: 0;"><strong>Telefone:</strong> 34988373408</p>
                                                        </div>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
                                            
                                                        <p style="margin-bottom: 0;"><strong>Produtos:</strong></p>
                                                        
                                                        <?php foreach(json_decode($order['order_object']) as $item):?>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <div style="display:flex;justify-content:space-between;">
                                                                <p style="margin-bottom: 0;"><strong>Produto:</strong> <?=$item->nameProduct?></p>
                                                                <p style="margin-bottom: 0;">Qtd <?=$item->quantityProduct?></p>
                                                                <p style="margin-bottom: 0;"><strong>Preço:</strong> <?=real($item->priceProduct)?></p>
                                                            </div>
                                                            <!-- <span style="font-size:12px;"><strong>Observação:</strong> ${prod.note}</span> -->
                                                        </div>
                                                        <?php endforeach; ?>
                                                    
                                                        <?php if($order['note']): ?>
                                                            <hr style="border-color: #5d5c5c;border-style: dashed;">
                                                                <p style="margin-bottom: 0;"><strong>Observação:</strong></p>
                                                                <p><?=$order['note']?></p>
                                                            <hr style="border-color: #5d5c5c;border-style: dashed;">
                                                        <?php else: ?>
                                                            <hr style="border-color: #5d5c5c;border-style: dashed;">
                                                        <?php endif; ?>        
                                                        
                                                        <p style="margin-bottom: 0;"><strong>Total:</strong></p>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: -8px;margin-bottom: 5px;">
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Tipo de Pgto:</strong></p>
                                                            <span><?=$order['payment'];?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Tax. de entrega:</strong></p>
                                                            <span><?=($order['delivery'] === '0.00')? '<span>Retirada no local</span>' : real($order['delivery']);?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Subtotal:</strong></p>
                                                            <span><?=real($order['subtotal_order'])?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Total do pedido:</strong></p>
                                                            <span><?=real($order['total_order'])?></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="justify-content: space-between !important;">
                                                        <button type="button" class="btn btn-primary" style="border-radius:5px;width: 100%;" onclick="printJS('m-b-print', 'html', {font_size:'10pt'})">Imprimir pedido &nbsp;&nbsp;<i class="fa fa-print"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:5px;width: 100%;">Fechar
                                                        </button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fim da Seção pedidos Novos-->

                    <!-- Seção de Pedidos Em Andamento -->
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Pedidos Em Andamento</h5>
                        <p class="mb-40">Aqui estão pedidos que estão sendo preparados<p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap mb-30">
                                    <div class="table-responsive">
                                        <table  id="datable_pp" class="table display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Status</th>
                                                <th>Hora do Pedido</th>
                                                <th>Data do Pedido</th>
                                                <th>Total</th>
                                                <th>Entrega</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($orders_progress)): foreach($orders_progress as $order): ?>
                                                <tr>
                                                    <td><a href="javascript:void(0)" style="text-transform: capitalize;"><?=json_decode($order['client_object'])->name?></a></td>
                                                    <td>
                                                        <div class="badge badge-soft-orange"><?=($order['order_status'] === 'PROGRESS')? 'Em Preparo...':''?></div>
                                                    </td>
                                                    <td><span class="text-muted"><i class="icon-clock font-13"></i> <?=$order['our_order']?> hs</span> </td>
                                                    <td><span class="text-muted"><?=$order['date_order']?></span> </td>
                                                    <td><?=real($order['total_order'])?></td>
                                                    <td>
                                                        <?php $endereco = ['address' => $order['order_address']]; ?>
                                                        <?php if(isset(json_decode($endereco['address'])->retirada)) : ?>
                                                            <p>Retirada</p>
                                                        <?php else : ?>
                                                            <p><?=real($order['delivery'])?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                
                                                    <td>
                                                        <div class="btn-group">
                                                            <button data-toggle="modal" data-target="#modalStatusTwo<?=$order['id']?>" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">mode_edit</span></button>
                                                            <!-- <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">receipt</span></a> -->
                                                            <button data-toggle="modal" data-target="#modalTwoImprimir<?=$order['id']?>" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">print</span></button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="row">
                                                <div class="col-sm">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalStatusTwo<?=$order['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="md-loading d-none" id="div-m-loading<?=$order['id']?>">
                                                                    <i class="fa fa-spinner fa-pulse fa-spin fa-3x" style="color:#fff;"></i>
                                                                    <span style="color:#fff;font-size: 15px;margin-left: 15px;">Aguarde...</span>
                                                                </div>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Cadastro de Categoria</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div id="msg-m-status<?=$order['id']?>" class="d-none">
                                                                            <p class="alert alert-info">Você precisa escolhar um status.</p>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Status do Pedido - #<?=$order['id']?></label>
                                                                            <select name="status" class="form-control" onchange="auxStatus(this.value)">
                                                                                <option value="">Escolha um status</option>
                                                                                <option value="DELIVERY">Saiu para entrega</option>
                                                                                <option value="CANCELED">Cancelar</option>
                                                                            </select>
                                                                        </div>

                                                                        <input type="hidden" value="<?=getUser()->id_company?>" name="company">
                                                                        <input type="hidden" value="<?=$order['id']?>" name="id_order">

                                                                </div>
                                                                <div class="modal-footer" style="justify-content: start;">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                                                                    <button class="btn btn-primary btn-sm" onclick="changeStatusOrder('<?=$order['id']?>','<?=getUser()->id_company?>')">Confirmar</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalTwoImprimir<?=$order['id']?>" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Mudar Status do Pedido #<?=$order['id']?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                    <div style="display: flex;justify-content: center;margin:10px 0;">
                                                    <?php if($order['delivery'] != "0.00"): ?>
                                                            <span><h2>Entrega</h2></span>
                                                        <?php else: ?>
                                                            <span><h2>Retirada</h2></span>
                                                        <?php endif; ?> 
                                                    </div>
                                                    <div class="modal-body" id="m-b-print-two">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <p style="margin-bottom: 0;"><strong>Nome do comerciante:</strong> <?=getStore()->name_company?></p>
                                                            <p style="margin-bottom: 0;"><strong>Telefone:</strong> <?=frPhone(getStore()->phone)?></p>
                                                            <p style="margin-bottom: 0;"><strong>Endereço:</strong> <?=getStore()->street;?> - <?=getStore()->neighborhood;?>, <?=getStore()->number;?></p>
                                                        </div>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
                                                        
                                                        <div style="display: flex;flex-direction: column;">
                                                            <p style="margin-bottom: 0;"><strong>Nº do pedido:</strong> #<?=$order['id']?></p>
                                                            <p style="margin-bottom: 0;"><strong>Data do pedido:</strong> <?=date('d/m/Y', strtotime($order['date_order']))?></p>
                                                            <?php if($order['delivery'] != "0.00"): ?>
                                                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> <?=json_decode($order['order_address'])->rua?> - <?=explode(',',json_decode($order['order_address'])->bairro)[0]?>, <?=json_decode($order['order_address'])->numero?></p>
                                                            <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> <?=(json_decode($order['order_address'])->referencia)?json_decode($order['order_address'])->referencia:'*****'?></p>
                                                            <?php else: ?>
                                                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> Retirada no Local</p>
                                                            <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> *****</p>
                                                            <?php endif; ?>
                                                            <p style="margin-bottom: 0;text-transform:capitalize;"><strong>Nome do Cliente:</strong> Lucas Vieira</p>
                                                            <p style="margin-bottom: 0;"><strong>Telefone:</strong> 34988373408</p>
                                                        </div>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
                                            
                                                        <p style="margin-bottom: 0;"><strong>Produtos:</strong></p>
                                                        
                                                        <?php foreach(json_decode($order['order_object']) as $item):?>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <div style="display:flex;justify-content:space-between;">
                                                                <p style="margin-bottom: 0;"><strong>Produto:</strong> <?=$item->nameProduct?></p>
                                                                <!-- <p style="margin-bottom: 0;"> <?=$item->nameProduct?></p> -->
                                                                <p style="margin-bottom: 0;"><strong>Preço:</strong> <?=real($item->priceProduct)?></p>
                                                            </div>
                                                            <!-- <span style="font-size:12px;"><strong>Observação:</strong> ${prod.note}</span> -->
                                                        </div>
                                                        <?php endforeach; ?>
                                                    
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
                                                        
                                                        <p style="margin-bottom: 0;"><strong>Total:</strong></p>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: -8px;margin-bottom: 5px;">
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Tipo de Pgto:</strong></p>
                                                            <span><?=$order['payment'];?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Tax. de entrega:</strong></p>
                                                            <span><?=($order['delivery'] === '0.00')? '<span>Retirada no local</span>' : real($order['delivery']);?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Subtotal:</strong></p>
                                                            <span><?=real($order['subtotal_order'])?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Total do pedido:</strong></p>
                                                            <span><?=real($order['total_order'])?></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="justify-content: space-between !important;">
                                                        <button type="button" class="btn btn-primary" style="border-radius:5px;width: 100%;" onclick="printJS('m-b-print-two', 'html', {font_size:'10pt'})">Imprimir pedido &nbsp;&nbsp;<i class="fa fa-print"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:5px;width: 100%;">Fechar
                                                        </button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fim da Seção pedidos Em Andamento-->

                    <!-- Seção de Pedidos saiu para entrega -->
                    <section class="hk-sec-wrapper">
                        <h5 class="hk-sec-title">Saiu para Entrega</h5>
                        <p class="mb-40">Aqui estão pedidos que saíram pra entrega.</p>
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap mb-30">
                                    <div class="table-responsive">
                                        <table id="datable_pd" class="table display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Status</th>
                                                <th>Hora do Pedido</th>
                                                <th>Data do Pedido</th>
                                                <th>Total</th>
                                                <th>Entrega</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($orders_delivery)): foreach($orders_delivery as $order): ?>
                                                <tr>

                                                    <td><a href="javascript:void(0)" style="text-transform: capitalize;"><?=json_decode($order['client_object'])->name?></a></td>
                                                    <td>
                                                        <div class="badge badge-soft-primary"><?=($order['order_status'] === 'DELIVERY')? 'Saiu para entrega':''?></div>
                                                    </td>
                                                    <td><span class="text-muted"><i class="icon-clock font-13"></i> <?=$order['our_order']?> hs</span> </td>
                                                    <td><span class="text-muted"><?=$order['date_order']?></span> </td>
                                                    <td><?=real($order['total_order'])?></td>
                                                    <td>
                                                        <?php $endereco = ['address' => $order['order_address']]; ?>
                                                        <?php if(isset(json_decode($endereco['address'])->retirada)) : ?>
                                                            <p>Retirada</p>
                                                        <?php else : ?>
                                                            <p><?=real($order['delivery'])?></p>
                                                        <?php endif; ?>
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <button data-toggle="modal" data-target="#modalStatusThree<?=$order['id']?>" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">mode_edit</span></button>
                                                            <!-- <a href="" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">receipt</span></a> -->
                                                            <button data-toggle="modal" data-target="#modalThreeImprimir<?=$order['id']?>" class="btn btn-outline-secondary btn-xs"><span class="material-icons" style="margin-top: 5px;font-size: 20px;">print</span></button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="row">
                                                <div class="col-sm">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalStatusThree<?=$order['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="md-loading d-none" id="div-m-loading<?=$order['id']?>">
                                                                    <i class="fa fa-spinner fa-pulse fa-spin fa-3x" style="color:#fff;"></i>
                                                                    <span style="color:#fff;font-size: 15px;margin-left: 15px;">Aguarde...</span>
                                                                </div>
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Cadastro de Categoria</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div id="msg-m-status<?=$order['id']?>" class="d-none">
                                                                            <p class="alert alert-info">Você precisa escolhar um status.</p>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Status do Pedido - #<?=$order['id']?></label>
                                                                            <select name="status" class="form-control" onchange="auxStatus(this.value)">
                                                                                <option value="">Escolha um status</option>
                                                                                <option value="FINALIZED">Pedido Entregue</option>
                                                                                <option value="CANCELED">Cancelar</option>
                                                                            </select>
                                                                        </div>

                                                                        <input type="hidden" value="<?=getUser()->id_company?>" name="company">
                                                                        <input type="hidden" value="<?=$order['id']?>" name="id_order">

                                                                </div>
                                                                <div class="modal-footer" style="justify-content: start;">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                                                                    <button class="btn btn-primary btn-sm" onclick="changeStatusOrder('<?=$order['id']?>','<?=getUser()->id_company?>')">Confirmar</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalThreeImprimir<?=$order['id']?>" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Mudar Status do Pedido #<?=$order['id']?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                    <div style="display: flex;justify-content: center;margin:10px 0;">
                                                    <?php if($order['delivery'] != "0.00"): ?>
                                                            <span><h2>Entrega</h2></span>
                                                        <?php else: ?>
                                                            <span><h2>Retirada</h2></span>
                                                        <?php endif; ?> 
                                                    </div>
                                                    <div class="modal-body" id="m-b-print-three">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <p style="margin-bottom: 0;"><strong>Nome do comerciante:</strong> <?=getStore()->name_company?></p>
                                                            <p style="margin-bottom: 0;"><strong>Telefone:</strong> <?=frPhone(getStore()->phone)?></p>
                                                            <p style="margin-bottom: 0;"><strong>Endereço:</strong> <?=getStore()->street;?> - <?=getStore()->neighborhood;?>, <?=getStore()->number;?></p>
                                                        </div>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
    
                                                        <div style="display: flex;flex-direction: column;">
                                                            <p style="margin-bottom: 0;"><strong>Nº do pedido:</strong> #<?=$order['id']?></p>
                                                            <p style="margin-bottom: 0;"><strong>Data do pedido:</strong> <?=date('d/m/Y', strtotime($order['date_order']))?></p>
                                                            <?php if($order['delivery'] != "0.00"): ?>
                                                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> <?=json_decode($order['order_address'])->rua?> - <?=explode(',',json_decode($order['order_address'])->bairro)[0]?>, <?=json_decode($order['order_address'])->numero?></p>
                                                            <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> <?=(json_decode($order['order_address'])->referencia)?json_decode($order['order_address'])->referencia:'*****'?></p>
                                                            <?php else: ?>
                                                                <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> Retirada no Local</p>
                                                            <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> *****</p>
                                                            <?php endif; ?>
                                                            <p style="margin-bottom: 0;text-transform:capitalize;"><strong>Nome do Cliente:</strong> Lucas Vieira</p>
                                                            <p style="margin-bottom: 0;"><strong>Telefone:</strong> 34988373408</p>
                                                        </div>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
                                            
                                                        <p style="margin-bottom: 0;"><strong>Produtos:</strong></p>
                                                        
                                                        <?php foreach(json_decode($order['order_object']) as $item):?>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <div style="display:flex;justify-content:space-between;">
                                                                <p style="margin-bottom: 0;"><strong>Produto:</strong> <?=$item->nameProduct?></p>
                                                                <!-- <p style="margin-bottom: 0;"> <?=$item->nameProduct?></p> -->
                                                                <p style="margin-bottom: 0;"><strong>Preço:</strong> <?=real($item->priceProduct)?></p>
                                                            </div>
                                                            <!-- <span style="font-size:12px;"><strong>Observação:</strong> ${prod.note}</span> -->
                                                        </div>
                                                        <?php endforeach; ?>
                                                    
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;">
                                                        
                                                        <p style="margin-bottom: 0;"><strong>Total:</strong></p>
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                                                        <hr style="border-color: #5d5c5c;border-style: dashed;margin-top: -8px;margin-bottom: 5px;">
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Tipo de Pgto:</strong></p>
                                                            <span><?=$order['payment'];?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Tax. de entrega:</strong></p>
                                                            <span><?=($order['delivery'] === '0.00')? '<span>Retirada no local</span>' : real($order['delivery']);?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Subtotal:</strong></p>
                                                            <span><?=real($order['subtotal_order'])?></span>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                                                            <p style="margin-bottom: 0;"><strong>Total do pedido:</strong></p>
                                                            <span><?=real($order['total_order'])?></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="justify-content: space-between !important;">
                                                        <button type="button" class="btn btn-primary" style="border-radius:5px;width: 100%;" onclick="printJS('m-b-print-three', 'html', {font_size:'10pt'})">Imprimir pedido &nbsp;&nbsp;<i class="fa fa-print"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius:5px;width: 100%;">Fechar
                                                        </button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Fim da Seção pedidos saiu para entrega-->

<!--                    <div class="hk-row">-->
<!--                        <div class="col-md-12">-->
<!--                            <div class="card">-->
<!--                                <div class="card-header card-header-action">-->
<!--                                    <h6>Total Sales</h6>-->
<!--                                    <div class="d-flex align-items-center card-action-wrap">-->
<!--                                        <div class="inline-block dropdown">-->
<!--                                            <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>-->
<!--                                            <div class="dropdown-menu dropdown-menu-right">-->
<!--                                                <a class="dropdown-item" href="#">Action</a>-->
<!--                                                <a class="dropdown-item" href="#">Another action</a>-->
<!--                                                <a class="dropdown-item" href="#">Something else here</a>-->
<!--                                                <div class="dropdown-divider"></div>-->
<!--                                                <a class="dropdown-item" href="#">Separated link</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="card-body">-->
<!--                                    <div class="d-flex align-items-start justify-content-between mb-15">-->
<!--                                        <div class="display-6 text-dark">$40,630.59</div>-->
<!--                                        <div class="font-16 text-green font-weight-500">-->
<!--                                            <i class="ion ion-md-arrow-up mr-5"></i>-->
<!--                                            <span>5.12%</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div id="e_chart_2" class="echart" style="height:190px;"></div>-->
<!--                                    <div class="hk-legend-wrap mt-10">-->
<!--                                        <div class="hk-legend">-->
<!--                                            <span class="d-10 bg-red rounded-circle d-inline-block"></span><span>Today</span>-->
<!--                                        </div>-->
<!--                                        <div class="hk-legend">-->
<!--                                            <span class="d-10 bg-red-light-4 rounded-circle d-inline-block"></span><span>Yesterday</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
<!--        <div class="col-lg-4">-->
<!--            <div class="card card-sm">-->
<!--                <div class="card-body">-->
<!--                    <div class="hk-legend-wrap mb-10">-->
<!--                        <div class="hk-legend">-->
<!--                            <span class="d-10 bg-red rounded-circle d-inline-block"></span><span>Today</span>-->
<!--                        </div>-->
<!--                        <div class="hk-legend">-->
<!--                            <span class="d-10 bg-red-light-4 rounded-circle d-inline-block"></span><span>Yesterday</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div id="e_chart_1" class="echart" style="height:155px;"></div>-->
<!--                    <div class="row mt-20">-->
<!--                        <div class="col-4">-->
<!--                            <span class="d-block text-capitalize">Previous</span>-->
<!--                            <span class="d-block font-weight-600 font-13">79.82</span>-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                            <span class="d-block text-capitalize">% Change</span>-->
<!--                            <span class="d-block font-weight-600 font-13">+14.29</span>-->
<!--                        </div>-->
<!--                        <div class="col-4">-->
<!--                            <span class="d-block text-capitalize">Trend</span>-->
<!--                            <span class="block">-->
<!--													<i class="zmdi zmdi-trending-down text-danger font-20"></i>-->
<!--												</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <!-- /Row -->
</div>
<!-- /Container -->

<style>
.md-loading {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #00000085;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}
</style>