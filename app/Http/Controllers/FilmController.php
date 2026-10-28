<?php

namespace App\Http\Controllers;

use App\Models\{
    Film,
    Genre,
    Kritik,
    Peran,
};
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function movies()
    {
        //
        $genreFilm = null;
        $films = Film::select('id','title', 'poster','year')
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18);
        return view('components/movies', compact('films', 'genreFilm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        $data = $request->only(['title', 'sinopsis', 'year', 'genre_id']);

        // simpan file ke storage/app/public/images, lalu catat path-nya
        $data['poster'] = 'storage/'.$request->file('poster')->store('images', 'public');

        Film::create($data);

        return redirect()->route('film.index')->with(['success' => 'Film '.$request->title.' berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
        $filmByGenre    = Film::select('id','title', 'poster','year', 'sinopsis')
                        ->where('genre_id', '=', $film->genre_id)
                        ->OrderBy('created_at', 'asc')
                        ->limit(7)
                        ->get();
        $filmByRelease  = Film::select('id','title', 'poster','year')
                        ->where('year', '=', Carbon::now()->format('Y'))
                        ->OrderBy('created_at', 'asc')
                        ->limit(9)
                        ->get();
        $comments       = Kritik::select('comment', 'rating', 'user_id')
                        ->with('user:id,name')
                        ->where('film_id', '=', $film->id)
                        ->latest()
                        ->limit(10)
                        ->get();
        $perans         = $perans = Peran::with('cast')->where('film_id', '=', $film->id)->get();
        return view('components.movie-show', compact('film','filmByGenre','filmByRelease','comments', 'perans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $data = $request->only(['title', 'sinopsis', 'year', 'genre_id']);

        // poster hanya diganti kalau admin memilih file baru
        if ($request->hasFile('poster')) {
            $data['poster'] = 'storage/'.$request->file('poster')->store('images', 'public');
        }

        $film->update($data);

        return redirect()->route('film.index')->with(['success' => 'Film '.$request->title.' berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('film.index')->with(['success' => 'Film berhasil dihapus']);
    }

    public function movieHome()
    {
        $films = Film::select('id','title', 'poster','year')
                ->OrderBy('created_at', 'asc')
                ->limit(9)->get();
        $filmFutured = Film::select('id','title', 'poster','year')
                        ->orderByDesc('year')
                        ->OrderBy('created_at', 'asc')
                        ->limit(6)->get();
        $filmRecentAdded = Film::select('id','title', 'poster','year')
                            ->orderByDesc('created_at', 'asc')
                            ->limit(6)->get();
        $filmSlidey = Film::select('title', 'poster','sinopsis')
                        ->orderByDesc('year')
                        ->OrderBy('created_at', 'asc')
                        ->limit(6)->get();
        return view('components/home', compact('filmSlidey','films','filmFutured','filmRecentAdded'));
    }

    public function moviesByGenre($genre)
    {
        //
        $genreFilm = Genre::where('id', '=', $genre)->first();
        $films = Film::select('id','title', 'poster','year')
                ->where('genre_id', '=', $genre)
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18);
        return view('components/movies', compact('films','genreFilm'));
    }

    public function search(Request $request)
    {
        $keyword = trim((string) $request->query('q'));
        $genreFilm = null;

        $films = Film::select('id', 'title', 'poster', 'year')
                ->where('title', 'like', '%'.$keyword.'%')
                ->orderByDesc('year')
                ->paginate(18)
                ->withQueryString();

        return view('components/movies', compact('films', 'genreFilm', 'keyword'));
    }

    public function index()
    {
        $films = Film::with('genre')->orderByDesc('id')->paginate(10);
        return view('film.index', compact('films'));
    }
}
