<?php

session_start();

include_once("conexao.php");

$competicao = $_SESSION['competicao'];
$atleta = $_POST['atleta'];
$tempo = $_POST['tempo'];

//selecionar a competição criada
$sql_com = "SELECT `id` FROM `ta_cem_metros` WHERE `competicao` LIKE '$competicao'";
$salvar_com = mysqli_query($conn, $sql_com);
while ($seleciona_com = mysqli_fetch_array($salvar_com)) {
    $id_com = $seleciona_com['id'];
}

//inserir atleta na tabela
$sql_atl = "INSERT INTO `ta_atletas` (`id_competicao`, `atleta`, `tempo`) VALUES ('$id_com', '$atleta', '$tempo')";
$salvar_atl = mysqli_query($conn, $sql_atl);
$linhas = mysqli_affected_rows($conn);

if($linhas == 1){
    $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Atleta inserido com sucesso!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    header("Location: ./../frontend/pages/add_metros_rasos.php");
}else{
    $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Não foi possivel adicionar o atleta!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    header("Location: ./../frontend/pages/add_metros_rasos.php");
}

?>