<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // Menampilkan semua produk
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('dashboard.product.index', compact('products'));
    // }
        public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    public function indexDashboard()
    {
        $products = Product::all();
        $contacts = Contact::all();
        return view('product', compact('products','contacts'));
    }


    // Menampilkan formulir tambah produk
    public function create()
    {
        return view('dashboard.product.create');
    }

    // Menyimpan produk baru
    public function save(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // Maksimum 10MB
        ]);

        try {
            // Simpan data produk
            $data = new Product;
            $data->namaproduk = $request->namaproduk;
            $data->harga = $request->harga;

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $data->foto = $imageName;
            }

            $data->save();

            Session::flash('alert-success', 'Produk berhasil ditambahkan');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $data = Product::find($id);

        if (empty($data)) {
            Session::flash('alert-danger', 'Produk yang anda cari tidak ditemukan');
            return redirect()->route('product.index');
        }

        return view('dashboard.product.show', compact('data'));
    }

    // Menampilkan formulir edit produk
    public function edit($id)
    {
        $product = Product::find($id);
    
        if (empty($product)) {
            Session::flash('alert-danger', 'Produk yang anda cari tidak ditemukan');
            return redirect()->route('product.index');
        }
    
        return view('dashboard.product.edit', compact('product'));
    }
    
    

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required|integer',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // Maksimum 10MB
        ]);

        try {
            // Simpan data produk
            $data = Product::find($id);
            $data->namaproduk = $request->namaproduk;
            $data->harga = $request->harga;

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $data->foto = $imageName;
            }

            $data->save();

            Session::flash('alert-success', 'Produk berhasil diperbarui');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // Menghapus produk
    // public function destroy($id)
    // {
    //     try {
    //         $data = Product::find($id);
    //         $data->delete();
    //         Session::flash('alert-success', 'Produk berhasil dihapus');
    //     } catch (\Exception $e) {
    //         Session::flash('alert-danger', $e->getMessage());
    //     }

    //     return redirect()->route('product.index');
    // }
    public function destroy($id)
    {
        try {
            $data = Product::find($id);

            if (!$data) {
                throw new \Exception('Produk tidak ditemukan');
            }

            $data->delete();
            Session::flash('alert-success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

        // return redirect()->route('product.index');
        return redirect('/dashboard/product');
    }

}
