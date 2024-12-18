<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Suara BPH DPC Kaliabang 2025-2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div id="pemilu-card" class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div style="position: fixed; z-index: 10; top: 1rem; right: 1rem" class="bg-white p-4 rounded-lg shadow-lg">
            <p id="countdown" class="text-2xl font-bold text-center">10:00</p>
            <script>
                let countdown = 600;
                let timer = setInterval(() => {
                    let minutes = Math.floor(countdown / 60);
                    let seconds = countdown % 60;
                    document.getElementById('countdown').innerText = `${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
                    countdown--;
                    if(countdown === 0) {
                        clearInterval(timer);
                    }
                }, 1000);
            </script>
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
            <div class="absolute bottom-0 left-0 right-0 h-12 bg-white" style="clip-path: polygon(0 100%, 100% 100%, 100% 0, 0 100%, 0 100%);"></div>
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
            <div class="border-t-2 border-l-2 border-r-2 border-gray-300 rounded-lg overflow-hidden bg-blue-50 shadow-md hover:shadow-lg transition">
                <div class="text-center text-3xl font-bold p-2 border-b-2 bg-blue-700 text-white">1</div>
                <div>
                    <img src="/Images/paslon1.jpg" class="object-cover w-full h-full aspect-square" alt="Paslon 1">
                    <div class="text-center p-4">
                        <p class="text-gray-600">CALON KETUA & WAKIL KETUA</p>
                        <h1 class="font-bold text-gray-900 text-lg mb-2">ISNAN ADAM</h1>
                        <button onclick="openModal('Isnan Adam', 1)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            VOTE!
                        </button>
                    </div>
                </div>
            </div>

            <!-- Candidate 2 -->
            <div class="border-t-2 border-l-2 border-r-2 border-gray-300 rounded-lg overflow-hidden bg-blue-50 shadow-md hover:shadow-lg transition">
                <div class="text-center text-3xl font-bold p-2 border-b-2 bg-blue-700 text-white">2</div>
                <div>
                    <img src="/Images/paslon2.jpg" class="object-cover w-full h-full aspect-square" alt="Paslon 2">
                    <div class="text-center p-4">
                        <p class="text-gray-600">CALON KETUA & WAKIL KETUA</p>
                        <h1 class="font-bold text-gray-900 text-lg mb-2">JUWITA ARILIA</h1>
                        <button onclick="openModal('Juwita Arilia', 2)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            VOTE!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="confirmation-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h3 id="candidate-name" class="text-xl font-bold text-center mb-4"></h3>
            <p class="text-center mb-4">Apakah Anda yakin memilih calon ini?</p>
            <form id="vote-form" action="{{ route('vote.store') }}" method="POST">
                @csrf
                <input type="hidden" name="paslon" id="paslon-id" value="">
                <div class="flex justify-between">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ya, Pilih
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(candidateName, paslonId) {
            document.getElementById('candidate-name').textContent = 'Anda akan memilih ' + candidateName;
            document.getElementById('paslon-id').value = paslonId;
            document.getElementById('confirmation-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmation-modal').classList.add('hidden');
        }
    </script>
  <script>
    let userCoordinates = { latitude: null, longitude: null };

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(storeCoordinates, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function storeCoordinates(position) {
        userCoordinates.latitude = position.coords.latitude;
        userCoordinates.longitude = position.coords.longitude;

        console.log("Latitude: " + userCoordinates.latitude);
        console.log("Longitude: " + userCoordinates.longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }

    // Call this function to get the coordinates when the page loads
    window.onload = getLocation;
</script>


</body>
</html>
