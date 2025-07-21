<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <!-- Animated Title -->
        <div class="text-center mb-12 animate-fade-in-down">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 mb-4">
                Welcome to Our Platform Nab
            </h1>
            <p class="text-lg text-gray-600">Join our growing community today</p>
        </div>
        
        <!-- Form Card with Hover Effect -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-500 transform hover:scale-[1.01] hover:shadow-2xl">
            <!-- Decorative Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-600 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">Create an Account</h2>
                <p class="text-indigo-100 mt-1">It's quick and easy</p>
            </div>
            
            <div class="p-8">
            
            <form action="<?= base_url('register') ?>" method="POST" class="space-y-6">
                <!-- Nom Complet -->
                <div class="group">
                    <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1 transition-all duration-300 group-hover:text-indigo-600">
                        <i class="fas fa-user mr-1"></i> Full Name
                    </label>
                    <div class="relative">
                        <input type="text" id="fullname" name="fullname" required 
                               class="pl-10 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="group">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1 transition-all duration-300 group-hover:text-indigo-600">
                        <i class="fas fa-envelope mr-1"></i> Email Address
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required 
                               class="pl-10 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="group">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1 transition-all duration-300 group-hover:text-indigo-600">
                        <i class="fas fa-lock mr-1"></i> Password
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required 
                               class="pl-10 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="far fa-eye text-gray-400 hover:text-blue-500 cursor-pointer" id="togglePassword"></i>
                        </div>
                    </div>
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="group">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1 transition-all duration-300 group-hover:text-indigo-600">
                        <i class="fas fa-lock mr-1"></i> Confirm Password
                    </label>
                    <div class="relative">
                        <input type="password" id="confirm_password" name="confirm_password" required 
                               class="pl-10 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="far fa-eye text-gray-400 hover:text-blue-500 cursor-pointer" id="toggleConfirmPassword"></i>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-center mt-4">
                    <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition duration-150 ease-in-out">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">Terms of Service</a>
                    </label>
                </div>

                <!-- Bouton d'inscription -->
                <div class="pt-6">
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="group-hover:tracking-wider transition-all duration-300">
                            Sign Up Now
                        </span>
                        <span class="absolute right-0 inset-y-0 flex items-center pr-3">
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </button>
                </div>
            </form>
            
            <!-- Registration CTA -->
            <div class="mt-10 text-center relative z-10">
                <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Ready to get started?</h3>
                    <p class="text-gray-700 text-sm mb-6 max-w-md mx-auto leading-relaxed">
                        Join thousands of satisfied users who are already managing their tasks more efficiently with our platform. 
                        Create your account now and experience the difference!
                    </p>
                    <div class="relative inline-block group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                        <a href="<?= base_url('register') ?>" 
   class="relative flex items-center justify-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-black font-bold text-base rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
    <span class="font-bold">Create Free Account</span>
    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
</a>

                    </div>
                    <p class="mt-5 text-sm text-gray-600">
                        Already have an account? 
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline transition-colors duration-300">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#confirm_password');

        togglePassword?.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword?.addEventListener('click', function() {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Add floating label effect
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            // Add focus class when input is focused
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.classList.add('focused');
            });
            
            // Remove focus class when input loses focus and is empty
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.parentElement.classList.remove('focused');
                }
            });
            
            // Check on page load if inputs have values
            if (input.value !== '') {
                input.parentElement.parentElement.classList.add('focused');
            }
        });
    </script>
</body>
</html>
