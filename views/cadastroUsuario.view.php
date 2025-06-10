<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
        .register-card {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(71, 85, 105, 0.5);
        }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }
        .password-strength {
            height: 4px;
            margin-top: 8px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        .strength-0 {
            width: 20%;
            background-color: #ef4444; 
        }
        .strength-1 {
            width: 40%;
            background-color: #f97316; 
        }
        .strength-2 {
            width: 60%;
            background-color: #f59e0b; 
        }
        .strength-3 {
            width: 80%;
            background-color: #3b82f6;
        }
        .strength-4 {
            width: 100%;
            background-color: #10b981; 
        }
    </style>
</head>
<body class="text-white">

    <div class="register-card rounded-2xl shadow-2xl p-8 sm:p-10 max-w-sm w-full transform transition-all duration-300 hover:scale-[1.01]">
        <div class="text-center mb-8">
            <i class="fas fa-user-plus text-6xl text-purple-400 mb-4 animate-bounce-slow"></i>
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">
                Crie sua conta
            </h1>
            <p class="text-gray-400 mt-2 text-lg">Junte-se a nós</p>
        </div>

        <?php if (!empty($mensagem)): ?>
            <p class="text-center text-red-400 font-bold mb-6 text-sm" aria-live="polite">
                <?= htmlspecialchars($mensagem); ?>
            </p>
        <?php endif; ?>

        <form action="cadastrarUsuario" method="POST" class="space-y-6" id="registerForm">
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-300 mb-1">Nome</label>
                <div class="relative">
                    <input type="text" name="nome" id="nome" required placeholder="Seu nome completo"
                        class="w-full px-4 py-3 pl-10 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required placeholder="seu@email.com"
                        class="w-full px-4 py-3 pl-10 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition-all duration-200">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div>
                <label for="senha" class="block text-sm font-medium text-gray-300 mb-1">Senha</label>
                <div class="relative">
                    <input type="password" name="senha" id="senha" required placeholder="sua senha secreta"
                        class="w-full px-4 py-3 pl-10 pr-10 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 focus:outline-none transition-all duration-200">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('senha')">
                        <i class="fas fa-eye text-gray-400 hover:text-gray-300" id="senhaEyeIcon"></i>
                    </div>
                </div>
                <div id="passwordStrength" class="password-strength strength-0"></div>
                <p id="passwordStrengthText" class="text-xs text-gray-400 mt-1"></p>
            </div>

            <div>
                <label for="confirmar_senha" class="block text-sm font-medium text-gray-300 mb-1">Confirmar Senha</label>
                <div class="relative">
                    <input type="password" name="confirmar_senha" id="confirmar_senha" required placeholder="confirme sua senha"
                        class="w-full px-4 py-3 pl-10 pr-10 border border-gray-600 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 focus:outline-none transition-all duration-200">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility('confirmar_senha')">
                        <i class="fas fa-eye text-gray-400 hover:text-gray-300" id="confirmarSenhaEyeIcon"></i>
                    </div>
                </div>
                <p id="passwordMatchMessage" class="text-xs mt-1"></p>
            </div>

            <button type="submit" name="cadastrar_usuario" id="submitButton"
                class="w-full py-3 px-4 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold rounded-lg shadow-lg transition duration-300 transform hover:scale-[1.02] flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-user-plus mr-2"></i> Cadastrar
            </button>
        </form>

        <div class="mt-8 text-center border-t border-gray-700 pt-6">
            <p class="text-md text-gray-400">Já tem uma conta?
                <a href="<?= BASE_URL ?>login" class="text-blue-400 hover:text-blue-300 font-semibold transition duration-200 ml-1">
                    Faça login aqui
                </a>
            </p>
        </div>
    </div>

    <script>
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

        function checkPasswordStrength(password) {
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.length >= 12) strength++;
            
            if (/[A-Z]/.test(password)) strength++; 
            if (/[0-9]/.test(password)) strength++; 
            if (/[^A-Za-z0-9]/.test(password)) strength++; 
            
            return Math.min(strength, 4); 
        }

        function updatePasswordStrength() {
            const password = document.getElementById('senha').value;
            const strength = checkPasswordStrength(password);
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('passwordStrengthText');
            
            strengthBar.className = 'password-strength';
            
            strengthBar.classList.add(`strength-${strength}`);
            
            const messages = [
                'Muito fraca',
                'Fraca',
                'Moderada',
                'Forte',
                'Muito forte'
            ];
            const colors = [
                'text-red-400',
                'text-orange-400',
                'text-yellow-400',
                'text-blue-400',
                'text-green-400'
            ];
            
            strengthText.textContent = `Força: ${messages[strength]}`;
            strengthText.className = `text-xs ${colors[strength]} mt-1`;
        }

        function checkPasswordMatch() {
            const password = document.getElementById('senha').value;
            const confirmPassword = document.getElementById('confirmar_senha').value;
            const messageElement = document.getElementById('passwordMatchMessage');
            const submitButton = document.getElementById('submitButton');
            
            if (confirmPassword.length === 0) {
                messageElement.textContent = '';
                messageElement.className = 'text-xs mt-1';
                submitButton.disabled = false;
                return;
            }
            
            if (password === confirmPassword) {
                messageElement.textContent = 'As senhas coincidem!';
                messageElement.className = 'text-xs text-green-400 mt-1';
                submitButton.disabled = false;
            } else {
                messageElement.textContent = 'As senhas não coincidem!';
                messageElement.className = 'text-xs text-red-400 mt-1';
                submitButton.disabled = true;
            }
        }

        document.getElementById('senha').addEventListener('input', function() {
            updatePasswordStrength();
            checkPasswordMatch();
        });
        
        document.getElementById('confirmar_senha').addEventListener('input', checkPasswordMatch);

        document.addEventListener('DOMContentLoaded', function() {
            updatePasswordStrength();
            checkPasswordMatch();
        });
    </script>
</body>
</html>