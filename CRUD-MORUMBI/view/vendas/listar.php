<?php 
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/VendasController.php");

$vendasCont = new VendasController();
$vendas = $vendasCont->listar();
//print_r($vendas);
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de vendas</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Idolo</th>
            <th>Tours</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($vendas as $v): ?>
            <tr>
                <td><?= $v->getNome(); ?></td>
                <td><?= $v->getCpf(); ?></td>
                <td><?= $v->getIdolo(); ?></td>
                <td><?= $v->getTours()->getTipo(); ?></td>
                <td><a href="alterar.php?idVendas=<?= $v->getId() ?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
                <td><a href="excluir.php?idVendas=<?= $v->getId() ?>"
                       onclick="return confirm('Confirma a exclusão?');" > 
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>
    
    
