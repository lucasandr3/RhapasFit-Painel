<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
</head>
<body>
    <div class="box">
        <h2 class="hk-pg-title font-weight-600 mb-10">Olá, <?=getStore()->name_company?></h2>
        <img src="<?=url('assets/portal/img/pages/mesas/construct.png')?>" />
        <p>Funcionalidade em construção em breve estará liberada</p>
        <p>e o melhor, sem custo adicional por isso.</p>
        <a href="<?=url('')?>">Voltar para o portal</a>
    </div>

<style>
    body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }
    .box {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .box h2 {
        font-size: 30px;
        color: #555;
    }
    .box p {
        letter-spacing: 1px;
        text-align:center;
    }
    .box a {
        text-decoration:none;
        background-color: #f50d57;
        color: #fff;
        font-weight: bold;
        padding: 10px;
        border-radius: 5px;
    }
    img {
        width: 400px;
        height: auto;
    }
</style>    
</body>
</html>