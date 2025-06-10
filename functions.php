<?php

function protect() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        $_SESSION['mensagem'] = "Você precisa estar logado para acessar esta página.";
        header("Location: " . BASE_URL . "login");
        exit();
    }
}

function uploadImage($fileInput): string {
    $name = $fileInput['name'];
    $tmp_name = $fileInput['tmp_name'];

    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $allowedExtensions = ['png', 'jpg', 'jpeg'];

    if (!in_array($extension, $allowedExtensions)) {
        return "not_image"; 
    }

    $newName = uniqid() . '.' . $extension;
    $uploadPath = UPLOAD_DIR . $newName;

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
    }

    if (move_uploaded_file($tmp_name, $uploadPath)) {
        return $newName;
    } else {
        return "upload_failed";
    }
}

function redirect($path) {
    header("Location: " . BASE_URL . $path);
    exit();
}

function view($viewName, $data = []) {
    extract($data); 


    
    require_once "views/{$viewName}.view.php";
}

function abort($statusCode = 404) {
    http_response_code($statusCode);
    echo "<h1>Erro " . $statusCode . "</h1>";
    if ($statusCode == 404) {
        echo "<p>Página não encontrada.</p>";
    }
    exit();
}

?>