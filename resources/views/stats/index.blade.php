@extends('layouts.app')

@section('content')

<h3 style="text-align: center;">
    <label style="color: hsl(0, 100%, 50%);">Statistiques BoxLogin</label>
</h3>
<br><br>
<div class="chart-wrapper">
    <div class="chart-container">
        <div class="chart-title">Nombre de Clients par Mois</div>
        <canvas id="clientsByMonthChart"></canvas>
    </div>
    <div class="chart-container">
        <div class="chart-title">Nombre de Coursiers par Mois</div>
        <canvas id="coursiersByMonthChart"></canvas>
    </div>
</div>
<div class="chart-wrapper">
    <div class="chart-container">
        <div class="chart-title">Nombre de Clients par Zone</div>
        <canvas id="clientsByZoneChart"></canvas>
    </div>
    <div class="chart-container">
        <div class="chart-title">Nombre de Livraisons par Mois</div>
        <canvas id="livraisonsByMonthChart"></canvas>
    </div>
</div>
<div class="chart-wrapper">
    <div class="chart-container">
        <div class="chart-title">Nombre de Livraisons par Coursier</div>
        <canvas id="livraisonsByCoursierChart"></canvas>
    </div>
    <div class="chart-container">
        <div class="chart-title">Nombre d'Employés par Mois</div>
        <canvas id="employeesByMonthChart"></canvas>
    </div>
</div>

<style>
    .chart-wrapper {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px; /* Adds space between rows */
    }
    .chart-container {
        flex: 1; /* Makes each chart take equal space */
        margin: 0 10px; /* Adds space between charts */
    }
    .chart-title {
        text-align: center; /* Centers the title */
        font-weight: bold;
        margin-bottom: 10px; /* Adds space between title and chart */
    }
</style>

@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/chart.js" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartsData = {
                clientsByMonth: {
                    labels: @json($clientsByMonth->pluck('month')),
                    datasets: [{
                        label: 'Nombre de Clients',
                        data: @json($clientsByMonth->pluck('count')),
                        backgroundColor: 'rgba(75, 192, 192, 0.3)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                coursiersByMonth: {
                    labels: @json($coursiersByMonth->pluck('month')),
                    datasets: [{
                        label: 'Nombre de Coursiers',
                        data: @json($coursiersByMonth->pluck('count')),
                        backgroundColor: 'rgba(153, 102, 255, 0.3)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                clientsByZone: {
                    labels: @json($clientsByZone->pluck('zone')),
                    datasets: [{
                        label: 'Nombre de Clients par Zone',
                        data: @json($clientsByZone->pluck('count')),
                        backgroundColor: 'rgba(255, 159, 64, 0.3)',
                        borderColor: 'rgba(255, 159, 0, 1)',
                        borderWidth: 1
                    }]
                },
                livraisonsByMonth: {
                    labels: @json($livraisonsByMonth->pluck('month')),
                    datasets: [{
                        label: 'Nombre de Livraisons',
                        data: @json($livraisonsByMonth->pluck('count')),
                        backgroundColor: 'rgba(54, 162, 235, 0.3)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                livraisonsByCoursier: {
                    labels: @json($livraisonsByCoursier->pluck('coursier.nom')), // Ensure you have a way to retrieve the names
                    datasets: [{
                        label: 'Nombre de Livraisons par Coursier',
                        data: @json($livraisonsByCoursier->pluck('count')),
                        backgroundColor: 'rgba(255, 99, 132, 0.3)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                employeesByMonth: {
                    labels: @json($employeesByMonth->pluck('month')),
                    datasets: [{
                        label: 'Nombre d\'Employés',
                        data: @json($employeesByMonth->pluck('count')),
                        backgroundColor: 'rgba(255, 206, 86, 0.3)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                }
            };

            function createChart(ctx, type, data) {
                new Chart(ctx, {
                    type: type,
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: true },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                font: { size: 20 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) { return value + ' '; }
                                }
                            }
                        },
                        animation: { duration: 1000 }
                    }
                });
            }

            createChart(document.getElementById('clientsByMonthChart').getContext('2d'), 'bar', chartsData.clientsByMonth);
            createChart(document.getElementById('coursiersByMonthChart').getContext('2d'), 'bar', chartsData.coursiersByMonth);
            createChart(document.getElementById('clientsByZoneChart').getContext('2d'), 'pie', chartsData.clientsByZone);
            createChart(document.getElementById('livraisonsByMonthChart').getContext('2d'), 'bar', chartsData.livraisonsByMonth);
            createChart(document.getElementById('livraisonsByCoursierChart').getContext('2d'), 'bar', chartsData.livraisonsByCoursier);
            createChart(document.getElementById('employeesByMonthChart').getContext('2d'), 'bar', chartsData.employeesByMonth);
        });
    </script>
@endsection
