<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Jogo | WIkiGames</title>
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
        
        .form-container {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(71, 85, 105, 0.5);
        }
        
        .input-field {
            transition: all 0.3s ease;
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(71, 85, 105, 0.3);
        }
        
        .input-field:focus {
            border-color: rgba(124, 58, 237, 0.5);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
        }
        
        .submit-btn {
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        
        .file-upload {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .file-upload:hover {
            transform: translateY(-2px);
            border-color: rgba(124, 58, 237, 0.5);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
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
        <div class="form-container rounded-2xl p-8 sm:p-10 w-full max-w-3xl mx-auto">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-6 relative">
                    <i class="fas fa-gamepad text-3xl text-white animate-float"></i>
                    <div class="absolute -inset-2 bg-indigo-500 rounded-full opacity-20 blur-md"></div>
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold mb-2 text-gradient bg-gradient-to-r from-indigo-300 to-purple-300">
                    Cadastrar Jogo
                </h1>
                <p class="text-lg text-gray-300">Preencha os detalhes do seu jogo favorito</p>
            </div>

            <?php if (!empty($mensagem)): ?>
                <div class="mb-6 p-4 rounded-lg bg-gradient-to-r from-red-900/70 to-red-800/70 border border-red-700 text-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= htmlspecialchars($mensagem); ?>
                </div>
            <?php endif; ?>

            <form action="cadastrarJogo" method="POST" enctype="multipart/form-data" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-300 mb-2">
                            <i class="fas fa-heading mr-2 text-blue-400"></i>Título
                        </label>
                        <div class="relative">
                            <input type="text" name="titulo" id="titulo" placeholder="Ex: The Legend of Zelda" required
                                class="input-field w-full px-4 py-3 pl-10 rounded-lg text-white placeholder-gray-400 focus:outline-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-heading text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="autor" class="block text-sm font-medium text-gray-300 mb-2">
                            <i class="fas fa-user-tie mr-2 text-purple-400"></i>Autor/Desenvolvedor
                        </label>
                        <div class="relative">
                            <input type="text" name="autor" id="autor" placeholder="Ex: Nintendo EPD" required
                                class="input-field w-full px-4 py-3 pl-10 rounded-lg text-white placeholder-gray-400 focus:outline-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user-tie text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="genero" class="block text-sm font-medium text-gray-300 mb-2">
                            <i class="fas fa-tags mr-2 text-green-400"></i>Gênero
                        </label>
                        <div class="relative">
                            <input type="text" name="genero" id="genero" placeholder="Ex: Ação, Aventura" required
                                class="input-field w-full px-4 py-3 pl-10 rounded-lg text-white placeholder-gray-400 focus:outline-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tags text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="ano_lancamento" class="block text-sm font-medium text-gray-300 mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-yellow-400"></i>Ano de Lançamento
                        </label>
                        <div class="relative">
                            <input type="number" name="ano_lancamento" id="ano_lancamento" placeholder="Ex: 2023" required
                                class="input-field w-full px-4 py-3 pl-10 rounded-lg text-white placeholder-gray-400 focus:outline-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-align-left mr-2 text-red-400"></i>Descrição
                    </label>
                    <div class="relative">
                        <textarea name="descricao" id="descricao" rows="5" placeholder="Descreva sobre o jogo..." required
                            class="input-field w-full px-4 py-3 pl-10 rounded-lg text-white placeholder-gray-400 focus:outline-none"></textarea>
                        <div class="absolute top-3 left-3">
                            <i class="fas fa-align-left text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="imagem" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-image mr-2 text-pink-400"></i>Imagem do Jogo
                    </label>
                    <div class="file-upload">
                        <label for="imagem" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer bg-gray-700/50 hover:bg-gray-700/70 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="file-upload-content">
                                <i class="fas fa-cloud-upload-alt text-3xl text-blue-400 mb-2"></i>
                                <p class="mb-2 text-sm text-gray-400">Clique para enviar ou arraste uma imagem</p>
                                <p class="text-xs text-gray-500">PNG, JPG ou JPEG (MAX. 5MB)</p>
                            </div>
                            <input type="file" name="imagem" id="imagem" class="hidden" accept="image/*">
                        </label>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" name="cadastrar_jogo"
                        class="submit-btn w-full text-white font-bold py-3 px-4 rounded-lg text-lg flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>Cadastrar Jogo
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('imagem').addEventListener('change', function(e) {
            const fileUploadContent = document.getElementById('file-upload-content');
            if (this.files && this.files[0]) {
                fileUploadContent.innerHTML = `
                    <i class="fas fa-check-circle text-3xl text-green-400 mb-2"></i>
                    <p class="text-sm font-medium text-blue-300">${this.files[0].name}</p>
                    <p class="text-xs text-gray-400">${(this.files[0].size / 1024 / 1024).toFixed(2)} MB</p>
                `;
            }
        });

        document.querySelector('.submit-btn').addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const ripple = document.createElement('span');
            ripple.className = 'absolute bg-white/20 rounded-full -translate-x-1/2 -translate-y-1/2';
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            ripple.style.width = ripple.style.height = '10px';
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.style.width = ripple.style.height = '500px';
                ripple.style.opacity = '0';
            }, 10);
            
            setTimeout(() => ripple.remove(), 600);
        });
    </script>
</body>
</html>