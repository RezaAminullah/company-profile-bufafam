<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('dashboard.home.card.index', compact('cards'));
    }
    public function homepage()
    {
        $cards = Card::all();
        return view('homepage', compact('cards'));
    }


    public function create()
    {
        return view('dashboard.home.card.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // maksimum 10MB
        ]);

        try {
            // Simpan data card
            $card = new Card;
            $card->judul = $request->judul;
            $card->deskripsi = $request->deskripsi;
            $card->konten = $request->konten;

            // Membuat slug dari judul
            $slug = Str::slug($request->judul);
            // Memastikan slug unik
            $isSlugExist = Card::where('slug', $slug)->exists();
            if ($isSlugExist) {
                $slug = $slug . '-' . uniqid();
            }
            $card->slug = $slug;

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $card->gambar = $imageName;
            }

            $card->save();

            Session::flash('alert-success', 'Card berhasil ditambahkan');
            return redirect()->route('dashboard.home.card.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // public function edit($id)
    // {
    //     $card = Card::find($id);

    //     if (!$card) {
    //         Session::flash('alert-danger', 'Card tidak ditemukan');
    //         return redirect()->route('dashboard.home.card.index');
    //     }

    //     return view('dashboard.home.card.edit', compact('card'));
    // }
    public function edit($id)
    {
        $card = Card::find($id);
    
        if (empty($card)) {
            Session::flash('alert-danger', 'Produk yang anda cari tidak ditemukan');
            return redirect()->route('dashboard.home.card.index');
        }
    
        return view('dashboard.home.card.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:10240|nullable', // maksimum 10MB
        ]);

        try {
            // Simpan data card
            $card = Card::find($id);
            $card->judul = $request->judul;
            $card->deskripsi = $request->deskripsi;
            $card->konten = $request->konten;

            // Membuat slug dari judul
            $slug = Str::slug($request->judul);
            // Memastikan slug unik, kecuali untuk card yang sedang diperbarui
            $isSlugExist = Card::where('slug', $slug)->where('id', '!=', $id)->exists();
            if ($isSlugExist) {
                $slug = $slug . '-' . uniqid();
            }
            $card->slug = $slug;

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $card->gambar = $imageName;
            }

            $card->save();

            Session::flash('alert-success', 'Card berhasil diperbarui');
            return redirect()->route('dashboard.home.card.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $card = Card::find($id);

            if (!$card) {
                throw new \Exception('Card tidak ditemukan');
            }

            $card->delete();
            Session::flash('alert-success', 'Card berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

        return redirect()->route('home.card.index');
    }
    public function show($id)
    {
        $card = Card::find($id);

        if (!$card) {
            // Jika card tidak ditemukan, tampilkan pesan error
            return abort(404);
        }

        // Jika card ditemukan, tampilkan halaman detail card
        return view('dashboard.home.card.show', compact('card'));
    }
}
