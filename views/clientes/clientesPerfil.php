<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?=url('clientes')?>">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dados Cliente</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="container">
    <a href="<?=url('clientes')?>" class="btn btn-outline-success mb-2">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
    <?php get_flash(); ?>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <?php if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])) : ?>
                            <?php echo $_SESSION['alert']; ?>
                            <?php $_SESSION['alert'] = ''; ?>
                        <?php endif; ?>

                        <form method="POST" action="<?= BASE_URL ?>clientes/edit_action">
                            <div class="form-group">
                                <label>Nome do Cliente <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nome_cliente" value="<?=$cliente['nome_cliente'];?>" required placeholder="Digite um Nome para o cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>CNPJ/CPF <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="doc" value="<?=$cliente['doc'];?>" required placeholder="Digite um CNPJ ou CPF" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Cep <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cep" value="<?=$cliente['cep'];?>" required placeholder="00000-000" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Endereço <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="endereco" value="<?=$cliente['endereco'];?>" required placeholder="Digite o endereço para o cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Número <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="numero" value="<?=$cliente['numero'];?>" required placeholder="Digite o número do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Bairro <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="bairro" value="<?=$cliente['bairro'];?>" required placeholder="Digite o bairro do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Complemento <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="complemento" value="<?=$cliente['complemento'];?>" required placeholder="Digite o complemento do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Cidade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cidade" value="<?=$cliente['cidade'];?>" required placeholder="Digite a cidade do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Estado <span class="text-danger">*</span></label>
                                <select name="estado" class="form-control" required>
                                    <option value="<?=$cliente['estado'];?>" ><?=$cliente['estado'];?></option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label>E-mail <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" value="<?=$cliente['email'];?>" required placeholder="Digite um E-mail" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Telefone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tel" value="<?=$cliente['tel'];?>" required placeholder="(00)00000-0000" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="<?=$cliente['status'];?>" >
                                        <?php if($cliente['status'] == "0"): ?>
                                            Ativo
                                        <?php else: ?>
                                            Inativo
                                        <?php endif; ?>
                                    </option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label>Score <span class="text-danger">*</span></label>
                                <select name="score" class="form-control" required>
                                    <option value="<?=$cliente['score'];?>" >
                                        <?php if($cliente['score'] == "0"): ?>
                                            <?=$cliente['score'];?> Estrela
                                        <?php else: ?>
                                            <?=$cliente['score'];?> Estrelas
                                        <?php endif; ?>
                                    </option>
                                </select>
                            </div><br>

                            <input type="submit" value="Cadastrar Cliente" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->

</div>
