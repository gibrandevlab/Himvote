<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HimVote</title>
    <link rel="icon" href="{{ asset('Images/himsi.jpg') }}" type="image/jpeg">
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div id="pemilu-card" class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div style="position: fixed; z-index: 10; top: 1rem; right: 1rem" class="bg-white p-4 rounded-lg shadow-lg">
        </div>
        <!-- Header Section -->
        <div class="relative bg-blue-600 text-white p-6">
            <div class="absolute top-4 left-4 text-yellow-300 font-bold">
                PEMILIHAN UMUM
            </div>

            <!-- Logo and Title -->
            <div class="flex items-center justify-between mb-8 bg-transparent">
                <div id="lottie-animation" class="w-20 h-20"></div>
                <h1 class="text-2xl md:text-4xl font-bold text-center flex-grow">SURAT SUARA</h1>
                <div class="w-20 h-20 rounded-full">
                    <img src="{{ asset('Images/himsi.png') }}" alt="HIMSI Logo" class="w-full h-auto rounded-full">
                </div>
            </div>
            <!-- White wave decoration -->
            <div class="absolute bottom-0 left-0 right-0 h-12 bg-white"
                style="clip-path: polygon(0 100%, 100% 100%, 100% 0, 0 100%, 0 100%);"></div>
        </div>

        <!-- Main Title -->
        <div class="text-center py-8 px-4">
            <h2 class="text-2xl font-bold text-blue-700">PEMILIHAN UMUM</h2>
            <h3 class="text-xl font-bold mt-2 text-gray-700">BPH DPC KALIABANG</h3>
            <h3 class="text-xl font-semibold text-gray-600">KETUA DAN WAKIL</h3>
            <h4 class="text-xl font-bold mt-2 text-blue-700">PERIODE 2025-2026</h4>
        </div>

        <!-- Candidate Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
            <!-- Candidate 1 -->
            <div
                class="border-t-2 border-l-2 border-r-2 border-gray-300 rounded-lg overflow-hidden bg-blue-50 shadow-md hover:shadow-lg transition">
                <div class="text-center text-3xl font-bold p-2 border-b-2 bg-blue-700 text-white">1</div>
                <div>
                    <img src="/Images/paslon1.jpg" class="object-cover w-full h-full aspect-square" alt="Paslon 1">
                    <div class="text-center p-4">
                        <p class="text-gray-600">CALON KETUA & WAKIL KETUA</p>
                        <h1 class="font-bold text-gray-900 text-lg mb-2">ISNAN ADAM</h1>
                        <button onclick="openModal('Isnan Adam', 1)"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            VOTE!
                        </button>
                    </div>
                </div>
            </div>

            <!-- Candidate 2 -->
            <div
                class="border-t-2 border-l-2 border-r-2 border-gray-300 rounded-lg overflow-hidden bg-blue-50 shadow-md hover:shadow-lg transition">
                <div class="text-center text-3xl font-bold p-2 border-b-2 bg-blue-700 text-white">2</div>
                <div>
                    <img src="/Images/paslon2.jpg" class="object-cover w-full h-full aspect-square" alt="Paslon 2">
                    <div class="text-center p-4">
                        <p class="text-gray-600">CALON KETUA & WAKIL KETUA</p>
                        <h1 class="font-bold text-gray-900 text-lg mb-2">JUWITA ARILIA</h1>
                        <button onclick="openModal('Juwita Arilia', 2)"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            VOTE!
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-blue-800 py-6 text-center mt-12">
            <p class="text-gray-200 text-sm">
                &copy; 2023
                <a href="https://www.instagram.com/afwan.gibran_/" target="_blank" rel="noopener noreferrer" class="text-white hover:underline">
                    Himvote
                </a>.
                Dibuat oleh <a href="https://www.instagram.com/afwan.gibran_/" target="_blank" rel="noopener noreferrer" class="text-white hover:underline">seseorang</a>. Semua hak dilindungi.
            </p>
        </footer>

    </div>
    <div id="Chart" class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-4">
        <!-- Header -->
        <h1 class="text-3xl font-bold mb-2 text-blue-600 text-center">HIMVOTE 2025-2026</h1>

        <!-- Dropdown Button -->
        <button
            class="w-full bg-blue-600 text-white py-3 px-4 rounded-md text-left mb-6 flex justify-between items-center">
            <span class="text-lg font-semibold">DPC KALIABANG</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Candidate List -->
        <div class="space-y-4">
            <!-- Candidate 1 -->
            <div class="bg-white rounded-lg p-4 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-4">
                    <span class="text-2xl text-gray-400">1</span>
                    <div>
                        <div class="font-semibold">Isnan Adam </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-2xl text-blue-600 font-bold">{{ $paslon1Percentage }}%</span>
                    </div>
                    <div class="w-24 h-24 overflow-hidden rounded-full">
                        <img src="{{ asset('Images/paslon1.jpg') }}" alt="Isnan Adam"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Candidate 2 -->
            <div class="bg-white rounded-lg p-4 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-4">
                    <span class="text-2xl text-gray-400">2</span>
                    <div>
                        <div class="font-semibold">Juwita Arilia</div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-2xl text-blue-600 font-bold">{{ $paslon2Percentage }}%</span>
                    <div class="w-24 h-24 overflow-hidden rounded-full">
                        <img src="{{ asset('Images/paslon2.jpg') }}" alt="Juwita Arilia"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- Total -->
        <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
            <span>Total Suara Masuk</span>
            <span>{{ $paslon1 + $paslon2 }}</span>
        </div>
        <div class="w-full bg-blue-600 h-2 rounded-full mt-2"></div>
    </div>
    <!-- Modal -->
    <div id="confirmation-modal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h3 id="candidate-name" class="text-xl font-bold text-center mb-4"></h3>
            <p class="text-center mb-4">Apakah Anda yakin memilih calon ini?</p>
            <form id="vote-form" action="{{ route('vote.store') }}" method="POST">
                @csrf
                <input type="hidden" name="paslon" id="paslon-id" value="">
                <input type="hidden" name="latitude" id="latitude" value="">
                <input type="hidden" name="longitude" id="longitude" value="">
                <div class="flex justify-between">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ya, Pilih
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if (session('error'))
        <div id="error-alert"
            class="alert-card fixed top-20 left-1/2 transform -translate-x-1/2 w-3/4 max-w-lg z-10 p-4 bg-red-500 text-white rounded-lg shadow-lg opacity-90 transition-opacity duration-500 ease-in-out">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('error-alert').remove();
                @php
                    session()->forget('error');
                @endphp
            }, 3000);
        </script>
    @endif

    <!-- Display success message if exists -->
    @if (session('success'))
        <div id="success-alert"
            class="alert-card fixed top-20 left-1/2 transform -translate-x-1/2 w-3/4 max-w-lg z-10 p-4 bg-green-500 text-white rounded-lg shadow-lg opacity-90 transition-opacity duration-500 ease-in-out">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-alert').remove();
                @php
                    session()->forget('success');
                @endphp
            }, 3000);
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pemiluCard = document.getElementById('pemilu-card');
            const chart = document.getElementById('Chart');
            const hasVoted = '{{ $hasVoted }}' === '1';

            pemiluCard.classList.toggle('hidden', hasVoted);
            chart.classList.toggle('hidden', !hasVoted);

            const modal = document.getElementById('confirmation-modal');
            const candidateNameElement = document.getElementById('candidate-name');
            const paslonIdElement = document.getElementById('paslon-id');

            window.openModal = function(candidateName, paslonId) {
                candidateNameElement.textContent = `Anda akan memilih ${candidateName}`;
                paslonIdElement.value = paslonId;
                modal.classList.remove('hidden');
            };

            window.closeModal = function() {
                modal.classList.add('hidden');
            };

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, error => {
                    alert(`Geolocation error: ${error.message}`);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }

            const pemiluElement = document.querySelector("#Pemilu");
            if (pemiluElement) {
                const options = {
                    series: [44, 55, 13, 43, 22],
                    chart: {
                        width: 380,
                        type: 'pie'
                    },
                    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };
                new ApexCharts(pemiluElement, options).render();
            } else {
                console.error("Element #Pemilu not found in the DOM.");
            }
        });
    </script>

</body>

</html>
