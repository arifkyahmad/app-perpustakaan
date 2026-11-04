@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a>

        {{-- Form Pencarian --}}
        <form action="{{ route('members.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}">
            <button type="submit">Cari</button>
            @if(request('search'))
                <a href="{{ route('members.index') }}">Reset</a>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member['id'] }}</td>
                    <td>{{ $member['nama'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member['id']) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member['id']) }}">Edit</a> |
                        <form action="{{ route('members.destroy', $member['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 15px;">
        {{ $members->appends(request()->query())->links('pagination::simple-default') }}
    </div>
@endsection