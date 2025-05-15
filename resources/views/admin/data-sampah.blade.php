<x-app-layout>
    <div class="flex">
        <x-sidebar />

        <div class="p-6 bg-white shadow-md rounded w-full">
            <h2 class="text-2xl font-semibold mb-4">Data Sampah</h2>

            <a href="{{ route('data-sampah.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Sampah</a>

            @if(session('success'))
                <div class="mt-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full mt-4 border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Satuan</th>
                        <th class="px-4 py-2">Harga per Kg</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sampahs as $no => $sampah)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $no + 1 }}</td>
                            <td class="px-4 py-2">{{ $sampah->nama }}</td>
                            <td class="px-4 py-2">{{ $sampah->kategori->nama }}</td>
                            <td class="px-4 py-2">{{ $sampah->satuan }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($sampah->harga_per_kg, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('data-sampah.edit', $sampah->id) }}" class="text-blue-600">Edit</a>
                                <form action="{{ route('data-sampah.destroy', $sampah->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($sampahs->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data sampah.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
