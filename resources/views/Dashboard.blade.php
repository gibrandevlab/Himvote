<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal m-0 p-0 flex overflow-hidden">
    <div class="flex flex-row w-full h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r z-10 sidebar">
            <div class="flex items-center justify-between h-14 border-b px-4">
                <div class="text-sm tracking-wide text-blue-600 font-semibold">Himvote Control System</div>
                <button class="md:hidden" onclick="toggleSidebar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li>
                        <a href="#" onclick="tampilDashboard()"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="tampilNotification()"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">{{ $notifications->count() }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="tampilClient()"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Clients</span>
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-500 bg-green-50 rounded-full">15</span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content Area -->
        <div class="flex-1 ml-64 p-4 overflow-y-auto">
            <div id="dashboard" class="w-full bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <h1 class="text-3xl font-bold mb-4 text-blue-600 text-center">HIMVOTE 2025-2026</h1>
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-4 flex items-center justify-between shadow-sm">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl text-gray-400">1</span>
                            <div>
                                <div class="font-semibold">Isnan Adam</div>
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
                <div class="mt-4 flex justify-between items-center text-sm text-gray-600">
                    <span>Total Suara Masuk</span>
                    <span>{{ $voteCount }}</span>
                </div>
                <div class="w-full bg-blue-600 h-2 rounded-full mt-2"></div>
            </div>
            <div id="notification" class="w-full bg-white shadow-lg rounded-lg overflow-hidden p-4 mt-6">
                <h2 class="text-2xl font-bold mb-4 text-blue-600">Notifikasi</h2>
                <ul>
                    @foreach ($notifications as $notification)
                        <li class="text-gray-700 border-b border-gray-200 pb-2">
                            <span class="font-semibold">{{ $notification->formatted_created_at }}</span> -
                            User ID: {{ $notification->user_id }} - {{ $notification->notification }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="client" class="w-full bg-white shadow-lg rounded-lg overflow-hidden p-4 mt-6">
                <h2 class="text-2xl font-bold mb-6">Manage Users</h2>

                <!-- Create User Button -->
                <button onclick="toggleModal('createUserModal')" class="bg-blue-500 text-white px-4 py-2 rounded mb-6">Create User</button>

                <!-- List of Users -->
                <h3 class="text-xl font-bold mb-4">Users</h3>
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-2 px-4 border-b text-left font-semibold text-gray-600">Email</th>
                            <th class="py-2 px-4 border-b text-left font-semibold text-gray-600">Role</th>
                            <th class="py-2 px-4 border-b text-left font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-gray-700">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $user->role }}</td>
                                <td class="py-2 px-4 border-b">
                                    <!-- Update User Button -->
                                    <button onclick="toggleModal('updateUserModal{{ $user->id }}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Update</button>
                                    <!-- Delete User Button -->
                                    <button onclick="toggleModal('deleteUserModal{{ $user->id }}')" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Create User Modal -->
            <div id="createUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Create User</h3>
                        <form action="{{ route('users.store') }}" method="POST" class="mt-2">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                    <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md">
                                        <option value="admin">Admin</option>
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="universitas" class="block text-sm font-medium text-gray-700">Universitas</label>
                                    <input type="text" name="universitas" id="universitas" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                    <input type="text" name="nama" id="nama" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="mt-1 block w-full border border-gray-300 rounded-md" required></textarea>
                                </div>
                                <div>
                                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM (optional)</label>
                                    <input type="text" name="nim" id="nim" class="mt-1 block w-full border border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="nomor_telpon" class="block text-sm font-medium text-gray-700">Nomor Telpon</label>
                                    <input type="text" name="nomor_telpon" id="nomor_telpon" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                                    <select name="divisi" id="divisi" class="mt-1 block w-full border border-gray-300 rounded-md">
                                        <option value="pendidikan">Pendidikan</option>
                                        <option value="rsdm">RSDM</option>
                                        <option value="kominfo">Kominfo</option>
                                        <option value="litbang">Litbang</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="mt-1 block w-full border border-gray-300 rounded-md">
                                        <option value="ketua_divisi">Ketua Divisi</option>
                                        <option value="wakil_divisi">Wakil Divisi</option>
                                        <option value="anggota_divisi">Anggota Divisi</option>
                                        <option value="anggota_bph">Anggota BPH</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="periode" class="block text-sm font-medium text-gray-700">Periode</label>
                                    <select name="periode" id="periode" class="mt-1 block w-full border border-gray-300 rounded-md">
                                        <option value="2023-2024">2023-2024</option>
                                        <option value="2024-2025">2024-2025</option>
                                        <option value="2025-2026">2025-2026</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
                                <button type="button" onclick="toggleModal('createUserModal')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update User Modal -->
            @foreach ($users as $user)
                <div id="updateUserModal{{ $user->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Update User</h3>
                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-2">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ old('email', $user->email) }}" required>
                                        <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ $user->email }}" required>
                                    </div>
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                        <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                        <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md">
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="universitas" class="block text-sm font-medium text-gray-700">Universitas</label>
                                        <input type="text" name="universitas" id="universitas" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ old('universitas', $user->universitas) }}">
                                        <input type="text" name="universitas" id="universitas" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ $user->universitas }}">
                                    </div>
                                    <div>
                                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input type="text" name="nama" id="nama" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ old('nama', $user->nama) }}">
                                        <input type="text" name="nama" id="nama" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ $user->nama }}">
                                    </div>
                                    <div>
                                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="mt-1 block w-full border border-gray-300 rounded-md">{{ old('alamat', $user->alamat) }}</textarea>
                                        <textarea name="alamat" id="alamat" class="mt-1 block w-full border border-gray-300 rounded-md">{{ $user->alamat }}</textarea>
                                    </div>
                                    <div>
                                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM (optional)</label>
                                        <input type="text" name="nim" id="nim" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ old('nim', $user->nim) }}">
                                        <input type="text" name="nim" id="nim" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ $user->nim }}">
                                    </div>
                                    <div>
                                        <label for="nomor_telpon" class="block text-sm font-medium text-gray-700">Nomor Telpon</label>
                                        <input type="text" name="nomor_telpon" id="nomor_telpon" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ old('nomor_telpon', $user->nomor_telpon) }}">
                                        <input type="text" name="nomor_telpon" id="nomor_telpon" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ $user->nomor_telpon }}">
                                    </div>
                                    <div>
                                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ old('pekerjaan', $user->pekerjaan) }}">
                                        <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 block w-full border border-gray-300 rounded-md" value="{{ $user->pekerjaan }}">
                                    </div>
                                    <div>
                                        <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                                        <select name="divisi" id="divisi" class="mt-1 block w-full border border-gray-300 rounded-md">
                                            <option value="pendidikan" {{ $user->divisi == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                            <option value="rsdm" {{ $user->divisi == 'rsdm' ? 'selected' : '' }}>RSDM</option>
                                            <option value="kominfo" {{ $user->divisi == 'kominfo' ? 'selected' : '' }}>Kominfo</option>
                                            <option value="litbang" {{ $user->divisi == 'litbang' ? 'selected' : '' }}>Litbang</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="mt-1 block w-full border border-gray-300 rounded-md">
                                            <option value="ketua_divisi" {{ $user->jabatan == 'ketua_divisi' ? 'selected' : '' }}>Ketua Divisi</option>
                                            <option value="wakil_divisi" {{ $user->jabatan == 'wakil_divisi' ? 'selected' : '' }}>Wakil Divisi</option>
                                            <option value="anggota_divisi" {{ $user->jabatan == 'anggota_divisi' ? 'selected' : '' }}>Anggota Divisi</option>
                                            <option value="anggota_bph" {{ $user->jabatan == 'anggota_bph' ? 'selected' : '' }}>Anggota BPH</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="periode" class="block text-sm font-medium text-gray-700">Periode</label>
                                        <select name="periode" id="periode" class="mt-1 block w-full border border-gray-300 rounded-md">
                                            <option value="2023-2024" {{ $user->periode == '2023-2024' ? 'selected' : '' }}>2023-2024</option>
                                            <option value="2024-2025" {{ $user->periode == '2024-2025' ? 'selected' : '' }}>2024-2025</option>
                                            <option value="2025-2026" {{ $user->periode == '2025-2026' ? 'selected' : '' }}>2025-2026</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update User</button>
            <!-- Action User Modal -->
            @foreach ($users as $user)
                <div id="actionUserModal{{ $user->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Action User</h3>
                            <p class="text-sm text-gray-500">Choose an action for this user.</p>
                            <form action="#" method="POST" class="mt-4">
                                @csrf
                                <div class="flex justify-between">
                                    <button type="submit" formaction="{{ route('users.update', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Update User</button>
                                    <button type="submit" formaction="{{ route('users.destroy', $user->id) }}" class="bg-red-500 text-white px-4 py-2 rounded">Delete User</button>
                                    <button type="button" onclick="toggleModal('actionUserModal{{ $user->id }}')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
                                    <button type="button" onclick="toggleModal('updateUserModal{{ $user->id }}')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Delete User Modal -->
            @foreach ($users as $user)
                <div id="deleteUserModal{{ $user->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete User</h3>
                            <p class="text-sm text-gray-500">Are you sure you want to delete this user?</p>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="mt-4">
                                @csrf
                                <div class="flex justify-between">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete User</button>
                                    <button type="button" onclick="toggleModal('deleteUserModal{{ $user->id }}')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <script>
                function toggleModal(modalId) {
                    const modal = document.getElementById(modalId);
                    modal.classList.toggle('hidden');
                }
            </script>

        </div>
    </div>

    <script>
        tampilDashboard()

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }

        function tampilDashboard() {
            document.getElementById('dashboard').style.display = 'block';
            document.getElementById('notification').style.display = 'none';
            document.getElementById('client').style.display = 'none';
        }

        function tampilNotification() {
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('notification').style.display = 'block';
            document.getElementById('client').style.display = 'none';
        }

        function tampilClient() {
            document.getElementById('dashboard').style.display = 'none';
            document.getElementById('notification').style.display = 'none';
            document.getElementById('client').style.display = 'block';
        }
    </script>
</body>

</html>
