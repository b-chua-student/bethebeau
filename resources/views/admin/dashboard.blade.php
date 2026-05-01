@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col gap-10">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-seasons-italic text-4xl text-gray-900">Executive Overview</h1>
            <p class="mt-2 text-sm text-gray-500">Real-time performance metrics and system analytics.</p>
        </div>
        <div class="text-right">
            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Last Sync</p>
            <p class="text-xs font-medium text-gray-900">{{ now()->format('M d, H:i') }}</p>
        </div>
    </div>

    <!-- 4-Column Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Revenue -->
        <div class="bg-white p-6 border border-gray-100 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Gross Revenue</p>
            <div class="mt-2 flex items-baseline gap-2">
                <p class="text-3xl font-bold text-gray-900">₱142.8k</p>
                <span class="text-[10px] font-bold text-green-600">+12.5%</span>
            </div>
        </div>

        <!-- Orders -->
        <div class="bg-white p-6 border border-gray-100 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Total Orders</p>
            <div class="mt-2 flex items-baseline gap-2">
                <p class="text-3xl font-bold text-gray-900">842</p>
                <span class="text-[10px] font-bold text-green-600">+4.2%</span>
            </div>
        </div>

        <!-- Conversion -->
        <div class="bg-white p-6 border border-gray-100 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Conv. Rate</p>
            <div class="mt-2 flex items-baseline gap-2">
                <p class="text-3xl font-bold text-gray-900">3.8%</p>
                <span class="text-[10px] font-bold text-red-500">-0.4%</span>
            </div>
        </div>

        <!-- Sessions -->
        <div class="bg-white p-6 border border-gray-100 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Avg. Session</p>
            <div class="mt-2 flex items-baseline gap-2">
                <p class="text-3xl font-bold text-gray-900">4m 12s</p>
                <span class="text-[10px] font-bold text-gray-400">Stable</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Sales Trend (Line Chart) -->
        <div class="bg-white border border-gray-100 p-8 shadow-sm">
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-[10px] font-bold uppercase tracking-widest text-gray-900">Revenue Trend (30 Days)</h3>
                <select class="text-[10px] font-bold uppercase tracking-widest text-gray-400 border-none bg-transparent focus:ring-0 cursor-pointer">
                    <option>Weekly</option>
                    <option selected>Monthly</option>
                </select>
            </div>
            <div class="h-[300px]">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Category Distribution (Doughnut Chart) -->
        <div class="bg-white border border-gray-100 p-8 shadow-sm">
            <div class="mb-6">
                <h3 class="text-[10px] font-bold uppercase tracking-widest text-gray-900">Sales by Category</h3>
            </div>
            <div class="h-[300px] flex justify-center">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Global Styles for Charts
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#9ca3af';

    // Revenue Trend Chart
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Revenue',
                data: [32000, 45000, 41000, 58000],
                borderColor: '#111827', // Brand/Black
                borderWidth: 2,
                pointBackgroundColor: '#111827',
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(17, 24, 39, 0.02)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { display: false }, border: { display: false } },
                x: { grid: { display: false }, border: { display: false } }
            }
        }
    });

    // Category Distribution Chart
    const ctxCategory = document.getElementById('categoryChart').getContext('2d');
    new Chart(ctxCategory, {
        type: 'doughnut',
        data: {
            labels: ['Living Room', 'Bedroom', 'Dining', 'Kitchen'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: ['#111827', '#374151', '#6b7280', '#e5e7eb'],
                hoverOffset: 10,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 8,
                        padding: 20,
                        font: { size: 10, weight: 'bold' },
                        usePointStyle: true
                    }
                }
            },
            cutout: '75%'
        }
    });
</script>
@endsection
