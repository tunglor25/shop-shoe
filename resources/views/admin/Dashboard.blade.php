@extends('admin.layouts.app')

@section('title')
    {{ $title = 'Dashboard' }}
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .dashboard-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .dashboard-card h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .weather-widget {
            background: linear-gradient(135deg, #72EDF2 10%, #5151E5 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .weather-icon {
            font-size: 4rem;
            margin-bottom: 10px;
        }

        .weather-temp {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .stat-card {
            background-color: #f1f3f5;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
    <div class="container py-4">
        <h1 class="text-center mb-4">Data Visualization Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="dashboard-card weather-widget">
                    <div class="weather-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                    <div class="weather-temp">25°C</div>
                    <div class="weather-description">Sunny</div>
                    <div class="weather-location">New York, NY</div>
                </div>
                <div class="dashboard-card">
                    <h3>Quick Stats</h3>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon text-primary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-value">1,234</div>
                                <div class="stat-label">Total Users</div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="stat-card">
                                <div class="stat-icon text-success">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="stat-value">$5,678</div>
                                <div class="stat-label">Revenue</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card">
                                <div class="stat-icon text-info">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="stat-value">42</div>
                                <div class="stat-label">New Posts</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card">
                                <div class="stat-icon text-warning">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-value">4.7</div>
                                <div class="stat-label">Avg. Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="dashboard-card">
                    <h3>Monthly Revenue</h3>
                    <canvas id="revenueChart"></canvas>
                </div>
                <div class="dashboard-card">
                    <h3>User Demographics</h3>
                    <canvas id="demographicsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Simulated API call for weather data
            function updateWeather() {
                const weatherIcons = ['fas fa-sun', 'fas fa-cloud-sun', 'fas fa-cloud',
                    'fas fa-cloud-showers-heavy', 'fas fa-snowflake'
                ];
                const descriptions = ['Sunny', 'Partly Cloudy', 'Cloudy', 'Rainy', 'Snowy'];
                const randomIndex = Math.floor(Math.random() * weatherIcons.length);
                const temperature = Math.floor(Math.random() * 30) + 10; // Random temperature between 10°C and 40°C

                document.querySelector('.weather-icon i').className = weatherIcons[randomIndex];
                document.querySelector('.weather-temp').textContent = `${temperature}°C`;
                document.querySelector('.weather-description').textContent = descriptions[randomIndex];
            }

            updateWeather();
            setInterval(updateWeather, 60000); // Update weather every minute

            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Revenue',
                        data: [5000, 7000, 6500, 8000, 9500, 11000, 12000, 11500, 13000, 14500,
                            13500, 15000
                        ],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            });

            // Demographics Chart
            const demographicsCtx = document.getElementById('demographicsChart').getContext('2d');
            new Chart(demographicsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
                    datasets: [{
                        data: [15, 30, 25, 18, 12],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 206, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(153, 102, 255)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: 'User Age Distribution'
                        }
                    }
                }
            });
        });
    </script>
@endsection
