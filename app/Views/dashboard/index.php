<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-gray-100 h-screen overflow-hidden">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4 flex-shrink-0 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-6">Mon CRM</h1>
            <nav class="flex flex-col gap-2">
                <a href="#" class="hover:bg-gray-700 p-2 rounded">🏠 Tableau de bord</a>
                <a href="#" class="hover:bg-gray-700 p-2 rounded">👥 Utilisateurs</a>
                <a href="#" class="hover:bg-gray-700 p-2 rounded">⚙️ Paramètres</a>
            </nav>
        </aside>

        <!-- Contenu principal -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold"><?= esc($title) ?></h2>
                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <button class="flex items-center space-x-2 px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition-colors duration-200">
                                <span class="font-medium"><?= esc($username) ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <a href="<?= site_url('auth/logout') ?>" class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Déconnexion
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Contenu défilant -->
            <main class="flex-1 overflow-y-auto p-6">

            <!-- Cartes -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold text-gray-700">Utilisateurs</h3>
                    <p class="text-3xl text-blue-500 font-semibold mt-2">10</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold text-gray-700">Projets</h3>
                    <p class="text-3xl text-green-500 font-semibold mt-2">5</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow">
                    <h3 class="text-lg font-bold text-gray-700">Messages</h3>
                    <p class="text-3xl text-red-500 font-semibold mt-2">23</p>
                </div>
            </div>

            <!-- Graphiques -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Graphique Barres -->
                <div class="bg-white p-6 rounded-xl shadow flex flex-col" style="height: 400px;">
                    <h3 class="text-lg font-bold mb-4 text-gray-700">Utilisateurs / Mois</h3>
                    <div class="flex-1">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- Graphique Ligne -->
                <div class="bg-white p-6 rounded-xl shadow flex flex-col" style="height: 400px;">
                    <h3 class="text-lg font-bold mb-4 text-gray-700">Revenus (en K FCFA)</h3>
                    <div class="flex-1">
                        <canvas id="lineChart"></canvas>
                    </div>
            </main>
        </div>
    </div>

    <script>
        // Attendre que le DOM soit chargé
        document.addEventListener('DOMContentLoaded', function() {
            // Données factices
            const mois = ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin'];

            // Options communes aux graphiques
            const chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            };

            // Graphique en barres
            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: mois,
                    datasets: [{
                        label: 'Utilisateurs',
                        data: [12, 19, 8, 15, 20, 25],
                        backgroundColor: '#3B82F6',
                        borderRadius: 6,
                        maxBarThickness: 40
                    }]
                },
                options: chartOptions
            });

            // Graphique en ligne
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: mois,
                    datasets: [{
                        label: 'Revenus',
                        data: [10, 14, 12, 18, 22, 28],
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 2,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#10B981',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: chartOptions
            });

            // Redimensionnement des graphiques lors du redimensionnement de la fenêtre
            window.addEventListener('resize', function() {
                if (window.barChart) window.barChart.resize();
                if (window.lineChart) window.lineChart.resize();
            });
        });
    </script>

</body>
</html>
