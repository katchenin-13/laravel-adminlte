@extends('layouts.app')

@section('content')

    @role('manager') || @role('superadmin')
            <h1>Statistiques BoxLogin</h1>
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
                    <div class="chart-title">Nombre de Livraisons par Zone</div>
                    <canvas id="livraisonsByZoneChart"></canvas>
                </div>
                <div class="chart-container">
                    <div class="chart-title">Nombre de Colis par Client par Mois</div>
                    <canvas id="colisByClientMonthChart"></canvas>
                </div>
            </div>

            <!-- Calendrier -->
            <div id="calendar" style="margin-top: 40px; width: 100%; height: 500px;"></div>
    @endrole
    @endrole
@endsection

@section('styles')
    <!-- Inclure le CSS de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/dist/index.global.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- Inclure le JS de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/dist/index.global.min.js"></script>

    <!-- Inclure les scripts pour Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser le calendrier
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        title: 'Event 1',
                        start: '2024-09-15'
                    },
                    {
                        title: 'Event 2',
                        start: '2024-09-20'
                    }
                ]
            });
            calendar.render();

            // Initialiser les graphiques
            const chartsData = {
                clientsByMonth: {
                    labels: @json(array_keys($clientsByMonth->toArray())),
                    datasets: [{
                        label: 'Nombre de Clients',
                        data: @json(array_values($clientsByMonth->toArray())),
                        backgroundColor: 'rgba(75, 192, 192, 0.3)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                coursiersByMonth: {
                    labels: @json(array_keys($coursiersByMonth->toArray())),
                    datasets: [{
                        label: 'Nombre de Coursiers',
                        data: @json(array_values($coursiersByMonth->toArray())),
                        backgroundColor: 'rgba(153, 102, 255, 0.3)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                clientsByZone: {
                    labels: @json($clientsByZone->pluck('zone')),
                    datasets: [{
                        label: 'Nombre de Clients par Zone',
                        data: @json($clientsByZone->pluck('total_clients')),
                        backgroundColor: 'rgba(255, 159, 64, 0.3)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                livraisonsByMonth: {
                    labels: @json(array_keys($livraisonsByMonth->toArray())),
                    datasets: [{
                        label: 'Nombre de Livraisons',
                        data: @json(array_values($livraisonsByMonth->toArray())),
                        backgroundColor: 'rgba(54, 162, 235, 0.3)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                livraisonsByZone: {
                    labels: @json($livraisonsByZone->pluck('zone')),
                    datasets: [{
                        label: 'Nombre de Livraisons par Zone',
                        data: @json($livraisonsByZone->pluck('total_livraisons')),
                        backgroundColor: 'rgba(255, 99, 132, 0.3)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                colisByClientMonth: {
                    labels: @json(array_keys($colisByClientMonth->toArray())),
                    datasets: [{
                        label: 'Nombre de Colis par Client par Mois',
                        data: @json(array_values($colisByClientMonth->toArray())),
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
                            legend: {
                                display: true
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                font: {
                                    size: 20
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) { return value + ' ' }
                                }
                            }
                        },
                        animation: {
                            duration: 1000
                        }
                    }
                });
            }

            createChart(document.getElementById('clientsByMonthChart').getContext('2d'), 'bar', chartsData.clientsByMonth);
            createChart(document.getElementById('coursiersByMonthChart').getContext('2d'), 'bar', chartsData.coursiersByMonth);
            createChart(document.getElementById('clientsByZoneChart').getContext('2d'), 'pie', chartsData.clientsByZone);
            createChart(document.getElementById('livraisonsByMonthChart').getContext('2d'), 'bar', chartsData.livraisonsByMonth);
            createChart(document.getElementById('livraisonsByZoneChart').getContext('2d'), 'pie', chartsData.livraisonsByZone);
            createChart(document.getElementById('colisByClientMonthChart').getContext('2d'), 'line', chartsData.colisByClientMonth);
        });
    </script>
@endsection
