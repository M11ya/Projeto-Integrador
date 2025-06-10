<?php

$jogoModel = new Jogo();
$jogos = $jogoModel->getAllJogos();

view('index', ['jogos' => $jogos]);

?>