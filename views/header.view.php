<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .header-glass {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(71, 85, 105, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .btn-gradient {
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
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
<body class="bg-gradient-to-br from-gray-900 to-gray-800 min-h-screen">

    <header class="header-glass py-4 fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <button onclick="history.back()" class="btn-secondary px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Voltar
                </button>
                
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                    <a href="<?= BASE_URL ?>painel-admin" 
                       class="btn-gradient px-4 py-2 rounded-lg font-medium flex items-center">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Painel Admin
                    </a>
                <?php endif; ?>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="<?= BASE_URL ?>perfil" 
                   class="btn-secondary px-4 py-2 rounded-lg font-medium flex items-center">
                    <i class="fas fa-user-circle mr-2"></i>
                    Perfil
                </a>
                <a href="<?= BASE_URL ?>logout"
                   class="btn-gradient px-4 py-2 rounded-lg font-medium flex items-center bg-gradient-to-r from-red-500 to-pink-500">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Sair
                </a>
            </div>
        </div>
    </header>

    <script>
        
        document.querySelectorAll('.btn-gradient, .btn-secondary').forEach(button => {
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