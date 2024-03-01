<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Kontenhome;

class KontenhomeController extends Controller
{
    public function index()
    {
        // Isi dengan logika yang sesuai untuk halaman utama konten home
        $kontenhomes = Kontenhome::all();
        return view('dashboard.home.kontenhome.index',compact('kontenhomes'));
    }

    public function create()
    {
        return view('dashboard.home.kontenhome.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // maksimum 10MB
        ]);

        try {
            // Simpan data konten home
            $kontenhome = new Kontenhome;
            $kontenhome->judul = $request->judul;
            $kontenhome->deskripsi = $request->deskripsi;
            
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $kontenhome->gambar = $imageName;
                
            }

            $kontenhome->save();
            
            Session::flash('alert-success', 'Konten home berhasil ditambahkan');
            return redirect()->route('dashboard.kontenhome.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $kontenhome = Kontenhome::find($id);

        if (!$kontenhome) {
            Session::flash('alert-danger', 'Konten home tidak ditemukan');
            return redirect()->route('dashboard.kontenhome.index');
        }

        return view('dashboard.home.kontenhome.edit', compact('kontenhome'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:10240|nullable', // maksimum 10MB
    ]);

    try {
        // Cari data konten home berdasarkan ID
        $kontenhome = Kontenhome::find($id);

        // Periksa apakah data konten home ditemukan
        if (!$kontenhome) {
            throw new \Exception('Konten home tidak ditemukan');
        }

        // Update data konten home
        $kontenhome->judul = $request->judul;
        $kontenhome->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $kontenhome->gambar = $imageName;
        }

        $kontenhome->save();

        Session::flash('alert-success', 'Konten home berhasil diperbarui');
        return redirect()->route('home.kontenhome.index');
    } catch (\Exception $e) {
        Session::flash('alert-danger', $e->getMessage());
        return redirect()->back()->withInput();
    }
}


    public function destroy($id)
    {
        try {
            $kontenhome = Kontenhome::find($id);

            if (!$kontenhome) {
                throw new \Exception('Konten home tidak ditemukan');
            }

            $kontenhome->delete();
            Session::flash('alert-success', 'Konten home berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

        return redirect()->route('home.kontenhome.index');
    }

    public function show($id)
    {
        $kontenhome = Kontenhome::find($id);

        if (!$kontenhome) {
            // Jika konten home tidak ditemukan, tampilkan pesan error
            return abort(404);
        }

        // Jika konten home ditemukan, tampilkan halaman detail konten home
        return view('home.kontenhome.show', compact('kontenhome'));
    }
}
