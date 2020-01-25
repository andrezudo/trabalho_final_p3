<?php

session_start();

include_once("./../../backend/conexao.php");

$cont = 1;

//selecionar todas as competições de 100 m
$sql_todas = "SELECT * FROM `ta_cem_metros`";
$salvar_todas = mysqli_query($conn, $sql_todas);

//selecionar a competição criada
//$sql_com = "SELECT `id` FROM `ta_cem_metros` WHERE `competicao` LIKE '$competicao'";
//$salvar_com = mysqli_query($conn, $sql_com);
//while ($seleciona_com = mysqli_fetch_array($salvar_com)) {
//    $id_com = $seleciona_com['id'];
//}

//seleciona os atletas da competição selecionada
//$sql_atletas = "SELECT * FROM `ta_atletas` WHERE `id_competicao` = $id_com ORDER BY `tempo` ASC";
//$salvar_atletas = mysqli_query($conn, $sql_atletas);



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SysCOB - 100 metros rasos</title>
    <link rel="stylesheet" href="./../node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="./../node_modules/bootstrap/compiler/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">SysCOB</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                </ul>
            </div>
        </div>

    </nav>


    <div class="container">
        <div class="col-12 text-center my-3">
            <h2>Todas as competições de 100 metros rasos</h2>
        </div>

        <div class="row">

            <div class="pr-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#criar_100m">
                    Criar competição
                </button>
                <a href="./../index.html" class="btn btn-danger">Voltar</a>
            </div>

            <?php while ($exibirCompeticoes = mysqli_fetch_array($salvar_todas)) { ?>

                <?php
                $id_compe = $exibirCompeticoes['id'];
                $sql_atl = "SELECT * FROM ta_atletas where id_competicao = $id_compe ORDER BY `tempo` ASC";
                $resul_atl = mysqli_query($conn, $sql_atl);
                ?>

                <?php while ($exibirAtle = mysqli_fetch_array($resul_atl)) { ?>
                    <div class="col-12 text-center my-5">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3" class="card-header"><?php echo $exibirCompeticoes['competicao'] ?></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Posição</th>
                                    <th scope="col">Atleta</th>
                                    <th scope="col">Tempo em segundos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php do { ?>
                                    <tr>
                                        <th scope="row"><?php echo $cont++; ?>º</th>
                                        <td><?php echo $exibirAtle['atleta'] ?></td>
                                        <td><?php echo $exibirAtle['tempo'] ?></td>
                                    </tr>
                                <?php } while ($exibirAtle = mysqli_fetch_array($resul_atl)) ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $cont = 1; ?>

                <?php } ?>

            <?php } ?>

            <div class="modal fade" id="criar_100m" tabindex="1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
    
                        <div class="modal-header">
                            <h4 class="modal-title">100 metros rasos</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
    
                        </div>
    
                        <div class="modal-body">
                            <form method="POST" action="./../../backend/cria_com_100m.php">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Competição</label>
                                        <input type="text" name="competicao" class="form-control" placeholder="Nome da competição" required="required">
                                    </div>
                                    <button type="submit" class="btn btn-success">Criar</button>
                            </form>
                        </div>
    
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="./../node_modules/jquery/dist/jquery.js"></script>
    <script src="./../node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="./../node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#">SysCOB</a>
    </div>

</footer>
<!-- Footer -->

</html>