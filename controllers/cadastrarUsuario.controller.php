<?php

$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar_usuario'])) {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($nome)) {
        $_SESSION['mensagem'] = 'O campo nome é obrigatório!';
        redirect('cadastroUsuario');
    } elseif (empty($email)) {
        $_SESSION['mensagem'] = 'O campo email é obrigatório!';
        redirect('cadastroUsuario');
    } elseif (empty($senha)) {
        $_SESSION['mensagem'] = 'O campo senha é obrigatório!';
        redirect('cadastroUsuario');
    } else {
        $usuarioModel = new Usuario();
        $existingUser = $usuarioModel->getUserByEmail($email);

        if ($existingUser) {
            $_SESSION['mensagem'] = 'Este email já está cadastrado!';
            redirect('cadastroUsuario');
        } else {
            if ($usuarioModel->createUser($nome, $email, $senha)) {
                $_SESSION['mensagem'] = 'Usuário cadastrado com sucesso! Faça login.';
                redirect('login');
            } else {
                $_SESSION['mensagem'] = 'Erro ao cadastrar usuário. Tente novamente.';
                redirect('cadastroUsuario');
            }
        }
    }
}


view('cadastroUsuario');

?>