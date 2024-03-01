<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('dashboard.home.service.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.home.service.create');
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
            // Simpan data service
            $service = new Service;
            $service->judul = $request->judul;
            $service->deskripsi = $request->deskripsi;
            $service->konten = $request->konten;

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $service->gambar = $imageName;
            }

            $service->save();

            Session::flash('alert-success', 'Service berhasil ditambahkan');
            return redirect()->route('dashboard.home.service.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);

        if (!$service) {
            Session::flash('alert-danger', 'Service tidak ditemukan');
            return redirect()->route('dashboard.home.service.index');
        }

        return view('dashboard.home.service.edit', compact('service'));
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
            // Simpan data service
            $service = Service::find($id);
            $service->judul = $request->judul;
            $service->deskripsi = $request->deskripsi;
            $service->konten = $request->konten;

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $service->gambar = $imageName;
            }

            $service->save();

            Session::flash('alert-success', 'Service berhasil diperbarui');
            return redirect()->route('dashboard.home.service.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $service = Service::find($id);

            if (!$service) {
                throw new \Exception('Service tidak ditemukan');
            }

            $service->delete();
            Session::flash('alert-success', 'Service berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

        return redirect()->route('home.service.index');
    }

    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            // Jika service tidak ditemukan, tampilkan pesan error
            return abort(404);
        }

        // Jika service ditemukan, tampilkan halaman detail service
        return view('dashboard.home.service.show', compact('service'));
    }
}
