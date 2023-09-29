<?php 
//Classe service para aluno

require_once(__DIR__ . "/../model/Vendas.php");

class VendasService {

    public function validarDados(Vendas $vendas) {
        $erros = array();
        
        //Validar o nome
        if(! $vendas->getNome()) {
            array_push($erros, "Informe o nome!");
        }

        //Validar a idade
        if(! $vendas->getCpf()) {
            array_push($erros, "Informe o cpf!");
        }

        //Validar estrangeiro
        if(! $vendas->getIdolo()) {
            array_push($erros, "Informe o idolo!");
        }

        //Validar curso
        if(! $vendas->getTours()) {
            array_push($erros, "Informe o tour!");
        }

        return $erros;
    }

}