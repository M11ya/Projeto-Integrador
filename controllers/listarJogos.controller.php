<?php
require_once 'models/Jogo.php';

protect();

$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);

$filters = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titulo'])) {
        $filters['titulo'] = trim($_POST['titulo']);
    }
    if (isset($_POST['genero'])) {
        $filters['genero'] = trim($_POST['genero']);
    }
}

$jogoModel = new Jogo(); 
$jogos = $jogoModel->getJogosByUserId($_SESSION['id'], $filters);

view('listarJogos', ['jogos' => $jogos, 'mensagem' => $mensagem]);


view('listarJogos');
