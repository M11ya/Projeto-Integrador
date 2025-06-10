<?php
protect();



$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);

$jogoModel = new Jogo();
$userId = $_SESSION['id'] ?? null;

// if(isset($_REQUEST)){
//     echo '<pre>';
//     var_dump($_REQUEST);
//     echo '</pre>';
// }


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alterar_jogo'])) {


    $jogoId = $_POST['id'] ?? null;

    if (!$jogoId) {
        $_SESSION['mensagem'] = "ID do jogo não especificado para alteração.";
        redirect('listarJogos');
    }

    $titulo = trim($_POST['titulo'] ?? '');
    $autor = trim($_POST['autor'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $ano_lancamento = trim($_POST['ano_lancamento'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');

    if (empty($titulo) || empty($autor) || empty($genero) || empty($ano_lancamento) || empty($descricao)) {
        $_SESSION['mensagem'] = 'Todos os campos são obrigatórios.';
        redirect("jogoDetalhes/$jogoId");
    }

    if (!preg_match('/^\d{4}$/', $ano_lancamento)) {
        $_SESSION['mensagem'] = 'Ano de lançamento deve conter 4 dígitos.';
        redirect("jogoDetalhes/$jogoId");
    }

    $imagemName = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['imagem']);

        if ($uploadResult === "not_image") {
            $_SESSION['mensagem'] = 'A imagem deve ser PNG, JPG ou JPEG.';
            redirect("jogoDetalhes/$jogoId");
        } elseif ($uploadResult === "upload_failed") {
            $_SESSION['mensagem'] = 'Erro ao fazer upload da nova imagem.';
            redirect("jogoDetalhes/$jogoId");
        }

        $imagemName = $uploadResult;
    }

    // Atualização
$data = [
    'titulo' => $titulo,
    'autor' => $autor,
    'genero' => $genero,
    'ano_lancamento' => $ano_lancamento,
    'descricao' => $descricao,
];

if (!empty($imagemName)) {
    $data['imagem'] = $imagemName;
}

    if ($jogoModel->updateJogo($jogoId, $data, $userId)) {
        $_SESSION['mensagem'] = 'Jogo alterado com sucesso!';
        redirect("listarJogos");
    } else {
        $_SESSION['mensagem'] = 'Erro ao alterar o jogo.';
        redirect("jogoDetalhes?id=$jogoId");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $jogoId = $_GET['id'] ?? null;

    if (!$jogoId) {
        $_SESSION['mensagem'] = 'ID do jogo não especificado.';
        redirect('listarJogos');
    }

    $jogo = $jogoModel->getJogoById($jogoId);

    if (!$jogo || $jogo['usuario_id'] != $userId) {
        $_SESSION['mensagem'] = 'Jogo não encontrado ou acesso negado.';
        redirect('listarJogos');
    }

    view('jogoEditar', ['jogo' => $jogo, 'mensagem' => $mensagem]);
}
