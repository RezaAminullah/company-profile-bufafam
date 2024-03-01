<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Session;

class AboutUsController extends Controller
{
    
    public function index()
    {
        $aboutUs = AboutUs::all();
        return view('dashboard.aboutus.index', compact('aboutUs'));
    }

    public function indexDashboard()
    {
        $aboutUs = AboutUs::all();
        return view('aboutus', compact('aboutUs'));
    }

    // Menampilkan formulir tambah data about us
    public function create()
    {
        return view('dashboard.aboutus.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Maksimum 10MB
        ]);

        try {
            // Simpan data about us
            $aboutUs = new AboutUs;
            $aboutUs->nama = $request->nama;
            $aboutUs->jabatan = $request->jabatan;
            $aboutUs->deskripsi = $request->deskripsi; // Deskripsi tidak wajib diisi, jadi tidak perlu dicek di sini

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $aboutUs->foto = $imageName;
            }

            $aboutUs->save();

            Session::flash('alert-success', 'Data about us berhasil ditambahkan');
            return redirect()->route('aboutus.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $aboutUs = AboutUs::find($id);

        if (empty($aboutUs)) {
            Session::flash('alert-danger', 'Data about us yang Anda cari tidak ditemukan');
            return redirect()->route('aboutus.index');
        }

        return view('dashboard.aboutus.show', compact('aboutUs'));
    }

    // Menampilkan formulir edit data about us
    public function edit($id)
    {
        $aboutUs = AboutUs::find($id);

        if (empty($aboutUs)) {
            Session::flash('alert-danger', 'Data about us yang Anda cari tidak ditemukan');
            return redirect()->route('aboutus.index');
        }

        return view('dashboard.aboutus.edit', compact('aboutUs'));
    }

    // Mengupdate data about us
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Maksimum 10MB
        ]);

        try {
            // Simpan data about us
            $aboutUs = AboutUs::find($id);
            $aboutUs->nama = $request->nama;
            $aboutUs->jabatan = $request->jabatan;
            $aboutUs->deskripsi = $request->deskripsi; // Deskripsi tidak wajib diisi, jadi tidak perlu dicek di sini

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $aboutUs->foto = $imageName;
            }

            $aboutUs->save();

            Session::flash('alert-success', 'Data about us berhasil diperbarui');
            return redirect()->route('aboutus.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $aboutUs = AboutUs::find($id);
            $aboutUs->delete();
            Session::flash('alert-success', 'Data about us berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

        return redirect()->route('dashboard.aboutus.index');
    }
}
