<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo | WIkiGames</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #0F172A, #1E293B, #000000);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .glass-panel {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(71, 85, 105, 0.5);
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.25);
        }
        
        .game-image {
            height: 300px;
            object-fit: cover;
            object-position: center;
            transition: transform 0.5s ease;
        }
        
        .game-image:hover {
            transform: scale(1.03);
        }
        
        .btn-primary {
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
        }
        
        .btn-danger {
            background: linear-gradient(to right, #ef4444, #dc2626);
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
        }
        
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        
        .info-tag {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(71, 85, 105, 0.3);
            transition: all 0.3s ease;
        }
        
        .info-tag:hover {
            background: rgba(71, 85, 105, 0.4);
            border-color: rgba(124, 58, 237, 0.5);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-white">
    <?php require_once 'header.view.php'; ?>

    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="glass-panel rounded-2xl p-8 w-full max-w-3xl mx-auto">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-6 relative">
                    <i class="fas fa-gamepad text-3xl text-white animate-float"></i>
                    <div class="absolute -inset-2 bg-indigo-500 rounded-full opacity-20 blur-md"></div>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold mb-2 text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">
                    Detalhes do Jogo
                </h1>
            </div>

            <?php if (!empty($mensagem)): ?>
                <div class="mb-6 p-4 rounded-lg bg-gradient-to-r from-red-900/70 to-red-800/70 border border-red-700 text-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= htmlspecialchars($mensagem); ?>
                </div>
            <?php endif; ?>

            <div class="relative overflow-hidden rounded-xl mb-8 shadow-xl">
                <img class="w-full game-image" 
                     src="<?= BASE_URL . UPLOAD_DIR . htmlspecialchars($jogo['imagem']) ?>" 
                     alt="<?= htmlspecialchars($jogo['titulo']); ?>">
                <div class="absolute bottom-4 left-4 bg-gray-900/80 text-white px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-calendar-alt mr-1"></i> <?= htmlspecialchars($jogo['ano_lancamento']) ?>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="info-tag p-4 rounded-lg flex items-center">
                    <div class="bg-indigo-500/20 p-3 rounded-full mr-4">
                        <i class="fas fa-heading text-indigo-300"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Título</p>
                        <p class="font-semibold"><?= htmlspecialchars($jogo['titulo']) ?></p>
                    </div>
                </div>
                
                <div class="info-tag p-4 rounded-lg flex items-center">
                    <div class="bg-purple-500/20 p-3 rounded-full mr-4">
                        <i class="fas fa-user-tie text-purple-300"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Autor/Desenvolvedor</p>
                        <p class="font-semibold"><?= htmlspecialchars($jogo['autor']) ?></p>
                    </div>
                </div>
                
                <div class="info-tag p-4 rounded-lg flex items-center">
                    <div class="bg-green-500/20 p-3 rounded-full mr-4">
                        <i class="fas fa-tags text-green-300"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Gênero</p>
                        <p class="font-semibold"><?= htmlspecialchars($jogo['genero']) ?></p>
                    </div>
                </div>
                
                <div class="info-tag p-4 rounded-lg flex items-center">
                    <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                        <i class="fas fa-calendar-alt text-yellow-300"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Ano de Lançamento</p>
                        <p class="font-semibold"><?= htmlspecialchars($jogo['ano_lancamento']) ?></p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-bold mb-3 text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">
                    <i class="fas fa-align-left mr-2"></i>Descrição
                </h3>
                <div class="bg-gray-700/50 p-4 rounded-lg border border-gray-600/50 text-gray-300 leading-relaxed">
                    <?= htmlspecialchars($jogo['descricao']) ?>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-between gap-4 pt-4">
                <a href="<?= BASE_URL ?>editarJogo?id=<?= $jogo['id']?>" 
                   class="btn-primary text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center">
                    <i class="fas fa-edit mr-2"></i> Alterar
                </a>
                
                <form action="<?= BASE_URL ?>deletar?id=<?= $jogo['id']?>" method="POST" class="w-full sm:w-auto">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($jogo['id']); ?>">
                    <button type="submit" name="deletar_jogo" 
                            class="btn-danger w-full text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center"
                            onclick="return confirm('Tem certeza que deseja deletar este jogo?');">
                        <i class="fas fa-trash-alt mr-2"></i> Deletar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add ripple effect to buttons
        document.querySelectorAll('.btn-primary, .btn-danger').forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.className = 'absolute bg-white/20 rounded-full -translate-x-1/2 -translate-y-1/2';
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                ripple.style.width = ripple.style.
                height = '10px';
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.style.width = ripple.style.height = '500px';
                    ripple.style.opacity = '0';
                }, 10);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>
</body>
</html>