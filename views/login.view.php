<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #0F172A, #1E293B, #000000);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .login-card {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(71, 85, 105, 0.5);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        
    </style>
</head>
<body class="text-white">

    <div class="login-card rounded-2xl shadow-2xl p-8 sm:p-10 max-w-sm w-full transform transition-all duration-500 hover:scale-[1.02]">
        <div class="text-center mb-10">
            <div class="relative inline-block">
                <i class="fas fa-user-circle text-7xl text-blue-400 mb-4 animate-float"></i>
                <div class="absolute -inset-2 bg-blue-500 rounded-full opacity-20 blur-md animate-pulse-slow"></div>
            </div>
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">
                Bem-vindo de volta!
            </h1>
            <p class="text-gray-400 mt-3 text-lg">Faça login para continuar</p>
        </div>

        <?php if (!empty($mensagem)): ?>
            <div class="mb-6 p-3 bg-red-900/30 border border-red-700 rounded-lg text-center">
                <p class="text-red-300 font-medium text-sm" aria-live="polite">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= htmlspecialchars($mensagem); ?>
                </p>
            </div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>login" method="POST" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required placeholder="seu@email.com"
                        class="w-full px-4 py-3 pl-11 pr-10 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all duration-200 hover:border-gray-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i class="fas fa-check-circle text-green-400 hidden" id="emailValidIcon"></i>
                    </div>
                </div>
            </div>

            <div>
                <label for="senha" class="block text-sm font-medium text-gray-300 mb-2">Senha</label>
                <div class="relative">
                    <input type="password" name="senha" id="senha" required placeholder="sua senha secreta"
                        class="w-full px-4 py-3 pl-11 pr-10 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all duration-200 hover:border-gray-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('senha')">
                        <i class="fas fa-eye text-gray-400 hover:text-blue-300 transition" id="senhaEyeIcon"></i>
                    </div>
                </div>
                <div class="mt-2 text-right">
                    <a href="#" class="text-xs text-blue-400 hover:text-blue-300 transition">Esqueceu sua senha?</a>
                </div>
            </div>

            <button type="submit" name="logar_usuario" id="loginButton"
                class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center group">
                <span class="group-hover:translate-x-1 transition-transform duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i> Entrar
                </span>
                <i class="fas fa-arrow-right ml-2 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
            </button>
        </form>

        <div class="mt-8 text-center border-t border-gray-700 pt-6">
            <p class="text-md text-gray-400">Não tem uma conta?
                <a href="cadastrarUsuario" class="text-blue-400 hover:text-blue-300 font-semibold transition duration-200 ml-1 group">
                    Cadastre-se aqui
                    <i class="fas fa-arrow-right ml-1 text-xs opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 inline-block"></i>
                </a>
            </p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(`${fieldId}EyeIcon`);
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Email validation check
        document.getElementById('email').addEventListener('input', function() {
            const email = this.value;
            const validIcon = document.getElementById('emailValidIcon');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (emailRegex.test(email)) {
                validIcon.classList.remove('hidden');
            } else {
                validIcon.classList.add('hidden');
            }
        });

        // Add ripple effect to login button
        document.getElementById('loginButton').addEventListener('click', function(e) {
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