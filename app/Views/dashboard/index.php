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
                    <p class="text-gray-600">Bienvenue, <span class="font-bold"><?= esc($username) ?></span> 👋</p>
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
