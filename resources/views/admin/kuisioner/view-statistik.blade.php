@include('components.start-html')
@php
$colors = [
'blue' => 'text-blue-600',
'red' => 'text-red-600',
'green' => 'text-green-600',
'yellow' => 'text-yellow-600',
'purple' => 'text-purple-600',
'pink' => 'text-pink-600',
'indigo' => 'text-indigo-600',
'teal' => 'text-teal-600',
'orange' => 'text-orange-600',
'cyan' => 'text-cyan-600',
];
@endphp

<div class="flex bg-gray-100 min-h-screen md:justify-end">
    @include('components.admin.sidebar')

    <section class="px-6 py-6 w-full md:w-[70%] lg:w-[80%] bg-gray-100 min-h-screen ">
        <h1 class="text-2xl font-bold">📊 Statistik Kuisioner</h1>
        <p class="text-gray-600 ">Analisis hasil kuisioner yang telah dijawab oleh mahasiswa.</p>
        <a href="javascript:history.back()"
            class="mb-6 mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
            Kembali
        </a>

        <!-- Total Siswa yang Menjawab -->
        <div class="bg-white shadow-md p-6 rounded-lg border-l-4 border-blue-500 mb-6">
            <h2 class="text-xl font-semibold text-gray-900">Total Responden</h2>
            <p class="text-blue-500 text-lg font-semibold mt-2">{{ $total_responden }} Mahasiswa</p>
        </div>

        <!-- Statistik Pilihan Ganda dengan Chart.js -->
        <div class="bg-white shadow-md p-6 rounded-lg border-l-4 border-green-500 mb-6">
            <h2 class="text-xl font-semibold text-gray-900">📌 Statistik Pilihan Ganda</h2>
            <div class="mt-4">
                @foreach ($statistik_pilihan as $index => $pertanyaan)
                <div class="mb-20">
                    <h3 class="text-lg font-medium text-gray-800">{{ $loop->iteration }}. {{ $pertanyaan['pertanyaan'] }}</h3>
                    <div class="h-40">
                        <canvas id="chart-{{ $index }}"></canvas>
                    </div>
                    <div class="flex justify-center gap-4 mt-4">
                        @foreach ($pertanyaan['opsi'] as $idx => $opsi)
                        <div class="flex items-center">
                            <span class="w-4 h-4 inline-block mr-2" style="background-color: {{ ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6'][$idx % 5] }};"></span>
                            <span class="text-gray-700">{{ $opsi['teks'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            new Chart(document.getElementById("chart-{{ $index }}"), {
                                type: 'bar',
                                data: {
                                    labels: {!! json_encode(array_column($pertanyaan['opsi'], 'teks')) !!},
                                datasets: [{
                                    label: "Jumlah Responden",
                                    data: {!! json_encode(array_column($pertanyaan['opsi'], 'jumlah')) !!},
                                    backgroundColor: ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6'],
                                    borderWidth: 1,
                                }]

                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false // Sembunyikan legend di atas chart
                                        }
                                    },
                                    indexAxis: 'y',
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        x: {
                                            beginAtZero: true,
                                            grid: {
                                                display: false
                                            } // Hapus garis di chart
                                        },
                                        y: {
                                            display: false // Sembunyikan label di kiri chart
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Jawaban Soal Isian -->
        <div class="bg-white shadow-md p-6 rounded-lg border-l-4 border-yellow-500">
            <h2 class="text-xl font-semibold text-gray-900">📝 Jawaban Soal Isian</h2>

            <div class="mt-4 space-y-4">
                @foreach ($jawaban_isian as $pertanyaan)
                <div>
                    <h3 class="text-lg font-medium text-gray-800">{{ $loop->iteration }}. {{ $pertanyaan->pertanyaan }}</h3>
                    <ul class="mt-2 space-y-2">
                        @foreach ($pertanyaan->jawaban_mahasiswa as $jawaban_mahasiswa)
                        <li class="bg-gray-100 p-3 rounded-md">{{ $jawaban_mahasiswa->jawaban_isian }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@include('components.end-html')