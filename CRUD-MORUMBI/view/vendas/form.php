<?php 
//Formulário para alunos

require_once(__DIR__ . "/../../controller/ToursController.php");
require_once(__DIR__ . "/../include/header.php");

$toursCont = new ToursController();
$tours = $toursCont->listar();
//print_r($cursos);
?>

<h2><?php echo (!$vendas || $vendas->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Vendas</h2>

<form id="frmVendas" method="POST" >

    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" name="nome" id="txtNome"
            value="<?php echo ($vendas ? $vendas->getNome() : ''); ?>" />
    </div>

    <div>
        <label for="txtCpf">Cpf:</label>
        <input type="number" name="cpf" id="txtCpf"
            value="<?php echo ($vendas ? $vendas->getCpf() : ''); ?>" />
    </div>

    <div>
        <label for="selTours">Tours:</label>
        <select id="selTours" name="tour">
            <option value="">Jogar com idolo</option>
            <option value="">Ensaio fotografico</option>
            <option value="">Tour no estadio</option>
            
            <?php foreach($tours as $tour): ?>
                <option value="<?= $tour->getId(); ?>"
                    <?php 
                        if($vendas && $vendas->getTours() && 
                            $vendas->getTours()->getId() == $tour->getId())
                            echo 'selected';
                    ?>
                >
                    <?= $tour->getNome(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="hidden" name="id" 
        value="<?php echo ($vendas ? $vendas->getId() : 0); ?>" />
    
    <input type="hidden" name="submetido" value="1" />

    <button type="submit">Gravar</button>
    <button type="reset">Limpar</button>
</form>

<div style="color: red;">
    <?php echo $msgErro; ?>
</div>

<a href="listar.php">Voltar</a>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
