@extends('layouts.app', ['title' => 'Halaman Pengguna', 'section_header' => 'Data Pengguna'])

@section('content')
<div class="row">
    
        <div class="col-lg-12">
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="border p-2 text-center">ID</th>
                        <th class="border p-2 text-center">Nama</th>
                        <th class="border p-2 text-center">Email</th>
                        <th class="border p-2 text-center">Role</th>
                        <th class="border p-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="hover:bg-green-50">
                        <td class="border p-2 text-center">{{ $user->id }}</td>
                        <td class="border p-2 text-center">{{ $user->name }}</td>
                        <td class="border p-2 text-center">{{ $user->email }}</td>
                        <td class="border p-2 text-center">{{ ucfirst($user->role) }}</td>
                        <td class="border p-2 text-center space-x-1">
                            <a href="{{ route('admin.data-pengguna.edit', $user->user_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.data-pengguna.destroy', $user->user_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus pengguna ini?')" class="btn btn-primary">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection