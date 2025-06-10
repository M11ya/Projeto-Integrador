<?php

class Jogo {
    private $db;

    public function __construct() {
        $this->db = db();
    }

    public function getAllJogos() {
        $query = $this->db->query("SELECT * FROM jogos ORDER BY titulo ASC;");
        return $query->fetchAll();
    }

    public function getJogosByUserId($userId, $filters = []) {
        $sql = "SELECT * FROM jogos WHERE usuario_id = :usuario_id";
        $params = ['usuario_id' => $userId];

        if (!empty($filters['titulo'])) {
            $sql .= " AND titulo LIKE :titulo";
            $params['titulo'] = "%" . $filters['titulo'] . "%";
        }

        if (!empty($filters['genero'])) {
            $sql .= " AND genero LIKE :genero";
            $params['genero'] = "%" . $filters['genero'] . "%";
        }

        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll();
    }

    public function getJogoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM jogos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createJogo($data, $userId) {
    $query = $this->db->prepare("INSERT INTO jogos (usuario_id, titulo, autor, genero, ano_lancamento, descricao, imagem) VALUES (:usuario_id, :titulo, :autor, :genero, :ano_lancamento, :descricao, :imagem)");

    $result = $query->execute([
        'usuario_id' => $userId,
        'titulo' => $data['titulo'],
        'autor' => $data['autor'],
        'genero' => $data['genero'],
        'ano_lancamento' => $data['ano_lancamento'],
        'descricao' => $data['descricao'],
        'imagem' => $data['imagem'] ?? null
    ]);

    return $result;}

public function updateJogo($id, $data, $userId) {
    $campos = [
        'titulo = :titulo',
        'autor = :autor',
        'genero = :genero',
        'ano_lancamento = :ano_lancamento',
        'descricao = :descricao'
    ];

    // Só inclui imagem se ela existir no array
    if (!empty($data['imagem'])) {
        $campos[] = 'imagem = :imagem';
    }

    $sql = "UPDATE jogos SET " . implode(', ', $campos) . " WHERE id = :id AND usuario_id = :usuario_id";
    $query = $this->db->prepare($sql);

    // Monta os parâmetros
    $params = [
        'titulo' => $data['titulo'],
        'autor' => $data['autor'],
        'genero' => $data['genero'],
        'ano_lancamento' => $data['ano_lancamento'],
        'descricao' => $data['descricao'],
        'id' => $id,
        'usuario_id' => $userId
    ];

    if (!empty($data['imagem'])) {
        $params['imagem'] = $data['imagem'];
    }

    return $query->execute($params);
}




    public function deleteJogo($id) {
        $query = $this->db->prepare("DELETE FROM jogos WHERE id = :id");
        return $query->execute(['id' => $id]);
    }
}

?>