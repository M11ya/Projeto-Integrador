<?php

class Usuario {
    private $db;

    public function __construct() {
        $this->db = db();
    }

    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch();
    }

    public function createUser($name, $email, $password) {
       $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $query = $this->db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");        if ($query->execute([
        'nome' => $name,
        'email' => $email,
        'senha' => $hashedPassword
    ])) {
        return $this->db->lastInsertId(); // retorna o ID do novo usuário
    }
    return false;
}

    public function deleteUser($id) {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        return $query->execute(['id' => $id]);
    }
}

?>