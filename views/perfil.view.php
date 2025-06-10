<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo | WIkiGames</title>
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
        
        .action-card {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(71, 85, 105, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            border-color: rgba(124, 58, 237, 0.5);
        }
        
        .btn-primary {
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            background-size: 200% auto;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .icon-wrapper {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(139, 92, 246, 0.2));
            backdrop-filter: blur(4px);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
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

    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="glass-panel rounded-2xl p-8 sm:p-10 w-full max-w-3xl mx-auto">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-6 relative">
                    <i class="fas fa-gamepad text-3xl text-white animate-float"></i>
                    <div class="absolute -inset-2 bg-indigo-500 rounded-full opacity-20 blur-md"></div>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold mb-4">
                    Bem-vindo, <span class="text-gradient bg-gradient-to-r from-indigo-300 to-purple-300"><?= htmlspecialchars($nomeUsuario) ?></span>!
                </h1>
                <p class="text-lg text-gray-300 max-w-md mx-auto">
                    Sua jornada no universo dos jogos começa aqui. Gerencie sua coleção como um verdadeiro mestre.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="action-card rounded-xl p-6 text-left">
                    <div class="flex items-center mb-5">
                        <div class="icon-wrapper p-3 rounded-lg mr-4">
                            <i class="fas fa-plus-circle text-indigo-300 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-100">Cadastrar Jogo</h3>
                    </div>
                    <p class="text-gray-400 mb-6">Adicione novos títulos à sua coleção pessoal.</p>
                    <a href="<?= BASE_URL ?>cadastrarJogo" class="btn-primary inline-flex items-center justify-center w-full py-3 px-6 rounded-lg font-semibold">
                        <i class="fas fa-plus-circle mr-2"></i> Cadastrar
                    </a>
                </div>

                <div class="action-card rounded-xl p-6 text-left">
                    <div class="flex items-center mb-5">
                        <div class="icon-wrapper p-3 rounded-lg mr-4">
                            <i class="fas fa-book-open text-purple-300 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-100">Meus Jogos</h3>
                    </div>
                    <p class="text-gray-400 mb-6">Explore e gerencie todos os jogos da sua biblioteca.</p>
                    <a href="<?= BASE_URL ?>listarJogos" class="btn-secondary inline-flex items-center justify-center w-full py-3 px-6 rounded-lg font-semibold">
                        <i class="fas fa-arrow-right mr-2"></i> Visualizar
                    </a>
                </div>
            </div>

            <div class="mt-8 text-center border-t border-gray-700 pt-8">
                <p class="text-gray-400 mb-4">Ou explore outras opções:</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-indigo-300 hover:text-indigo-200 transition-colors">
                        <i class="fas fa-cog text-lg"></i> Configurações
                    </a>
                    <a href="#" class="text-indigo-300 hover:text-indigo-200 transition-colors">
                        <i class="fas fa-question-circle text-lg"></i> Ajuda
                    </a>
                    <a href="#" class="text-indigo-300 hover:text-indigo-200 transition-colors">
                        <i class="fas fa-users text-lg"></i> Comunidade
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach(button => {
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