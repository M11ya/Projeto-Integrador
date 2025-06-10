<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?> - Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        :root {
            --primary: #6366f1;  /* Indigo-500 */
            --secondary: #8b5cf6; /* Purple-500 */
            --dark: #0F172A;     /* Gray-900 */
            --light: #f8fafc;    /* Gray-50 */
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #0F172A, #1E293B, #000000);
            color: #f8fafc;
        }
        
        .glass-card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(8px);
            border-radius: 12px;
            border: 1px solid rgba(71, 85, 105, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.25);
            border-color: rgba(124, 58, 237, 0.5);
        }
        
        .gradient-button {
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            background-size: 200% auto;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-button:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        
        .secondary-button {
            background: rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .secondary-button:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .header-glass {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(71, 85, 105, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .price-tag {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            border-radius: 6px;
            padding: 3px 10px;
            font-weight: 600;
        }
        
        .game-title {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s ease;
        }
        
        .hero-section {
            background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.95)), url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .rating-stars {
            color: #f59e0b; /* Amber-400 */
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .tag {
            transition: all 0.2s ease;
        }
        
        .tag:hover {
            transform: translateY(-2px);
            background: rgba(124, 58, 237, 0.3) !important;
        }
        
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="min-h-screen">

    <header class="header-glass py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-gamepad text-indigo-400 mr-2 animate-float"></i>
                    <span class="text-gradient bg-gradient-to-r from-indigo-400 to-purple-400">WikiGames</span>
                </h1>
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="text-gray-300 hover:text-indigo-300 transition-colors duration-200 flex items-center">
                        <i class="fas fa-book-open mr-2"></i> Biblioteca
                    </a>
                </nav>
            </div>
            <div class="flex items-center space-x-4">
                <a href="<?= BASE_URL ?>login" class="secondary-button px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Entrar
                </a>
                <a href="<?= BASE_URL ?>cadastrarUsuario" class="gradient-button px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-user-plus mr-2"></i> Cadastrar
                </a>
            </div>
        </div>
    </header>

    <section class="hero-section py-32">
        <div class="container mx-auto px-4">
            <div class="glass-card p-8 max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">
                    Sua plataforma de jogos
                </h1>
                <p class="text-xl text-gray-300 mb-8">Descubra, gerencie e compartilhe sua coleção de jogos.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?= BASE_URL ?>jogos" class="gradient-button px-6 py-3 rounded-lg font-semibold flex items-center">
                        <i class="fas fa-search mr-2"></i> Explorar Jogos
                    </a>
                    <a href="<?= BASE_URL ?>cadastrar-jogo" class="secondary-button px-6 py-3 rounded-lg font-semibold flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i> Adicionar Jogo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <main class="container mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h2 class="text-3xl font-bold mb-4 md:mb-0 text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">
                Jogos Disponíveis
            </h2>
            <div class="flex space-x-3">
                <button class="secondary-button px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-filter mr-2"></i> Filtrar
                </button>
                <button class="secondary-button px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-sort mr-2"></i> Ordenar
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php if (empty($jogos)): ?>
                <div class="col-span-full text-center py-16">
                    <div class="glass-card max-w-md mx-auto p-8">
                        <i class="fas fa-gamepad text-6xl text-indigo-400 mb-6"></i>
                        <h3 class="text-2xl font-bold text-gray-300 mb-3">Nenhum jogo cadastrado ainda</h3>
                        <p class="text-gray-400 mb-6">Comece adicionando seu primeiro jogo à plataforma</p>
                        <a href="<?= BASE_URL ?>cadastrar-jogo" class="gradient-button inline-flex items-center px-6 py-3 rounded-lg font-semibold">
                            <i class="fas fa-plus-circle mr-2"></i> Adicionar Primeiro Jogo
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($jogos as $jogo): ?>
                    <div class="glass-card group">
                        <div class="relative overflow-hidden">
                            <img class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105" 
                                 src="<?= BASE_URL . UPLOAD_DIR . htmlspecialchars($jogo['imagem']) ?>" 
                                 alt="<?= htmlspecialchars($jogo['titulo']); ?>">
                            <div class="absolute bottom-3 left-3 price-tag text-sm">
                                R$ <?= number_format(rand(20, 300), 2, ',', '.') ?>
                            </div>
                            <div class="absolute top-3 right-3 flex">
                                <span class="bg-purple-500/90 text-white text-xs px-2 py-1 rounded-full">
                                    -<?= rand(10, 70) ?>%
                                </span>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="game-title font-bold mb-2 text-lg leading-tight group-hover:text-indigo-300">
                                <?= htmlspecialchars($jogo['titulo']); ?>
                            </h3>
                            <div class="flex flex-wrap gap-2 mt-2 mb-4">
                                <span class="tag bg-indigo-900/30 text-xs px-2 py-1 rounded">
                                    <?= htmlspecialchars($jogo['genero']); ?>
                                </span>
                                <span class="tag bg-gray-700/30 text-xs px-2 py-1 rounded">
                                    <?= rand(0, 1) ? 'Singleplayer' : 'Multiplayer' ?>
                                </span>
                                <span class="tag bg-gray-700/30 text-xs px-2 py-1 rounded">
                                    <?= ['Ação', 'Aventura', 'RPG', 'Estratégia'][rand(0, 3)] ?>
                                </span>
                            </div>
                            <div class="mt-auto">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex items-center">
                                        <div class="rating-stars mr-1">
                                            <?php 
                                            $rating = rand(30, 50) / 10;
                                            for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="fas fa-star<?= $i > $rating ? ($i - 0.5 <= $rating ? '-half-alt' : '') : '' ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <span class="text-xs text-gray-400 ml-1"><?= $rating ?></span>
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        <?= ['2020', '2021', '2022', '2023'][rand(0, 3)] ?>
                                    </div>
                                </div>
                                <a href="<?= BASE_URL ?>jogo/<?= $jogo['id'] ?>" 
                                   class="block w-full secondary-button text-center py-2 rounded-lg font-medium flex items-center justify-center">
                                   <i class="fas fa-info-circle mr-2"></i> Ver Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-gray-900/80 border-t border-gray-800 mt-16 py-12 backdrop-blur-sm">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-xl font-bold flex items-center">
                        <i class="fas fa-gamepad text-indigo-400 mr-2"></i>
                        <span class="text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">WikiGames</span>
                    </h2>
                    <p class="text-gray-400 mt-2 text-sm">Sua plataforma de jogos favorita</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-indigo-300 transition-colors">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-300 transition-colors">
                        <i class="fab fa-facebook text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-300 transition-colors">
                        <i class="fab fa-discord text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-300 transition-colors">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
                <p>© <?= date('Y') ?> WikiGames. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.gradient-button, .secondary-button').forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
                ripple.style.transform = 'scale(0)';
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                ripple.style.width = ripple.style.height = '10px';
                ripple.style.pointerEvents = 'none';
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.style.transform = 'scale(15)';
                    ripple.style.opacity = '0';
                }, 10);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>
</body>
</html>