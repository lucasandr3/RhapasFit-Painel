<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?=url('pedido/finalizados')?>">Pedidos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-danger"><?=$title?></span> </li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="container" >

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5 style="color:#555;margin-bottom: 10px;">Dados Financeiros</h5>
                            <div class="card card-body" style="margin-bottom:0.875em;">
                                <div style="display: flex;justify-content: space-between;align-items: center;">
                                    <div>
                                        <p><strong>Id do Pedido: </strong><span class="text-danger">#<?=$pedido['id']?></span></p>
                                        <p style="margin:0;"><strong>Status do Pedido: </strong><span class="text-success" style="font-weight: bold">Finalizado</span></p>
                                    </div>
                                    <div>
                                        <p><strong>Data do Pedido: </strong><?=frDate($pedido['data_pedido'])?></p>
                                        <p style="margin:0;"><strong>Hora do Pedido: </strong><?=$pedido['hora_pedido']?> hs</p>
                                    </div>
                                    <div>
                                        <p><strong>Subtotal: </strong><span class="text-success font-weight-bold"><?=real($pedido['subtotal'])?></span></p>
                                        <p style="margin:0;"><strong>Total do Pedido: </strong><span class="text-success font-weight-bold"><?=real($pedido['total'])?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 style="color:#555;margin-bottom: 10px;margin-top: 10px;">Endereço de entrega</h5>
                        <div class="card card-body" style="margin-bottom:0.875em;">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <?php $endereco = ['address' => $pedido['endereco']]; ?>
                                
                                <?php if(isset(json_decode($endereco['address'])[0]->tipo) && json_decode($endereco['address'])[0]->tipo === 'Retirada no local') : ?>
                                    <p>Retirada</p>
                                <?php else : ?>
                                <?php $entrega = explode(",", json_decode($endereco['address'])[0]->bar); ?>
                                    <div>
                                        <p><strong>CEP: </strong>00000-000</p>
                                        <p><strong>Bairro: </strong><?=$entrega[0]?></p>
                                        <p><strong>Endereço: </strong><?=json_decode($endereco['address'])[0]->rua?></p>
                                        <p style="margin:0;"><strong>Referência: </strong><?=(json_decode($endereco['address'])[0]->ref == "") ? 'Sem ponto de referência': json_decode($endereco['address'])->referencia?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 style="color:#555;margin-bottom: 10px;margin-top: 10px;">Pagamento</h5>
                        <div class="card card-body" style="margin-bottom:0.875em;">
                            <div style="display: flex;justify-content: space-between;align-items: center;">
                                <div>
                                    <p><strong>Meio de pagamento: </strong><span><?=$pedido['pagamento']?></span></p>
                                    <p><strong>troco: </strong><span class="text-success font-weight-bold"><?=real($pedido['troco'])?></span></p>
                                    <p style="margin:0;"><strong>Taxa de Entrega: </strong><span class="text-success font-weight-bold"><?=real($pedido['entrega'])?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 style="color:#555;margin-bottom: 10px;margin-top: 10px;">Produtos do Pedido</h5>
                        <div class="card card-body" style="margin-bottom:0.875em;">
                            <?php foreach(json_decode($pedido['pedido']) as $prod): ?>
                                <div style="display: flex;flex-direction: column;align-items: start;">
                                    <div>
                                        <p><strong>Nome do produto: </strong><?=$prod->name_product?></p>
                                        <p style="margin:0;"><strong>Preço: </strong><?=real($prod->price_product)?></p>
                                    </div>
                                    <div>
                                        <p><strong>Quantidade: </strong><?=($prod->quantity == "1") ? $prod->quantity.' unidade' : $prod->quantity.' unidades'?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->

</div>

<style>
    p {
        padding: 10px;
    }
</style>
