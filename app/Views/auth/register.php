<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .input-field {
            transition: all 0.3s;
            border: 2px solid #e2e8f0;
        }
        .input-field:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .btn-primary {
            background: linear-gradient(to right, #667eea, #764ba2);
            transition: all 0.3s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-back {
            transition: all 0.3s;
        }
        .btn-back:hover {
            transform: translateX(-3px);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="card rounded-xl p-8 w-full max-w-md relative overflow-hidden">
        <!-- Back Button -->
        <a href="<?= site_url('/') ?>" class="btn-back text-gray-600 hover:text-gray-900 mb-6 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Home
        </a>
        
        <!-- Decorative Elements -->
        <div class="absolute -top-10 -right-10 w-20 h-20 bg-blue-100 rounded-full opacity-20"></div>
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-purple-100 rounded-full opacity-20"></div>
        
        <!-- Content -->
        <div class="relative z-10">
            <h2 class="text-3xl font-bold text-center mb-8 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                Create Account
            </h2>

            <?php 
            // Afficher les messages d'erreur
            if (session()->get('error')): ?>
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm"><?= session()->get('error') ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php 
            // Afficher les erreurs de validation
            if (session()->get('validation')): 
                $validation = session()->get('validation');
            ?>
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <ul class="list-disc pl-5 space-y-1 text-sm">
                            <?php foreach ($validation->getErrors() as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('auth/handleRegister') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>
                
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <span class="text-xs text-gray-500">3 caractères minimum</span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" id="name" name="name" 
                               value="<?= old('name') ?>"
                               class="input-field pl-10 w-full px-4 py-3 rounded-lg focus:outline-none" 
                               placeholder="Votre nom complet" 
                               required
                               minlength="3"
                               maxlength="100">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                               value="<?= old('email') ?>"
                               class="input-field pl-10 w-full px-4 py-3 rounded-lg focus:outline-none" 
                               placeholder="votre@email.com" 
                               required>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <span class="text-xs text-gray-500">6 caractères minimum</span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" 
                               class="input-field pl-10 w-full px-4 py-3 rounded-lg focus:outline-none" 
                               placeholder="••••••••" 
                               required
                               minlength="6">
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label for="password_confirm" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password_confirm" name="password_confirm" 
                               class="input-field pl-10 w-full px-4 py-3 rounded-lg focus:outline-none" 
                               placeholder="••••••••" 
                               required
                               minlength="6">
                    </div>
                </div>

                <button type="submit" class="btn-primary w-full text-white font-semibold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </button>

                <p class="text-center text-sm text-gray-600 mt-4">
                    Already have an account? 
                    <a href="<?= site_url('auth/login') ?>" class="font-medium text-blue-600 hover:text-blue-500">
                        Sign in
                    </a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
