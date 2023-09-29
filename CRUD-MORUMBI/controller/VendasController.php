<?php 


require_once(__DIR__ . "/../dao/VendasDAO.php");
require_once(__DIR__ . "/../model/Vendas.php");
require_once(__DIR__ . "/../service/VendasService.php");

class VendasController {

    private $vendasDAO;
    private $vendasService;

    public function __construct() {
        $this->vendasDAO = new VendasDAO();        
        $this->vendasService = new VendasService();
    }

    public function listar() {
        return $this->vendasDAO->listAll();
    }
    

    public function buscarPorId(int $id) {
        return $this->vendasDAO->findById($id);
    }

    public function inserir(Vendas $vendas) {
        //Valida e retorna os erros caso existam
        $erros = $this->vendasService->validarDados($vendas);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->vendasDAO->insert($vendas);
        return array();
    }

    public function atualizar(Vendas $vendas) {
        $erros = $this->vendasService->validarDados($vendas);
        if($erros) 
            return $erros;
        
        //Persiste o objeto e retorna um array vazio
        $this->vendasDAO->update($vendas);
        return array();
    }

    public function excluirPorId(int $id) {
        $this->vendasDAO->deleteById($id);
    }

}
