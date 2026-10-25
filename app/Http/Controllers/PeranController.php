<?php

namespace App\Http\Controllers;

use App\Models\{
    Peran,
    Film,
    Cast,
};
use App\Http\Requests\StorePeranRequest;
use App\Http\Requests\UpdatePeranRequest;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perans = Peran::with(['film', 'cast'])->orderByDesc('id')->paginate(10);
        return view('peran.index', compact('perans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::select('id', 'title')->orderBy('title')->get();
        $casts = Cast::select('id', 'name')->orderBy('name')->get();
        return view('peran.create', compact('films', 'casts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeranRequest $request)
    {
        Peran::create($request->only(['actor', 'film_id', 'cast_id']));

        return redirect()->route('peran.index')->with(['success' => 'Data peran berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peran $peran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peran $peran)
    {
        $films = Film::select('id', 'title')->orderBy('title')->get();
        $casts = Cast::select('id', 'name')->orderBy('name')->get();
        return view('peran.edit', compact('peran', 'films', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeranRequest $request, Peran $peran)
    {
        $peran->update($request->only(['actor', 'film_id', 'cast_id']));

        return redirect()->route('peran.index')->with(['success' => 'Data peran berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peran $peran)
    {
        $peran->delete();

        return redirect()->route('peran.index')->with(['success' => 'Data peran berhasil dihapus']);
    }
}
