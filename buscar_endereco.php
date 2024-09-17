<?php

    if (isset($_GET['cep'])) {
    // Obtém o valor do parâmetro 'cep' da requisição GET
        $cep = $_GET['cep'];

        // Remove todos os caracteres que não são números do CEP
        $cep = preg_replace("/[^0-9]/", "", $cep);

        // Constrói a URL para a API do ViaCEP com o CEP fornecido
        $url = "https://viacep.com.br/ws/$cep/json/";

        // Inicia uma sessão cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Executa a requisição e armazena a resposta
        $response = curl_exec($ch);
        curl_close($ch);

        // Define o cabeçalho da resposta como JSON
        header('Content-Type: application/json');

    // Se houver uma resposta, a retorna
    if ($response) {
        echo $response;
    } else {
        // Se não houver resposta, retorna um JSON com a mensagem de erro
        echo json_encode(['error' => 'CEP não encontrado']);
    }
    } else {
    // Se o parâmetro 'cep' não foi fornecido na requisição, retorna um JSON com a mensagem de erro
        json_encode(['error' => 'CEP não fornecido']);
    }
?>