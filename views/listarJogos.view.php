<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Coleção | GameCollection</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #0F172A, #1E293B, #000000);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        
        .glass-panel {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(71, 85, 105, 0.5);
        }
        
        .game-card {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(71, 85, 105, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            border-color: rgba(124, 58, 237, 0.5);
        }
        
        .game-image {
            height: 200px;
            object-fit: cover;
            object-position: center;
        }
        
        .btn-primary {
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
        }
        
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</head>

<body class="text-white">

    <?php require_once 'header.view.php'; ?>

    <div class="container mx-auto px-4 py-12 pt-24">
        <!-- Cabeçalho -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold mb-4">
                <span class="text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">
                    <i class="fas fa-gamepad mr-3"></i>Minha Coleção
                </span>
            </h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Todos os jogos que você adicionou à sua coleção pessoal
            </p>
        </div>

        <?php if (!empty($mensagem)): ?>
            <div class="glass-panel mb-8 p-4 rounded-lg bg-gradient-to-r from-red-900/70 to-red-800/70 border border-red-700 text-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>

        <!-- Filtros -->
        <form action="<?= BASE_URL ?>listarJogos" method="POST" class="glass-panel p-6 rounded-xl mb-10 grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="md:col-span-2">
                <label for="titulo" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-heading mr-2 text-indigo-400"></i>Filtrar por Título
                </label>
                <input type="text" name="titulo" id="titulo" placeholder="Digite o nome do jogo..."
                    class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-black focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <div>
                <label for="genero" class="block text-sm font-medium text-gray-300 mb-2">
                    <i class="fas fa-tags mr-2 text-purple-400"></i>Filtrar por Gênero
                </label>
                <input type="text" name="genero" id="genero" placeholder="Ex: Ação, RPG..."
                    class="w-full px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-black focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <div class="flex items-end">
                <button type="submit" class="btn-primary w-full text-white font-semibold py-3 px-6 rounded-lg">
                    <i class="fas fa-filter mr-2"></i>Filtrar
                </button>
            </div>
            <div class="flex items-end">
                <a href="<?= BASE_URL ?>cadastrarJogo"
                   class="btn-primary text-white font-semibold py-3 px-6 rounded-lg flex items-center justify-center w-full">
                    <i class="fas fa-plus mr-2"></i> Adicionar
                </a>
            </div>
        </form>

        <!-- Lista de Jogos -->
        <?php if (empty($jogos)): ?>
            <div class="glass-panel text-center py-16 rounded-xl">
                <div class="max-w-md mx-auto">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-6">
                        <i class="fas fa-gamepad text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-300 mb-2">Sua coleção está vazia</h3>
                    <p class="text-gray-400 mb-6">Adicione seu primeiro jogo para começar sua coleção!</p>
                    <a href="<?= BASE_URL ?>cadastrarJogo"
                        class="btn-primary inline-block text-white font-semibold py-3 px-8 rounded-lg">
                        <i class="fas fa-plus mr-2"></i>Adicionar Jogo
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($jogos as $jogo): ?>
                    <div class="game-card rounded-xl overflow-hidden">
                        <!-- Imagem do Jogo -->
                        <div class="relative">
                            <?php if (!empty($jogo['imagem'])): ?>
                                <img src="<?= BASE_URL ?>uploadsImg/<?= htmlspecialchars($jogo['imagem']) ?>"
                                    alt="<?= htmlspecialchars($jogo['titulo']) ?>"
                                    class="w-full game-image"/>
                            <?php else: ?>
                                <div class="w-full game-image bg-gray-700 flex items-center justify-center">
                                    <i class="fas fa-gamepad text-5xl text-gray-500"></i>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Ano de Lançamento -->
                            <div class="absolute top-2 right-2 bg-gray-900/80 text-white text-xs font-bold px-2 py-1 rounded">
                                <?= htmlspecialchars($jogo['ano_lancamento']) ?>
                            </div>
                        </div>
                        
                        <!-- Informações do Jogo -->
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-white mb-1 truncate"><?= htmlspecialchars($jogo['titulo']) ?></h3>
                            <p class="text-sm text-gray-400 mb-2">
                                <i class="fas fa-user-tie mr-1 text-indigo-400"></i>
                                <?= htmlspecialchars($jogo['autor']) ?>
                            </p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="inline-block bg-gray-700/50 rounded-full px-3 py-1 text-sm font-semibold text-purple-300">
                                    <i class="fas fa-tag mr-1"></i>
                                    <?= htmlspecialchars($jogo['genero']) ?>
                                </span>
                                <a href="<?= BASE_URL ?>jogoDetalhes?id=<?= $jogo['id'] ?>"
                                    class="text-white bg-indigo-600 hover:bg-indigo-700 px-3 py-1 rounded-lg text-sm transition duration-300">
                                    Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>