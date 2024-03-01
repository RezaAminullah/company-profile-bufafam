<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('dashboard.berita.index', compact('beritas'));
    }
    

    public function indexDashboard()
    {
        $beritas = Berita::all();
        $contacts = Contact::all();
        return view('berita', compact('beritas','contacts'));
    }

    public function create()
    {
        return view('dashboard.berita.create');
    }

    public function store(Request $request)
    {
        // Validasi input, termasuk pengecekan bahwa file yang diunggah adalah gambar
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // Aturan validasi untuk file gambar
            // tambahkan aturan validasi lain sesuai kebutuhan
        ]);
    
        // Buat slug
        $slug = Str::slug($request->judul);
    
        // Pastikan slug unik
        $isSlugExist = Berita::where('slug', $slug)->exists();
        if ($isSlugExist) {
            $slug = $slug . '-' . uniqid();
        }
    
        // Menyimpan gambar yang diunggah
        $gambarName = time() . '.' . $request->gambar->extension(); // Nama file gambar
        $request->gambar->move(public_path('uploads'), $gambarName); // Simpan gambar ke direktori public/images
    
        // Buat berita baru
        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->slug = $slug;
        $berita->content = $request->content;
        $berita->gambar = $gambarName; // Simpan nama file gambar ke dalam kolom 'gambar'
        // tambahkan field lain sesuai kebutuhan
        $berita->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }
    
    public function edit($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
        return view('dashboard.berita.edit', compact('berita'));
    }

    public function update(Request $request, $slug)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            // tambahkan aturan validasi lain sesuai kebutuhan
        ]);

        // Cari berita yang akan diupdate
        $berita = Berita::where('slug', $slug)->first();

        // Update berita
        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul), // Anda perlu mengimpor kelas Str terlebih dahulu
            'content' => $request->content,
            // tambahkan field lain sesuai kebutuhan
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($slug)
    {
        // Cari berita yang akan dihapus
        $berita = Berita::where('slug', $slug)->first();
    
        // Periksa apakah berita ditemukan
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
    
        // Hapus berita
        $berita->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->first();
    
        if (empty($berita)) {
            Session::flash('alert-danger', 'Berita yang Anda cari tidak ditemukan');
            return redirect()->route('berita.index');
        }
    
        return view('dashboard.berita.show', compact('berita'));
    }

    public function detail($slug)
    {
        // Cari berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->first();

        // Periksa apakah berita ditemukan
        if (empty($berita)) {
            Session::flash('alert-danger', 'Berita yang Anda cari tidak ditemukan');
            return redirect()->route('berita.index');
        }

        // Tampilkan view detailberita.blade.php dengan data berita
        return view('detailberita', compact('berita'));
    }
    

    
}
