<?php

session_start();

include_once("conexao.php");

$competicao = $_POST['competicao'];
$_SESSION['competicao'] = $competicao;


$sql = "insert into ta_cem_metros (competicao) values ('$competicao')";
$salvar = mysqli_query($conn, $sql);

$linhas = mysqli_affected_rows($conn);

mysqli_close($conn);

if($linhas == 1){
    $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Competição criada com sucesso!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    header("Location: ./../frontend/pages/add_metros_rasos.php");
}else{
    $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Não foi possivel criar competição!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    header("Location: ./../frontend/index.html");
}

?>