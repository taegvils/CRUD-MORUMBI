<?php 
//View para inserir alunos

require_once(__DIR__ . "/../../controller/VendasController.php");
require_once(__DIR__ . "/../../model/Vendas.php");
//require_once(__DIR__ . "/../../model/Tours.php");
//require_once(__DIR__ . "/../../model/Idolo.php");

$msgErro = '';
$vendas = null;

if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nomeVisitante = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $cpf = $_POST['cpf'] ? $_POST['cpf'] : null;
    $tours = trim($_POST['tour']) ? trim($_POST['tour']) : null;
    $idolo = isset($_POST['idolo']) ? trim($_POST['idolo']) : null;

    
    
    
    $vendas = new Vendas();
    $vendas->setNomeVisitante($nomeVisitante);
    $vendas->setCpf($cpf);
    $vendas->setTours($tours);
    $vendas->setIdolo($idolo);

   

    //Criar um alunoController
    $vendasCont = new VendasController();
    $erros = $vendasCont->inserir($vendas);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");

