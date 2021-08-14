<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?=url('clientes')?>">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Todos os Clientes</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="container" >
    <a href="<?=url('clientes/add')?>" class="btn btn-outline-success mb-2">
        <i class="fa fa-plus"></i> Novo Cliente
    </a>
    <a href="<?=url('clientes/inativos')?>" class="btn btn-outline-success mb-2">
        <i class="fa fa-user-slash"></i> Inativos
    </a>
    <?php get_flash(); ?>
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="table_res" class="display table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Score</th>
                                    <th>Info. Completas</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($list as $item): ?>
                                    <?php if($item['status'] == "0"): ?>
                                        <tr>
                                            <td class="text-capitalize text-center"><?= $item['nome_cliente'] ?></td>
                                            <td><?=$item['email']?></td>
                                            <td><?= $item['tel'] ?></td>
                                            <td>
                                                <?php for($q=0;$q<intval($item['score']);$q++): ?>
                                                    <div style="display: inline-block;width:10px;">
                                                        <img src="<?=url('assets/portal/img/star.png')?>" width="10px">
                                                    </div>
                                                <?php endfor; ?>
                                            </td>
                                            <td>
                                                <a href="<?=BASE_URL?>clientes/ver/<?= $item['id_cliente']?>"
                                                   class="btn btn-success btn-xs" style="color:white;">
                                                    Ver <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= BASE_URL ?>clientes/edit/<?= $item['id_cliente']?>"
                                                       class="btn btn-primary btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                        Editar
                                                    </a>
                                                    <a href="<?= BASE_URL ?>clientes/indisponivel/<?= $item['id_cliente']?>"
                                                       class="btn btn-danger btn-xs">
                                                        <i class="fas fa-power-off"></i>
                                                        Inativo
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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

<div class="row">
    <div class="col-sm">
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro de Adicional</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=url('adicional/addAction')?>" method="post">

                            <div class="form-group">
                                <label>Produto do adicional</label>
                                <select name="id_product" class="form-control select2">
                                    <option>Escolha o Produto</option>
                                    <?php foreach($produtos as $p): ?>
                                        <option value="<?=$p['id']?>"><?=$p['name_product']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do Adicional</label>
                                <input type="text" class="form-control" name="category_name_option"
                                       aria-describedby="emailHelp" placeholder="Digite o nome aqui..."
                                />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="active" class="form-control">
                                    <option value="POACTIVE">Publicar</option>
                                    <option value="POINATIVE">Não Publicar</option>
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer" style="justify-content: start;">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger btn-sm">Cadastrar Adicional</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
