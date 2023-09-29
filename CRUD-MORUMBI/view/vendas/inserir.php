<?php 
//View para inserir alunos

require_once(__DIR__ . "/../../controller/VendasController.php");
require_once(__DIR__ . "/../../model/Vendas.php");
require_once(__DIR__ . "/../../model/Tours.php");

$msgErro = '';
$vendas = null;

if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade = $_POST['idade'] ? $_POST['idade'] : null;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;
    
    //Criar um objeto Aluno para persistência
    $vendas = new Vendas();
    $vendas->setNome($nome);
    $vendas->setCpf($cpf);
    $vendas->setIdolo($idolo);
    if($idTours) {
        $tours = new Curso();
        $tours->setId($idTours);
        $tours->setTours($tours);
    }

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


