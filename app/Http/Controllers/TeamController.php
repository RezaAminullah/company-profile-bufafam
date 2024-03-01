<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('dashboard.team.index', compact('teams'));
    }
    public function indexDashboard()
    {
        $teams = Team::all();
        $contacts = Contact::all();
        return view('team', compact('teams','contacts'));
    }

    public function create()
    {
        return view('dashboard.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        try {
            $team = new Team;
            $team->nama = $request->nama;
            $team->jabatan = $request->jabatan;
            $team->deskripsi = $request->deskripsi;

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $team->foto = $imageName;
            }

            $team->save();

            Session::flash('alert-success', 'Data team berhasil ditambahkan');
            return redirect()->route('team.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        $team = Team::find($id);

        if (empty($team)) {
            Session::flash('alert-danger', 'Data team yang Anda cari tidak ditemukan');
            return redirect()->route('dashboard.team.index');
        }

        return view('dashboard.team.show', compact('team'));
    }

    public function edit($id)
    {
        $team = Team::find($id);

        if (empty($team)) {
            Session::flash('alert-danger', 'Data team yang Anda cari tidak ditemukan');
            return redirect()->route('dashboard.team.index');
        }

        return view('dashboard.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        try {
            $team = Team::find($id);
            $team->nama = $request->nama;
            $team->jabatan = $request->jabatan;
            $team->deskripsi = $request->deskripsi;

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName);
                $team->foto = $imageName;
            }

            $team->save();

            Session::flash('alert-success', 'Data team berhasil diperbarui');
            return redirect()->route('dashboard.team.index');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $team = Team::find($id);
            $team->delete();
            Session::flash('alert-success', 'Data team berhasil dihapus');
        } catch (\Exception $e) {
            Session::flash('alert-danger', $e->getMessage());
        }

           // return redirect()->route('product.index');
           return redirect('/dashboard/team');
    }
}
