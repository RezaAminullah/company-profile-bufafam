<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('dashboard.news.index', compact('news'));
    }

//     public function show($slug)
// {
//     $news = News::where('slug', $slug)->first(); // Mengambil satu berita berdasarkan slug
//     return view('dashboard.news.show', compact('news'));
// }
public function show($id)
{
    $data = News::find($id);

    return view('dashboard.news.show', compact('news'));
}

    

    public function create()
    {
        return view('dashboard.news.create');
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
        $isSlugExist = News::where('slug', $slug)->exists();
        if ($isSlugExist) {
            $slug = $slug . '-' . uniqid();
        }
    
        // Menyimpan gambar yang diunggah
        $gambarName = time() . '.' . $request->gambar->extension(); // Nama file gambar
        $request->gambar->move(public_path('images'), $gambarName); // Simpan gambar ke direktori public/images
    
        // Buat berita baru
        $news = new News();
        $news->judul = $request->judul;
        $news->slug = $slug;
        $news->content = $request->content;
        $news->gambar = $gambarName; // Simpan nama file gambar ke dalam kolom 'gambar'
        // tambahkan field lain sesuai kebutuhan
        $news->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan.');
    }
    
    

    public function edit($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('dashboard.news.edit', compact('news'));
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
        $news = News::where('slug', $slug)->first();

        // Update berita
        $news->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul), // Anda perlu mengimpor kelas Str terlebih dahulu
            'content' => $request->content,
            // tambahkan field lain sesuai kebutuhan
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($slug)
    {
        // Cari berita yang akan dihapus
        $news = News::where('slug', $slug)->first();
    
        // Periksa apakah berita ditemukan
        if (!$news) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
    
        // Hapus berita
        $news->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    }
    
}
