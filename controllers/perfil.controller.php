<?php

protect(); 

$nomeUsuario = htmlspecialchars($_SESSION['nome'] ?? 'Usuário', ENT_QUOTES, 'UTF-8');

view('perfil', ['nomeUsuario' => $nomeUsuario]);

?>