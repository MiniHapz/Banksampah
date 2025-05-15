<div class="flex min-h-screen">
    {{-- Sidebar tetap 64 --}}
    <div class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-4 text-xl font-bold border-b border-gray-700">
            Menu
        </div>
        <ul class="flex-1 overflow-y-auto">
            <li class="border-b border-gray-700">
                <a href="/admin/kategori" class="block p-4 hover:bg-gray-700">Kategori</a>
            </li>
            <li class="border-b border-gray-700">
                <a href="/admin/data-pengguna" class="block p-4 hover:bg-gray-700">Data Pengguna</a>
            </li>
            <li class="border-b border-gray-700">
                <a href="/admin/nasabah" class="block p-4 hover:bg-gray-700">Data Nasabah</a>
            </li>
            <li class="border-b border-gray-700">
                <a href="/admin/data-sampah" class="block p-4 hover:bg-gray-700">Data Sampah</a>
            </li>
            <li class="border-b border-gray-700">
                <a href="/admin/data-penarikan" class="block p-4 hover:bg-gray-700">Data Penarikan</a>
            </li>
            <!-- <li class="border-b border-gray-700">
                <a href="/admin/data-penjualan" class="block p-4 hover:bg-gray-700">Data Penjualan</a>
            </li> -->
            <li class="border-b border-gray-700">
                <a href="/admin/setoran" class="block p-4 hover:bg-gray-700">Data Setoran</a>
            </li>
        </ul>
    </div>

    {{-- Konten halaman --}}
    <div class="flex-1 p-6 bg-white">
        {{-- Di sini tempat isi konten masing-masing halaman --}}
        @yield('content')
    </div>
</div>
