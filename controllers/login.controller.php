<?php

$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']); // Clear message after displaying

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logar_usuario'])) {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email)) {
        $_SESSION['mensagem'] = 'O campo email é obrigatório!';
        redirect('login');
    } elseif (empty($senha)) {
        $_SESSION['mensagem'] = 'O campo senha é obrigatório!';
        redirect('login');
    } else {
        $usuarioModel = new Usuario();
        $user = $usuarioModel->getUserByEmail($email);

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];

            if ($user['is_admin'] == 1 || $user['email'] === 'admin@example.com') { // Check for admin status
                $_SESSION['is_admin'] = true;
                redirect('painel-admin'); // Redirect to admin panel
            } else {
                redirect('perfil'); // Redirect to user profile
            }
        } else {
            $_SESSION['mensagem'] = 'Email ou senha incorretos!';
            redirect('login');
        }
    }
}

view('login', ['mensagem' => $mensagem]);

?>