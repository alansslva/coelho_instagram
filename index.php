<?php

//JA ESTA CONECTANDO COM A API, RETORNANDO QUANTIDADE DE OBJETOS, PESQUISANDO POR TAG RETORNANDO TODAS AS FUNÇÕES

//FUNÇÃO PARA CONEXÃO EM CURL

function acessaInstagram($url)
{
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//DADOS DA API GERALA NA AREA DEVELOPER DO INSTAGRAM
$client_id = "CLIENTE_ID";
$url = 'https://api.instagram.com/v1/tags/coelho/media/recent?access_token=ACCESS-TOKEN';

$all_result  = acessaInstagram($url);
$decoded_results = json_decode($all_result, true);


//TESTES DOS RESULTADOS
//var_dump($decoded_results);
// echo '<pre>';
// print_r($decoded_results);
// exit;

//SEGUNDO A DOCUMENTACAO DO INSTAGRAM QUANDO OBJETOS SÃO RETORNADOS É RETORNADO NESSE FORMATO
foreach($decoded_results['data'] as $item){
    $image_link = $item['images']['thumbnail']['url'];
    echo '<img src="'.$image_link.'" />';
}