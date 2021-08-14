<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?=url('clientes')?>">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Novo Cliente</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="container">
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

                        <form method="POST" action="<?= BASE_URL ?>clientes/add_action">
                            <div class="form-group">
                                <label>Nome do Cliente <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nome_cliente" required placeholder="Digite um Nome para o cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>CNPJ/CPF <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="doc" required placeholder="Digite um CNPJ ou CPF" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Cep <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cep" required placeholder="00000-000" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Endereço <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="endereco" required placeholder="Digite o endereço para o cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Número <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="numero" required placeholder="Digite o número do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Bairro <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="bairro" required placeholder="Digite o bairro do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Complemento <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="complemento" required placeholder="Digite o complemento do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Cidade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cidade" required placeholder="Digite a cidade do cliente" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Estado <span class="text-danger">*</span></label>
                                <select name="estado" class="form-control" required>
                                    <option>Escolha um Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceara</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goias</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="PR">Paraná</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="RS">Rio grande do Sul</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label>E-mail <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" required placeholder="Digite um E-mail" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Telefone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tel" required placeholder="(00)00000-0000" autofocus />
                            </div><br>

                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option>Escolha o Status</option>
                                    <option value="0">Ativo</option>
                                    <option value="1">Inativo</option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label>Score <span class="text-danger">*</span></label>
                                <select name="score" class="form-control" required>
                                    <option value="1">1 Estrela</option>
                                    <option value="2">2 Estrelas</option>
                                    <option value="3" selected>3 Estrelas</option>
                                    <option value="4">4 Estrelas</option>
                                    <option value="5">5 Estrelas</option>
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
