<?php
protect(); 

$jogoId = $_GET['id'] ?? null;

if (!$jogoId) {
    $_SESSION['mensagem'] = "Jogo não especificado.";
    redirect('listarJogos');
}

$jogoModel = new Jogo();
$jogo = $jogoModel->getJogoById($jogoId);

if (!$jogo) {
    $_SESSION['mensagem'] = "Jogo não encontrado.";
    redirect('listarJogos');
}



view('jogoDetalhes', ['jogo' => $jogo, 'mensagem' => $_SESSION['mensagem'] ?? null]);
unset($_SESSION['mensagem']);