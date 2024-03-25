<?php

function ipcorportativo() {
    try {
        $ip = gethostbyname(gethostname());
        return $ip;
    } catch (Exception $e) {
        return "Não foi possível obter o endereço IP";
    }
}

// Captura o nome de usuário do ambiente
$Usuario = getenv('USERNAME');

// Captura o nome do host
$Maquina = gethostname();

// Endereço IP da máquina
$enderecoIP = ipcorportativo();

// Obtém a data e hora atual em formato brasileiro
$data_hora = date("d/m/Y H:i:s");

// Caminho do arquivo CSV usando o caminho relativo ao diretório do projeto no WampServer
$ArquivoCSV = 'informacoes.csv'; // Assumindo que o arquivo será salvo no mesmo diretório do script PHP

// Escreve as informações no CSV
$file = fopen($ArquivoCSV, 'a');
if ($file) {
    fputcsv($file, array($Maquina, $Usuario, $enderecoIP, $data_hora));
    fclose($file);
    echo "As informações foram adicionadas ao arquivo '{$ArquivoCSV}'";
} else {
    echo "Erro ao abrir o arquivo '{$ArquivoCSV}'";
}

?>
