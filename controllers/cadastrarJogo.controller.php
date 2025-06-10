<?php
protect();



$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_SESSION['id'])) {
        $_SESSION['mensagem'] = 'Você precisa estar logado para cadastrar um jogo.';
        redirect('login');
    };

    // Sanitização e validação dos campos
    $titulo = trim($_POST['titulo'] ?? '');
    $autor = trim($_POST['autor'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $ano_lancamento = trim($_POST['ano_lancamento'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');

    if (empty($titulo)) {
        $_SESSION['mensagem'] = 'O campo título é obrigatório!';
        redirect('cadastroJogos');
    };

    // Validação de ano (opcional, mas útil)
    if (!empty($ano_lancamento) && !preg_match('/^\d{4}$/', $ano_lancamento)) {
        $_SESSION['mensagem'] = 'Ano de lançamento deve conter 4 dígitos.';
        redirect('cadastroJogos');
    };

    // Upload da imagem 
    $imagemName = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadResult = uploadImage($_FILES['imagem']);

        if ($uploadResult === "not_image") {
            $_SESSION['mensagem'] = 'A imagem deve ser PNG, JPG ou JPEG.';
            redirect('cadastroJogos');
        } elseif ($uploadResult === "upload_failed") {
            $_SESSION['mensagem'] = 'Erro ao fazer upload da imagem.';
            redirect('cadastroJogos');
        }

        $imagemName = $uploadResult;
    } else echo "Tem Imagem";



    try {
        $jogoModel = new Jogo();

        $data = [
            'titulo' => $titulo,
            'autor' => $autor,
            'genero' => $genero,
            'ano_lancamento' => $ano_lancamento,
            'descricao' => $descricao,
            'imagem' => $imagemName
        ];

echo "<br>VARDUMP DATA: " . var_dump($data);
echo "<br>VARDUMP ID: " . var_dump($_SESSION['id']);

        if ($jogoModel->createJogo($data, $_SESSION['id'])) {
            $_SESSION['mensagem'] = 'Jogo cadastrado com sucesso!';
            echo "<br>Jogo cadastrado com sucesso";
            redirect('listarJogos');
        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastrar o jogo. Tente novamente.';
            echo "<br>Erro ao cadastrar o jogo. Tente novamente.";
            redirect('cadastroJogos');
        }
    } catch (Exception $e) {
        $_SESSION['mensagem'] = 'Erro no banco de dados: ' . $e->getMessage();
        redirect('cadastroJogos');
    }
}

view('cadastroJogos');
