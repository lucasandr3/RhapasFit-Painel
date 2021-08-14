<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?=url('menu/novo_prato')?>">Cardápio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Novo Prato</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="container">
    <?php get_flash(); ?>
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <form action="<?=url('menu/novo_prato_action')?>" method="POST" enctype="multipart/form-data">
                    <h5>Dados iniciais do produtos</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categoria do produto</label>
                                <select name="category" class="form-control select2">
                                    <option>Escolha a categoria</option>
                                    <?php foreach($categories as $c): ?>
                                        <option value="<?=$c['name_category']?>"><?=$c['name_category']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome do produto</label>
                                <input type="text" class="form-control" name="name_product"
                                    aria-describedby="emailHelp" placeholder="Digite o nome do produto"
                                />
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Preço</label>
                                <input type="text" class="form-control" name="actual_price"
                                    aria-describedby="emailHelp" placeholder="0.00"
                                />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Imagem do produto</label>
                                <input type="file" class="form-control" name="arquivo"/>
                                <div style="margin-top: 20px;">
                                    <img src="<?=BASE_URL?><?=$data_store['logo']?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h5>Adicionais do produtos</h5>
                    <div class="row">
                        <div class="col-sm">
                            <?php foreach($p_options as $op): ?>
                                <div class="form-check" style="display:flex;margin: 15px 0px;">
                                    <div>
                                        <input class="form-check-input check-options" type="checkbox" name="options_product[]" value="<?=$op['name_option']?>">
                                        <label class="form-check-label" for="<?=$op['name_option']?>">
                                            <?=$op['name_option']?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <h5>Descrição e Status do produto</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingredientes</label>
                                <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Digite os ingredientes aqui..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control">
                                    <option value="PACTIVE">Publicar</option>
                                    <option value="PINACTIVE">Não Publicar</option>
                                </select>
                            </div>   
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar Produto</button>    
                </form>
            </section>
        </div>
    </div>
    <!-- /Row -->

</div>

<style>
    h5 {
        background-color: #eee;
        border-radius: 5px;
        padding: 5px 15px;
        margin-bottom: 20px;
    }
</style>