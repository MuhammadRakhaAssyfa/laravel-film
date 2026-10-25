<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Http\Requests\StoreCastRequest;
use App\Http\Requests\UpdateCastRequest;

class CastController extends Controller
{
    // daftar semua cast
    public function index()
    {
        $casts = Cast::select('id', 'name', 'age')->get();
        return view('cast.index', compact('casts'));
    }

    // form tambah
    public function create()
    {
        return view('cast.create');
    }

    // simpan data baru
    public function store(StoreCastRequest $request, Cast $cast)
    {
        $cast->create($request->all());

        return redirect()->route('cast.index')->with(['success' => 'Data '.$request['name'].' berhasil disimpan']);
    }

    // detail satu cast
    public function show(Cast $cast)
    {
        return view('cast.show', compact('cast'));
    }

    // form edit
    public function edit(Cast $cast)
    {
        return view('cast.edit', compact('cast'));
    }

    // simpan perubahan
    public function update(UpdateCastRequest $request, Cast $cast)
    {
        $cast->update($request->all());

        return redirect()->route('cast.index')->with(['success' => 'Data '.$request['name'].' berhasil diupdate']);
    }

    // hapus
    public function destroy(Cast $cast)
    {
        $cast->delete();

        return redirect()->route('cast.index')->with(['success' => 'Data berhasil dihapus']);
    }
}