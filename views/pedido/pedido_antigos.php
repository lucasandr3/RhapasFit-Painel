<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?=url('pedido/finalizados')?>">Pedidos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pedidos Finalizados</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="container" >
    <?php get_flash(); ?>
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table w-100 display pb-30">
                                <thead>
                                <tr>
                                    <th>Id do pedido</th>
                                    <th>Data do pedido</th>
                                    <th>Hora do pedido</th>
                                    <th>Total do pedido</th>
                                    <th>Detalhes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($pedidos)): foreach($pedidos as $pedido): ?>
                                    <tr>
                                        <td class="text-danger">Pedido #<?=$pedido['id'] ?></td>
                                        <td><?=date('d/m/Y', strtotime($pedido['data_pedido'])) ?></td>
                                        <td><?=$pedido['hora_pedido'] ?> hs</td>
                                        <td class="text-success">
                                            <strong>
                                                <?= real($pedido['total']) ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <a href="<?=BASE_URL?>pedido/detalhes_antigo/<?=$pedido['id'];?>" class="btn btn-danger btn-sm" style="margin-right:-4px;margin-left:3px;border-radius:5px;">
                                                <i class="fa fa-file"></i> &nbsp;&nbsp;Ver Pedido
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->

</div>
