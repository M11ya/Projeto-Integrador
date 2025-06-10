<?php
protect();

$jogoModel = new Jogo();
$userId = $_SESSION['id'] ?? null;

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = 'ID do jogo não especificado.';
    redirect('listarJogos');
}

$jogoId = $_GET['id'];
$jogo = $jogoModel->getJogoById($jogoId);

if (!$jogo) {
    $_SESSION['mensagem'] = 'Jogo não encontrado.';
    redirect('listarJogos');
}

// Verifica se o usuário tem permissão para deletar
if ($jogo['usuario_id'] != $userId) {
    $_SESSION['mensagem'] = 'Você não tem permissão para excluir este jogo.';
    redirect('listarJogos');
}

// Remove o jogo
if ($jogoModel->deleteJogo($jogoId)) {
    $_SESSION['mensagem'] = 'Jogo excluído com sucesso!';
} else {
    $_SESSION['mensagem'] = 'Erro ao excluir o jogo.';
}

redirect('listarJogos');
