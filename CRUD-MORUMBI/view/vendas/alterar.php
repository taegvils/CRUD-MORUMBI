<?php 
//View para alterar vendass

require_once(__DIR__ . "/../../controller/vendasController.php");
require_once(__DIR__ . "/../../model/Vendas.php");
require_once(__DIR__ . "/../../model/Tours.php");

$msgErro = '';
$vendas = null;

$vendasCont = new VendasController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $cpf = $_POST['cpf'] ? $_POST['cpf'] : null;
    $idIdolo = trim($_POST['id_idolo']) ? trim($_POST['id_idolo']) : null;
    $idTours = trim($_POST['id_tours']) ? trim ($_POST['id_tours']) : null;

    $idvendas = $_POST['id'];
    
    //Criar um objeto vendas para persistência
    $vendas = new vendas();
    $vendas->setId($id_vendas);
    $vendas->setNome($nome);
    $vendas->setCPF($cpf);
    
    if($id_tours) {
        $tours = new Tours();
        $tours->setId($id_tours);
        $vendas->setTours($tours);
    }

    //Criar um vendasController 
    $vendasCont = new VendasController();
    $erros = $vendasCont->atualizar($vendas);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }



} else {
    //Usuário apenas entrou na página para alterar
    $idVendas = 0;
    if(isset($_GET['id_vendas']))
        $idvendas = $_GET['idvendas'];
    
    $vendas = $vendasCont->buscarPorId($id_vendas);
    if(! $vendas) {
        echo "vendas não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

}

//Inclui o formulário
include_once(__DIR__ . "/form.php");