@extends('layouts.admin')

@section('content')
    <div class="container">
        <label for="chartType">Pilih Grafik:</label>
        <select id="chartType" onchange="updateChart()">
            <option value="combined">Grafik Gabungan</option>
            <option value="expenses">Grafik Pengeluaran</option>
            <option value="income">Grafik Pemasukan</option>
        </select>

        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart;

        function updateChart() {
            var selectedValue = document.getElementById('chartType').value;
            var chartData = {};

            if (selectedValue === 'combined') {
                chartData = {
                    labels: {!! json_encode($totalPemasukan->pluck('month')) !!},
                    datasets: [{
                        label: 'Pemasukan',
                        data: {!! json_encode($totalPemasukan->pluck('total')) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }, {
                        label: 'Pengeluaran',
                        data: {!! json_encode($totalPengeluaran->pluck('total')) !!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                };
            } else if (selectedValue === 'expenses') {
                chartData = {
                    labels: {!! json_encode($totalPengeluaran->pluck('month')) !!},
                    datasets: [{
                        label: 'Pengeluaran',
                        data: {!! json_encode($totalPengeluaran->pluck('total')) !!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                };
            } else if (selectedValue === 'income') {
                chartData = {
                    labels: {!! json_encode($totalPemasukan->pluck('month')) !!},
                    datasets: [{
                        label: 'Pemasukan',
                        data: {!! json_encode($totalPemasukan->pluck('total')) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                };
            }

            if (myChart) {
                myChart.destroy(); 
            }

            myChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Initial chart creation on page load
        updateChart();
    </script>

    <div class="mt-5">
        <h3>Total Donasi Disetujui</h3>
        <p>Rp {{ number_format($approvedSum, 2) }}</p>
    </div>
@endsection
