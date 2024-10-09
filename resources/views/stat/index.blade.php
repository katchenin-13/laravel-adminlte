@extends('layouts.app')

@section('content')
    <h1 class="center-text">Statistiques</h1>

    <div class="chart-container">
        <div class="chart">
            <canvas id="clientsPerMonthChart" width="400" height="200"></canvas>
        </div>
        <div class="chart">
            <canvas id="coursiersPerMonthChart" width="400" height="200"></canvas>
        </div>
        <div class="chart">
            <canvas id="coursiersByZoneChart" width="400" height="200"></canvas>
        </div>
        <div class="chart">
            <canvas id="deliveriesPerCoursierChart" width="400" height="200"></canvas>
        </div>
        <div class="chart">
            <canvas id="employeesPerMonthChart" width="400" height="200"></canvas>
        </div>
        <div class="chart">
            <canvas id="deliveriesPerMonthChart" width="400" height="200"></canvas>
        </div>
    </div>

    <style>
        .chart-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .chart {
            width: 48%; /* Ajuste la largeur pour afficher deux graphiques par ligne */
            margin-bottom: 20px;
        }

        .center-text {
            text-align: center;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const createChart = (ctx, labels, data, label) => {
            return new Chart(ctx, {
                type: 'bar', // ou 'line', 'pie', etc.
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000, // Durée de l'animation
                    },
                    plugins: {
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false,
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                }
            });
        };

        // Création des graphiques avec les données fournies par le contrôleur
        createChart(
            document.getElementById('clientsPerMonthChart'),
            @json($clientsPerMonth->pluck('month')),
            @json($clientsPerMonth->pluck('count')),
            'Clients enregistrés par mois'
        );

        createChart(
            document.getElementById('coursiersPerMonthChart'),
            @json($coursiersPerMonth->pluck('month')),
            @json($coursiersPerMonth->pluck('count')),
            'Coursiers enregistrés par mois'
        );

        createChart(
            document.getElementById('coursiersByZoneChart'),
            @json($coursiersByZone->pluck('zone')),
            @json($coursiersByZone->pluck('count')),
            'Coursiers par zone'
        );

        createChart(
            document.getElementById('deliveriesPerCoursierChart'),
            @json($deliveriesPerCoursier->pluck('coursier_id')),
            @json($deliveriesPerCoursier->pluck('count')),
            'Livraisons par coursier'
        );

        createChart(
            document.getElementById('employeesPerMonthChart'),
            @json($employeesPerMonth->pluck('month')),
            @json($employeesPerMonth->pluck('count')),
            'Employés enregistrés par mois'
        );

        createChart(
            document.getElementById('deliveriesPerMonthChart'),
            @json($deliveriesPerMonth->pluck('month')),
            @json($deliveriesPerMonth->pluck('count')),
            'Livraisons par mois'
        );
    </script>
@endsection
