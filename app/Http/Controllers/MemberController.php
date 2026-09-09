<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id'            => 1,
            'nama'          => 'Ahmad Arifky',
            'nim'           => '12345678',
            'email'         => 'arifky@example.com',
            'nomor_telepon' => '081234567890',
            'alamat'        => 'Jl. Pemuda No. 10',
            'status'        => 'aktif',
        ],
        [
            'id'            => 2,
            'nama'          => 'Budi Santoso',
            'nim'           => '87654321',
            'email'         => 'budi@example.com',
            'nomor_telepon' => '089876543210',
            'alamat'        => 'Jl. Merdeka No. 45',
            'status'        => 'nonaktif',
        ],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}