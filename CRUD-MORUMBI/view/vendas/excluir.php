<?php
//View para excluir um aluno

require_once(__DIR__ . '/../../controller/VendasController.php');

//Receber o parâmetro
$idVendas = 0;
if(isset($_GET['idVendas']))
    $idVendas = $_GET['idVendas'];

//Carregar o aluno 
$vendasCont = new VendasController();   
$vendas = $vendasCont->buscarPorId($idVendas);

//Verificar se o aluno existe
if(! $vendas) {
    echo "Vendas não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o aluno
$vendasCont->excluirPorId($vendas->getId());

//Redirecionar para a listar
header("location: listar.php");
