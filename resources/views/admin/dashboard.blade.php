@extends('layouts.app', ['title' => 'Halaman Dashboard', 'section_header' => 'Dashboard'])

@section('content')
<div class="p-4 space-y-4 h-screen max-h-screen overflow-hidden flex flex-col">

    <!-- Statistik Kartu -->
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 flex-none">
        @php
            $cards = [
                ['color' => 'blue', 'label' => 'Total Pengguna', 'value' => \App\Models\User::count()],
                ['color' => 'green', 'label' => 'Sampah Terkumpul', 'value' => '0 kg'],
                ['color' => 'yellow', 'label' => 'Total Penarikan', 'value' => 'Rp 0'],
                ['color' => 'purple', 'label' => 'Total Penjualan', 'value' => 'Rp 0'],
            ];
        @endphp
        @foreach ($cards as $index => $card)
            <div class="bg-white rounded-xl shadow p-3 flex items-center space-x-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="p-2 rounded-full bg-{{ $card['color'] }}-100">
                    <svg class="w-5 h-5 text-{{ $card['color'] }}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500">{{ $card['label'] }}</p>
                    <p class="text-base font-bold text-gray-700">{{ $card['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Grafik Lingkaran -->
    <div class="bg-white rounded-xl shadow p-4 flex-grow flex flex-col items-center justify-center overflow-hidden" data-aos="fade-up">
        <h2 class="text-sm font-semibold text-gray-700 mb-2">Distribusi Sampah Bulanan</h2>
        <div class="w-full max-w-xs h-full">
            <canvas id="pieChartSampah" class="w-full h-full"></canvas>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    const pieCtx = document.getElementById('pieChartSampah').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Sampah Terkumpul',
                data: [12, 19, 3, 5, 2, 3, 7, 8, 4, 10, 6, 1],
                backgroundColor: [
                    '#6366F1', '#10B981', '#F59E0B', '#8B5CF6', '#EF4444',
                    '#3B82F6', '#EC4899', '#22C55E', '#F97316', '#0EA5E9',
                    '#EAB308', '#A855F7'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return ` ${context.label}: ${context.raw} kg`;
                        }
                    }
                },
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
